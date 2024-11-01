<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://egeelabs.com
 * @since      1.0.0
 *
 * @package    Wp_Vivid_Arts_Pro
 * @subpackage Wp_Vivid_Arts_Pro/admin/partials
 */


if (!empty($_POST['vap_api_key'])) {
  update_option( 'vap_api_key', $_POST['vap_api_key']);
}
if (!empty($_POST['vap_eid'])) {
 update_option( 'vap_eid', $_POST['vap_eid']);
}
 if (!empty($_POST['vap_custom_css'])) {
   update_option( 'vap_custom_css', esc_attr( $_POST['vap_custom_css'] ));
 }

?>

<div class="vaa4wp-admin">

  <div class="row">
    <div class="main-content col col-4">
      <h1 class="page-title">
        General Settings
      </h1>
      <div class="vivid-arts-form">
        <form action="" method="post">
          <?php
            settings_fields('vivid_arts_general_settings');

            do_settings_sections('vivid-arts-pro');

            submit_button();
          ?>
  			</form>
      </div>
    </div>

    <div class="sidebar col col-2">

    </div>
  </div>
</div>
