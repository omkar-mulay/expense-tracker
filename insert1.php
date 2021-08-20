<?php

// Include config file
require_once "config.php";

// Initialize the session
session_start();
$sql = ""; 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//Check if form was submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Check if file was uploaded without errors
  // if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){

      $cur_date = date("Y-m-d");
      $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
      $file_path1 = "";
      $file_path2 = "";
      $file_path3 = "";
      $file_path4 = "";
      $file_path5 = "";
      $file_path6 = "";
      $file_path7 = "";
      $file_path8 = "";
      $file_path9 = "";
      $file_path10 = "";
      $file_path11 = "";
      $file_path12 = "";
      $file_path13 = "";
      $file_path14 = "";

      $filename1 = $_FILES["travelling"]["name"];
      $filename2 = $_FILES["conveyance"]["name"];
      $filename3 = $_FILES["food_allowance"]["name"];
      $filename4 = $_FILES["printing_stationary"]["name"];
      $filename5 = $_FILES["mobile_telephone"]["name"];
      $filename6 = $_FILES["medical"]["name"];
      $filename7 = $_FILES["laundry"]["name"];
      $filename8 = $_FILES["lodging"]["name"];
      $filename9 = $_FILES["advance"]["name"];
      $filename10 = $_FILES["purchase_of_tools"]["name"];
      $filename11 = $_FILES["toll"]["name"];
      $filename12 = $_FILES["miscellaneous"]["name"];
      $filename13 = $_FILES["inward_freight"]["name"];
      $filename14 = $_FILES["outward_freight"]["name"];

      $filetype = $_FILES["travelling"]["type"];
      $filesize = $_FILES["travelling"]["size"];
      
      $din = $_POST["din"];
      $cust_name = $_POST["cust_name"];
      $start_date = $_POST["start_date"];
      $end_date = $_POST["end_date"];
      $travelling = $_POST["travelling"];
      $conveyance = $_POST["conveyance"];
      $food_allowance = $_POST["food_allowance"];
      $printing_stationary = $_POST["printing_stationary"];
      $mobile_telephone = $_POST["mobile_telephone"];
      $medical = $_POST["medical"];
      $laundry = $_POST["laundry"];
      $lodging = $_POST["lodging"];
      $advance = $_POST["advance"];
      $purchase_of_tools = $_POST["purchase_of_tools"];
      $toll = $_POST["toll"];
      $miscellaneous = $_POST["miscellaneous"];
      $inward_freight = $_POST["inward_freight"];
      $outward_freight = $_POST["outward_freight"];

      if ($_FILES['travelling']['size'] != 0)
      {
          $file_path1 = "uploads/img1_".$din."_".$cust_name."_".$cur_date."_travelling.jpeg";
      }

      if ($_FILES['conveyance']['size'] != 0)
      {
          $file_path2 = "uploads/img2_".$din."_".$cust_name."_".$cur_date."_conveyance.jpeg";
      }

      if ($_FILES['food_allowance']['size'] != 0)
      {
          $file_path3 = "uploads/img3_".$din."_".$cust_name."_".$cur_date."_food_allowance.jpeg";
      }

      if ($_FILES['printing_stationary']['size'] != 0)
      {
          $file_path4 = "uploads/img4_".$din."_".$cust_name."_".$cur_date."_printing_stationary.jpeg";
      }
      if ($_FILES['mobile_telephone']['size'] != 0)
      {
          $file_path5 = "uploads/img5_".$din."_".$cust_name."_".$cur_date."_mobile_telephone.jpeg";
      }
      if ($_FILES['medical']['size'] != 0)
      {
          $file_path6 = "uploads/img6_".$din."_".$cust_name."_".$cur_date."_medical.jpeg";
      }
      if ($_FILES['laundry']['size'] != 0)
      {
          $file_path7 = "uploads/img7_".$din."_".$cust_name."_".$cur_date."_laundry.jpeg";
      }
      if ($_FILES['lodging']['size'] != 0)
      {
          $file_path8 = "uploads/img8_".$din."_".$cust_name."_".$cur_date."_lodging.jpeg";
      }
      if ($_FILES['advance']['size'] != 0)
      {
          $file_path9 = "uploads/img9_".$din."_".$cust_name."_".$cur_date."_advance.jpeg";
      }
      if ($_FILES['purchase_of_tools']['size'] != 0)
      {
          $file_path10 = "uploads/img10_".$din."_".$cust_name."_".$cur_date."_purchase_of_tools.jpeg";
      }
      if ($_FILES['toll']['size'] != 0)
      {
          $file_path11 = "uploads/img11_".$din."_".$cust_name."_".$cur_date."_toll.jpeg";
      }
      if ($_FILES['miscellaneous']['size'] != 0)
      {
          $file_path12 = "uploads/img12_".$din."_".$cust_name."_".$cur_date."_miscellaneous.jpeg";
      }
      if ($_FILES['inward_freight']['size'] != 0)
      {
          $file_path13 = "uploads/img13_".$din."_".$cust_name."_".$cur_date."_inward_freight.jpeg";
      }
      if ($_FILES['outward_freight']['size'] != 0)
      {
          $file_path14 = "uploads/img14_".$din."_".$cust_name."_".$cur_date."_outward_freight.jpeg";
      }



      $username = $_SESSION["username"];
      
      
      
      
      $sql = "INSERT INTO trips (din, cust_name, start_date, end_date, travelling, img_path1, conveyance, img_path2, food_allowance, img_path3, 
      printing_stationary, img_path4, mobile_telephone, img_path5, medical, img_path6, laundry, img_path7, lodging, img_path8, advance, img_path9, 
      purchase_of_tools, img_path10, toll, img_path11, miscellaneous, img_path12, inward_freight, img_path13, outward_freight, img_path14, created_by) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?)";
      

      if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        
        mysqli_stmt_bind_param($stmt, "isssisisisisisisisisisisisisisiss", $param_din, $param_cust_name, $param_start_date, $param_end_date, 
        $param_travelling, $param_img_path1, $param_conveyance, $param_img_path2, $param_food_allowance, $param_img_path3, 
        $param_printing_stationary, $param_img_path4, $param_mobile_telephone, $param_img_path5, $param_medical, $param_img_path6, 
        $param_laundry, $param_img_path7, $param_lodging, $param_img_path8, $param_advance, $param_img_path9, 
        $param_purchase_of_tools, $param_img_path10, $param_toll, $param_img_path11, $param_miscellaneous, $param_img_path12, 
        $param_inward_freight, $param_img_path13, $param_outward_freight, $param_img_path14, $param_created_by);
        
        
        //echo "$end_date";

        // Set parameters
        $param_din = $din;
        $param_cust_name = $cust_name;
        $param_start_date = $start_date;
        $param_end_date = $end_date;

        $param_travelling = $travelling;
        $param_img_path1 = $file_path1;

        $param_conveyance = $conveyance;
        $param_img_path2 = $file_path2;
        
        $param_food_allowance = $food_allowance;
        $param_img_path3 = $file_path3;

        $param_printing_stationary = $printing_stationary;
        $param_img_path4 = $file_path4;

        $param_mobile_telephone = $mobile_telephone;
        $param_img_path5 = $file_path5;

        $param_medical = $medical;
        $param_img_path6 = $file_path6;
        
        $param_laundry = $laundry;
        $param_img_path7 = $file_path7;
        
        $param_lodging = $lodging;
        $param_img_path8 = $file_path8;
        
        $param_advance = $advance;
        $param_img_path9 = $file_path9;
        
        $param_purchase_of_tools = $purchase_of_tools;
        $param_img_path10 = $file_path10;
        
        $param_toll = $toll;
        $param_img_path11 = $file_path11;
        
        $param_miscellaneous = $miscellaneous;
        $param_img_path12 = $file_path12; 
        
        $param_inward_freight = $inward_freight;
        $param_img_path13 = $file_path13;
        
        $param_outward_freight = $outward_freight;
        $param_img_path14 = $file_path14; 
        
        $param_created_by = $username;
        

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Redirect to login page
            //echo "Reached here 2nd";
            
              // Check whether file exists before uploading it
              //Check for directory inside uploads folder with the DIN no.
              // $chk_dir = "uploads/".$din;
              //     if(!is_dir("$chk_dir")){
                    
              //       chdir("uploads");
              //       mkdir("$din");
                    
              //       chdir("..");
                    
                                 
                    move_uploaded_file($_FILES["travelling"]["tmp_name"], "uploads/img1_".$din."_".$cust_name."_".$cur_date."_travelling.jpeg");


                    move_uploaded_file($_FILES["conveyance"]["tmp_name"], "uploads/img2_".$din."_".$cust_name."_".$cur_date."_conveyance.jpeg");
                    move_uploaded_file($_FILES["food_allowance"]["tmp_name"], "uploads/img3_".$din."_".$cust_name."_".$cur_date."_food_allowance.jpeg");
                    move_uploaded_file($_FILES["printing_stationary"]["tmp_name"], "uploads/img4_".$din."_".$cust_name."_".$cur_date."_printing_stationary.jpeg");
                    move_uploaded_file($_FILES["mobile_telephone"]["tmp_name"], "uploads/img5_".$din."_".$cust_name."_".$cur_date."_mobile_telephone.jpeg");
                    move_uploaded_file($_FILES["medical"]["tmp_name"], "uploads/img6_".$din."_".$cust_name."_".$cur_date."_medical.jpeg");
                    move_uploaded_file($_FILES["laundry"]["tmp_name"], "uploads/img7_".$din."_".$cust_name."_".$cur_date."_laundry.jpeg");
                    move_uploaded_file($_FILES["lodging"]["tmp_name"], "uploads/img8_".$din."_".$cust_name."_".$cur_date."_lodging.jpeg");
                    move_uploaded_file($_FILES["advance"]["tmp_name"], "uploads/img9_".$din."_".$cust_name."_".$cur_date."_advance.jpeg");
                    move_uploaded_file($_FILES["purchase_of_tools"]["tmp_name"], "uploads/img10_".$din."_".$cust_name."_".$cur_date."_purchase_of_tools.jpeg");
                    move_uploaded_file($_FILES["toll"]["tmp_name"], "uploads/img11_".$din."_".$cust_name."_".$cur_date."_toll.jpeg");
                    move_uploaded_file($_FILES["miscellaneous"]["tmp_name"], "uploads/img12_".$din."_".$cust_name."_".$cur_date."_miscellaneous.jpeg");
                    move_uploaded_file($_FILES["inward_freight"]["tmp_name"], "uploads/img13_".$din."_".$cust_name."_".$cur_date."_inward_freight.jpeg");
                    move_uploaded_file($_FILES["outward_freight"]["tmp_name"], "uploads/img14_".$din."_".$cust_name."_".$cur_date."_outward_freight.jpeg");

                    //header("location: welcome.php");
                                       

                  // }
                  // else{ 
                    
                  //   move_uploaded_file($_FILES["travelling"]["tmp_name"], "uploads/".$din."/" . $filename1);
                  //   move_uploaded_file($_FILES["conveyance"]["tmp_name"], "uploads/".$din."/" . $filename2);
                    
                  // }
                  //echo "Your file was uploaded successfully."

        } else{
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
      }
      else
      {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }



      // Verify file extension
      // $ext = pathinfo($filename, PATHINFO_EXTENSION);
      // if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
  
  
      // Verify MYME type of the file
      
   
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif;  }
    </style>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["first_name"]); ?></b>. Welcome!</h1>
    </div>  
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    
  <br/>
  <br/>
      <a href="welcome.php" class="btn btn-primary">Go to Home</a>
    </p>
      <br/>
      <br/>
      
<?php 
    if($sql){ 
    echo "<div class='alert alert-success' role='alert'/>";
    echo "Success! Data inserted successfully.";
    echo "</div>";
    }
?>
<div class="col-md-8 order-md-1">
          <h4 class="mb-3">Trip expenses</h4>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-6 mb-3">
                <label  for="din">Din No.</label>
                <input type="text" name="din" class="form-control" id="din" placeholder="Din No" value="" required>
                <div class="invalid-feedback">
                  Valid din no is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cust_name">Customer Name</label>
                <input type="text" name="cust_name" class="form-control" id="cust_name" placeholder="Customer Name" value="" required>
                <div class="invalid-feedback">
                  Valid customer name is required.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="start_date">Start date</label>
                <input type="date" name="start_date" class="form-control" id="start_date" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid  date_format is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="end_date">End date</label>
                <input type="date" name="end_date" class="form-control" id="end_date" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid date_format is required.
                </div>
              </div>
            </div>

            <!-- Travelling and conveyance upload -->

            
              
            <label for="travelling">Travelling</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="travelling" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="travelling" id="travelling" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <label for="conveyance">Conveyance</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="conveyance" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="conveyance" id="conveyance" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>
            
            <!-- Food allowance and printing -->

            <label for="food_allowance">Food Allowance</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="food_allowance" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="food_allowance" id="food_allowance" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <label for="printing_stationary">Printing and Stationary</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="printing_stationary" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="printing_stationary" id="printing_stationary" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>  
            
            <!-- Mobile/telephone and Medical -->

            <label for="mobile_telephone">Mobile/telephone</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="mobile_telephone" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="mobile_telephone" id="mobile_telephone" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <label for="medical">Medical</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="medical" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="medical" id="medical" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>
            
            <!-- Laundry and Lodging -->

            <label for="laundry">Laundry</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="laundry" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="laundry" id="laundry" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <label for="lodging">Lodging</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="lodging" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="lodging" id="lodging" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <!-- Advance and purchase of tools -->

            <label for="advance">Advance</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="advance" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="advance" id="advance" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <label for="purchase_of_tools">Purchase of Tools</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="purchase_of_tools" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="purchase_of_tools" id="purchase_of_tools" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <!-- Toll and miscellaneous -->

            <label for="toll">Toll</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="toll" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="toll" id="toll" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <label for="miscellaneous">Miscellaneous</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="miscellaneous" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="miscellaneous" id="miscellaneous" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>

            <!-- Inward and Outward freight -->

            <label for="inward_freight">Inward Freight</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="inward_freight" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="inward_freight" id="inward_freight" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>           
            
            <label for="outward_freight">Outward Freight</label>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <input type="text" name="outward_freight" class="form-control" placeholder="Rs">
              </div>
              <div class="col-md-6 mb-3">
                <input type="file" name="outward_freight" id="outward_freight" class="form-control"  placeholder="" value="">
                <div class="invalid-feedback"> 
                  Valid  date_format is required.
                </div>
              </div>  
            </div>
            
            <input type="submit" class="btn btn-primary" value="Submit">          
          </form>    
</div>        
</div>

</body>
</html>