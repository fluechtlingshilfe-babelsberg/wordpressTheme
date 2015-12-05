<?php get_header(); ?>

<div class="container helpContainer">
    <form action="<?php echo get_page_link(40) ?>" class="clearfix col-md-offset-2 col-md-8 help-form" method="post">
      <h1>Angaben bearbeiten</h1>
    <!-- Begin page content -->    
      <?php
      $id = $_GET["help_id"];
      $pass = $_GET["help_pass"];
      require_once("settings.php");
      
      //confirmation
      if(isset($_GET['help_confirm'])){
	$sql = "UPDATE `user` SET `confirmed` = '1' WHERE `user`.`id` = '" . mysqli_real_escape_string($mysqli,$id) . "' AND `pass`='" .  mysqli_real_escape_string($mysqli,$pass) . "';";
	mysqli_query($mysqli, $sql);
      }
      
      $sql = "SELECT `id`,`name`,`phone`,`help_with`,`email`,`help_when` FROM `user` WHERE id ='" . mysqli_real_escape_string($mysqli,$id) . "' AND `pass`='" . mysqli_real_escape_string($mysqli,$pass) . "'";
      $res = mysqli_query($mysqli, $sql);
      if(($row = mysqli_fetch_assoc($res)) == NULL) {
      	echo "<h3>Es ist ein Fehler aufgetreten!</h3>Wahrscheinlich ist der verwendete Link falsch oder Ihr Akoount wurde gelöscht.";
      }
      else{
      ?>
      <div class="col-md-6 cloumns helpBox" >
       Wobei würde ich helfen: (Bitte ankreuzen)<br>
       <?php
				 require_once("getgroups.php");
				 $grouphtml = edit_groups2html($id);
				 echo $grouphtml;
  			?><br>
			</div>

      <div class="col-md-6 cloumns helpBox" >
       Name:<br /><input type="text" name="help_name" value="<?php echo $row['name']; ?>"/></td><br>

       E-Mail Adresse:<br /><input type="text" name="phone" value="<?php echo $row['email']; ?>" disabled="true"/><br>

       Telefonnummer:<br /><input type="text" name="phone" value="<?php echo $row['phone']; ?>"/><br>

       Wann bin ich verfügbar: <input type="text" name="help_when" value="<?php echo $row['help_when']; ?>"/><br>

        Was mir noch wichtig ist: <input type="text" name="help_with" value="<?php echo $row['help_with']; ?>"/>

       <input type="hidden" name="help_id" value="<?php echo $id; ?>" />
       <input type="hidden" name="help_pass" value="<?php echo $pass; ?>" />

       <input type="submit" value="Angaben ändern" />
       </form>
       <form action="<?php echo get_page_link(38) ?>" method="post" id="deleteForm">
	  <input type="hidden" name="help_id" value="<?php echo $id; ?>" />
	  <input type="hidden" name="help_pass" value="<?php echo $pass; ?>" />
	  <input type="submit" value="Account löschen" />
      <?php
      }
      ?>
      </div>

      </form>
    </div>

<?php get_footer(); ?>
