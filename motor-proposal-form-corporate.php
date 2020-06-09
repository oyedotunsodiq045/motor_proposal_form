<?php

  require "./sendgrid/sendgrid-php.php";

  // Message Vars
  $msg = '';
  $msgClass = '';

  // Check For Submit
  if (filter_has_var(INPUT_POST, 'submit')) {
              
    // get posted values
    $name_of_firm        = htmlspecialchars(strip_tags($_POST['name_of_firm']));
    $address             = htmlspecialchars(strip_tags($_POST['address']));
    $town                = htmlspecialchars(strip_tags($_POST['town']));
    $city                = htmlspecialchars(strip_tags($_POST['city']));
    $state               = htmlspecialchars(strip_tags($_POST['state']));
    $country             = htmlspecialchars(strip_tags($_POST['country']));
    $reg_num             = htmlspecialchars(strip_tags($_POST['reg_num']));
    $reg_date            = htmlspecialchars(strip_tags($_POST['reg_date']));
    $reg_state           = htmlspecialchars(strip_tags($_POST['reg_state']));
    $reg_country         = htmlspecialchars(strip_tags($_POST['reg_country']));
    $business_phone      = htmlspecialchars(strip_tags($_POST['business_phone']));
    $form_email          = htmlspecialchars(strip_tags($_POST['form_email']));
    $fax                 = htmlspecialchars(strip_tags($_POST['fax']));
    $url                 = htmlspecialchars(strip_tags($_POST['url']));
    $tin                 = htmlspecialchars(strip_tags($_POST['tin']));
    $bvn                 = htmlspecialchars(strip_tags($_POST['bvn']));
    $risk_address        = htmlspecialchars(strip_tags($_POST['risk_address']));
    $cover_type          = htmlspecialchars(strip_tags($_POST['cover_type']));
    $cover_period        = htmlspecialchars(strip_tags($_POST['cover_period']));
    $property_value      = htmlspecialchars(strip_tags($_POST['property_value']));
    $beneficiary         = htmlspecialchars(strip_tags($_POST['beneficiary']));
    $other_policy        = htmlspecialchars(strip_tags($_POST['other_policy']));
    $dir_name_one        = htmlspecialchars(strip_tags($_POST['dir_name_one']));
    $dir_desig_one       = htmlspecialchars(strip_tags($_POST['dir_desig_one']));
    $dir_tel_one         = htmlspecialchars(strip_tags($_POST['dir_tel_one']));
    $dir_hold_one        = htmlspecialchars(strip_tags($_POST['dir_hold_one']));
    $dir_name_two        = htmlspecialchars(strip_tags($_POST['dir_name_two']));
    $dir_desig_two       = htmlspecialchars(strip_tags($_POST['dir_desig_two']));
    $dir_tel_two         = htmlspecialchars(strip_tags($_POST['dir_tel_two']));
    $dir_hold_two        = htmlspecialchars(strip_tags($_POST['dir_hold_two']));
    $dir_name_three      = htmlspecialchars(strip_tags($_POST['dir_name_three']));
    $dir_desig_three     = htmlspecialchars(strip_tags($_POST['dir_desig_three']));
    $dir_tel_three       = htmlspecialchars(strip_tags($_POST['dir_tel_three']));
    $dir_hold_three      = htmlspecialchars(strip_tags($_POST['dir_hold_three']));
    // file
    $inc_cert            = !empty($_FILES["inc_cert"]["name"]) ? sha1_file($_FILES['inc_cert']['tmp_name']) . "-" . basename($_FILES["inc_cert"]["name"]) : "";
    $inc_cert            = htmlspecialchars(strip_tags($inc_cert));
    $memo                = !empty($_FILES["memo"]["name"]) ? sha1_file($_FILES['memo']['tmp_name']) . "-" . basename($_FILES["memo"]["name"]) : "";
    $memo                = htmlspecialchars(strip_tags($memo));
    $cac                 = !empty($_FILES["cac"]["name"]) ? sha1_file($_FILES['cac']['tmp_name']) . "-" . basename($_FILES["cac"]["name"]) : "";
    $cac                 = htmlspecialchars(strip_tags($cac));
    $proof_of_address    = !empty($_FILES["proof_of_address"]["name"]) ? sha1_file($_FILES['proof_of_address']['tmp_name']) . "-" . basename($_FILES["proof_of_address"]["name"]) : "";
    $proof_of_address    = htmlspecialchars(strip_tags($proof_of_address));
    $valid_director_one  = !empty($_FILES["valid_director_one"]["name"]) ? sha1_file($_FILES['valid_director_one']['tmp_name']) . "-" . basename($_FILES["valid_director_one"]["name"]) : "";
    $valid_director_one  = htmlspecialchars(strip_tags($valid_director_one));
    $valid_director_two  = !empty($_FILES["valid_director_two"]["name"]) ? sha1_file($_FILES['valid_director_two']['tmp_name']) . "-" . basename($_FILES["valid_director_two"]["name"]) : "";
    $valid_director_two  = htmlspecialchars(strip_tags($valid_director_two));
    // eof
    $risk_reg_num        = htmlspecialchars(strip_tags($_POST['risk_reg_num']));
    $vehicle_make        = htmlspecialchars(strip_tags($_POST['vehicle_make']));
    $chassis_number      = htmlspecialchars(strip_tags($_POST['chassis_number']));
    $engine_num          = htmlspecialchars(strip_tags($_POST['engine_num']));
    $value               = htmlspecialchars(strip_tags($_POST['value']));
    $vehicle_type        = htmlspecialchars(strip_tags($_POST['vehicle_type']));
    $cover_required      = htmlspecialchars(strip_tags($_POST['cover_required']));
    $period_from         = htmlspecialchars(strip_tags($_POST['period_from']));
    $period_to           = htmlspecialchars(strip_tags($_POST['period_to']));
    $proposer_name       = htmlspecialchars(strip_tags($_POST['proposer_name']));
    // file
    $proposer_sign       = !empty($_FILES["proposer_sign"]["name"]) ? sha1_file($_FILES['proposer_sign']['tmp_name']) . "-" . basename($_FILES["proposer_sign"]["name"]) : "";
    $proposer_sign       = htmlspecialchars(strip_tags($proposer_sign));
    // eof

    // Check Require Fields && !empty($test)
    if (!empty($name_of_firm) && !empty($address) && !empty($town) && !empty($city) && !empty($state) && !empty($country) && !empty($reg_num) && !empty($reg_date) && !empty($reg_state) && !empty($reg_country) && !empty($business_phone) && !empty($form_email) && !empty($fax) && !empty($url) && !empty($tin) && !empty($bvn) && !empty($risk_address) && !empty($cover_type) && !empty($cover_period) && !empty($property_value) && !empty($beneficiary) && !empty($other_policy) && !empty($dir_name_one) && !empty($dir_desig_one) && !empty($dir_tel_one) && !empty($dir_hold_one) && !empty($dir_name_two) && !empty($dir_desig_two) && !empty($dir_tel_two) && !empty($dir_hold_two) && !empty($dir_name_three) && !empty($dir_desig_three) && !empty($dir_tel_three) && !empty($dir_hold_three) && !empty($_FILES['inc_cert']) && !empty($_FILES['memo']) && !empty($_FILES['cac']) && !empty($_FILES['proof_of_address']) && !empty($_FILES['valid_director_one']) && !empty($_FILES['valid_director_two']) && !empty($risk_reg_num) && !empty($vehicle_make) && !empty($chassis_number) && !empty($engine_num) && !empty($value) && !empty($vehicle_type) && !empty($cover_required) && !empty($period_from) && !empty($period_to) && !empty($proposer_name) && !empty($_FILES['proposer_sign'])) {
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
        $subject = 'MOTOR PROPOSAL FORM COPORATE FROM '.$proposer_name;
        $body = '<h2>MOTOR PROPOSAL FORM COPORATE</h2>
                  <h4>Name of firm/institution</h4><p>'.$name_of_firm.'</p>
                  <h4>Address</h4><p>'.$address.'</p>
                  <h4>Town</h4><p>'.$town.'</p>
                  <h4>City</h4><p>'.$city.'</p>
                  <h4>State</h4><p>'.$state.'</p>
                  <h4>Country</h4><p>'.$country.'</p>
                  <h4>Incorporation/Registration Number</h4><p>'.$reg_num.'</p>
                  <h4>Date Incorporated/Registered</h4><p>'.$reg_date.'</p>
                  <h4>State of Incorporation/Registration</h4><p>'.$reg_state.'</p>
                  <h4>Country of Incorporation</h4><p>'.$reg_country.'</p>
                  <h4>Operating Business Phone</h4><p>'.$business_phone.'</p>
                  <h4>Email</h4><p>'.$form_email.'</p>
                  <h4>FAX</h4><p>'.$fax.'</p>
                  <h4>URL</h4><p>'.$url.'</p>
                  <h4>Tax Identification Number (TIN)</h4><p>'.$tin.'</p>
                  <h4>Bank Verification Number (BVN)</h4><p>'.$bvn.'</p>
                  <h4>Risk location Address</h4><p>'.$risk_address.'</p>
                  <h4>Type of Cover</h4><p>'.$cover_type.'</p>
                  <h4>Period of Cover</h4><p>'.$cover_period.'</p>
                  <h4>Value of property/cover/insurance</h4><p>'.$property_value.'</p>
                  <h4>Beneficiary</h4><p>'.$beneficiary.'</p>
                  <h4>Other existing policy (ies)</h4><p>'.$other_policy.'</p>
                  <h3>DETAILS OF DIRECTORS/PRINCIPAL OFFICERS</h3>
                  <h3>DIRECTOR/PRINCIPAL 1</h3>
                  <h4>Name</h4><p>'.$dir_name_one.'</p>
                  <h4>Designation</h4><p>'.$dir_desig_one.'</p>
                  <h4>Telephone</h4><p>'.$dir_tel_one.'</p>
                  <h4>%Holding</h4><p>'.$dir_hold_one.'</p>
                  <h3>DIRECTOR/PRINCIPAL 2</h3>
                  <h4>Name</h4><p>'.$dir_name_two.'</p>
                  <h4>Designation</h4><p>'.$dir_desig_two.'</p>
                  <h4>Telephone</h4><p>'.$dir_tel_two.'</p>
                  <h4>%Holding</h4><p>'.$dir_hold_two.'</p>
                  <h3>DIRECTOR/PRINCIPAL 3</h3>
                  <h4>Name</h4><p>'.$dir_name_three.'</p>
                  <h4>Designation</h4><p>'.$dir_desig_three.'</p>
                  <h4>Telephone</h4><p>'.$dir_tel_three.'</p>
                  <h4>%Holding</h4><p>'.$dir_hold_three.'</p>
                  <h3>RISK DETAILS</h3>
                  <h4>Registration Number</h4><p>'.$risk_reg_num.'</p>
                  <h4>Make of Vehicle</h4><p>'.$vehicle_make.'</p>
                  <h4>Chassis Number</h4><p>'.$chassis_number.'</p>
                  <h4>Engine Number</h4><p>'.$engine_num.'</p>
                  <h4>Value</h4><p>'.$value.'</p>
                  <h4>Vehicle Type</h4><p>'.$vehicle_type.'</p>
                  <h4>Cover Required</h4><p>'.$cover_required.'</p>
                  <h4>PERIOD OF INSURANCE (From)</h4><p>'.$period_from.'</p>
                  <h4>PERIOD OF INSURANCE (To)</h4><p>'.$period_to.'</p>
                  <h4>Name of proposer</h4><p>'.$proposer_name.'</p>';

        // Email Headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

        // Additional Headers
        $headers .= "From: " .$proposer_name. "<".$form_email.">". "\r\n";

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
      $target_file_inc_cert           = $inc_cert;
      $target_file_memo               = $memo;
      $target_file_cac                = $cac;
      $target_file_proof_of_address   = $proof_of_address;
      $target_file_valid_director_one = $valid_director_one;
      $target_file_valid_director_two = $proposer_sign;
      $target_file_proposer_sign      = $proposer_sign;
      $file_type_inc_cert             = pathinfo($target_file_inc_cert, PATHINFO_EXTENSION);
      $file_type_memo                 = pathinfo($target_file_memo, PATHINFO_EXTENSION);
      $file_type_cac                  = pathinfo($target_file_cac, PATHINFO_EXTENSION);
      $file_type_proof_of_address     = pathinfo($target_file_proof_of_address, PATHINFO_EXTENSION);
      $file_type_valid_director_one   = pathinfo($target_file_valid_director_one, PATHINFO_EXTENSION);
      $file_type_valid_director_two   = pathinfo($target_file_valid_director_two, PATHINFO_EXTENSION);
      $file_type_proposer_sign        = pathinfo($target_file_proposer_sign, PATHINFO_EXTENSION);
          
      // error message is empty
      $file_upload_error_messages = "";

      // make sure that file is a real image
      $check_inc_cert           = getimagesize($_FILES["inc_cert"]["tmp_name"]);
      $check_memo               = getimagesize($_FILES["memo"]["tmp_name"]);
      $check_cac                = getimagesize($_FILES["cac"]["tmp_name"]);
      $check_proof_of_address   = getimagesize($_FILES["proof_of_address"]["tmp_name"]);
      $check_valid_director_one = getimagesize($_FILES["valid_director_one"]["tmp_name"]);
      $check_valid_director_two = getimagesize($_FILES["valid_director_two"]["tmp_name"]);
      $check_proposer_sign      = getimagesize($_FILES["proposer_sign"]["tmp_name"]);
      if ($check_inc_cert !== false && $check_memo !== false && $check_cac !== false && $check_proof_of_address !== false && $check_valid_director_one !== false && $check_valid_director_two !== false) {
          // submitted file is an image
      }else{
          $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
      }

      // make sure certain file types are allowed
      $allowed_file_types = array("jpg", "jpeg", "png", "gif");
      if (!in_array($file_type_inc_cert, $allowed_file_types) && !in_array($file_type_memo, $allowed_file_types) && !in_array($file_type_cac, $allowed_file_types) && !in_array($file_type_proof_of_address, $allowed_file_types) && !in_array($file_type_valid_director_one, $allowed_file_types) && !in_array($file_type_valid_director_two, $allowed_file_types) && !in_array($file_type_proposer_sign, $allowed_file_types)) {
        $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
      }

      // make sure file does not exist
      // if (file_exists($target_file_valid_id) && file_exists($target_file_proof_of_address) && file_exists($target_file_proposer_sign)) {
      //   $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
      // }

      // make sure submitted file is not too large, can't be larger than 1 MB
      if ($_FILES['inc_cert']['size'] > (1024000) && $_FILES['memo']['size'] > (1024000) && $_FILES['cac']['size'] > (1024000) && $_FILES['proof_of_address']['size'] > (1024000) && $_FILES['valid_director_one']['size'] > (1024000) && $_FILES['valid_director_two']['size'] > (1024000) && $_FILES['proposer_sign']['size'] > (1024000)) {
        $file_upload_error_messages .= "<div>Image must be less than 1 MB in size.</div>";
      }
      
      $inc_cert_encoded            = base64_encode(file_get_contents($inc_cert));
      $memo_encoded                = base64_encode(file_get_contents($memo));
      $cac_encoded                 = base64_encode(file_get_contents($cac));
      $proof_of_address_encoded    = base64_encode(file_get_contents($proof_of_address));
      $valid_director_one_encoded  = base64_encode(file_get_contents($valid_director_one));
      $valid_director_two_encoded  = base64_encode(file_get_contents($valid_director_two));
      $proposer_sign_encoded       = base64_encode(file_get_contents($proposer_sign));

      try {
        // send email
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("$form_email", "$proposer_name");
        $email->setSubject("MOTOR PROPOSAL FORM COPORATE FROM " .$proposer_name);
        $tos = [
            "oyedotunsodiq045@gmail.com" => "SODIQ OYEDOTUN GMAIL",
            "oyedotunsodiq045@yahoo.com" => "SODIQ OYEDOTUN YAHOO",
            "sodiq.oyedotun@mutualng.com" => "MUTUAL MAIL",
        ];
        $email->addTos($tos);
        // $email->addTo("sodiq.oyedotun@mutualng.com", "MUTUAL BENEFITS ASSURANCE PLC");
        // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<h2>MOTOR PROPOSAL FORM COPORATE</h2>
            <h2>MOTOR PROPOSAL FORM COPORATE</h2>
            <h4>Name of firm/institution</h4><p>'.$name_of_firm.'</p>
            <h4>Address</h4><p>'.$address.'</p>
            <h4>Town</h4><p>'.$town.'</p>
            <h4>City</h4><p>'.$city.'</p>
            <h4>State</h4><p>'.$state.'</p>
            <h4>Country</h4><p>'.$country.'</p>
            <h4>Incorporation/Registration Number</h4><p>'.$reg_num.'</p>
            <h4>Date Incorporated/Registered</h4><p>'.$reg_date.'</p>
            <h4>State of Incorporation/Registration</h4><p>'.$reg_state.'</p>
            <h4>Country of Incorporation</h4><p>'.$reg_country.'</p>
            <h4>Operating Business Phone</h4><p>'.$business_phone.'</p>
            <h4>Email</h4><p>'.$form_email.'</p>
            <h4>FAX</h4><p>'.$fax.'</p>
            <h4>URL</h4><p>'.$url.'</p>
            <h4>Tax Identification Number (TIN)</h4><p>'.$tin.'</p>
            <h4>Bank Verification Number (BVN)</h4><p>'.$bvn.'</p>
            <h4>Risk location Address</h4><p>'.$risk_address.'</p>
            <h4>Type of Cover</h4><p>'.$cover_type.'</p>
            <h4>Period of Cover</h4><p>'.$cover_period.'</p>
            <h4>Value of property/cover/insurance</h4><p>'.$property_value.'</p>
            <h4>Beneficiary</h4><p>'.$beneficiary.'</p>
            <h4>Other existing policy (ies)</h4><p>'.$other_policy.'</p>
            <h3>DETAILS OF DIRECTORS/PRINCIPAL OFFICERS</h3>
            <h3>DIRECTOR/PRINCIPAL 1</h3>
            <h4>Name</h4><p>'.$dir_name_one.'</p>
            <h4>Designation</h4><p>'.$dir_desig_one.'</p>
            <h4>Telephone</h4><p>'.$dir_tel_one.'</p>
            <h4>%Holding</h4><p>'.$dir_hold_one.'</p>
            <h3>DIRECTOR/PRINCIPAL 2</h3>
            <h4>Name</h4><p>'.$dir_name_two.'</p>
            <h4>Designation</h4><p>'.$dir_desig_two.'</p>
            <h4>Telephone</h4><p>'.$dir_tel_two.'</p>
            <h4>%Holding</h4><p>'.$dir_hold_two.'</p>
            <h3>DIRECTOR/PRINCIPAL 3</h3>
            <h4>Name</h4><p>'.$dir_name_three.'</p>
            <h4>Designation</h4><p>'.$dir_desig_three.'</p>
            <h4>Telephone</h4><p>'.$dir_tel_three.'</p>
            <h4>%Holding</h4><p>'.$dir_hold_three.'</p>
            <h3>RISK DETAILS</h3>
            <h4>Registration Number</h4><p>'.$risk_reg_num.'</p>
            <h4>Make of Vehicle</h4><p>'.$vehicle_make.'</p>
            <h4>Chassis Number</h4><p>'.$chassis_number.'</p>
            <h4>Engine Number</h4><p>'.$engine_num.'</p>
            <h4>Value</h4><p>'.$value.'</p>
            <h4>Vehicle Type</h4><p>'.$vehicle_type.'</p>
            <h4>Cover Required</h4><p>'.$cover_required.'</p>
            <h4>PERIOD OF INSURANCE (From)</h4><p>'.$period_from.'</p>
            <h4>PERIOD OF INSURANCE (To)</h4><p>'.$period_to.'</p>
            <h4>Name of proposer</h4><p>'.$proposer_name.'</p>'"
        );

        $email->addAttachment($inc_cert_encoded, "application/text", $_FILES["inc_cert"]["name"], "attachment");
        $email->addAttachment($memo_encoded, "application/text", $_FILES["memo"]["name"], "attachment");
        $email->addAttachment($cac_encoded, "application/text", $_FILES["cac"]["name"], "attachment");
        $email->addAttachment($proof_of_address_encoded, "application/text", $_FILES["proof_of_address"]["name"], "attachment");
        $email->addAttachment($valid_director_one_encoded, "application/text", $_FILES["valid_director_one"]["name"], "attachment");
        $email->addAttachment($valid_director_two_encoded, "application/text", $_FILES["valid_director_two"]["name"], "attachment");
        $email->addAttachment($proposer_sign_encoded, "application/text", $_FILES["proposer_sign"]["name"], "attachment");

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
      content="MUTUAL BENEFITS ASSURANCE PLC MOTOR PROPOSAL FORM COPORATE"
    />
    <meta name="keywords" content="MOTOR PROPOSAL FORM COPORATE" />
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
    <title>MOTOR PROPOSAL FORM COPORATE</title>
  </head>
  <body>
    <div class="container mt-5 mb-5">
      <div class="mt-5 text-center">
        <img
          class="d-block mx-auto"
          src="images/motor-proposal-form.jpg"
          width="107"
          height="72"
        />
        <h2 style="color: green;"><b>Mutual Benefits Assurance Plc</b></h2>
        <p class="lead" style="font-size: 13px; color: green;">
          Aret Adams House, 233, Ikorodu Road, Ilupeju, Lagos <br />
          Tel: 2349054644444 Email: info@mutualng.com <br />
          Website: www.mutualng.com
        </p>
      </div>
      <div class="font-weight-bold p-3 border border-dark">
        <h2 class="text-center"><u>PROPOSAL FORM FOR MOTOR INSURANCE</u></h2>
        <p>
          IMPORTANT INFORMATION: <br />
          1. An agent who assists an applicant to complete an application or
          proposal form for insurance shall be deemed to have done so as the
          agent of the applicant in accordance with section 54(2), Insurance
          Act, 2003. <br />
          2. The liability of the company does not commence until this
          application is accepted and the premium is paid in accordance with
          section 50(1) of Insurance Act, 2003
        </p>
      </div>

      <form
        class="mt-3"
        method="post"
        action="<?php echo $_SERVER['PHP_SELF']; ?>"
        enctype="multipart/form-data"
      >
        <div class="form-group">
          <label for="">Name of firm/institution</label>
          <input
            type="text"
            class="form-control"
            name="name_of_firm"
            placeholder=""
          />
        </div>
        <div class="form-group">
          <label for="">Operating Business Address</label>
          <input
            type="text"
            class="form-control"
            name="address"
            placeholder="233 Ikorodu Road"
          />
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Town</label>
            <input
              type="text"
              class="form-control"
              name="town"
              placeholder="Ilupeju"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">City</label>
            <input
              type="text"
              class="form-control"
              name="city"
              placeholder="Lagos Mainland"
            />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">State</label>
            <input
              type="text"
              class="form-control"
              name="state"
              placeholder="Lagos"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Country</label>
            <input
              type="text"
              class="form-control"
              name="country"
              placeholder="Nigeria"
            />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Incorporation/Registration Number</label>
            <input type="text" class="form-control" name="reg_num" />
          </div>
          <div class="form-group col-md-6">
            <label for="">Date Incorporated/Registered</label>
            <input type="date" name="reg_date" class="form-control" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">State of Incorporation/Registration</label>
            <input type="text" class="form-control" name="reg_state" />
          </div>
          <div class="form-group col-md-6">
            <label for="">Country of Incorporation</label>
            <input type="text" class="form-control" name="reg_country" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Operating Business Phone</label>
            <input
              type="text"
              class="form-control"
              name="business_phone"
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
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">FAX (if available)</label>
            <input type="text" class="form-control" name="fax" />
          </div>
          <div class="form-group col-md-6">
            <label for="">URL (if available)</label>
            <input
              type="text"
              class="form-control"
              name="url"
              placeholder="www.mutualng.com"
            />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Tax Identification Number (TIN)</label>
            <input type="text" class="form-control" name="tin" placeholder="" />
          </div>
          <div class="form-group col-md-6">
            <label for="">Bank Verification Number (BVN)</label>
            <input type="text" class="form-control" name="bvn" placeholder="" />
          </div>
        </div>
        <!-- <div class="form-group">
          <label for="">Tax Identification Number (TIN)</label>
          <input
            type="text"
            class="form-control"
            
            placeholder=""
          />
        </div> -->
        <!-- <div class="form-group">
          <label for="">Bank Verification Number (BVN)</label>
          <input
            type="text"
            class="form-control"
            
            placeholder=""
          />
        </div> -->
        <div class="form-group">
          <label for="">Risk location Address (if applicable)</label>
          <textarea
            class="form-control"
            name="risk_address"
            rows="2"
          ></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Type of Cover</label>
            <input type="text" class="form-control" name="cover_type" />
          </div>
          <div class="form-group col-md-6">
            <label for="">Period of Cover</label>
            <input type="text" class="form-control" name="cover_period" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Value of property/cover/insurance</label>
            <input
              type="text"
              class="form-control"
              name="property_value"
              placeholder=""
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Beneficiary (Payee of claims if materialized)</label>
            <input
              type="text"
              class="form-control"
              name="beneficiary"
              placeholder=""
            />
          </div>
        </div>
        <!-- <div class="form-group">
          <label for="">Value of property/cover/insurance</label>
          <input
            type="text"
            class="form-control"
            
            placeholder=""
          />
        </div> -->
        <!-- <div class="form-group">
          <label for=""
            >Beneficiary (Payee of claims if materialized)</label
          >
          <input
            type="text"
            class="form-control"
            
            placeholder=""
          />
        </div> -->
        <div class="form-group">
          <label for="">Other existing policy (ies) if applicable</label>
          <input
            type="text"
            class="form-control"
            name="other_policy"
            placeholder=""
          />
        </div>
        <h6>DETAILS OF DIRECTORS/PRINCIPAL OFFICERS</h6>
        <h6>DIRECTOR/PRINCIPAL 1</h6>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="dir_name_one" />
          </div>
          <div class="form-group col-md-3">
            <label for="">Designation</label>
            <input type="text" class="form-control" name="dir_desig_one" />
          </div>
          <div class="form-group col-md-3">
            <label for="">Telephone</label>
            <input type="text" class="form-control" name="dir_tel_one" />
          </div>
          <div class="form-group col-md-3">
            <label for="">%Holding</label>
            <input type="text" class="form-control" name="dir_hold_one" />
          </div>
        </div>
        <h6>DIRECTOR/PRINCIPAL 2</h6>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="dir_name_two" />
          </div>
          <div class="form-group col-md-3">
            <label for="">Designation</label>
            <input type="text" class="form-control" name="dir_desig_two" />
          </div>
          <div class="form-group col-md-3">
            <label for="">Telephone</label>
            <input type="text" class="form-control" name="dir_tel_two" />
          </div>
          <div class="form-group col-md-3">
            <label for="">%Holding</label>
            <input type="text" class="form-control" name="dir_hold_two" />
          </div>
        </div>
        <h6>DIRECTOR/PRINCIPAL 3</h6>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="dir_name_three" />
          </div>
          <div class="form-group col-md-3">
            <label for="">Designation</label>
            <input type="text" class="form-control" name="dir_desig_three" />
          </div>
          <div class="form-group col-md-3">
            <label for="">Telephone</label>
            <input type="text" class="form-control" name="dir_tel_three" />
          </div>
          <div class="form-group col-md-3">
            <label for="">%Holding</label>
            <input type="text" class="form-control" name="dir_hold_three" />
          </div>
        </div>
        <h6>KINDLY ATTACH THE FOLLOWING DOCUMENTS</h6>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Certificate of Incorporation</label>
            <input type="file" class="form-control-file" name="inc_cert" />
          </div>
          <div class="form-group col-md-4">
            <label for="">Memorandum & Articles of Association</label>
            <input type="file" class="form-control-file" name="memo" />
          </div>
          <div class="form-group col-md-4">
            <label for="">CAC Forms CO2 & CO7</label>
            <input type="file" class="form-control-file" name="cac" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Proof of Address/Utility bill </label>
            <input
              type="file"
              class="form-control-file"
              name="proof_of_address"
            />
          </div>
          <div class="form-group col-md-4">
            <label for="">Valid means of Identification (Director One)</label>
            <input
              type="file"
              class="form-control-file"
              name="valid_director_one"
            />
          </div>
          <div class="form-group col-md-4">
            <label for="">Valid means of Identification (Director Two)</label>
            <input
              type="file"
              class="form-control-file"
              name="valid_director_two"
            />
          </div>
        </div>
        <h6>RISK DETAILS</h6>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Registration Number</label>
            <input type="text" class="form-control" name="risk_reg_num" />
          </div>
          <div class="form-group col-md-4">
            <label for="">Make of Vehicle</label>
            <input type="text" class="form-control" name="vehicle_make" />
          </div>
          <div class="form-group col-md-4">
            <label for="">Chassis Number</label>
            <input type="text" class="form-control" name="chassis_number" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Engine Number</label>
            <input type="text" class="form-control" name="engine_num" />
          </div>
          <div class="form-group col-md-6">
            <label for="">Value</label>
            <input type="text" class="form-control" name="value" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Vehicle Type</label>
            <select class="form-control" name="vehicle_type">
              <option value="private_motor">Private Motor</option>
              <option value="Commercial Vehicle - Own Goods"
                >Commercial Vehicle - Own Goods</option
              >
              <option value="Commercial Vehicle - Bus"
                >Commercial Vehicle - Bus</option
              >
              <option value="Commercial Vehicle - Gen. Cartage"
                >Commercial Vehicle - Gen. Cartage</option
              >
              <option value="Motor Cycle">Motor Cycle</option>
              <option value="Commercial Vehicle - Special Type"
                >Commercial Vehicle - Special Type</option
              >
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">Cover Required</label>
            <select class="form-control" name="cover_required">
              <option value="Comprehensive">Comprehensive</option>
              <option value="Third Party Fire & Theft"
                >Third Party Fire & Theft</option
              >
              <option value="Third Party Only">Third Party Only</option>
            </select>
          </div>
        </div>
        <!-- <div class="form-group">
          <label for="exampleFormControlSelect1">Vehicle Type</label>
          <select class="form-control">
            <option>Private Motor</option>
            <option>Commercial Vehicle - Own Goods</option>
            <option>Commercial Vehicle - Bus</option>
            <option>Commercial Vehicle - Gen. Cartage</option>
            <option>Motor Cycle</option>
            <option>Commercial Vehicle - Special Type</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Cover Required</label>
          <select class="form-control">
            <option>Comprehensive</option>
            <option>Third Party Fire & Theft</option>
            <option>Third Party Only</option>
          </select>
        </div> -->
        <h6>PERIOD OF INSURANCE</h6>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">From</label>
            <input type="date" name="period_from" class="form-control" />
          </div>
          <div class="form-group col-md-6">
            <label for="">To</label>
            <input type="date" name="period_to" class="form-control" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Name of proposer</label>
            <input
              type="text"
              class="form-control"
              name="proposer_name"
              placeholder="Enter name of proposer"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Signature of proposer</label>
            <input type="file" class="form-control-file" name="proposer_sign" />
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
