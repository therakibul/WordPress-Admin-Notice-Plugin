<?php
/*
    * Plugin Name:       Admin Notice
    * Plugin URI:        https://example.com/plugins/the-basics/
    * Description:       Handle the basics with this plugin.
    * Version:           1.10.3
    * Requires at least: 5.2
    * Requires PHP:      7.2
    * Author:            John Smith
    * Author URI:        https://author.example.com/
    * License:           GPL v2 or later
    * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
    * Text Domain:       notice
    * Domain Path:       /languages
*/
    function admin_notice(){
        global $pagenow;
        if(!(isset($_COOKIE["nn-close"]) && $_COOKIE["nn-close"] == 1)):
    ?>
        <div id="notice-ninja" class="notice notice-success is-dismissible"> 
            <?php 
                $response = wp_remote_get("http://localhost/PHP/notice.php");
                $body = wp_remote_retrieve_body($response);
                echo $body;
            ?>
            <p>Hey, here is a notice for you. <?php echo $pagenow;?></p>
        </div>

    <?php
        endif;
    }


    add_action("admin_notices", "admin_notice");

    function admin_assets(){
        wp_enqueue_script( "notice-js", plugin_dir_url(__FILE__)."assets/js/notice.js", array("jquery"), time(), true );
    }
    add_action("admin_enqueue_scripts", "admin_assets");

?>