<?php get_header(); ?>

<div class="container helpContainer">
      <div class="col-md-4 columns col-md-offset-4" id="editBox">
<?php
require_once("settings.php");
$sql = "DELETE FROM `user` WHERE `user`.`id` = '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "' AND `pass`='" . mysqli_real_escape_string($mysqli,$_POST['help_pass']) . "'";
mysqli_query($mysqli, $sql);

if(mysqli_affected_rows($mysqli) > 0){//success
  the_field('fluba_delete_success');
}
else{
  the_field('fluba_delete_error');
}
?> 
</div>
</div>

<?php get_footer(); ?>
