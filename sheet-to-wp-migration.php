<?php
/*
 * Plugin Name:       Google Sheet to WP Post migration
 * Description:       This tool able to fetch google sheet data and migrate them into wordpress posts easily.
 * Version:           1.1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shimanta Das(Abhimanyu Saha Team)
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * Text Domain:       google sheet, post migration,
 */

if (!defined('ABSPATH')) {
    die("You are restricted to access this page!");
}


try {
    function my_custom_plugin_activate()
    {

        global $wpdb;
        $host = $wpdb->dbhost;
        $user = $wpdb->dbuser;
        $pass = $wpdb->dbpassword;
        $db = $wpdb->dbname;

        try {
            $conn = mysqli_connect($host, $user, $pass, $db);
            // Code to execute on plugin activation
            global $wpdb;
            $table_name = $wpdb->prefix . 'sheet_to_wp_post';

            $sql = "CREATE TABLE $table_name (
          `id` bigint NOT NULL,
          `google_sheet_url` varchar(240) NULL,
          `account_type` varchar(50) NULL,
          `project_id` varchar(50)  NULL,
          `private_key_id` varchar(100)  NULL,
          `private_key` LONGTEXT  NULL,
          `client_email` varchar(100) NULL,
          `client_id` varchar(100) NULL,
          `auth_uri` varchar(100)  NULL,
          `token_uri` varchar(150)  NULL,
          `auth_provider_x509_cert_url` varchar(250)  NULL,
          `client_x509_cert_url` varchar(250)  NULL,
          `universe_domain` varchar(120) NULL,
          `cron_job_time` varchar(4) NULL,
           `post_id_column` varchar(5) NOT NULL, 
           `post_title_column` varchar(5) NULL,
           `post_content_column` varchar(5) NULL,  
          `post_type` varchar(10) NULL,
          `post_type_column` varchar(5) NULL,
          `post_category` varchar(30) NULL,
          `post_category_column` varchar(5) NULL,
          `post_tag` varchar(30) NULL,
          `post_tag_column` varchar(5) NULL,
          `meta_box_1` varchar(10) NULL,
        `meta_box_1_column` varchar(5) NULL,
        `meta_box_2` varchar(10) NULL,
        `meta_box_2_column` varchar(5) NULL,
        `meta_box_3` varchar(10) NULL,
        `meta_box_3_column` varchar(5) NULL,
        `meta_box_4` varchar(10) NULL,
        `meta_box_4_column` varchar(5) NULL,
        `meta_box_5` varchar(10) NULL,
        `meta_box_5_column` varchar(5) NULL,
        `meta_box_6` varchar(10) NULL,
        `meta_box_6_column` varchar(5) NULL,
        `meta_box_7` varchar(10) NULL,
        `meta_box_7_column` varchar(5) NULL,
        `meta_box_8` varchar(10) NULL,
        `meta_box_8_column` varchar(5) NULL,
        `meta_box_9` varchar(10) NULL,
        `meta_box_9_column` varchar(5) NULL,
        `meta_box_10` varchar(10) NULL,
        `meta_box_10_column` varchar(5) NULL,
        `meta_box_11` varchar(10) NULL,
        `meta_box_11_column` varchar(5) NULL,
        `meta_box_12` varchar(10) NULL,
        `meta_box_12_column` varchar(5) NULL,
        `meta_box_13` varchar(10) NULL,
        `meta_box_13_column` varchar(5) NULL,
        `meta_box_14` varchar(10) NULL,
        `meta_box_14_column` varchar(5) NULL,
        `meta_box_15` varchar(10) NULL,
        `meta_box_15_column` varchar(5) NULL,
        `meta_box_16` varchar(10) NULL,
        `meta_box_16_column` varchar(5) NULL,
        `meta_box_17` varchar(10) NULL,
        `meta_box_17_column` varchar(5) NULL,
        `meta_box_18` varchar(10) NULL,
        `meta_box_18_column` varchar(5) NULL,
        `meta_box_19` varchar(10) NULL,
        `meta_box_19_column` varchar(5) NULL,
        `meta_box_20` varchar(10) NULL,
        `meta_box_20_column` varchar(5) NULL,
        `meta_box_21` varchar(10) NULL,
        `meta_box_21_column` varchar(5) NULL,
        `meta_box_22` varchar(10) NULL,
        `meta_box_22_column` varchar(5) NULL,
        `meta_box_23` varchar(10) NULL,
        `meta_box_23_column` varchar(5) NULL,
        `meta_box_24` varchar(10) NULL,
        `meta_box_24_column` varchar(5) NULL,
        `meta_box_25` varchar(10) NULL,
        `meta_box_25_column` varchar(5) NULL,
        `meta_box_26` varchar(10) NULL,
        `meta_box_26_column` varchar(5) NULL,
          `created_at` varchar(200) NULL
        );
        ";
            mysqli_query($conn, $sql);

            $sql = "ALTER TABLE $table_name
       ADD PRIMARY KEY (`id`);";
            mysqli_query($conn, $sql);

            $sql = "ALTER TABLE $table_name
       MODIFY `id` bigint NOT NULL AUTO_INCREMENT;";

            mysqli_query($conn, $sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    register_activation_hook(__FILE__, 'my_custom_plugin_activate');
} catch (Exception $e) {
    echo $e->getMessage();
}


// add menu to admin panel page
function sheet_to_wp_migration_options_page()
{
    $plugin_slug = "sheet_to_wp";
    add_menu_page('Sheet to WP', 'Sheet to WP', 'edit', $plugin_slug, null, 'dashicons-nametag', '58', );
    add_submenu_page(
        $plugin_slug,
        'Auth Settings',
        'Auth Settings',
        'manage_options',
        'sheet_to_wp_settings',
        'sheet_to_wp_settings'
    );


    add_submenu_page(
        $plugin_slug,
        'Migration',
        'Migration',
        'manage_options',
        'sheet_to_wp_migrate',
        'sheet_to_wp_migrate'
    );

}
add_action('admin_menu', 'sheet_to_wp_migration_options_page');

function sheet_to_wp_settings()
{
    require(plugin_dir_path(__FILE__) . 'settings.php');
}
function sheet_to_wp_migrate()
{
    require(plugin_dir_path(__FILE__) . 'migrate.php');
}

function sheet_settings()
{
    require(plugin_dir_path(__FILE__) . 'sheet_settings.php');
}


define('PLUGIN_LOG_FILE', plugin_dir_path(__FILE__) . 'migration_log.txt');

// include plugin functions 
try {
    include('functions.php');
} catch (Exception $e) {
    echo $e->getMessage();
}


?>