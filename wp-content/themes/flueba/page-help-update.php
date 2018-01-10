<?php get_header(); ?>

<div class="container helpContainer">
      <div class="col-md-4 columns col-md-offset-4" id="editBox">
<?php
require_once("settings.php");

$sql = "SELECT * FROM `user` WHERE `id` = '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "' AND `pass` = '" . mysqli_real_escape_string($mysqli,$_POST['help_pass']) . "'";
$result = mysqli_query($mysqli,$sql);
if(mysqli_num_rows($result) == 0){
  the_field('fluba_update_error'); 
}
else{

//Benutzerdaten in der db ändern
$sql = "UPDATE `user` SET `name` = '" . mysqli_real_escape_string($mysqli,$_POST['help_name']) . "', `phone` = '" . mysqli_real_escape_string($mysqli,$_POST['phone']);
$sql .= "', `help_with` = '" . mysqli_real_escape_string($mysqli,$_POST['help_with']) . "', `help_when` = '" . mysqli_real_escape_string($mysqli,$_POST['help_when']);
$sql .= "' WHERE `user`.`id` = '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "' AND `pass`='" . mysqli_real_escape_string($mysqli,$_POST['help_pass']) . "';";
mysqli_query($mysqli,$sql);


the_field('fluba_update_success'); 
}

?>
      </div>
</div>

<?php get_footer(); ?>
