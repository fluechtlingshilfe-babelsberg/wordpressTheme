<?php 
get_header();
the_post();
?>

<div class="container helpContainer">
 <form action="<?php echo get_page_link(34) ?>" method="POST" id="registration" class="clearfix col-md-offset-2 col-md-8 help-form">
 <h1><?php the_title(); ?></h1>
 <div class="col-md-6 columns helpBox">
<?php  the_content(); ?>

     <span class=question>Name*:</span>
     <input  type="text" name="help_name" placeholder="Max Mustermann" /><br />

     <span class=question>E-Mail*:</span>
     <input  type="email" name="email" placeholder="z.B. max@mustermann.de"/><br />


</div>

 <div class="col-md-6 columns helpBox">
     <span class=question>Telefonnummer:</span>
     <input  type="text" name="phone" placeholder="z.B. 012345/7890"/><br />
     
     Bitte lösen Sie dieses Rätsel, damit wir sicherstellen könne, dass Sie ein Mensch sind:<br/>
     <img id="captcha" src="<?php echo get_template_directory_uri() ?>/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
     <a href="#" onclick="document.getElementById('captcha').src = '<?php echo get_template_directory_uri() ?>/securimage/securimage_show.php?' + Math.random(); return false">[ Neues Rätsel ]</a>
     <input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" placeholder="Text aus dem Bild" /><br>
     <input type="submit" id="submitBtn" dissabled="false" value="Absenden">
 </div>
 </form>
</div>

<?php get_footer(); ?>
