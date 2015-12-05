<?php
get_header();

session_start();
require_once("settings.php");
require_once("securimage/securimage.php");
$securimage = new Securimage();
$ret;
?>

<div class="container helpContainer">
      <div class="col-md-4 columns col-md-offset-4" id="editBox">
      
      
<?php
if (!isset($_POST['captcha_code']) || $securimage->check($_POST['captcha_code']) == false) {
  echo "<h1>Fehler</h1>Sie haben das Rätsel falsch gelößt!<br><a href='".get_page_link(31)."'>Zurück</a>";
}
else{

//generate edit password
$pass = "";
for($i = 0; $i < 20; $i++){
  $pass .= rand(0,9);
}

//inser into db
$sql = "INSERT INTO `user` (`id`, `name`, `email`, `phone`, `help_with`, `help_when`,`pass`,`confirmed`,`insertDate`) VALUES (NULL, '" . mysqli_real_escape_string($mysqli,$_POST['help_name']);
$sql .= "', '" . mysqli_real_escape_string($mysqli,$_POST['email']) . "', '" . mysqli_real_escape_string($mysqli,$_POST['phone']) . "', '";
$sql .= mysqli_real_escape_string($mysqli,$_POST['help_with']) . "', '" . mysqli_real_escape_string($mysqli,$_POST['help_when']) . "','" . mysqli_real_escape_string($mysqli,$pass) . "','0',NOW());";
$mysqli->query($sql);
$user_id = $mysqli->insert_id;


$sql = "SELECT `id` FROM `workgroups` ORDER BY `name`";
$res = mysqli_query($mysqli,$sql);
while($row = mysqli_fetch_assoc($res)){
  if(isset($_POST['workgroup_' . $row['id']])){
    $sql = "INSERT INTO `user_workgroups` (`id`, `user_id`, `workgroup_id`) VALUES (NULL, '" . $user_id . "', '" . $row['id'] . "');";
    mysqli_query($mysqli,$sql);
  }
}

//send e-mail
$plain = "Vielen Dank für Ihr Angebot, bei der Integration der in Babelsberg untergebrachten Flüchtlinge mitzuhelfen. \n\rWir werden uns demnächst mit Ihnen in Verbindung setzen und bitten Sie bis dahin um etwas Geduld.\n\r\n\r"; 
$plain .= "Mit freundlichen Grüßen \n\r\n\rNetzwerk Integration Flüchtlinge Babelsberg\n\r";
$plain .= "___________________________\n\r";
$plain .= "Bitte bestätigen Sie Ihre E-Mail Adresse indem Sie auf folgenen Link klicken:\n\r";
$plain .= get_page_link(42)."?help_id=" . $user_id . "&help_pass=" . $pass . "&help_confirm";

$mail = $plain;

$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= "Content-type: text/plain;charset=utf-8\r\n";
$header .= 'From: info@fluechtlingshilfe-babelsberg.de' . "\r\n";
$header .= 'Sender: info@fluechtlingshilfe-babelsberg.de' . "\r\n";
mail($_POST['email'],"=?UTF-8?Q?Anmeldung_bei_der_Fl=c3=bcchtlingshilfe_Babelsberg?=",$mail,$header, '-finfo@fluechtlingshilfe-babelsberg.de');

echo "<h1>Erfolgreich gespeichert</h1>";
echo "Wir haben Ihnen eine E-Mail mit einem Bestätigungslink gesendet. Bitte klicken Sie darauf.";
}
?>
</div>
</div>

<?php get_footer(); ?>
