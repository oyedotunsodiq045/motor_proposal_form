<?php

  include 'config/database.php';

  // Message Vars
  $msg = '';
  $msgClass = '';

  // Check For Submit
  if ($_POST) {

    // Check Require Fields
    if (!empty($name_of_proposer) && !empty($address) && !empty($registration_number) && !empty($vehicle_make) && !empty($vehicle_colour) && !empty($chassis_number) && !empty($engine_number) && !empty($body_type) && !empty($manufacture_year) && !empty($speedometer_reading) && !empty($estimate_value) && !empty($accessory_value) && !empty($anti_theft) && !empty($previous_damage) && !empty($inspection_time) && !empty($remarks) && !empty($inspector_name) && !empty($insured_name) && !empty($inspection_location)) {

      try {
        // insert query
        $query = "INSERT INTO motor_vehicle_inspection_form SET name_of_proposer=:name_of_proposer, address=:address, registration_number=:registration_number, vehicle_make=:vehicle_make, vehicle_colour=:vehicle_colour, chassis_number=:chassis_number, engine_number=:engine_number, body_type=:body_type, manufacture_year=:manufacture_year, speedometer_reading=:speedometer_reading, estimate_value=:estimate_value, accessory_value=:accessory_value, anti_theft=:anti_theft, previous_damage=:previous_damage, inspection_time=:inspection_time, remarks=:remarks, inspector_name=:inspector_name, insured_name=:insured_name, date=:date, inspection_location=:inspection_location";
  
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
        $inspection_location = htmlspecialchars(strip_tags($_POST['inspection_location']));
              
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
        $stmt->bindParam(':inspection_location', $inspection_location);
                    
        // specify when this record was inserted to the database
        $date = date('Y-m-d H:i:s');
        $stmt->bindParam(':date', $date);
                    
        // Execute the query
        if ($stmt->execute()) {
          // Successful
          $msg = 'Form submitted successfully';
          $msgClass = 'alert-success';
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

      <form class="mt-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h6>PERSONAL DATA</h6>
        <div class="form-group">
          <label for="">Name of Proposer</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="name_of_proposer"
            value="<?php echo isset($_POST['name_of_proposer']) ? $name_of_proposer : ''; ?>"
            placeholder="Enter name of proposer"
          />
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="address"
            value="<?php echo isset($_POST['address']) ? $address : ''; ?>"
            placeholder="233 Ikorodu Road"
          />
        </div>
        <h6>PARTICULARS OF VEHICLE TO BE INSURED</h6>
        <div class="form-group">
          <label for="">Registration Number</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="registration_number"
            value="<?php echo isset($_POST['registration_number']) ? $registration_number : ''; ?>"
            placeholder="Enter registration number"
          />
        </div>
        <div class="form-group">
          <label for="">Make of vehicle</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="vehicle_make"
            value="<?php echo isset($_POST['vehicle_make']) ? $vehicle_make : ''; ?>"
            placeholder="Enter make of vehicle"
          />
        </div>
        <div class="form-group">
          <label for="">Colour of vehicle</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="vehicle_colour"
            value="<?php echo isset($_POST['vehicle_colour']) ? $vehicle_colour : ''; ?>"
            placeholder="Enter colour of vehicle"
          />
        </div>
        <div class="form-group">
          <label for="">Chassis No</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="chassis_number"
            value="<?php echo isset($_POST['chassis_number']) ? $chassis_number : ''; ?>"
            placeholder="Enter chassis number"
          />
        </div>
        <div class="form-group">
          <label for="">Engine No</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="engine_number"
            value="<?php echo isset($_POST['engine_number']) ? $engine_number : ''; ?>"
            placeholder="Enter engine number"
          />
        </div>
        <div class="form-group">
          <label for="">Type of body</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="body_type"
            value="<?php echo isset($_POST['body_type']) ? $body_type : ''; ?>"
            placeholder="Enter type of body"
          />
        </div>
        <div class="form-group">
          <label for="">Year of manufacture</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="manufacture_year"
            value="<?php echo isset($_POST['manufacture_year']) ? $manufacture_year : ''; ?>"
            placeholder="Enter year of manufacture"
          />
        </div>
        <div class="form-group">
          <label for="">Speedometer Reading</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="speedometer_reading"
            value="<?php echo isset($_POST['speedometer_reading']) ? $speedometer_reading : ''; ?>"
            placeholder="Enter speedometer reading"
          />
        </div>
        <div class="form-group">
          <label for="">Estimate of Present Value</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="estimate_value"
            value="<?php echo isset($_POST['estimate_value']) ? $estimate_value : ''; ?>"
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
            id=""
            name="accessory_value"
            value="<?php echo isset($_POST['accessory_value']) ? $accessory_value : ''; ?>"
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
            id=""
            name="anti_theft"
            value="<?php echo isset($_POST['anti_theft']) ? $anti_theft : ''; ?>"
            placeholder=""
          />
        </div>
        <div class="form-group">
          <label for=""
            >Any evidence of previous damage/accident</label
          >
          <input
            type="text"
            class="form-control"
            id=""
            name="previous_damage"
            value="<?php echo isset($_POST['previous_damage']) ? $previous_damage : ''; ?>"
            placeholder=""
          />
        </div>
        <div class="form-group">
          <label for="">The exact time of inspection</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="inspection_time"
            value="<?php echo isset($_POST['inspection_time']) ? $inspection_time : ''; ?>"
            placeholder="Enter exact time of inspection"
          />
        </div>
        <h6>SCOPE OF COVER REQUIRED</h6>
        <div class="form-group">
          <label for="">Remarks</label>
          <textarea
            class="form-control"
            id=""
            name="remarks"
            rows="2"
          ><?php echo isset($_POST['remarks']) ? $remarks : ''; ?></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Inspector’s Name</label>
            <input 
              type="text" 
              class="form-control" 
              id="" 
              name="inspector_name" 
              value="<?php echo isset($_POST['inspector_name']) ? $inspector_name : ''; ?>" 
              placeholder="Enter inspector's name"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Insured’s Name</label>
            <input 
              type="text" 
              class="form-control" 
              id=""
              name="insured_name"
              value="<?php echo isset($_POST['insured_name']) ? $insured_name : ''; ?>" 
              placeholder="Enter insured's name"
            />
          </div>
        </div>
        <!-- <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Inspector’s Signature</label>
            <input
              type="file"
              class="form-control-file"
              id=""
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Insured’s Signature</label>
            <input
              type="file"
              class="form-control-file"
              id=""
            />
          </div>
        </div> -->
        <!-- <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Date</label>
            <input
              type="date"
              class="form-control"
              id=""
              name="date"
              value="" 
              placeholder="Enter date"
            />
          </div>
        </div> -->
        <!-- <div class="form-group">
          <label for="">Date</label>
          <input
            type="date"
            class="form-control"
            id=""
            name="date"
            value="" 
            placeholder="Enter date"
          />
        </div> -->
        <div class="form-group">
          <label for="">Location of Inspection</label>
          <input
            type="text"
            class="form-control"
            id=""
            name="inspection_location"
            value="<?php echo isset($_POST['inspection_location']) ? $inspection_location : ''; ?>" 
            placeholder="Enter location of inspection"
          />
        </div>
        <h6>
          NOTE: kindly attach pictures of the vehicle showing the four sides
          (front, back, left & right).
        </h6>
        <!-- <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Front</label>
            <input
              type="file"
              class="form-control-file"
              id=""
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Back</label>
            <input
              type="file"
              class="form-control-file"
              id=""
            />
          </div>
        </div> -->
        <!-- <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Left</label>
            <input
              type="file"
              class="form-control-file"
              id=""
            />
          </div>
          <div class="form-group col-md-6">
            <label for="">Right</label>
            <input
              type="file"
              class="form-control-file"
              id=""
            />
          </div>
        </div> -->
        <button type="submit" name="submit" class="mt-5 btn btn-primary btn-lg btn-block">
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
