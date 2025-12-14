<?php

date_default_timezone_set('UTC');

// CREATE DATABASE rooms;
// CREATE TABLE reservation (start DATETIME, duration_minutes INT, room TEXT, name TEXT, UNIQUE(room, start));

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "user", "example", "rooms");

$url = strtok($_SERVER["REQUEST_URI"], '?');
if (isset($_GET["week_offset"])) {
	$url .= '?week_offset=' . $_GET["week_offset"];
}

if (isset($_POST["name"])) {
	setcookie("name", $_POST["name"]);
	header("Location: $url");
	die();
}

if (isset($_GET["free"])) {
	if (empty($_GET["room"])) {
		die("No room given");
	}
	$stmt = $mysqli->prepare("DELETE FROM reservation WHERE start = ? AND room = ?");
	if (!$stmt) {
		die("Failed to prepare delete query");
	}

	$start = date('Y-m-d H:i:s', intval($_GET["free"]));
	$room = $_GET["room"];
	$stmt->bind_param("ss", $start, $room);
	$stmt->execute();
	$stmt->close();
	header("Location: $url");
	die();
}

if (isset($_GET['reserve'])) {
	if (empty($_GET["room"])) {
		die("No room given");
	}
	if (empty($_COOKIE["name"])) {
		die("No name saved");
	}

	$stmt = $mysqli->prepare("INSERT INTO reservation(start, duration_minutes, room, name) VALUES (?, ?, ?, ?)");
	if (!$stmt) {
		die("Failed to prepare insert query");
	}

	$duration_minutes = 60;
	$base_start = intval($_GET["reserve"]);
	$room = $_GET["room"];
	$name = $_COOKIE["name"];

	// Check if we need to book multiple weeks ahead
	$weeks_ahead = isset($_GET["ahead"]) ? intval($_GET["ahead"]) : 0;
	if ($weeks_ahead < 0) $weeks_ahead = 0;

	// Book for current week and all weeks ahead
	for ($week = 0; $week <= $weeks_ahead; $week++) {
		$week_offset_seconds = $week * 7 * 24 * 60 * 60;
		$start = date('Y-m-d H:i:s', $base_start + $week_offset_seconds);
		$stmt->bind_param("siss", $start, $duration_minutes, $room, $name);
		$stmt->execute();
	}

	$stmt->close();
	header("Location: $url");
	die();
}

$week_offset = (isset($_GET["week_offset"]) ? intval($_GET["week_offset"]) : 0);
if (!$week_offset) $week_offset = 0;
$seconds_offset = $week_offset * 7 * 24 * 60 * 60;

$week_start = strtotime("monday this week") + $seconds_offset;
$week_end = strtotime("sunday this week") + $seconds_offset;

$stmt = $mysqli->prepare("SELECT start,name,room FROM reservation WHERE start >= ? AND start <= ?");
if (!$stmt) {
	die("Failed to prepare query");
}
$ws = date('Y-m-d H:i:s', $week_start);
$we = date('Y-m-d H:i:s', $week_end + 24 * 60 * 60 - 1);
$stmt->bind_param("ss", $ws, $we);
$stmt->execute();

$stmt->bind_result($start, $name, $room);
$entries = array();
while ($stmt->fetch()) {
	$time = strtotime($start);
	array_push($entries, array(
		'day' => intval(date('N', $time)) - 1,
		'hour' => intval(date('H', $time)),
		'name' => $name,
		'room' => $room,
	));
}
$stmt->close();

function find($list, $cb) {
  foreach ($list as $item) {
    if (call_user_func($cb, $item) === true)
      return $item;
  }
  return null;
}
function slot_taken($day, $hour, $room) {
	global $entries;
	return find($entries, function($entry) use ($day, $hour, $room) {
		return $entry['day'] == $day && $entry['hour'] == $hour && $entry['room'] == $room;
	});
}

$ROOM1 = '106';
$ROOM2 = '107';
$day_names = array('Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa', 'So');
?>

<html>
	<head>
<style>
body {
	font-family: sans-serif;
}
table {
	border-collapse: collapse;
	table-layout: fixed;
	width: 100%;
	height: 100%;
	max-height: 500px;
	max-width: 1200px;
	position: relative;
}
table.no-name:after {
	content: "Bitte gib oben einen Namen an bevor du einen Raum reservierst.";
	position: absolute;
	padding: 3rem;
	text-align: center;
	box-sizing: border-box;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	width: 100%;
	height: 100%;
	background: rgba(255, 255, 255, 0.8);
	text-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
	display: flex;
	align-items: center;
	justify-content: center;
}
td:nth-child(2n+1), tr:first-child td {
	border-right: 2px solid #666;
}
tr:nth-child(2) td {
	border-bottom: 2px solid #666;
}
td {
	border: 1px solid #999;
	text-align: center;
	font-size: 0.8rem;
}
tr:first-child td {
	font-weight: bold;
	font-size: 1rem;
}
tr td:first-child {
	width: 80px;
	font-weight: bold;
	font-size: 1rem;
}
.slot {
	position: relative;
	word-wrap: break-word;
}
.slot.free a {
	text-decoration: none;
	cursor: pointer;
	color: #aaa;
	font-size: 0.7rem;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	height: 100%;
}
.controls {
	font-size: 0.8rem;
	margin: 2rem 0;
}
.free-button {
	position: absolute;
	top: 0;
	right: 0;
	display: block;
	text-decoration: none;
	color: #900;
}
.small-caption {
	font-weight: normal;
	font-size: 0.8rem;
	display: block;
}
</style>
	</head>
	<body>
		<h1>Raumplaner</h1>
		<form action="" method="post">
			<input
				name="name"
				value="<?= isset($_COOKIE["name"]) ? $_COOKIE["name"] : ""  ?>"
				placeholder="Dein Name für Einträge ..." />
			<input type="submit" value="Name speichern" />
		</form>

		<div class="controls">
			<a href="<?= "?week_offset=" . ($week_offset - 1) ?>">« Vorige Woche</a>
			<?php if ($week_offset != 0) { ?><a href="?week_offset=0">Diese Woche</a><?php } ?>
			<a href="<?= "?week_offset=" . ($week_offset + 1) ?>">Nächste Woche »</a>
		</div>

		<table <?= empty($_COOKIE['name']) ? 'class="no-name"' : '' ?>>
			<tr>
				<td></td>
				<?php for ($day = 0; $day < 7; $day++) { ?>
					<td colspan="2">
						<?= $day_names[$day] ?>
						<span class="small-caption"><?= date('d.m.', $week_start + $day * 24 * 60 * 60) ?></span>
					</td>
				<?php } ?>
				<tr>
					<td style="font-size: 0.8rem">Zeit/Raum</td>
					<?php for ($day = 0; $day < 7; $day++) { ?>
						<td><?= $ROOM1 ?></td>
						<td><?= $ROOM2 ?></td>
					<?php } ?>
				</tr>
			</tr>
			<?php for ($hour = 9; $hour <= 20; $hour++) { ?>
				<tr>
					<td><?= $hour < 10 ? '0' . $hour : $hour ?>:00</td>
					<?php for ($day = 0; $day < 7; $day++) {
						$start = $week_start + $day * 24 * 60 * 60 + $hour * 60 * 60;
						foreach (array($ROOM1, $ROOM2) as $room) { ?>
						<?php if ($entry = slot_taken($day, $hour, $room)) { ?>
							<td class="slot">
								<span class="slot-name"><?= $entry['name'] ?></span>
								<a class="free-button" href="<?= "?free=$start&room=$room&week_offset=$week_offset" ?>">&times;</a>
							</td>
						<?php } else { ?>
							<td class="slot free">
								<a href="<?= "?reserve=$start&room=$room&week_offset=$week_offset" ?>">◯</a>
							</td>
						<?php }
						}
					} ?>
				</tr>
			<?php } ?>
		</table>
		<br />
		<p>
			Mehrere Termine auf einmal buchen:
			<input type="number" value="1" id="appointments-count" min="1" />
			<br />
			<span id="ahead-label"></span>
			<script>
				const appointmentsInput = document.getElementById('appointments-count');
				const aheadLabel = document.getElementById('ahead-label');

				function updateReserveLinks() {
					const count = parseInt(appointmentsInput.value) || 1;
					if (count < 1) {
						appointmentsInput.value = 1;
						return;
					}

					// Update label
					if (count > 1) {
						aheadLabel.textContent = `Oben Termin auswählen um ${count} Termine auf einmal zu buchen (gleicher Wochentag und Uhrzeit).`;
					} else {
						aheadLabel.textContent = '';
					}

					// Update all reserve links
					const reserveLinks = document.querySelectorAll('a[href*="reserve="]');
					reserveLinks.forEach(link => {
						const url = new URL(link.href);
						if (count > 1) {
							url.searchParams.set('ahead', count - 1);
						} else {
							url.searchParams.delete('ahead');
						}
						link.href = url.toString();
					});
				}

				appointmentsInput.addEventListener('input', updateReserveLinks);
				updateReserveLinks();
			</script>
		</p>
	</body>
</html>

