<?php
get_header();

session_start();
require_once("settings.php");
require_once("securimage/securimage.php");
$securimage = new Securimage();
$ret;

the_post();
?>

<div class="container helpContainer">
      <div class="col-md-4 columns col-md-offset-4" id="editBox">
      
      
<?php
if (!isset($_POST['captcha_code']) || $securimage->check($_POST['captcha_code']) == false) {
  the_field('captcha_error'); 
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
$sql .= "', '','" . mysqli_real_escape_string($mysqli,$pass) . "','0',NOW());";
$mysqli->query($sql);
$user_id = $mysqli->insert_id;


//send e-mail
/*$plain = "Vielen Dank für Ihr Angebot, bei der Integration der in Babelsberg untergebrachten Flüchtlinge mitzuhelfen. \n\rWir werden uns demnächst mit Ihnen in Verbindung setzen und bitten Sie bis dahin um etwas Geduld.\n\r\n\r"; 
$plain .= "Mit freundlichen Grüßen \n\r\n\rNetzwerk Integration Flüchtlinge Babelsberg\n\r";
$plain .= "___________________________\n\r";
$plain .= "Bitte bestätigen Sie Ihre E-Mail Adresse indem Sie auf folgenen Link klicken:\n\r";*/
$plain = get_field('e-mail_text') . "\n\r"; 
$plain .= get_page_link(42)."?help_id=" . $user_id . "&help_pass=" . $pass . "&help_confirm";

$mail = $plain;

$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= "Content-type: text/plain;charset=utf-8\r\n";
$header .= 'From: info@fluechtlingshilfe-babelsberg.de' . "\r\n";
$header .= 'Sender: info@fluechtlingshilfe-babelsberg.de' . "\r\n";
mail($_POST['email'],"=?UTF-8?Q?Anmeldung_bei_der_Fl=c3=bcchtlingshilfe_Babelsberg?=",$mail,$header, '-finfo@fluechtlingshilfe-babelsberg.de');

the_field('user_added'); 
}
?>
</div>
</div>

<?php get_footer(); ?>
