<?php get_header(); ?>

<div class="container helpContainer">
 <form action="<?php echo get_page_link(34) ?>" method="POST" id="registration" class="clearfix col-md-offset-2 col-md-8 help-form">
 <h1>Helfen</h1>
 <div class="col-md-6 columns helpBox">
    Babelsberg integriert – Sie wollen mithelfen? Dann tragen Sie
sich bitte in das Formular ein.
 <br /><br>
   <span class=question>Wobei würde ich helfen<br><span style="font-weight:normal;">(Bitte ankreuzen)</span> 
   <?php
			     require_once("getgroups.php");
			     $grouphtml = groups2html();
			     echo $grouphtml;
		    ?>
  <p class="workgroupdes">Eine Beschreibung der Arbeitsgruppen finden Sie <a href="<?php echo get_page_link(15) ?>" target="_blank">hier</a></p>
  Die mit * gekennzeichneten Felder sind Pflichtfelder.<br>
 </div>

 <div class="col-md-6 columns helpBox">
     <span class=question>Name*:</span>
     <input  type="text" name="help_name" placeholder="Max Mustermann" /><br />

     <span class=question>E-Mail*:</span>
     <input  type="email" name="email" placeholder="z.B. max@mustermann.de"/><br />

     <span class=question>Telefonnummer:</span>
     <input  type="text" name="phone" placeholder="z.B. 012345/7890"/><br />

     <span class=question>Wann bin ich verfügbar:</span>
     <input type="text" name="help_when" placeholder="z.B. jeden Donnerstag 14-16 Uhr"/><br />

     <span class=question>Was mir noch wichtig ist:</span>
     <input type="text" name="help_with" placeholder="..."/><br />
     
     Bitte lösen Sie dieses Rätsel, damit wir sicherstellen könne, dass Sie ein Mensch sind:<br/>
     <img id="captcha" src="<?php echo get_template_directory_uri() ?>/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
     <a href="#" onclick="document.getElementById('captcha').src = '<?php echo get_template_directory_uri() ?>/securimage/securimage_show.php?' + Math.random(); return false">[ Neues Rätsel ]</a>
     <input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" placeholder="Text aus dem Bild" /><br>
     <input type="submit" id="submitBtn" dissabled="false" value="Absenden">
 </div>
 </form>
</div>

<?php get_footer(); ?>
