<?php

error_reporting(0);

// Get all custom post types
$args = array(
  'public' => true,
  '_builtin' => false,  // Exclude built-in post types (like page)
);

$custom_post_types = get_post_types($args, 'names');
// Add the 'post' type to the array
$post_types = array_merge(array('post'), $custom_post_types);

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

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Migration ~ Settings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
</head>
<style>
  .status {
    display: inline;
    margin-right: 5px;
  }
</style>

<body>

  <br>
  <br>


  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <form id="myForm">
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Google Sheet URL</label>
          <input type="text" class="form-control" name="sheet_url" id="sheet_url" required>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">JSON Auth File</label>
          <input class="form-control" type="file" name="formFile" id="formFile" accept="application/json" required>
        </div>
        <div class="mb-3">
          <label for="cron-time" class="form-label">CRON Job Time</label>
          <select class="form-select" id="cron-time" aria-label="Default select example">
            <option value="2" selected>2 Mintes</option>
            <option value="5" selected>5 Mintes</option>
            <option value="7">7 Mintes</option>
            <option value="10">10 Mintes</option>
            <option value="15">15 Mintes</option>
            <option value="30">30 Mintes(Recomended)</option>
            <option value="60">1 Hour.</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="post-id-column" class="form-label">Sheet Post ID Column</label>
          <select class="form-select" id="post-id-column" required>
            <?php
            $i = 1;
            $prefix = NULL;
            while ($i <= 26) {
              switch ($i) {
                case 1:
                  $prefix = "st";
                  break;
                case 2:
                  $prefix = "nd";
                  break;
                case 3:
                  $prefix = "rd";
                  break;
                default:
                  $prefix = "th";
                  break;
              }
              ?>
              <option value="<?php echo $i; ?>">
                <?php echo $i . "$prefix column (" . strtoupper($int_to_letter[$i]) . ")"; ?>
              </option>
              <?php $i++;
            } ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="post-id-column" class="form-label">Sheet Post Title Column</label>
          <select class="form-select" id="post-title-column" required>
            <?php
            $i = 1;
            $prefix = NULL;
            while ($i <= 26) {
              switch ($i) {
                case 1:
                  $prefix = "st";
                  break;
                case 2:
                  $prefix = "nd";
                  break;
                case 3:
                  $prefix = "rd";
                  break;
                default:
                  $prefix = "th";
                  break;
              }
              ?>
              <option value="<?php echo $i; ?>">
                <?php echo $i . "$prefix column (" . strtoupper($int_to_letter[$i]) . ")"; ?>
              </option>
              <?php $i++;
            } ?>
          </select>
        </div>


        <div class="mb-3">
          <label for="post-id-column" class="form-label">Sheet Post Content Column</label>
          <select class="form-select" id="post-content-column" required>
            <?php
            $i = 1;
            $prefix = NULL;
            while ($i <= 26) {
              switch ($i) {
                case 1:
                  $prefix = "st";
                  break;
                case 2:
                  $prefix = "nd";
                  break;
                case 3:
                  $prefix = "rd";
                  break;
                default:
                  $prefix = "th";
                  break;
              }
              ?>
              <option value="<?php echo $i; ?>">
                <?php echo $i . "$prefix column (" . strtoupper($int_to_letter[$i]) . ")"; ?>
              </option>
              <?php $i++;
            } ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="post-type" class="form-label">Post Type</label>
          <select class="form-select" id="post-type" aria-label="Default select example">
            <?php
            foreach ($post_types as $post_type) {
              ?>
              <option value="<?php echo $post_type; ?>"><?php echo $post_type; ?></option>
            <?php } ?>
          </select>
        </div>

        <br>

        <div class="row">
          <div class="col-6">
            <label for="cateory-name" class="form-label">Category</label>
            <select class="form-select" id="cateory-name">
              <option>Select Category</option>
            </select>
          </div>
          <div class="col-6">
            <label for="post-category-column" class="form-label">Sheet Post Category Column</label>
            <select class="form-select" id="post-category-column" aria-label="select google sheet post category column"
              required>
              <option>None</option>
              <?php
              $i = 1;
              $prefix = NULL;
              while ($i <= 26) {
                switch ($i) {
                  case 1:
                    $prefix = "st";
                    break;
                  case 2:
                    $prefix = "nd";
                    break;
                  case 3:
                    $prefix = "rd";
                    break;
                  default:
                    $prefix = "th";
                    break;
                }
                ?>
                <option value="<?php echo $i; ?>">
                  <?php echo $i . "$prefix column (" . strtoupper($int_to_letter[$i]) . ")"; ?>
                </option>
                <?php $i++;
              } ?>
            </select>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col-6">
            <label for="tag-name" class="form-label">Tags</label>
            <select class="form-select" id="tag-name" aria-label="Default select example">
              <option>Select Tags</option>
            </select>
          </div>
          <div class="col-6">
            <label for="post-tags-column" class="form-label">Sheet Post Tags Column</label>
            <select class="form-select" id="post-tags-column" aria-label="select google sheet post tags column"
              required>
              <option>None</option>
              <?php
              $i = 1;
              $prefix = NULL;
              while ($i <= 26) {
                switch ($i) {
                  case 1:
                    $prefix = "st";
                    break;
                  case 2:
                    $prefix = "nd";
                    break;
                  case 3:
                    $prefix = "rd";
                    break;
                  default:
                    $prefix = "th";
                    break;
                }
                ?>
                <option value="<?php echo $i; ?>"><?php echo $i . "$prefix column"; ?></option>
                <?php $i++;
              } ?>
            </select>
          </div>
        </div>

        <br>

        <div id="section-container">
        </div>

        <!-- Button to add new section -->
        <button type="button" id="add-section-btn">Add Custom Field</button>

        <script>
          let fieldCount = 0;
          let maxFields = 26;
          const intToLetter = {
            1: 'A', 2: 'B', 3: 'C', 4: 'D', 5: 'E', 6: 'F', 7: 'G', 8: 'H', 9: 'I', 10: 'J',
            11: 'K', 12: 'L', 13: 'M', 14: 'N', 15: 'O', 16: 'P', 17: 'Q', 18: 'R', 19: 'S', 20: 'T',
            21: 'U', 22: 'V', 23: 'W', 24: 'X', 25: 'Y', 26: 'Z'
          };

          document.getElementById('add-section-btn').addEventListener('click', function () {
          if (fieldCount >= maxFields) {
              alert("Maximum of 26 custom fields reached.");
              return;
            }

            let postType = document.getElementById('post-type').value;
            const ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            let formData2 = new FormData();
            formData2.append('action', 'fetch_acf_fields');
            formData2.append('post_type', postType);

            jQuery.ajax({
              type: "POST",
              url: ajaxurl,
              data: formData2,
              processData: false,
              contentType: false,
              success: function (response) {
                if (response.data && response.success) {
                  fieldCount++;

                  const newRow = document.createElement('div');
                  newRow.classList.add('row', 'mb-3');

                  // Left column for the custom field
                  const customFieldCol = document.createElement('div');
                  customFieldCol.classList.add('col-6');

                  const newLabel = document.createElement('label');
                  newLabel.classList.add('form-label');
                  newLabel.setAttribute('for', `custom-field-${fieldCount}`);
                  newLabel.textContent = `Custom Field ${fieldCount}`;

                  const newSelect = document.createElement('select');
                  newSelect.classList.add('form-select');
                  newSelect.setAttribute('id', `custom-field-${fieldCount}`);
                  newSelect.setAttribute('aria-label', 'Custom Field Options');

                  const placeholderOption = document.createElement('option');
                  placeholderOption.textContent = 'Select Field';
                  placeholderOption.value = '';
                  newSelect.appendChild(placeholderOption);

                  response.data.forEach(function (field) {
                    const option = document.createElement('option');
                    option.value = field.name;
                    option.textContent = field.label;
                    newSelect.appendChild(option);
                  });

                  customFieldCol.appendChild(newLabel);
                  customFieldCol.appendChild(newSelect);

                  // Right column for the "Sheet Post Category Column"
                  const categoryCol = document.createElement('div');
                  categoryCol.classList.add('col-6');

                  const categoryLabel = document.createElement('label');
                  let prefix = null;
                  switch (fieldCount) {
                    case 1:
                      prefix = "st";
                      break;
                    case 2:
                      prefix = "nd";
                      break;
                    case 3:
                      prefix = "rd";
                      break;
                    default:
                      prefix = "th";
                      break;
                  }
                  categoryLabel.classList.add('form-label');
                  categoryLabel.setAttribute('for', `custom-field-column-${fieldCount}`);
                  categoryLabel.textContent = `Sheet ${fieldCount}${prefix} Custom Field Column`;

                  const categorySelect = document.createElement('select');
                  categorySelect.classList.add('form-select');
                  categorySelect.setAttribute('id', `custom-field-column-${fieldCount}`);
                  categorySelect.setAttribute('aria-label', 'Select Google Sheet Custom Field Column');
                  categorySelect.required = true;

                  for (let i = 1; i <= 26; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    const prefix = i === 1 ? 'st' : i === 2 ? 'nd' : i === 3 ? 'rd' : 'th';
                    option.textContent = `${i}${prefix} column (${intToLetter[i]})`;
                    categorySelect.appendChild(option);
                  }

                  categoryCol.appendChild(categoryLabel);
                  categoryCol.appendChild(categorySelect);

                  // Append columns to the new row, then append row to the section container
                  newRow.appendChild(customFieldCol);
                  newRow.appendChild(categoryCol);
                  document.getElementById('section-container').appendChild(newRow);
                } else {
                  alert("No fields found for the selected post type.");
                }
              },
              error: function (response) {
                console.error("Error fetching meta fields:", response);
              }
            });
          });
        </script>


        <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
      </form>

      <br>
      <p class="status d-inline">Status:</p>
      <?php if ($_SESSION['auth_token_status'] == "connected") { ?>
        <span class="badge text-bg-success d-inline">Connected</span>
      <?php } else { ?>
        <span class="badge text-bg-warning d-inline">Not Connected</span>
      <?php } ?>

    </div>
    <div class="col-2"></div>
  </div>


  <br>
  <br>

  <div class="row">
    <div class="col-1"></div>
    <div class="col-10" style="border: 2px solid green;">
      <h3>Step 1: Paste Your Full Google Sheet Complete URL</h3>
      <br>

      <h3>Step 2: How to Download Google JSON Credentials</h3>
      <?php
      //echo '<h2>How to Download Google JSON Credentials</h2>';
      echo '<ol>';
      echo '<li>Go to the <a href="https://console.developers.google.com/" target="_blank">Google Cloud Console</a>.</li>';
      echo '<li>Create a new project or select an existing project.</li>';
      echo '<li>In the left sidebar, navigate to <strong>APIs & Services > Credentials</strong>.</li>';
      echo '<li>Click on <strong>+ CREATE CREDENTIALS</strong> at the top and select <strong>Service account</strong>.</li>';
      echo '<li>Fill in the details for your service account and click <strong>CREATE</strong>.</li>';
      echo '<li>On the next screen, select the role (e.g., <strong>Editor</strong> or <strong>Owner</strong>) and click <strong>CONTINUE</strong>.</li>';
      echo '<li>After creating the service account, click on the service account you just created.</li>';
      echo '<li>Under the <strong>Keys</strong> section, click on <strong>ADD KEY</strong> and choose <strong>Create new key</strong>.</li>';
      echo '<li>Select the <strong>JSON</strong> option and click <strong>CREATE</strong>.</li>';
      echo '<li>A JSON file will be downloaded to your computer. This file contains your credentials.</li>';
      echo '<li>Upload the downloaded JSON file above to use it with this plugin.</li>';
      echo '</ol>';
      ?>
      <br>
      <br>

      <h3>Step 3: Make sure your Google Sheet Maintain These column ordering ... (Note: Leave the first row of the
        sheet) </h3>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">POST TITLE</th>
            <th scope="col">POST CONTENT</th>
            <th scope="col">CATEGORIES</th>
            <th scope="col">TAGS</th>
            <th scope="col">POST ID(<font style='color: red;'>Should be Null</font>)</th>
            <th scope="col">META BOX 1</th>
            <th scope="col">META BOX 2</th>
            <th scope="col">META BOX 3</th>
            <th scope="col">META BOX 4</th>
            <th scope="col">META BOX 5</th>
          </tr>
        </thead>
      </table>

      <img src="<?php echo plugin_dir_url(__FILE__); ?>/google-sheet-sample.png" class="img-fluid" alt="...">

      <br>
      <br>

      <h3>Step 4: Make sure your Google Sheet Post ID Should be Null before migration!</h3>

      <br>

      <h3>Step 5: Enable Google Sheet API in Projet. <br /> Go to: Api & Services > Enable Api Services > Search Google
        Sheet Api. Now enable it. </h3>

    </div>
    <div class="col-2"></div>
  </div>



  <script>
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    function extractSheetId(url) {
      const regex = /\/d\/([a-zA-Z0-9-_]+)/;
      const match = url.match(regex);
      return match ? match[1] : null;
    }


    function checkFields() {
      // Clear all previous error messages
      jQuery('.error-message').remove();

      let isValid = true;

      // Check Google Sheet URL
      const sheetUrl = jQuery('#sheet_url').val();
      if (sheetUrl === '') {
        isValid = false;
        jQuery('#sheet_url').after('<span class="error-message" style="color:red;">Google Sheet URL is required.</span>');
      }

      // Check JSON Auth File
      const jsonFile = jQuery('#formFile').val();
      if (jsonFile === '') {
        isValid = false;
        jQuery('#formFile').after('<span class="error-message" style="color:red;">JSON Auth File is required.</span>');
      }

      // Check CRON Job Time
      const cronTime = jQuery('#cron-time').val();
      if (cronTime === '') {
        isValid = false;
        jQuery('#cron-time').after('<span class="error-message" style="color:red;">Please select a CRON Job Time.</span>');
      }

      // Check Post Type
      const postType = jQuery('#post-type').val();
      if (postType === null || postType === '') {
        isValid = false;
        jQuery('#post-type').after('<span class="error-message" style="color:red;">Please select a Post Type.</span>');
      }

      // Check Category
      const categoryName = jQuery('#cateory-name').val();
      if (categoryName === 'Select Category') {
        isValid = false;
        jQuery('#cateory-name').after('<span class="error-message" style="color:red;">Please select a Category.</span>');
      }

      // Check Tags
      const tagName = jQuery('#tag-name').val();
      if (tagName === 'Select Tags') {
        isValid = false;
        jQuery('#tag-name').after('<span class="error-message" style="color:red;">Please select Tags.</span>');
      }

      // If form is valid, submit the form
      if (isValid) {
        jQuery('#myForm').submit(); // Submit the form if all fields are valid
      }
    }


    jQuery(document).ready(function () {

      if (jQuery('#post-type').val()) {
        let name = jQuery('#post-type').val();
        jQuery('#cateory-name').empty();
        jQuery('#tag-name').empty();

        let formData = new FormData();
        formData.append('action', 'fetch_taxonomoes'); // Add action for AJAX
        formData.append('post_type', name); // Add action for AJAX

        jQuery.ajax({
          type: "POST",
          url: ajaxurl,
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            if (response.data) {
              let data = response.data;

              let optionHTML = `
            <option value=""> 
            None 
            </option>`;
              jQuery('#cateory-name').append(optionHTML);
              jQuery('#tag-name').append(optionHTML);

              if (data) {
                data.forEach(function (data) {
                  let optionHTML = `
            <option value="${data.name}"> 
                ${data.label} 
            </option>`;
                  jQuery('#cateory-name').append(optionHTML);
                  jQuery('#tag-name').append(optionHTML);
                });
              }
            }
          },
          error: function (response) {
            console.error(response);
          }
        });

      }

      // fetch defaults category and tags against default post type select.
      jQuery('#post-type').change(function () {
        let name = jQuery(this).val();
        jQuery('#cateory-name').empty();
        jQuery('#tag-name').empty();

        let i = 0;
        while (i <= 26) {
          jQuery(`#custom-field-${i}`).empty();
          i++;
        }


        let formData = new FormData();
        let formData2 = new FormData();
        formData.append('action', 'fetch_taxonomoes'); // Add action for AJAX
        formData.append('post_type', name); // Add action for AJAX
        formData2.append('action', 'fetch_acf_fields'); // Add action for AJAX
        formData2.append('post_type', name); // Add action for AJAX

        jQuery.ajax({
          type: "POST",
          url: ajaxurl,
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            let data = response.data;
            let optionHTML = `
            <option value=""> 
            None 
            </option>`;
            jQuery('#cateory-name').append(optionHTML);
            jQuery('#tag-name').append(optionHTML);

            data.forEach(function (data) {
              let optionHTML = `
            <option value="${data.name}"> 
                ${data.label} 
            </option>`;
              jQuery('#cateory-name').append(optionHTML);
              jQuery('#tag-name').append(optionHTML);
            });
          },
          error: function (response) {
            console.error(response);
          }
        });


        jQuery.ajax({
          type: "POST",
          url: ajaxurl,
          data: formData2,
          processData: false,
          contentType: false,
          success: function (response) {
            let data = response.data;

            let optionHTML = `
            <option>None</option>`;
            i = 0;
            while (i <= 26) {
              jQuery(`#custom-field-${i}`).append(optionHTML);
              i++;
            }

            data.forEach(function (data) {
              i = 0;
              let optionHTML = `
            <option value="${data.name}"> 
                ${data.label} 
            </option>`;
              while (i <= 26) {
                jQuery(`#custom-field-${i}`).append(optionHTML);
                i++;
              }
            });
          },
          error: function (response) {
            console.error(response);
          }
        });
      });




      jQuery('#submit-btn').on('click', function (e) {
        e.preventDefault(); // Prevent default form submission

        console.warn(document.getElementById('custom-field-1').value + "  "+ document.getElementById('custom-field-column-1').value);

        // checkFields();

        // Get the JSON file
        const jsonFile = document.getElementById('formFile').files[0];

        if (jsonFile) {
          const reader = new FileReader();

          // When the file is read, process the JSON data
          reader.onload = function (e) {
            try {
              let jsonData = JSON.parse(e.target.result);
let url = document.getElementById('sheet_url').value;
let cronTime = document.getElementById('cron-time').value;
let post_id_column = document.getElementById('post-id-column').value;
let post_title_column = document.getElementById('post-title-column').value;
let post_content_column = document.getElementById('post-content-column').value;
let postType = document.getElementById('post-type').value;
let category = document.getElementById('cateory-name').value;
let tag_name = document.getElementById('tag-name').value;
let field1 = document.getElementById('custom-field-1') ? document.getElementById('custom-field-1').value : '';
let field2 = document.getElementById('custom-field-2') ? document.getElementById('custom-field-2').value : '';
let field3 = document.getElementById('custom-field-3') ? document.getElementById('custom-field-3').value : '';
let field4 = document.getElementById('custom-field-4') ? document.getElementById('custom-field-4').value : '';
let field5 = document.getElementById('custom-field-5') ? document.getElementById('custom-field-5').value : '';
let field6 = document.getElementById('custom-field-6') ? document.getElementById('custom-field-6').value : '';
let field7 = document.getElementById('custom-field-7') ? document.getElementById('custom-field-7').value : '';
let field8 = document.getElementById('custom-field-8') ? document.getElementById('custom-field-8').value : '';
let field9 = document.getElementById('custom-field-9') ? document.getElementById('custom-field-9').value : '';
let field10 = document.getElementById('custom-field-10') ? document.getElementById('custom-field-10').value : '';
let field11 = document.getElementById('custom-field-11') ? document.getElementById('custom-field-11').value : '';
let field12 = document.getElementById('custom-field-12') ? document.getElementById('custom-field-12').value : '';
let field13 = document.getElementById('custom-field-13') ? document.getElementById('custom-field-13').value : '';
let field14 = document.getElementById('custom-field-14') ? document.getElementById('custom-field-14').value : '';
let field15 = document.getElementById('custom-field-15') ? document.getElementById('custom-field-15').value : '';
let field16 = document.getElementById('custom-field-16') ? document.getElementById('custom-field-16').value : '';
let field17 = document.getElementById('custom-field-17') ? document.getElementById('custom-field-17').value : '';
let field18 = document.getElementById('custom-field-18') ? document.getElementById('custom-field-18').value : '';
let field19 = document.getElementById('custom-field-19') ? document.getElementById('custom-field-19').value : '';
let field20 = document.getElementById('custom-field-20') ? document.getElementById('custom-field-20').value : '';
let field21 = document.getElementById('custom-field-21') ? document.getElementById('custom-field-21').value : '';
let field22 = document.getElementById('custom-field-22') ? document.getElementById('custom-field-22').value : '';
let field23 = document.getElementById('custom-field-23') ? document.getElementById('custom-field-23').value : '';
let field24 = document.getElementById('custom-field-24') ? document.getElementById('custom-field-24').value : '';
let field25 = document.getElementById('custom-field-25') ? document.getElementById('custom-field-25').value : '';
let field26 = document.getElementById('custom-field-26') ? document.getElementById('custom-field-26').value : '';
let column1 = document.getElementById('custom-field-column-1') ? document.getElementById('custom-field-column-1').value : '';
let column2 = document.getElementById('custom-field-column-2') ? document.getElementById('custom-field-column-2').value : '';
let column3 = document.getElementById('custom-field-column-3') ? document.getElementById('custom-field-column-3').value : '';
let column4 = document.getElementById('custom-field-column-4') ? document.getElementById('custom-field-column-4').value : '';
let column5 = document.getElementById('custom-field-column-5') ? document.getElementById('custom-field-column-5').value : '';
let column6 = document.getElementById('custom-field-column-6') ? document.getElementById('custom-field-column-6').value : '';
let column7 = document.getElementById('custom-field-column-7') ? document.getElementById('custom-field-column-7').value : '';
let column8 = document.getElementById('custom-field-column-8') ? document.getElementById('custom-field-column-8').value : '';
let column9 = document.getElementById('custom-field-column-9') ? document.getElementById('custom-field-column-9').value : '';
let column10 = document.getElementById('custom-field-column-10') ? document.getElementById('custom-field-column-10').value : '';
let column11 = document.getElementById('custom-field-column-11') ? document.getElementById('custom-field-column-11').value : '';
let column12 = document.getElementById('custom-field-column-12') ? document.getElementById('custom-field-column-12').value : '';
let column13 = document.getElementById('custom-field-column-13') ? document.getElementById('custom-field-column-13').value : '';
let column14 = document.getElementById('custom-field-column-14') ? document.getElementById('custom-field-column-14').value : '';
let column15 = document.getElementById('custom-field-column-15') ? document.getElementById('custom-field-column-15').value : '';
let column16 = document.getElementById('custom-field-column-16') ? document.getElementById('custom-field-column-16').value : '';
let column17 = document.getElementById('custom-field-column-17') ? document.getElementById('custom-field-column-17').value : '';
let column18 = document.getElementById('custom-field-column-18') ? document.getElementById('custom-field-column-18').value : '';
let column19 = document.getElementById('custom-field-column-19') ? document.getElementById('custom-field-column-19').value : '';
let column20 = document.getElementById('custom-field-column-20') ? document.getElementById('custom-field-column-20').value : '';
let column21 = document.getElementById('custom-field-column-21') ? document.getElementById('custom-field-column-21').value : '';
let column22 = document.getElementById('custom-field-column-22') ? document.getElementById('custom-field-column-22').value : '';
let column23 = document.getElementById('custom-field-column-23') ? document.getElementById('custom-field-column-23').value : '';
let column24 = document.getElementById('custom-field-column-24') ? document.getElementById('custom-field-column-24').value : '';
let column25 = document.getElementById('custom-field-column-25') ? document.getElementById('custom-field-column-25').value : '';
let column26 = document.getElementById('custom-field-column-26') ? document.getElementById('custom-field-column-26').value : '';

             
              // Create FormData object and append data
              let formData = new FormData();
              formData.append('sheet_url', extractSheetId(url));
              formData.append('account_type', jsonData.type);
              formData.append('project_id', jsonData.project_id);
              formData.append('private_key_id', jsonData.private_key_id);
              formData.append('private_key', jsonData.private_key);
              formData.append('client_email', jsonData.client_email);
              formData.append('client_id', jsonData.client_id);
              formData.append('auth_uri', jsonData.auth_uri);
              formData.append('token_uri', jsonData.token_uri);
              formData.append('auth_provider_x509_cert_url', jsonData.auth_provider_x509_cert_url);
              formData.append('client_x509_cert_url', jsonData.client_x509_cert_url);
              formData.append('universe_domain', jsonData.universe_domain);
              formData.append('cron_time', cronTime); // Append CRON job time
              formData.append('post_id_column', post_id_column);
              formData.append('post_title_column', post_title_column);
              formData.append('post_content_column', post_content_column);
              formData.append('post_type', postType);
              formData.append('category', category);
              formData.append('tag_name', tag_name);

              try {
                formData.append('field1', field1);
                formData.append('field2', field2);
                formData.append('field3', field3);
                formData.append('field4', field4);
                formData.append('field5', field5);
                formData.append('field6', field6);
                formData.append('field7', field7);
                formData.append('field8', field8);
                formData.append('field9', field9);
                formData.append('field10', field10);
                formData.append('field11', field11);
                formData.append('field12', field12);
                formData.append('field13', field13);
                formData.append('field14', field14);
                formData.append('field15', field15);
                formData.append('field16', field16);
                formData.append('field17', field17);
                formData.append('field18', field18);
                formData.append('field19', field19);
                formData.append('field20', field20);
                formData.append('field21', field21);
                formData.append('field22', field22);
                formData.append('field23', field23);
                formData.append('field24', field24);
                formData.append('field25', field25);
                formData.append('field26', field26);
              } catch (err) {
                console.error(err);
              }

              try {
                formData.append('column1', column1);
                formData.append('column2', column2);
                formData.append('column3', column3);
                formData.append('column4', column4);
                formData.append('column5', column5);
                formData.append('column6', column6);
                formData.append('column7', column7);
                formData.append('column8', column8);
                formData.append('column9', column9);
                formData.append('column10', column10);
                formData.append('column11', column11);
                formData.append('column12', column12);
                formData.append('column13', column13);
                formData.append('column14', column14);
                formData.append('column15', column15);
                formData.append('column16', column16);
                formData.append('column17', column17);
                formData.append('column18', column18);
                formData.append('column19', column19);
                formData.append('column20', column20);
                formData.append('column21', column21);
                formData.append('column22', column22);
                formData.append('column23', column23);
                formData.append('column24', column24);
                formData.append('column25', column25);
                formData.append('column26', column26);
              } catch (err) {
                console.error(err);
              }

              // Add action for AJAX
              formData.append('action', 'save_settings');

              // Now, make the AJAX request
              jQuery.ajax({
                type: "POST",
                url: ajaxurl,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                  if (response.success) {
                    alert("Settings saved successfully!");
                    <?php
                    //$_SESSION['auth_token_status'] = "connected";
                    ?>
                    jQuery('#myForm')[0].reset();
                    location.reload();
                  } else {
                    alert("Error in Google Spreadsheet ID or Auth.json file");
                  }
                },
                error: function (response) {
                  console.error(response.data);
                }
              });

            } catch (err) {
              console.error(err);
            }
          };

          // Read the file
          reader.readAsText(jsonFile);
        } else {
          alert("No JSON auth file selected");
        }
      });
    });
  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>