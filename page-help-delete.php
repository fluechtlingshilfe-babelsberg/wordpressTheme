<?php get_header(); ?>

<div class="container helpContainer">
      <div class="col-md-4 columns col-md-offset-4" id="editBox">
<?php
require_once("settings.php");
$sql = "DELETE FROM `user` WHERE `user`.`id` = '" . mysqli_real_escape_string($mysqli,$_POST['help_id']) . "' AND `pass`='" . mysqli_real_escape_string($mysqli,$_POST['help_pass']) . "'";
mysqli_query($mysqli, $sql);

if(mysqli_affected_rows($mysqli) > 0){//success
  echo "<h2>Erfolgreich gelöscht</h2>";
}
else{
  echo "<h2>Löchen fehlgeschlagen!</h2>";
}
?> 
<a href='<?php echo site_url(); ?>'>Zurück zur Startseite</a>
</div>
</div>

<?php get_footer(); ?>
