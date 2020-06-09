<?php

  require "./sendgrid/sendgrid-php.php";

  // Message Vars
  $msg = '';
  $msgClass = '';

  // Check For Submit
  if (filter_has_var(INPUT_POST, 'submit')) {
              
    // posted values
    $name_of_proposer    = htmlspecialchars(strip_tags($_POST['name_of_proposer']));
    $form_email          = htmlspecialchars(strip_tags($_POST['form_email']));
    $address             = htmlspecialchars(strip_tags($_POST['address']));
    $registration_number = htmlspecialchars(strip_tags($_POST['registration_number']));
    $vehicle_make        = htmlspecialchars(strip_tags($_POST['vehicle_make']));
    $vehicle_colour      = htmlspecialchars(strip_tags($_POST['vehicle_colour']));
    $chassis_number      = htmlspecialchars(strip_tags($_POST['chassis_number']));
    $engine_number       = htmlspecialchars(strip_tags($_POST['engine_number']));
    $body_type           = htmlspecialchars(strip_tags($_POST['body_type']));
    $manufacture_year    = htmlspecialchars(strip_tags($_POST['manufacture_year']));
    $speedometer_reading = htmlspecialchars(strip_tags($_POST['speedometer_reading']));
    $estimate_value      = htmlspecialchars(strip_tags($_POST['estimate_value']));
    $accessory_value     = htmlspecialchars(strip_tags($_POST['accessory_value']));
    $anti_theft          = htmlspecialchars(strip_tags($_POST['anti_theft']));
    $previous_damage     = htmlspecialchars(strip_tags($_POST['previous_damage']));
    $inspection_time     = htmlspecialchars(strip_tags($_POST['inspection_time']));
    $remarks             = htmlspecialchars(strip_tags($_POST['remarks']));
    $inspector_name      = htmlspecialchars(strip_tags($_POST['inspector_name']));
    $insured_name        = htmlspecialchars(strip_tags($_POST['insured_name']));
    // files
    $inspector_sign      = !empty($_FILES["inspector_sign"]["name"]) ? sha1_file($_FILES['inspector_sign']['tmp_name']) . "-" . basename($_FILES["inspector_sign"]["name"]) : "";
    $inspector_sign      = htmlspecialchars(strip_tags($inspector_sign));
    $insured_sign        = !empty($_FILES["insured_sign"]["name"]) ? sha1_file($_FILES['insured_sign']['tmp_name']) . "-" . basename($_FILES["insured_sign"]["name"]) : "";
    $insured_sign        = htmlspecialchars(strip_tags($insured_sign));
    // eof
    $inspection_location = htmlspecialchars(strip_tags($_POST['inspection_location']));
    // files
    $vehicle_front       = !empty($_FILES["vehicle_front"]["name"]) ? sha1_file($_FILES['vehicle_front']['tmp_name']) . "-" . basename($_FILES["vehicle_front"]["name"]) : "";
    $vehicle_front       = htmlspecialchars(strip_tags($vehicle_front));
    $vehicle_back        = !empty($_FILES["vehicle_back"]["name"]) ? sha1_file($_FILES['vehicle_back']['tmp_name']) . "-" . basename($_FILES["vehicle_back"]["name"]) : "";
    $vehicle_back        = htmlspecialchars(strip_tags($vehicle_back));
    $vehicle_left        = !empty($_FILES["vehicle_left"]["name"]) ? sha1_file($_FILES['vehicle_left']['tmp_name']) . "-" . basename($_FILES["vehicle_left"]["name"]) : "";
    $vehicle_left        = htmlspecialchars(strip_tags($vehicle_left));
    $vehicle_right       = !empty($_FILES["vehicle_right"]["name"]) ? sha1_file($_FILES['vehicle_right']['tmp_name']) . "-" . basename($_FILES["vehicle_right"]["name"]) : "";
    $vehicle_right       = htmlspecialchars(strip_tags($vehicle_right));
    // eof

    // Check Require Fields
    if (!empty($name_of_proposer) && !empty($form_email) && !empty($address) && !empty($registration_number) && !empty($vehicle_make) && !empty($vehicle_colour) && !empty($chassis_number) && !empty($engine_number) && !empty($body_type) && !empty($manufacture_year) && !empty($speedometer_reading) && !empty($estimate_value) && !empty($accessory_value) && !empty($anti_theft) && !empty($previous_damage) && !empty($inspection_time) && !empty($remarks) && !empty($inspector_name) && !empty($insured_name) && !empty($inspection_location) && !empty($_FILES['inspector_sign']) && !empty($_FILES['insured_sign']) && !empty($_FILES['vehicle_front']) && !empty($_FILES['vehicle_back']) && !empty($_FILES['vehicle_left']) && !empty($_FILES['vehicle_right'])) {
      // Passed

      ////////////////////
      // START PHP MAIL //
      ////////////////////
      if (filter_var($form_email, FILTER_VALIDATE_EMAIL) === false) {
        // Failed
        $msg = 'Please use a valid email';
        $msgClass = 'alert-danger';
      } else {
        // Passed
        // Recipient EMail
        $toEmail = 'oyedotunsodiq045@gmail.com';
        $subject = 'MOTOR VEHICLE INSPECTION FORM From '.$name_of_proposer;
        $body = '<h2>MOTOR VEHICLE INSPECTION FORM</h2>
                  <h4>Name of Proposer</h4><p>'.$name_of_proposer.'</p>
                  <h4>Email</h4><p>'.$form_email.'</p>
                  <h4>Address</h4><p>'.$address.'</p>
                  <h3>PARTICULARS OF VEHICLE TO BE INSURED</h3>
                  <h4>Registration Number</h4><p>'.$registration_number.'</p>
                  <h4>Make of vehicle</h4><p>'.$vehicle_make.'</p>
                  <h4>Colour of vehicle</h4><p>'.$vehicle_colour.'</p>
                  <h4>Chassis No</h4><p>'.$chassis_number.'</p>
                  <h4>Engine No</h4><p>'.$engine_number.'</p>
                  <h4>Type of body</h4><p>'.$body_type.'</p>
                  <h4>Year of manufacture</h4><p>'.$manufacture_year.'</p>
                  <h4>Speedometer Reading</h4><p>'.$speedometer_reading.'</p>
                  <h4>Estimate of Present Value</h4><p>'.$estimate_value.'</p>
                  <h4>Value of Accessories (other than manufacturer’s fitted
                  accessories)</h4><p>'.$accessory_value.'</p>
                  <h4>Any Security Alarm/Anti-theft device</h4><p>'.$anti_theft.'</p>
                  <h4>Any evidence of previous damage/accident</h4><p>'.$previous_damage.'</p>
                  <h4>The exact time of inspection</h4><p>'.$inspection_time.'</p>
                  <h3>SCOPE OF COVER REQUIRED</h3>
                  <h4>Remarks</h4><p>'.$remarks.'</p>
                  <h4>Inspector’s Name</h4><p>'.$inspector_name.'</p>
                  <h4>Insured’s Name</h4><p>'.$insured_name.'</p>
                  <h4>Location of Inspection</h4><p>'.$inspection_location.'</p>';

        // Email Headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

        // Additional Headers
        $headers .= "From: " .$name_of_proposer. "<".$form_email.">". "\r\n";

        if (mail($toEmail, $subject, $body, $headers)) {
          // Email Sent
          $msg = 'Your email has been sent';
          $msgClass = 'alert-success';
        } else {
          // Failed
          $msg = 'Your email was not sent';
          $msgClass = 'alert-danger';
        }

      }

      ////////////////////
      // START SENDGRID //
      ////////////////////
      
      // Collect all the submitted files
      // $valid_id = $_FILES['valid_id']['tmp_name'];
      // $proof_of_address = $_FILES['proof_of_address']['tmp_name'];
      // $proposer_sign = $_FILES["proposer_sign"]["tmp_name"];

      // now, if image is not empty, try to upload the image
      // sha1_file() function is used to make a unique file name
      $target_file_inspector_sign   = $inspector_sign;
      $target_file_insured_sign     = $insured_sign;
      $target_file_vehicle_front    = $vehicle_front;
      $target_file_vehicle_back     = $vehicle_back;
      $target_file_vehicle_left     = $vehicle_left;
      $target_file_vehicle_right    = $vehicle_right;
      $file_type_inspector_sign     = pathinfo($target_file_inspector_sign, PATHINFO_EXTENSION);
      $file_type_insured_sign       = pathinfo($target_file_insured_sign, PATHINFO_EXTENSION);
      $file_type_vehicle_front      = pathinfo($target_file_vehicle_front, PATHINFO_EXTENSION);
      $file_type_vehicle_back       = pathinfo($target_file_vehicle_back, PATHINFO_EXTENSION);
      $file_type_vehicle_left       = pathinfo($target_file_vehicle_left, PATHINFO_EXTENSION);
      $file_type_vehicle_right      = pathinfo($target_file_vehicle_right, PATHINFO_EXTENSION);
          
      // error message is empty
      $file_upload_error_messages = "";

      // make sure that file is a real image
      $check_inspector_sign = getimagesize($_FILES["inspector_sign"]["tmp_name"]);
      $check_insured_sign   = getimagesize($_FILES["insured_sign"]["tmp_name"]);
      $check_vehicle_front  = getimagesize($_FILES["vehicle_front"]["tmp_name"]);
      $check_vehicle_back   = getimagesize($_FILES["vehicle_back"]["tmp_name"]);
      $check_vehicle_left   = getimagesize($_FILES["vehicle_left"]["tmp_name"]);
      $check_vehicle_right  = getimagesize($_FILES["vehicle_right"]["tmp_name"]);
      if ($check_inspector_sign !== false && $check_insured_sign !== false && $check_vehicle_front !== false && $check_vehicle_back !== false && $check_vehicle_left !== false && $check_vehicle_right !== false) {
          // submitted file is an image
      }else{
          $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
      }

      // make sure certain file types are allowed
      $allowed_file_types = array("jpg", "jpeg", "png", "gif");
      if (!in_array($file_type_inspector_sign, $allowed_file_types) && !in_array($file_type_insured_sign, $allowed_file_types) && !in_array($file_type_vehicle_front, $allowed_file_types) && !in_array($file_type_vehicle_back, $allowed_file_types) && !in_array($file_type_vehicle_left, $allowed_file_types) && !in_array($file_type_vehicle_right, $allowed_file_types)) {
        $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
      }

      // make sure file does not exist
      // if (file_exists($target_file_valid_id) && file_exists($target_file_proof_of_address) && file_exists($target_file_proposer_sign)) {
      //   $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
      // }

      // make sure submitted file is not too large, can't be larger than 1 MB
      if ($_FILES['inspector_sign']['size'] > (1024000) && $_FILES['insured_sign']['size'] > (1024000) && $_FILES['vehicle_front']['size'] > (1024000) && $_FILES['vehicle_back']['size'] > (1024000) && $_FILES['vehicle_left']['size'] > (1024000) && $_FILES['vehicle_right']['size'] > (1024000)) {
        $file_upload_error_messages .= "<div>Image must be less than 1 MB in size.</div>";
      }
      
      $inspector_sign_encoded = base64_encode(file_get_contents($inspector_sign));
      $insured_sign_encoded   = base64_encode(file_get_contents($insured_sign));
      $vehicle_front_encoded  = base64_encode(file_get_contents($vehicle_front));
      $vehicle_back_encoded   = base64_encode(file_get_contents($vehicle_back));
      $vehicle_left_encoded   = base64_encode(file_get_contents($vehicle_left));
      $vehicle_right_encoded  = base64_encode(file_get_contents($vehicle_right));

      try {
        // send email
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("$form_email", "$name_of_proposer");
        $email->setSubject("MOTOR VEHICLE INSPECTION FORM FROM " .$name_of_proposer);
        $tos = [
            "oyedotunsodiq045@gmail.com" => "SODIQ OYEDOTUN GMAIL",
            "oyedotunsodiq045@yahoo.com" => "SODIQ OYEDOTUN YAHOO",
            "sodiq.oyedotun@mutualng.com" => "MUTUAL MAIL",
        ];
        $email->addTos($tos);
        // $email->addTo("sodiq.oyedotun@mutualng.com", "MUTUAL BENEFITS ASSURANCE PLC");
        // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<h2>MOTOR VEHICLE INSPECTION FORM</h2>
            <h4>Name of Proposal</h4><p>'.$name_of_proposer.'</p>
            <h4>Email</h4><p>'.$form_email.'</p>
            <h4>Address</h4><p>'.$address.'</p>
            <h3>PARTICULARS OF VEHICLE TO BE INSURED</h3>
            <h4>Registration Number</h4><p>'.$registration_number.'</p>
            <h4>Make of vehicle</h4><p>'.$vehicle_make.'</p>
            <h4>Colour of vehicle</h4><p>'.$vehicle_colour.'</p>
            <h4>Chassis No</h4><p>'.$chassis_number.'</p>
            <h4>Engine No</h4><p>'.$engine_number.'</p>
            <h4>Type of body</h4><p>'.$body_type.'</p>
            <h4>Year of manufacture</h4><p>'.$manufacture_year.'</p>
            <h4>Speedometer Reading</h4><p>'.$speedometer_reading.'</p>
            <h4>Estimate of Present Value</h4><p>'.$estimate_value.'</p>
            <h4>Value of Accessories (other than manufacturer’s fitted
            accessories)</h4><p>'.$accessory_value.'</p>
            <h4>Any Security Alarm/Anti-theft device</h4><p>'.$anti_theft.'</p>
            <h4>Any evidence of previous damage/accident</h4><p>'.$previous_damage.'</p>
            <h4>The exact time of inspection</h4><p>'.$inspection_time.'</p>
            <h3>SCOPE OF COVER REQUIRED</h3>
            <h4>Remarks</h4><p>'.$remarks.'</p>
            <h4>Inspector’s Name</h4><p>'.$inspector_name.'</p>
            <h4>Insured’s Name</h4><p>'.$insured_name.'</p>
            <h4>Location of Inspection</h4><p>'.$inspection_location.'</p>"
        );

        $email->addAttachment($inspector_sign_encoded, "application/text", $_FILES["inspector_sign"]["name"], "attachment");
        $email->addAttachment($insured_sign_encoded, "application/text", $_FILES["insured_sign"]["name"], "attachment");
        $email->addAttachment($vehicle_front_encoded, "application/text", $_FILES["vehicle_front"]["name"], "attachment");
        $email->addAttachment($vehicle_back_encoded, "application/text", $_FILES["vehicle_back"]["name"], "attachment");
        $email->addAttachment($vehicle_left_encoded, "application/text", $_FILES["vehicle_left"]["name"], "attachment");
        $email->addAttachment($vehicle_right_encoded, "application/text", $_FILES["vehicle_right"]["name"], "attachment");

        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() == 202) {
              // Successful
              $msg = 'Form submitted successfully';
              $msgClass = 'alert-success';

              print $response->statusCode() . "\n";
              print_r($response->headers());
              print $response->body() . "\n";
            }
        } catch (Exception $e) {
          // echo 'Caught exception: '. $e->getMessage() ."\n";
          // Failed
          $msg = 'Form not submitted';
          $msgClass = 'alert-danger';
        }
      } catch (\Throwable $th) {
        //throw $th;
        // Failed
        $msg = 'Form not submitted';
        $msgClass = 'alert-danger';
      }
      
    } else {
      // Failed
      $msg = 'Please fill in all fields';
      $msgClass = 'alert-danger';
    }
  } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="description"
      content="MUTUAL BENEFITS ASSURANCE PLC MOTOR VEHICLE INSPECTION FORM"
    />
    <meta name="keywords" content="MOTOR VEHICLE INSPECTION FORM" />
    <meta name="author" content="SODIQ OYEDOTUN" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <!-- <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    /> -->

    <!-- Local Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="css/bootstrap.min.css
    "
    />
    <title>MOTOR VEHICLE INSPECTION FORM</title>
  </head>
  <body>
    <div class="container mt-5 mb-5">
      <?php if($msg != ''): ?>
      <div class="alert <?php echo $msgClass; ?>">
        <?php echo $msg; ?>
      </div>
      <?php endif; ?>

      <div class="text-center">
        <img
          class="d-block mx-auto"
          src="images/motor-physical-inspection-form.png"
          alt=""
          width="107"
          height="72"
        />
        <h2 class="text-center"><u>MOTOR PHYSICAL INSPECTION FORM</u></h2>
      </div>

      <form
        class="mt-3"
        method="post"
        action="<?php echo $_SERVER['PHP_SELF']; ?>"
        enctype="multipart/form-data"
      >
        <h6>PERSONAL DATA</h6>
        <!-- <div class="form-group">
          <label for="">Name of Proposer</label>
          <input
            type="text"
            class="form-control"
            name="name_of_proposer"
            placeholder="Enter name of proposer"
          />
        </div> -->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Name of Proposer</label>
            <input
              type="text"
              class="form-control"
              name="name_of_proposer"
              placeholder="2349054644444"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Email</label>
            <input
              type="email"
              class="form-control"
              name="form_email"
              placeholder="info@mutualng.com"
            />
          </div>
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input
            type="text"
            class="form-control"
            name="address"
            placeholder="233 Ikorodu Road"
          />
        </div>
        <h6>PARTICULARS OF VEHICLE TO BE INSURED</h6>
        <div class="form-group">
          <label for="">Registration Number</label>
          <input
            type="text"
            class="form-control"
            name="registration_number"
            placeholder="Enter registration number"
          />
        </div>
        <div class="form-group">
          <label for="">Make of vehicle</label>
          <input
            type="text"
            class="form-control"
            name="vehicle_make"
            placeholder="Enter make of vehicle"
          />
        </div>
        <div class="form-group">
          <label for="">Colour of vehicle</label>
          <input
            type="text"
            class="form-control"
            name="vehicle_colour"
            placeholder="Enter colour of vehicle"
          />
        </div>
        <div class="form-group">
          <label for="">Chassis No</label>
          <input
            type="text"
            class="form-control"
            name="chassis_number"
            placeholder="Enter chassis number"
          />
        </div>
        <div class="form-group">
          <label for="">Engine No</label>
          <input
            type="text"
            class="form-control"
            name="engine_number"
            placeholder="Enter engine number"
          />
        </div>
        <div class="form-group">
          <label for="">Type of body</label>
          <input
            type="text"
            class="form-control"
            name="body_type"
            placeholder="Enter type of body"
          />
        </div>
        <div class="form-group">
          <label for="">Year of manufacture</label>
          <input
            type="text"
            class="form-control"
            name="manufacture_year"
            placeholder="Enter year of manufacture"
          />
        </div>
        <div class="form-group">
          <label for="">Speedometer Reading</label>
          <input
            type="text"
            class="form-control"
            name="speedometer_reading"
            placeholder="Enter speedometer reading"
          />
        </div>
        <div class="form-group">
          <label for="">Estimate of Present Value</label>
          <input
            type="text"
            class="form-control"
            name="estimate_value"
            placeholder="Enter estimate of present value"
          />
        </div>
        <div class="form-group">
          <label for=""
            >Value of Accessories (other than manufacturer’s fitted
            accessories)</label
          >
          <input
            type="text"
            class="form-control"
            name="accessory_value"
            placeholder="Enter value of accessory"
          />
        </div>
        <div class="form-group">
          <label for="">Any Security Alarm/Anti-theft device</label>
          <input
            type="text"
            class="form-control"
            name="anti_theft"
            placeholder="Yes or No"
          />
        </div>
        <div class="form-group">
          <label for="">Any evidence of previous damage/accident</label>
          <input
            type="text"
            class="form-control"
            name="previous_damage"
            placeholder="Yes or No"
          />
        </div>
        <div class="form-group">
          <label for="">The exact time of inspection</label>
          <input
            type="text"
            class="form-control"
            name="inspection_time"
            placeholder="Enter exact time of inspection"
          />
        </div>
        <h6>SCOPE OF COVER REQUIRED</h6>
        <div class="form-group">
          <label for="">Remarks</label>
          <textarea class="form-control" name="remarks" rows="2"></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Inspector’s Name</label>
            <input
              type="text"
              class="form-control"
              name="inspector_name"
              placeholder="Enter inspector's name"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Insured’s Name</label>
            <input
              type="text"
              class="form-control"
              name="insured_name"
              placeholder="Enter insured's name"
            />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Inspector’s Signature</label>
            <input
              type="file"
              class="form-control-file"
              name="inspector_sign"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Insured’s Signature</label>
            <input type="file" class="form-control-file" name="insured_sign" />
          </div>
        </div>
        <div class="form-group">
          <label for="">Location of Inspection</label>
          <input
            type="text"
            class="form-control"
            name="inspection_location"
            placeholder="Enter location of inspection"
          />
        </div>
        <h6>
          NOTE: kindly attach pictures of the vehicle showing the four sides
          (front, back, left & right).
        </h6>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Front</label>
            <input type="file" class="form-control-file" name="vehicle_front" />
          </div>
          <div class="form-group col-md-6">
            <label for="">Back</label>
            <input type="file" class="form-control-file" name="vehicle_back" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Left</label>
            <input type="file" class="form-control-file" name="vehicle_left" />
          </div>
          <div class="form-group col-md-6">
            <label for="">Right</label>
            <input type="file" class="form-control-file" name="vehicle_right" />
          </div>
        </div>
        <button
          type="submit"
          name="submit"
          class="mt-5 btn btn-primary btn-lg btn-block"
        >
          Submit
        </button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script> -->
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script> -->
    <!-- <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
