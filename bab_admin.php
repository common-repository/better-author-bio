<?php 
	if($_POST['bab_hidden'] == 'Y') {
		//Form data sent
		$bab_loc = $_POST['bab_loc'];
		update_option('bab_loc', $bab_loc);
                update_option('bab_hidden', 1);
		$bab_auttxt1 = $_POST['bab_auttxt1'];
		update_option('bab_auttxt1', $bab_auttxt1);
		$bab_auttxt2 = $_POST['bab_auttxt2'];
		update_option('bab_auttxt2', $bab_auttxt2);
		$bab_showauttxt = $_POST['bab_showauttxt'];
		update_option('bab_showauttxt', $bab_showauttxt);
		$bab_showautbio = $_POST['bab_showautbio'];
		update_option('bab_showautbio', $bab_showautbio);
		$bab_showautintro = $_POST['bab_showautintro'];
		update_option('bab_showautintro', $bab_showautintro);
		$bab_showautgra = $_POST['bab_showautgra'];
		update_option('bab_showautgra', $bab_showautgra);
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$bab_loc = get_option('bab_loc');
		$bab_auttxt1 = get_option('bab_auttxt1');
		$bab_auttxt2 = get_option('bab_auttxt2');
		$bab_showauttxt = get_option('bab_showauttxt');
		$bab_showautbio = get_option('bab_showautbio');
		$bab_showautintro = get_option('bab_showautintro');
		$bab_showautgra = get_option('bab_showautgra');
		
	}
	
	
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Better Author Bio Settings', 'bab_trdom' ) . "</h2>" . "version: 2.7.10.11 by <a href='http://arifnezami.com' >Arif Nezami</a>"; ?>


<?php global $current_user;
      get_currentuserinfo(); 
      echo '<br /><br /><br />Hello, ' . $current_user->user_firstname . '. Current Selected view mode:'; ?>

<strong><?php if($bab_loc=='top') echo "Top of the Post" ; if($bab_loc=='bottom') echo "Bottom of the Post" ; if($bab_loc=='manual') echo "Manual" ; ?></strong>
<form name="bab_form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="POST">
	<input type="hidden" name="bab_hidden" value="Y">
<br /><br />
<br /><?php echo "Where you want to show the Better Author Bio in posts:"; ?><br />
<input type="radio" name="bab_loc" value="top"<?php if ($bab_loc=='top') { echo ' checked="checked"'; } ?> /> Top of the Post<br />
<input type="radio" name="bab_loc" value="bottom"<?php if ($bab_loc=='bottom') { echo ' checked="checked"'; } ?> /> Bottom of the Post<br />
<input type="radio" name="bab_loc" value="manual"<?php if ($bab_loc=='manual') { echo ' checked="checked"'; } ?> /> Manual<br /><br />

<br /><?php echo "Do You want to show Author's gravatar in Better author Bio Box ?"; ?><br />
<input type="radio" name="bab_showautgra" value="y"<?php if ($bab_showautgra=='y') { echo ' checked="checked"'; } ?> /> Yes
<input type="radio" name="bab_showautgra" value="n"<?php if ($bab_showautgra=='n') { echo ' checked="checked"'; } ?> /> No<br />


<br /><?php echo "Write the text to show before Author Name (write things like About or Meet):"; ?><br />
<input type="text" name="bab_showautintro" value="<?php echo $bab_showautintro ; ?>"/> (than author name will displayed automatically) (The result will be like: Meet Author Name or About Author Name)<br />

<br /><?php echo "Do You want to show Author's bio text in Better Auter Bio Box ?"; ?><br />
<input type="radio" name="bab_showautbio" value="y"<?php if ($bab_showautbio=='y') { echo ' checked="checked"'; } ?>/> Yes
<input type="radio" name="bab_showautbio" value="n"<?php if ($bab_showautbio=='n') { echo ' checked="checked"'; } ?> /> No<br />


<br /><?php echo "Do You want to show Author's number of posts ?"; ?><br />
<input type="radio" name="bab_showauttxt" value="y"<?php if ($bab_showauttxt=='y') { echo ' checked="checked"'; } ?> /> Yes
<input type="radio" name="bab_showauttxt" value="n"<?php if ($bab_showauttxt=='n') { echo ' checked="checked"'; } ?> /> No<br />


<br /><?php echo "Write the text to show Author's numer of Posts:"; ?><br />
<input type="text" name="bab_auttxt1" value="<?php echo $bab_auttxt1 ; ?>"/> (number of posts) <input type="text" name="bab_auttxt2" value="<?php echo $bab_auttxt2 ; ?>" /><br />
<p class="submit">
	<input type="submit" name="Submit" value="Update Options" />
	</p>
</form>
<?php if($bab_loc=='manual'){

		echo "Use [author_bio] shortcode anywhere in your post body to display the author bio or put <textarea rows='1' cols='30'>  <?php bab_manual(); ?> </textarea> in the source code of your current theme where you want to show the author bio box. You should find out of single.php file of your current theme and put the code there. If you find anything wrong after doing that just delete better-author-bio folder from your server's plugins directory. Don't worry, in most of the cases nothing wrong will happen :) .";
		}
		echo"<br /><br /><br /><br /><br />";
?>

<?php echo 'Example:<br />'; ?>
<?php echo '<img class="aligncenter" src="http://s.wordpress.org/extend/plugins/better-author-bio/screenshot-3.png?r=433971" alt="Better Author Bio by Arif Nezami" /><br />'; ?>
<?php echo '<br /><br /><br />Plugin Developer: <strong><a href="http://nezami.in">Arif Nezami</a></strong>. Friend him in <a href="http://nezami.in/facebook">Facebook</a>, <a href="http://nezami.in/gplus">Google+</a> or in <a href="http://nezami.in/twitter">Twitter</a>.'; ?>
</div>