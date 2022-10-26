<?php
/*
Plugin name: Top Header Text Plugin
Author: RokasM
Version: 1.0.0
*/

add_action( 'admin_menu', 'top_header_text_menu' );


function top_header_text_menu(){

    $page_title = 'Top Header Text Plugin';
    $menu_title = 'Top Header Text';
    $capability = 'manage_options';
    $menu_slug  = 'top_header_text';
    $function   = 'top_header_text_page';
    $icon_url   = 'dashicons-media-code';
    $position   = 4;

    add_menu_page( $page_title,
        $menu_title,
        $capability,
        $menu_slug,
        $function,
        $icon_url,
        $position );


    add_action( 'admin_init', 'update_top_header_text' );

}


function update_top_header_text() {
    register_setting( 'top-header-text-settings', 'top_header_text' );
}


function top_header_text_page(){
    ?>
    <h1>Top Header Text Plugin</h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'top-header-text-settings' ); ?>
        <?php do_settings_sections( 'top-header-text-settings' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Your Top Header Text:</th>
                <td><input type="text" name="top_header_text" value="<?php echo get_option('top_header_text'); ?>"/></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    <?php
}

function custom_content_after_body_open_tag() {

    ?>

    <div style="background-color: red; color: white; width:100%;">
    <span><center><?php echo get_option('top_header_text'); ?></center></span>
    </div>

    <?php

}

add_action('wp_head', 'custom_content_after_body_open_tag');

