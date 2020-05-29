<?php

  include 'config/database.php';

  // Message Vars
  $msg = '';
  $msgClass = '';

  // Check For Submit
  if ($_POST) {
  // if (isset($_POST["submit"])) {
    //   var_dump(isset($_POST['name_of_proposer']));
    //   exit();

    // Check Require Fields
    if (!empty($_POST['name_of_proposer']) && !empty($_POST['address']) && !empty($_POST['registration_number']) && !empty($_POST['vehicle_make']) && !empty($_POST['vehicle_colour']) && !empty($_POST['chassis_number']) && !empty($_POST['engine_number']) && !empty($_POST['body_type']) && !empty($_POST['manufacture_year']) && !empty($_POST['speedometer_reading']) && !empty($_POST['estimate_value']) && !empty($_POST['accessory_value']) && !empty($_POST['anti_theft']) && !empty($_POST['previous_damage']) && !empty($_POST['inspection_time']) && !empty($_POST['remarks']) && !empty($_POST['inspector_name']) && !empty($_POST['insured_name']) && !empty($_POST['inspection_location'])) {

      try {
        // insert query
        $query = "INSERT INTO motor_vehicle_inspection_form SET name_of_proposer=:name_of_proposer, address=:address, registration_number=:registration_number, vehicle_make=:vehicle_make, vehicle_colour=:vehicle_colour, chassis_number=:chassis_number, engine_number=:engine_number, body_type=:body_type, manufacture_year=:manufacture_year, speedometer_reading=:speedometer_reading, estimate_value=:estimate_value, accessory_value=:accessory_value, anti_theft=:anti_theft, previous_damage=:previous_damage, inspection_time=:inspection_time, remarks=:remarks, inspector_name=:inspector_name, insured_name=:insured_name, inspector_sign=:inspector_sign, insured_sign=:insured_sign, date=:date, inspection_location=:inspection_location, vehicle_front=:vehicle_front, vehicle_back=:vehicle_back, vehicle_left=:vehicle_left, vehicle_right=:vehicle_right";
  
        // prepare query for execution
        $stmt = $con->prepare($query);
              
        // posted values
        $name_of_proposer = htmlspecialchars(strip_tags($_POST['name_of_proposer']));
        $address = htmlspecialchars(strip_tags($_POST['address']));
        $registration_number = htmlspecialchars(strip_tags($_POST['registration_number']));
        $vehicle_make = htmlspecialchars(strip_tags($_POST['vehicle_make']));
        $vehicle_colour = htmlspecialchars(strip_tags($_POST['vehicle_colour']));
        $chassis_number = htmlspecialchars(strip_tags($_POST['chassis_number']));
        $engine_number = htmlspecialchars(strip_tags($_POST['engine_number']));
        $body_type = htmlspecialchars(strip_tags($_POST['body_type']));
        $manufacture_year = htmlspecialchars(strip_tags($_POST['manufacture_year']));
        $speedometer_reading = htmlspecialchars(strip_tags($_POST['speedometer_reading']));
        $estimate_value = htmlspecialchars(strip_tags($_POST['estimate_value']));
        $accessory_value = htmlspecialchars(strip_tags($_POST['accessory_value']));
        $anti_theft = htmlspecialchars(strip_tags($_POST['anti_theft']));
        $previous_damage = htmlspecialchars(strip_tags($_POST['previous_damage']));
        $inspection_time = htmlspecialchars(strip_tags($_POST['inspection_time']));
        $remarks = htmlspecialchars(strip_tags($_POST['remarks']));
        $inspector_name = htmlspecialchars(strip_tags($_POST['inspector_name']));
        $insured_name = htmlspecialchars(strip_tags($_POST['insured_name']));
        // new 'image' field
        $inspector_sign=!empty($_FILES["inspector_sign"]["name"])
        ? sha1_file($_FILES['inspector_sign']['tmp_name']) . "-" . basename($_FILES["inspector_sign"]["name"])
        : "";
        $inspector_sign=htmlspecialchars(strip_tags($inspector_sign));
        // new 'image' field
        $insured_sign=!empty($_FILES["insured_sign"]["name"])
        ? sha1_file($_FILES['insured_sign']['tmp_name']) . "-" . basename($_FILES["insured_sign"]["name"])
        : "";
        $insured_sign=htmlspecialchars(strip_tags($insured_sign));
        $inspection_location = htmlspecialchars(strip_tags($_POST['inspection_location']));
        // new 'image' field
        $vehicle_front=!empty($_FILES["vehicle_front"]["name"])
        ? sha1_file($_FILES['vehicle_front']['tmp_name']) . "-" . basename($_FILES["vehicle_front"]["name"])
        : "";
        $vehicle_front=htmlspecialchars(strip_tags($vehicle_front));
        // new 'image' field
        $vehicle_back=!empty($_FILES["vehicle_back"]["name"])
        ? sha1_file($_FILES['vehicle_back']['tmp_name']) . "-" . basename($_FILES["vehicle_back"]["name"])
        : "";
        $vehicle_back=htmlspecialchars(strip_tags($vehicle_back));
        // new 'image' field
        $vehicle_left=!empty($_FILES["vehicle_left"]["name"])
        ? sha1_file($_FILES['vehicle_left']['tmp_name']) . "-" . basename($_FILES["vehicle_left"]["name"])
        : "";
        $vehicle_left=htmlspecialchars(strip_tags($vehicle_left));
        // new 'image' field
        $vehicle_right=!empty($_FILES["vehicle_right"]["name"])
        ? sha1_file($_FILES['vehicle_right']['tmp_name']) . "-" . basename($_FILES["vehicle_right"]["name"])
        : "";
        $vehicle_right=htmlspecialchars(strip_tags($vehicle_right));
              
        // bind the parameters
        $stmt->bindParam(':name_of_proposer', $name_of_proposer);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':registration_number', $registration_number);
        $stmt->bindParam(':vehicle_make', $vehicle_make);
        $stmt->bindParam(':vehicle_colour', $vehicle_colour);
        $stmt->bindParam(':chassis_number', $chassis_number);
        $stmt->bindParam(':engine_number', $engine_number);
        $stmt->bindParam(':body_type', $body_type);
        $stmt->bindParam(':manufacture_year', $manufacture_year);
        $stmt->bindParam(':speedometer_reading', $speedometer_reading);
        $stmt->bindParam(':estimate_value', $estimate_value);
        $stmt->bindParam(':accessory_value', $accessory_value);
        $stmt->bindParam(':anti_theft', $anti_theft);
        $stmt->bindParam(':previous_damage', $previous_damage);
        $stmt->bindParam(':inspection_time', $inspection_time);
        $stmt->bindParam(':remarks', $remarks);
        $stmt->bindParam(':inspector_name', $inspector_name);
        $stmt->bindParam(':insured_name', $insured_name);
        $stmt->bindParam(':inspector_sign', $inspector_sign);
        $stmt->bindParam(':insured_sign', $insured_sign);
        $stmt->bindParam(':inspection_location', $inspection_location);
        $stmt->bindParam(':vehicle_front', $vehicle_front);
        $stmt->bindParam(':vehicle_back', $vehicle_back);
        $stmt->bindParam(':vehicle_left', $vehicle_left);
        $stmt->bindParam(':vehicle_right', $vehicle_right);
                    
        // specify when this record was inserted to the database
        $date = date('Y-m-d H:i:s');
        $stmt->bindParam(':date', $date);
                    
        // Execute the query
        if ($stmt->execute()) {
          // Successful
          $msg = 'Form submitted successfully';
          $msgClass = 'alert-success';
          // now, if image is not empty, try to upload the image
          if($inspector_sign && $insured_sign){
          
              // sha1_file() function is used to make a unique file name
              $target_directory = "uploads/";
              $target_file_inspector_sign = $target_directory . $inspector_sign;
              $target_file_insured_sign   = $target_directory . $insured_sign;
              $target_file_vehicle_front  = $target_directory . $vehicle_front;
              $target_file_vehicle_back   = $target_directory . $vehicle_back;
              $target_file_vehicle_left   = $target_directory . $vehicle_left;
              $target_file_vehicle_right  = $target_directory . $vehicle_right;
              $file_type_inspector_sign = pathinfo($target_file_inspector_sign, PATHINFO_EXTENSION);
              $file_type_insured_sign   = pathinfo($target_file_insured_sign, PATHINFO_EXTENSION);
              $file_type_vehicle_front  = pathinfo($target_file_vehicle_front, PATHINFO_EXTENSION);
              $file_type_vehicle_back   = pathinfo($target_file_vehicle_back, PATHINFO_EXTENSION);
              $file_type_vehicle_left   = pathinfo($target_file_vehicle_left, PATHINFO_EXTENSION);
              $file_type_vehicle_right  = pathinfo($target_file_vehicle_right, PATHINFO_EXTENSION);
          
              // error message is empty
              $file_upload_error_messages="";

              // make sure that file is a real image
              $check_inspector_sign = getimagesize($_FILES["inspector_sign"]["tmp_name"]);
              $check_insured_sign   = getimagesize($_FILES["insured_sign"]["tmp_name"]);
              $check_vehicle_front  = getimagesize($_FILES["vehicle_front"]["tmp_name"]);
              $check_vehicle_back   = getimagesize($_FILES["vehicle_back"]["tmp_name"]);
              $check_vehicle_left   = getimagesize($_FILES["vehicle_left"]["tmp_name"]);
              $check_vehicle_right  = getimagesize($_FILES["vehicle_right"]["tmp_name"]);
              if($check_inspector_sign!==false && $check_insured_sign!==false && $check_vehicle_front!==false && $check_vehicle_back!==false && $check_vehicle_left!==false && $check_vehicle_right!==false){
                  // submitted file is an image
              }else{
                  $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
              }

              // make sure certain file types are allowed
              $allowed_file_types=array("jpg", "jpeg", "png", "gif");
              if(!in_array($file_type_inspector_sign, $allowed_file_types) && !in_array($file_type_insured_sign, $allowed_file_types) && !in_array($file_type_vehicle_front, $allowed_file_types) && !in_array($file_type_vehicle_back, $allowed_file_types) && !in_array($file_type_vehicle_left, $allowed_file_types) && !in_array($file_type_vehicle_right, $allowed_file_types)){
                  $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
              }

              // make sure file does not exist
              if(file_exists($target_file_inspector_sign) && file_exists($target_file_insured_sign) && file_exists($target_file_vehicle_front) && file_exists($target_file_vehicle_back) && file_exists($target_file_vehicle_left) && file_exists($target_file_vehicle_right)){
                  $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
              }

              // make sure submitted file is not too large, can't be larger than 1 MB
              if($_FILES['inspector_sign']['size'] > (1024000) && $_FILES['insured_sign']['size'] > (1024000) && $_FILES['vehicle_front']['size'] > (1024000) && $_FILES['vehicle_back']['size'] > (1024000) && $_FILES['vehicle_left']['size'] > (1024000) && $_FILES['vehicle_right']['size'] > (1024000)){
                  $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
              }

              // make sure the 'uploads' folder exists
              // if not, create it
              if(!is_dir($target_directory)){
                  mkdir($target_directory, 0777, true);
              }

              // if $file_upload_error_messages is still empty
              if(empty($file_upload_error_messages)){
                  // it means there are no errors, so try to upload the file
                  if(move_uploaded_file($_FILES["inspector_sign"]["tmp_name"], $target_file_inspector_sign) && move_uploaded_file($_FILES["insured_sign"]["tmp_name"], $target_file_insured_sign) && move_uploaded_file($_FILES["vehicle_front"]["tmp_name"], $target_file_vehicle_front) && move_uploaded_file($_FILES["vehicle_back"]["tmp_name"], $target_file_vehicle_back) && move_uploaded_file($_FILES["vehicle_left"]["tmp_name"], $target_file_vehicle_left) && move_uploaded_file($_FILES["vehicle_right"]["tmp_name"], $target_file_vehicle_right)){
                      // it means photo was uploaded
                  }else{
                      echo "<div class='alert alert-danger'>";
                          echo "<div>Unable to upload photo.</div>";
                          echo "<div>Update the record to upload photo.</div>";
                      echo "</div>";
                  }
              }
              
              // if $file_upload_error_messages is NOT empty
              else{
                  // it means there are some errors, so show them to user
                  echo "<div class='alert alert-danger'>";
                      echo "<div>{$file_upload_error_messages}</div>";
                      echo "<div>Update the record to upload photo.</div>";
                  echo "</div>";
              }
          
          }
        } else {
          // Failed
          $msg = 'Form not submitted';
          $msgClass = 'alert-danger';
        }
           
      } catch(PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
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

      <form class="mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <h6>PERSONAL DATA</h6>
        <div class="form-group">
          <label for="">Name of Proposer</label>
          <input
            type="text"
            class="form-control"
            name="name_of_proposer"
            placeholder="Enter name of proposer"
          />
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
          <label for=""
            >Any Security Alarm/Anti-theft device</label
          >
          <input
            type="text"
            class="form-control"
            name="anti_theft"
            placeholder="Yes or No"
          />
        </div>
        <div class="form-group">
          <label for=""
            >Any evidence of previous damage/accident</label
          >
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
          <textarea
            class="form-control"
            name="remarks"
            rows="2"
          ></textarea>
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
            <input
              type="file"
              class="form-control-file"
              name="insured_sign"
            />
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
            <input
              type="file"
              class="form-control-file"
              name="vehicle_front"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Back</label>
            <input
              type="file"
              class="form-control-file"
              name="vehicle_back"
            />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Left</label>
            <input
              type="file"
              class="form-control-file"
              name="vehicle_left"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Right</label>
            <input
              type="file"
              class="form-control-file"
              name="vehicle_right"
            />
          </div>
        </div>
        <button type="submit" name="submit" class="mt-5 btn btn-primary btn-lg btn-block">
          Submit
        </button>
      </form>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>