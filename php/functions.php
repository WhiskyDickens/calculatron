<?php

  /**
   * Hold global functions for the application
   */

   require_once('config.php');

   /**
    * Parse JS fetch post (Raw WebKitFormBoundary data)
    *
    * @param array $a_data Raw WebKitFormBoundary Data to parse
    * @return void
    */
  function parse_raw_http_request(array &$data) {
    // read incoming data
    $input = file_get_contents('php://input');
    preg_match_all('/name="(.*)"\s+(.*)\r/', $input, $submission);
    unset($submission[0]);
    // Get field keys
    $fields = [];
    foreach($submission[1] as $key => $field_name) {;
      // Only grab useable fields
      if(strpos($submission[2][$key], "----") === false) {
        $fields[$field_name] = $submission[2][$key];
      }
    }
    return $fields;
  }

  /**
   * Check form submission for required fields
   *
   * @param array $requirements An array of required field keys
   * @return void
   */
  function validate_inputs($request, $requirements) {
    $missing = [];
    $empty = [];
    // Foreach required field in requirements array
    foreach($requirements as $key) {
      // Check for missing
      if(!isset($request[$key])) {
        $missing[] = "$key missing";
      } elseif($request[$key] == "") {
        $empty[] = "$key empty";
      }
    }
    // Return result
    if(!empty($missing)) {
      return $missing;
    } elseif(!empty($empty)) {
      return $empty;
    } else {
      return false;
    }
  }

  