<?php get_header(); ?>

<div class="container helpContainer">
      <div class="col-md-4 columns col-md-offset-4" id="editBox">
<?php
require_once("settings.php");

$sql = "SELECT * FROM `user` WHERE `id` = '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "' AND `pass` = '" . mysqli_real_escape_string($mysqli,$_POST['help_pass']) . "'";
$result = mysqli_query($mysqli,$sql);
if(mysqli_num_rows($result) == 0){
  echo "<h3>Fehler</h3>Es ist ein Fehler aufgetreten. Möglicherweise wurde ihr Benutzer mitlerweile gelöscht.";
}
else{

//Benutzerdaten in der db ändern
$sql = "UPDATE `user` SET `name` = '" . mysqli_real_escape_string($mysqli,$_POST['help_name']) . "', `phone` = '" . mysqli_real_escape_string($mysqli,$_POST['phone']);
$sql .= "', `help_with` = '" . mysqli_real_escape_string($mysqli,$_POST['help_with']) . "', `help_when` = '" . mysqli_real_escape_string($mysqli,$_POST['help_when']);
$sql .= "' WHERE `user`.`id` = '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "' AND `pass`='" . mysqli_real_escape_string($mysqli,$_POST['help_pass']) . "';";
mysqli_query($mysqli,$sql);

//Löche die Gruppenbeziehungen
$sql = "DELETE FROM `user_workgroups` WHERE `user_workgroups`.`user_id` = '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "'";
mysqli_query($mysqli,$sql);

//Gruppenbeziehungen neu anlegen
$sql = "SELECT `id` FROM `workgroups`";
$res = mysqli_query($mysqli,$sql);
while($row = mysqli_fetch_assoc($res)){
  if(isset($_POST['workgroup_' . $row['id']])){
    $sql = "INSERT INTO `user_workgroups` (`id`, `user_id`, `workgroup_id`) VALUES (NULL, '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "', '" .mysqli_real_escape_string($mysqli, $row['id']) . "');";
    mysqli_query($mysqli,$sql);
  }
}
echo "<h3>Daten geändert</h3><a href='".site_url()."'>Zurück zur Startseite</a>";
}

?>
      </div>
</div>

<?php get_footer(); ?>
