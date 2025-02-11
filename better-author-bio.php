<?php
/*
Plugin Name: Better Author Bio
Version: 2.7.10.11
Description: Adds a cool Author bio after every post automatically. Do it automatically or manual with shortcode.
Author: Arif Nezami
Author URI: http://arifnezami.com
Plugin URI: http://nezami.in/bab
License: GNU GPL v3 or later

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

add_option( 'bab_loc', '10', '', 'yes' );
add_option( 'bab_hidden', '10', '', 'yes' );
add_option( 'bab_auttxt1', '50', '', 'yes' );
add_option( 'bab_auttxt2', '50', '', 'yes' );
add_option( 'bab_showauttxt', '10', '', 'yes' );
add_option( 'bab_showautbio', '10', '', 'yes' );
add_option( 'bab_showautintro', '50', '', 'yes' );
add_option( 'bab_showautgra', '50', '', 'yes' );
$bab_loc = get_option('bab_loc');

if ($bab_loc=='' || $bab_loc=='10')
 {

  $bab_loc='bottom';
  update_option('bab_loc', $bab_loc);
  update_option('bab_auttxt1', 'has written');
  update_option('bab_auttxt2', 'post in this blog');
  update_option('bab_showautbio', 'y');
  update_option('bab_showauttxt', 'y');
  update_option('bab_showautintro', 'About');
  update_option('bab_showautgra', 'y');
  update_option('bab_hidden', 0);

}



if ($bab_loc=='top' || $bab_loc=='bottom')

{

include('bab_topbot.php'); 

}

if ($bab_loc=='manual')

{


include('bab_manu.php');

}



function bab_admin() {
    if (!current_user_can('install_plugins')) {
        wp_die('Oops ! You need Admin power to access this page. Please call your Blog Admin for help. If you think it is a bug inform the plugin developer asap. sent mail: all [at] nezami.in or tweet him @arifnezami');
    }
include('bab_admin.php'); 

    // Here is where you could start displaying the HTML needed for the settings
    // page, or you could include a file that handles the HTML output for you.
}



function bab_notify() {

              $bab_hid = get_option('bab_hidden');
				if($bab_hid != 1){
				echo '<div class="error fade" style="background-color:coral;"><p><strong>Better Author Bio must be configured. Go to <a href="' . admin_url( 'options-general.php?page=babsettings' ) . '">Better author Bio Settings page</a> to enable and configure the plugin.</strong></p></div>';
}
}




add_action( 'admin_notices', 'bab_notify');

function bab_admin_actions() {

    add_options_page("Better Author Bio Settings", "Better Author Bio Settings",  'install_plugins', "babsettings", "bab_admin");
}


add_action('admin_menu', 'bab_admin_actions');