<?php

  /**
   * Process calculations (return result via ajax)
   */

    // Require global functions file
    include 'functions.php';

    // Include the expression parser library
    
    include APP_PATH . 'vendor/math-parser-master/vendor/autoload.php';
    use MathParser\StdMathParser;
    use MathParser\Interpreting\Evaluator;
    $parser = new StdMathParser();

   // Parse submitted data
   $request = parse_raw_http_request($_REQUEST);

   // Set defaults
   $invalid = false;
   $result = false;
   $message = NULL;

   // Free-text calculation
   if(isset($_GET['free-text'])) {
    // Check for missing or empty required fields 
    $invalid = validate_inputs($request, ['calculation']);
     // If required fields present, do the calculation
     if(!$invalid) {
      // Return results
      $result = $parser->parse($request['calculation']);
      $calculation = $request['calculation'];
      $question = "What is $calculation";
      $answer = $result;
     }
   }

   // What is num-1 + num-2...
   if(isset($_GET['add'])) {
    // Check for missing or empty required fields 
    $invalid = validate_inputs($request, ['num-1', 'num-2']);
     // If required fields present, do the calculation
     if(!$invalid) {
      // Only keep request params that contain our calculation numbers
      foreach($request as $key => $value) {
        if(strpos($key, "num-") === false) {
          unset($request[$key]);
        }
      }
      // Calculate
      $result = 0;
      $question = "What is ";
      $calculation = "";
      foreach($request as $key => $value) {
        $result += $value;
        $question .= "$value plus ";
        $calculation .= "$value + ";
      }
      $question = substr($question, 0, -6) ."?"; // Remove last " plus " from question string
      $calculation = substr($calculation, 0, -2) ." = $result"; // Remove last " + " from calculation string
      $answer = $result;
     }
   }

   // What is X% of Y?
   if(isset($_GET['perc-what-x-of-y'])) {
    // Check for missing or empty required fields 
    $invalid = validate_inputs($request, ['x', 'y']);
     // If required fields present, do the calculation
     if(!$invalid) {
      // (x / 100) * y
      $result = ($request['x'] / 100) *  $request['y'];
      $question = "What is {$request['x']}% of {$request['y']}?";
      $calculation = "({$request['x']}/100) * {$request['y']} = $result";
      $answer = "$result";
     }
   }

   // X is what % of Y?
   if(isset($_GET['perc-x-what-of-y'])) {
    // Check for missing or empty required fields 
    $invalid = validate_inputs($request, ['x', 'y']);
     // If required fields present, do the calculation
     if(!$invalid) {
      // (x / y) * 100
      $result = ($request['x'] / $request['y']) * 100;
      $question = "{$request['x']} is what % of {$request['y']}?";
      $calculation = "({$request['x']}/{$request['y']}) * 100 = $result";
      $answer = "$result%";
     }
   }

   // X is Y% of what?
   if(isset($_GET['perc-x-is-y-of-what'])) {
    // Check for missing or empty required fields 
    $invalid = validate_inputs($request, ['x', 'y']);
     // If required fields present, do the calculation
     if(!$invalid) {
      // x / (y / 100)
      $result = $request['x'] / ($request['y'] / 100);
      $question = "{$request['x']} is {$request['y']}% of what?";
      $calculation = "{$request['x']}/({$request['y']}/100) = $result";
      $answer = "$result";
     }
   }

   

   // If there's an error, set response code and set response message
   if($invalid) {
     $response_code = 400;
      // Break down message into HTML
      foreach($invalid as $key => $error) {
        $result[] = $error;
      }
      // json encode message array
      $result = json_encode($result);
      $message = "<strong>Error:</strong> Please make sure all fields are filled in correctly!";
   } else {
     $response_code = 200;
     $message = "<strong>Question:</strong> $question<br>";
     $message .= "<strong>Calculation:</strong> $calculation<br>";
     $message .= "<strong>Answer:</strong> $answer";
   }

   // Generate response
   $response = [
    'request' => $request,
    'code' => $response_code,
    'result' => $result,
    'message' => $message
   ];
   
   // Print json response
   echo json_encode($response);