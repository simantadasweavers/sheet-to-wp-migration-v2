<?php

// LOCAL VARIABLES FOR COLUMN ID's
$SHEET_POST_ID_COLUMN = NULL;
$SHEET_POST_TITLE_COLUMN = NULL;
$SHEET_POST_CONTENT_COLUMN = NULL;
$SHEET_POST_CATEGORY_COLUMN = NULL;
$SHEET_POST_TAGS_COLUMN = NULL;
$SHEET_POST_META_BOX_1_COLUMN = NULL;
$SHEET_POST_META_BOX_2_COLUMN = NULL;
$SHEET_POST_META_BOX_3_COLUMN = NULL;
$SHEET_POST_META_BOX_4_COLUMN = NULL;
$SHEET_POST_META_BOX_5_COLUMN = NULL;
$SHEET_POST_META_BOX_6_COLUMN = NULL;
$SHEET_POST_META_BOX_7_COLUMN = NULL;
$SHEET_POST_META_BOX_8_COLUMN = NULL;
$SHEET_POST_META_BOX_9_COLUMN = NULL;
$SHEET_POST_META_BOX_10_COLUMN = NULL;
$SHEET_POST_META_BOX_11_COLUMN = NULL;
$SHEET_POST_META_BOX_12_COLUMN = NULL;
$SHEET_POST_META_BOX_13_COLUMN = NULL;
$SHEET_POST_META_BOX_14_COLUMN = NULL;
$SHEET_POST_META_BOX_15_COLUMN = NULL;
$SHEET_POST_META_BOX_16_COLUMN = NULL;
$SHEET_POST_META_BOX_17_COLUMN = NULL;
$SHEET_POST_META_BOX_18_COLUMN = NULL;
$SHEET_POST_META_BOX_19_COLUMN = NULL;
$SHEET_POST_META_BOX_20_COLUMN = NULL;
$SHEET_POST_META_BOX_21_COLUMN = NULL;
$SHEET_POST_META_BOX_22_COLUMN = NULL;
$SHEET_POST_META_BOX_23_COLUMN = NULL;
$SHEET_POST_META_BOX_24_COLUMN = NULL;
$SHEET_POST_META_BOX_25_COLUMN = NULL;
$SHEET_POST_META_BOX_26_COLUMN = NULL;



add_action('wp_ajax_save_settings', 'save_settings');
function save_settings()
{
    date_default_timezone_set("Asia/Calcutta");

    global $wpdb;

    // Prepare data from the POST request
    $google_sheet_url = sanitize_text_field($_POST['sheet_url']);
    $account_type = sanitize_text_field($_POST['account_type']);
    $project_id = sanitize_text_field($_POST['project_id']);
    $private_key_id = $_POST['private_key_id'];
    $private_key = $_POST['private_key']; // Use wp_slash for multi-line text
    $client_email = sanitize_email($_POST['client_email']);
    $client_id = sanitize_text_field($_POST['client_id']);
    $auth_uri = esc_url_raw($_POST['auth_uri']);
    $token_uri = esc_url_raw($_POST['token_uri']);
    $auth_provider_x509_cert_url = esc_url_raw($_POST['auth_provider_x509_cert_url']);
    $client_x509_cert_url = esc_url_raw($_POST['client_x509_cert_url']);
    $universe_domain = sanitize_text_field($_POST['universe_domain']);
    $cron_time = sanitize_text_field($_POST['cron_time']);
    $post_id_column = sanitize_text_field($_POST['post_id_column']);
    $post_title_column = sanitize_text_field($_POST['post_title_column']);
    $post_content_column = sanitize_text_field($_POST['post_content_column']);
    $post_type = sanitize_text_field($_POST['post_type']);
    $post_category = sanitize_text_field($_POST['category']);
    $post_category_column = sanitize_text_field($_POST['post_category_column']);
    $post_tag_name = sanitize_text_field($_POST['tag_name']);
    $post_tags_column = sanitize_text_field($_POST['post_tags_column']);

    try {
        $field1 = sanitize_text_field($_POST['field1']);
        $field2 = sanitize_text_field($_POST['field2']);
        $field3 = sanitize_text_field($_POST['field3']);
        $field4 = sanitize_text_field($_POST['field4']);
        $field5 = sanitize_text_field($_POST['field5']);
        $field6 = sanitize_text_field($_POST['field6']);
        $field7 = sanitize_text_field($_POST['field7']);
        $field8 = sanitize_text_field($_POST['field8']);
        $field9 = sanitize_text_field($_POST['field9']);
        $field10 = sanitize_text_field($_POST['field10']);
        $field11 = sanitize_text_field($_POST['field11']);
        $field12 = sanitize_text_field($_POST['field12']);
        $field13 = sanitize_text_field($_POST['field13']);
        $field14 = sanitize_text_field($_POST['field14']);
        $field15 = sanitize_text_field($_POST['field15']);
        $field16 = sanitize_text_field($_POST['field16']);
        $field17 = sanitize_text_field($_POST['field17']);
        $field18 = sanitize_text_field($_POST['field18']);
        $field19 = sanitize_text_field($_POST['field19']);
        $field20 = sanitize_text_field($_POST['field20']);
        $field21 = sanitize_text_field($_POST['field21']);
        $field22 = sanitize_text_field($_POST['field22']);
        $field23 = sanitize_text_field($_POST['field23']);
        $field24 = sanitize_text_field($_POST['field24']);
        $field25 = sanitize_text_field($_POST['field25']);
        $field26 = sanitize_text_field($_POST['field26']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    try {
        $column1 = sanitize_text_field($_POST['column1']);
        $column2 = sanitize_text_field($_POST['column2']);
        $column3 = sanitize_text_field($_POST['column3']);
        $column4 = sanitize_text_field($_POST['column4']);
        $column5 = sanitize_text_field($_POST['column5']);
        $column6 = sanitize_text_field($_POST['column6']);
        $column7 = sanitize_text_field($_POST['column7']);
        $column8 = sanitize_text_field($_POST['column8']);
        $column9 = sanitize_text_field($_POST['column9']);
        $column10 = sanitize_text_field($_POST['column10']);
        $column11 = sanitize_text_field($_POST['column11']);
        $column12 = sanitize_text_field($_POST['column12']);
        $column13 = sanitize_text_field($_POST['column13']);
        $column14 = sanitize_text_field($_POST['column14']);
        $column15 = sanitize_text_field($_POST['column15']);
        $column16 = sanitize_text_field($_POST['column16']);
        $column17 = sanitize_text_field($_POST['column17']);
        $column18 = sanitize_text_field($_POST['column18']);
        $column19 = sanitize_text_field($_POST['column19']);
        $column20 = sanitize_text_field($_POST['column20']);
        $column21 = sanitize_text_field($_POST['column21']);
        $column22 = sanitize_text_field($_POST['column22']);
        $column23 = sanitize_text_field($_POST['column23']);
        $column24 = sanitize_text_field($_POST['column24']);
        $column25 = sanitize_text_field($_POST['column25']);
        $column26 = sanitize_text_field($_POST['column26']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    // echo $column1."  ".$field1;

    /**** checking google sheet connection ****/
    try {
        require __DIR__ . '/vendor/autoload.php';
        // Set Google Client using database values
        $client = new \Google_Client();
        $client->setApplicationName('My PHP App');
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAccessType('offline');

        $client->setAuthConfig([
            "type" => $account_type,
            "project_id" => $project_id,
            "private_key_id" => $private_key_id,
            "private_key" => $private_key,
            "client_email" => $client_email,
            "client_id" => $client_id,
            "auth_uri" => $auth_uri,
            "token_uri" => $token_uri,
            "auth_provider_x509_cert_url" => $auth_provider_x509_cert_url,
            "client_x509_cert_url" => $client_x509_cert_url,
            "universe_domain" => $universe_domain,
        ]);


        $sheets = new \Google_Service_Sheets($client);

        // Fetch all posts from the sheet
        $data = [];
        $currentRow = 2;

        $spreadsheetId = $google_sheet_url;
        $range = 'A2:H';
        $rows = $sheets->spreadsheets_values->get($spreadsheetId, $range, ['majorDimension' => 'ROWS']);
    } catch (Exception $e) {
        wp_send_json_error();
        wp_die();
    }

    // Prepare the data for insertion
    $data = array(
        'google_sheet_url' => $google_sheet_url,
        'account_type' => $account_type,
        'project_id' => $project_id,
        'private_key_id' => $private_key_id,
        'private_key' => $private_key,
        'client_email' => $client_email,
        'client_id' => $client_id,
        'auth_uri' => $auth_uri,
        'token_uri' => $token_uri,
        'auth_provider_x509_cert_url' => $auth_provider_x509_cert_url,
        'client_x509_cert_url' => $client_x509_cert_url,
        'universe_domain' => $universe_domain,
        'cron_job_time' => $cron_time,
        'post_id_column' => $post_id_column,
        'post_title_column' => $post_title_column,
        'post_content_column' => $post_content_column,
        'post_type' => $post_type,
        'post_category' => $post_category,
        'post_category_column' => $post_category_column,
        'post_tag' => $post_tag_name,
        'post_tag_column' => $post_tags_column,
        "meta_box_1" => $field1,
        "meta_box_2" => $field2,
        "meta_box_3" => $field3,
        "meta_box_4" => $field4,
        "meta_box_5" => $field5,
        "meta_box_6" => $field6,
        "meta_box_7" => $field7,
        "meta_box_8" => $field8,
        "meta_box_9" => $field9,
        "meta_box_10" => $field10,
        "meta_box_11" => $field11,
        "meta_box_12" => $field12,
        "meta_box_13" => $field13,
        "meta_box_14" => $field14,
        "meta_box_15" => $field15,
        "meta_box_16" => $field16,
        "meta_box_17" => $field17,
        "meta_box_18" => $field18,
        "meta_box_19" => $field19,
        "meta_box_20" => $field20,
        "meta_box_21" => $field21,
        "meta_box_22" => $field22,
        "meta_box_23" => $field23,
        "meta_box_24" => $field24,
        "meta_box_25" => $field25,
        "meta_box_26" => $field26,
        "meta_box_1_column" => $column1,
        "meta_box_2_column" => $column2,
        "meta_box_3_column" => $column3,
        "meta_box_4_column" => $column4,
        "meta_box_5_column" => $column5,
        "meta_box_6_column" => $column6,
        "meta_box_7_column" => $column7,
        "meta_box_8_column" => $column8,
        "meta_box_9_column" => $column9,
        "meta_box_10_column" => $column10,
        "meta_box_11_column" => $column11,
        "meta_box_12_column" => $column12,
        "meta_box_13_column" => $column13,
        "meta_box_14_column" => $column14,
        "meta_box_15_column" => $column15,
        "meta_box_16_column" => $column16,
        "meta_box_17_column" => $column17,
        "meta_box_18_column" => $column18,
        "meta_box_19_column" => $column19,
        "meta_box_20_column" => $column20,
        "meta_box_21_column" => $column21,
        "meta_box_22_column" => $column22,
        "meta_box_23_column" => $column23,
        "meta_box_24_column" => $column24,
        "meta_box_25_column" => $column25,
        "meta_box_26_column" => $column26,
        'created_at' => date('d-m-Y H:i:s')
    );

    // Insert data into the database
    $table_name = $wpdb->prefix . 'sheet_to_wp_post';
    $result = $wpdb->insert($table_name, $data);

    // Check if the insertion was successful
    if ($result !== false) {
        wp_send_json_success('Data saved successfully.');
    } else {
        wp_send_json_error('Failed to save data.');
    }

    wp_die(); // Terminate and return a proper response
}


/************************************************/
// Add custom cron schedule interval
try {
    global $wpdb;
    $table = $wpdb->prefix . 'sheet_to_wp_post';

    // Execute the query directly without prepare
    $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
    $row = $wpdb->get_row($query);

    if (!empty($row->cron_job_time)) {
        function addCronIntervals($schedules)
        {
            try {
                global $wpdb;
                $table = $wpdb->prefix . 'sheet_to_wp_post';

                // Execute the query directly without prepare
                $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
                $row = $wpdb->get_row($query);

                $time = ($row->cron_job_time) * 60;
                $schedules['custom_cron_job_timing'] = array(
                    'interval' => $time,
                    'display' => __("Every $time Seconds"),
                );
                return $schedules;
            } catch (Exception $e) {
                wp_send_json_error();
                wp_die();
            }
        }
        add_filter('cron_schedules', 'addCronIntervals');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

// Handle AJAX request for migration
add_action('wp_ajax_posts_migration', 'posts_migration');
function handle_posts_migration()
{
    try {
        global $wpdb;
        $table = $wpdb->prefix . 'sheet_to_wp_post';

        // Execute the query directly without prepare
        $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
        $row = $wpdb->get_row($query);
        if (!empty($row)) {

            if (isset($_POST['schedule_migration'])) {
                // Check if the cron job is already scheduled
                if (!wp_next_scheduled('custom_posts_migration')) {
                    wp_schedule_event(time(), 'custom_cron_job_timing', 'custom_posts_migration'); // Correct action name
                    wp_send_json_success("Cron job scheduled.");
                } else {
                    wp_send_json_error("Cron job already scheduled.");
                }
            } else {
                wp_send_json_error("Migration cron job not scheduled.");
            }
        } else {
            wp_send_json_error("Please update your settings!");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    wp_die(); // Properly end AJAX request
}



// Hook for custom posts migration
// add_action('custom_posts_migration', 'posts_migration');
function posts_migration()
{

    try {
        global $wpdb;
        $table = $wpdb->prefix . 'sheet_to_wp_post';

        // Execute the query directly without prepare
        $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
        $db_row = $wpdb->get_row($query);
        $post_type = $db_row->post_type;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    if ($db_row) {
        try {

            require __DIR__ . '/vendor/autoload.php';

            // Set Google Client using database values
            $client = new \Google_Client();
            $client->setApplicationName('My PHP App');
            $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
            $client->setAccessType('offline');

            $client->setAuthConfig([
                "type" => $db_row->account_type,
                "project_id" => $db_row->project_id,
                "private_key_id" => $db_row->private_key_id,
                "private_key" => $db_row->private_key,
                "client_email" => $db_row->client_email,
                "client_id" => $db_row->client_id,
                "auth_uri" => $db_row->auth_uri,
                "token_uri" => $db_row->token_uri,
                "auth_provider_x509_cert_url" => $db_row->auth_provider_x509_cert_url,
                "client_x509_cert_url" => $db_row->client_x509_cert_url,
                "universe_domain" => $db_row->universe_domain
            ]);

            $sheets = new \Google_Service_Sheets($client);

            // Fetch all posts from the sheet
            $data = [];
            $currentRow = 2;

            $spreadsheetId = "$db_row->google_sheet_url";
            $range = 'A2:H';
            $rows = $sheets->spreadsheets_values->get($spreadsheetId, $range, ['majorDimension' => 'ROWS']);

            if (isset($rows['values'])) {
                foreach ($rows['values'] as $row) {

                    // Ensure the array key exists before accessing it
                    $data[] = [
                        'col-a' => isset($row[0]) ? $row[0] : '',
                        'col-b' => isset($row[1]) ? $row[1] : '',
                        'col-c' => isset($row[2]) ? $row[2] : '',
                        'col-d' => isset($row[3]) ? $row[3] : '',
                        'col-e' => isset($row[4]) ? $row[4] : '',
                        'col-f' => isset($row[5]) ? $row[5] : '',
                        'col-g' => isset($row[6]) ? $row[6] : '',
                        'col-h' => isset($row[7]) ? $row[7] : '',
                        'col-i' => isset($row[8]) ? $row[8] : '',
                        'col-j' => isset($row[9]) ? $row[9] : '',
                        'col-k' => isset($row[10]) ? $row[10] : '',
                        'col-l' => isset($row[11]) ? $row[11] : '',
                        'col-m' => isset($row[12]) ? $row[12] : '',
                        'col-n' => isset($row[13]) ? $row[13] : '',
                        'col-o' => isset($row[14]) ? $row[14] : '',
                        'col-p' => isset($row[15]) ? $row[15] : '',
                        'col-q' => isset($row[16]) ? $row[16] : '',
                        'col-r' => isset($row[17]) ? $row[17] : '',
                        'col-s' => isset($row[18]) ? $row[18] : '',
                        'col-t' => isset($row[19]) ? $row[19] : '',
                        'col-u' => isset($row[20]) ? $row[20] : '',
                        'col-v' => isset($row[21]) ? $row[21] : '',
                        'col-w' => isset($row[22]) ? $row[22] : '',
                        'col-x' => isset($row[23]) ? $row[23] : '',
                        'col-y' => isset($row[24]) ? $row[24] : '',
                        'col-z' => isset($row[25]) ? $row[25] : '',
                    ];

                    $currentRow++;
                }
            }

            // $string_var = json_encode($data);
            // error_log("array size: {$string_var} ", 3, PLUGIN_LOG_FILE);


            /**  Process each row and insert/update posts */
            
            // assigning letters by the integer, for arranging into db-row
            $int_to_letter = [];
            $int_to_letter = [
                '1' => 'a',
                '2' => 'b',
                '3' => 'c',
                '4' => 'd',
                '5' => 'e',
                '6' => 'f',
                '7' => 'g',
                '8' => 'h',
                '9' => 'i',
                '10' => 'j',
                '11' => 'k',
                '12' => 'l',
                '13' => 'm',
                '14' => 'n',
                '15' => 'o',
                '16' => 'p',
                '17' => 'q',
                '18' => 'r',
                '19' => 's',
                '20' => 't',
                '21' => 'u',
                '22' => 'v',
                '23' => 'w',
                '24' => 'x',
                '25' => 'y',
                '26' => 'z'
            ];
            $currentRow = 2; // Reset currentRow counter for sheet update

            foreach ($data as $data) {

                // if POST TITLE present 
                if (!empty($data["col-{$int_to_letter[$db_row->post_title_column]}"])) {

                    // POST ID 
                    if ($data["col-{$int_to_letter[$db_row->post_id_column]}"]) {

                        if ($db_row->post_category) {
                            // Managing categories (custom taxonomy or default)
                            $parts = explode(",", $data["col-{$int_to_letter[$db_row->post_category_column]}"] );
                            $arr = array();

                            foreach ($parts as $cat) {
                                // Use get_term_by() for any taxonomy, including custom ones
                                $existing_term = get_term_by('name', $cat, trim($db_row->post_category));

                                if ($existing_term) {
                                    array_push($arr, $existing_term->term_id);
                                } else {
                                    // Insert the term into the custom taxonomy (or default category if used)
                                    $category = wp_insert_term(
                                        $cat,  // The term name
                                        trim($db_row->post_category) // The taxonomy name
                                    );

                                    // Check for errors and get the term ID
                                    if (!is_wp_error($category)) {
                                        $catid = $category['term_id'];
                                        array_push($arr, $catid);
                                    }
                                }
                            }
                        }

                        // updating the post title, content by ID
                        try {
                            // updaing post fields by post id
                            $post_array = array(
                                'ID' => $data["col-{$int_to_letter[$db_row->post_id_column]}"],
                                'post_title' => $data["col-{$int_to_letter[$db_row->post_title_column]}"],
                                'post_content' => $data["col-{$int_to_letter[$db_row->post_content_column]}"],
                            );
                            wp_update_post($post_array);
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }

                        try {
                            $post_category = trim($db_row->post_category);
                            wp_set_post_terms($data['col-e'], $arr, trim($post_category));
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }


                        if ($db_row->post_tag) {
                            // Managing tags (can be default 'post_tag' or a custom taxonomy)
                            $parts = explode(",", $data['col-d']);
                            $tags_arr = array();

                            foreach ($parts as $tag) {
                                // Trim the tag and get the taxonomy
                                $taxonomy = trim($db_row->post_tag);
                                $tag_name = trim($tag);

                                // Check if the term exists in the specified taxonomy
                                $existing_tag = get_term_by('name', $tag_name, $taxonomy);

                                if ($existing_tag) {
                                    // If the term exists, add its ID to the array
                                    array_push($tags_arr, $existing_tag->term_id);
                                } else {
                                    // If it doesn't exist, insert it into the taxonomy
                                    $new_tag = wp_insert_term(
                                        $tag_name,  // The tag name
                                        $taxonomy  // The taxonomy name (can be custom)
                                    );

                                    // Check for errors and get the tag ID
                                    if (!is_wp_error($new_tag)) {
                                        $tag_id = $new_tag['term_id'];
                                        array_push($tags_arr, $tag_id);
                                    }
                                }
                            }

                            try {
                                wp_set_post_terms($data['col-e'], $tags_arr, trim($db_row->post_tag));
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }

                        // updating meta box 1
                        if ($db_row->meta_box_1) {
                            try {
                                update_post_meta($data['col-e'], trim($db_row->meta_box_1), $data['col-f']);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }

                        // updating meta box 2
                        if ($db_row->meta_box_2) {
                            try {
                                update_post_meta($data['col-e'], trim($db_row->meta_box_2), $data['col-g']);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }

                        // updating meta box 3
                        if ($db_row->meta_box_3) {
                            try {
                                update_post_meta($data['col-e'], trim($db_row->meta_box_3), $data['col-h']);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }

                        // updating meta box 4
                        if ($db_row->meta_box_4) {
                            try {
                                update_post_meta($data['col-e'], trim($db_row->meta_box_4), $data['col-i']);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }

                        // updating meta box 5
                        if ($db_row->meta_box_5) {
                            try {
                                update_post_meta($data['col-e'], trim($db_row->meta_box_5), $data['col-j']);
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                        }
                    } else {
                        /** IF POST ID NOT FOUND, THEN CREATE INSERT POSTID INTO SHEET AND CREATE NEW POST. **/

                        // POST CATEGORY
                        if ($db_row->post_category) {
                            // Managing categories (custom taxonomy or default)
                            $parts = explode(",", $data['col-c']);
                            $arr = array();

                            foreach ($parts as $cat) {
                                // Use get_term_by() for any taxonomy, including custom ones
                                $existing_term = get_term_by('name', $cat, trim($db_row->post_category));

                                if ($existing_term) {
                                    array_push($arr, $existing_term->term_id);
                                } else {
                                    // Insert the term into the custom taxonomy (or default category if used)
                                    $category = wp_insert_term(
                                        $cat,  // The term name
                                        trim($db_row->post_category) // The taxonomy name
                                    );

                                    // Check for errors and get the term ID
                                    if (!is_wp_error($category)) {
                                        $catid = $category['term_id'];
                                        array_push($arr, $catid);
                                    }
                                }
                            }
                        }


                        try {
                            if ($arr == NULL) {
                                $new_post = array(
                                    'post_title' => $data['col-a'],
                                    'post_content' => $data['col-b'],
                                    'post_status' => 'publish',
                                    'post_type' => $post_type,
                                );

                                $post_id = wp_insert_post($new_post);
                            } else {
                                // $post_category = trim($db_row->post_category);
                                $new_post = array(
                                    'post_title' => $data['col-a'],
                                    'post_content' => $data['col-b'],
                                    'post_status' => 'publish',
                                    'post_type' => $post_type,
                                );

                                $post_id = wp_insert_post($new_post);

                                try {
                                    wp_set_post_terms($post_id, $arr, trim($db_row->post_category));
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                            }
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }


                        // POST TAGS
                        if ($db_row->post_tag) {
                            // Managing tags (can be default 'post_tag' or a custom taxonomy)
                            $parts = explode(",", $data['col-d']);
                            $arr = array();

                            foreach ($parts as $tag) {
                                // Trim the tag and get the taxonomy
                                $taxonomy = trim($db_row->post_tag);
                                $tag_name = trim($tag);

                                // Check if the term exists in the specified taxonomy
                                $existing_tag = get_term_by('name', $tag_name, $taxonomy);

                                if ($existing_tag) {
                                    // If the term exists, add its ID to the array
                                    array_push($arr, $existing_tag->term_id);
                                } else {
                                    // If it doesn't exist, insert it into the taxonomy
                                    $new_tag = wp_insert_term(
                                        $tag_name,  // The tag name
                                        $taxonomy  // The taxonomy name (can be custom)
                                    );

                                    // Check for errors and get the tag ID
                                    if (!is_wp_error($new_tag)) {
                                        $tag_id = $new_tag['term_id'];
                                        array_push($arr, $tag_id);
                                    }
                                }
                            }
                        }



                        if ($arr != NULL) {
                            wp_set_post_terms($post_id, $arr, trim($db_row->post_tag));
                        }
                        // end managing of tags for post type

                        try {
                            // Update Google Sheet column E with the post ID only if it is empty
                            $updateRange = 'E' . $currentRow;
                            $updateBody = new \Google_Service_Sheets_ValueRange([
                                'range' => $updateRange,
                                'majorDimension' => 'ROWS',
                                'values' => [[$post_id]], // This is where you insert the post ID
                            ]);

                            // Update the sheet only if col-e (post ID) is empty
                            $sheets->spreadsheets_values->update(
                                $spreadsheetId,
                                $updateRange,
                                $updateBody,
                                ['valueInputOption' => 'USER_ENTERED']
                            );
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    }
                } else {
                    $post_id = 0;

                    try {
                        // Update Google Sheet column E with the post ID only if it is empty
                        $updateRange = 'E' . $currentRow;
                        $updateBody = new \Google_Service_Sheets_ValueRange([
                            'range' => $updateRange,
                            'majorDimension' => 'ROWS',
                            'values' => [[$post_id]], // This is where you insert the post ID
                        ]);

                        // Update the sheet only if col-e (post ID) is empty
                        $sheets->spreadsheets_values->update(
                            $spreadsheetId,
                            $updateRange,
                            $updateBody,
                            ['valueInputOption' => 'USER_ENTERED']
                        );
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }
                $currentRow++;
            }




        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    wp_die();
}



add_action('wp_ajax_fetch_taxonomoes', 'fetch_taxonomoes');
function fetch_taxonomoes()
{
    $post_type = sanitize_text_field($_POST['post_type']);

    $return_arr = array();
    $arr = get_object_taxonomies($post_type);
    foreach ($arr as $arr) {
        $taxonomy = get_taxonomy($arr);
        array_push($return_arr, array('label' => $taxonomy->label, 'name' => $taxonomy->name));
    }

    wp_send_json_success($return_arr);
    wp_die();
}


add_action('wp_ajax_fetch_acf_fields', 'fetch_acf_fields');
function fetch_acf_fields()
{
    // Ensure the post_type is provided
    if (!isset($_POST['post_type'])) {
        wp_send_json_error('Post type not specified.');
        wp_die();
    }

    $post_type = sanitize_text_field($_POST['post_type']);
    $return_arr = array();

    // Retrieve ACF field groups for the selected post type
    $field_groups = acf_get_field_groups(array('post_type' => $post_type));
    if ($field_groups) {
        foreach ($field_groups as $field_group) {
            $fields = acf_get_fields($field_group['ID']);
            if ($fields) {
                foreach ($fields as $field) {
                    $return_arr[] = array(
                        'label' => $field['label'],
                        'name' => $field['name']
                    );
                }
            }
        }
    }

    if (empty($return_arr)) {
        wp_send_json_error("No fields found for this post type.");
    } else {
        wp_send_json_success($return_arr);
    }
    wp_die();
}
