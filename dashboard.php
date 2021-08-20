<?php

// Include config file
require_once "config.php";

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
elseif($_SESSION["designation"] == "Client"){
header("location: login.php");
exit;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link href='insu_form/css/datepicker.min.css' rel='stylesheet' type='text/css'>
 <link href='insu_form/js/bootstrap-datepicker.min.js' rel='stylesheet' type='text/css'>


    <style type="text/css">
        a{ color: black; }
        
    </style>

</head>
<body>
    

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
      <!-- <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="M Square"> -->
      M Square
      </a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="add_user.php">
                  <span data-feather="users"></span>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  IOT
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li> -->
            </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul> -->
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <!-- <button class="btn btn-sm btn-outline-secondary">Share</button> -->
                <form action="export_csv.php" method="post">
                   <input type="submit" name= "export" value="Export" class="btn btn-sm btn-outline-secondary">
                </form>
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button> -->
            </div>
          </div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

 <div class="form-group required">
  <div class="row">
           
            <div class="col-sm-12">
               <label >Select How to Search </label>
                <select required aria-required="true" name="choice" id="choice" class="fe_1" >
                      <option value="" selected="selected" disabled="">Select </option>
                        <option value="name">Username </option>
                        <option value="date">Date</option>
                                           
                    </select>  
                  </div>
                     
                        <div class="form-group required col-sm-8" id="name">
            <label class="control-label" >Enter User Name</label>
          
              <input type="text" name="name"  id="name"   class="form-control" />
           
          </div>
              <div class="form-group required col-sm-8" id="date">
            <label class="control-label" >Select Start date</label>
          
             <input type="datepicker" autocomplete="off" name="datepicker" id="datepicker" style="font-size: larger;border-color: black;" value="">
             <br>
             <label class="control-label" >Select End date</label>
          
             <input type="datepicker" autocomplete="off" name="datepicker1" id="datepicker1" style="font-size: larger;border-color: black;" value="">
                            
          </div>
                     
             <div class="col-md-12">
            <input type="submit" value=" Get Record" name="submit">
          </div>   
          </div>
          </div>


             </form>    
            </div>

          <!-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas> -->
        
       <?php 
   include_once('config.php');  
   date_default_timezone_set("Asia/Calcutta");
      if (isset($_POST["submit"])) {
    $from = addslashes(strip_tags($_POST['datepicker']));
    $to = addslashes(strip_tags($_POST['datepicker1']));
    $name = addslashes(strip_tags($_POST['name']));
     ?> <br>

         <?php
    
    //$sql = "SELECT * FROM `servicepan` WHERE (status1='1' OR status1='0') AND `datee` BETWEEN '$from' AND '$to' order by receipt1 desc";  
    if(empty($name)){
      $sql = "SELECT * FROM `trips` WHERE `start_date` BETWEEN '$from' AND '$to' ORDER BY `id` DESC";
      
      }else{
      $sql = "SELECT * FROM `trips` WHERE `created_by` = '$name' ORDER BY `id` DESC"; 
  
    }
    
    
      $result = $link->query($sql);
    
 
      if ($result->num_rows > 0) {
          
         
      // output data of each row
       
      ?>

            <div class="table-scrollable">
<div style="overflow: scroll; width: 100%;">
      <table class="table table-striped table-bordered table-hover styles" width="100%" height="100" align="center" border="2" style="background-color: white;">
            <thead>
              
        <th style="padding:18px;" width="111" height="55" ><center><font color ="green">Din</font></center></th>
        <th style="padding:18px;" width="111" height="55" ><center><font color ="green">Customer name</font></center></th>
        <th style="padding:16px;"width="106" align="center"><center><font color ="green">Start date</font></center></th>
                <!--<th style="padding:16px;"width="98"  align="center"><center><font color ="green">Cash Type</font></center></th>-->
         <th style="padding:16px;"width="106"  align="center"><center><font color ="green">End date</font></center></th>
         
         <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Travelling</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Travelling Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Travelling Image</font></center></th>

        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Conveyance</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Conveyance Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Conveyance Image</font></center></th>
        
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Food Allowance</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Food Allowance Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Food Allowance Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Printing and Stationary</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Printing and Stationary Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Printing and Stationary Image</font></center></th>

        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Mobile/telephone</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Mobile/telephone Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Mobile/telephone Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Medical</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Medical Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Medical Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Laundry</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Laundry Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Laundry Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Lodging</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Lodging Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Lodging Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Advance</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Advance Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Advance Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Purchase of tools</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Purchase of tools Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Purchase of tools Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Toll</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Toll Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Toll Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Miscellaneous</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Miscellaneous Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Miscellaneous Image</font></center></th>
         
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Inward Freight</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Inward Freight Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Inward Freight Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Outward Freight</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Outward Freight Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Outward Freight Image</font></center></th>

        <th style="padding:18px;" width="111" height="55" ><center><font color ="green">Created at</font></center></th>
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Created by</font></center></th>
             </thead>
      <?php 
      while($row = $result->fetch_assoc()){
        $table_array[] = array($row['id'], $row['din'], $row['cust_name'], $row['start_date'], $row['end_date'], $row['travelling'], $row['travelling_remarks'], 
        $row['conveyance'], $row['conveyance_remarks'], $row['food_allowance'], $row['food_allowance_remarks'], $row['printing_stationary'], $row['printing_stationary_remarks'], 
        $row['mobile_telephone'], $row['mobile_telephone_remarks'], $row['medical'], $row['medical_remarks'], $row['laundry'], $row['laundry_remarks'], 
        $row['lodging'], $row['lodging_remarks'], $row['advance'], $row['advance_remarks'], $row['purchase_of_tools'], $row['purchase_of_tools_remarks'], 
        $row['toll'], $row['toll_remarks'], $row['miscellaneous'], $row['miscellaneous_remarks'], $row['inward_freight'], $row['inward_freight_remarks'], 
        $row['outward_freight'], $row['outward_freight_remarks'], $row['created_at'], $row['created_by']);
        ?>
              <tr>
                    
          <td align="center"><?php  echo $row["din"] ?></td>
          
          <td align="center"><?php  echo $row["cust_name"] ?></td>
                    <!--<td align="center"><?php  //echo $row["cash_type"] ?></td>-->
          <td align="center"><?php  echo $row["start_date"] ?></td>
            
          <td align="center"><?php  echo $row["end_date"] ?></td>
                    <td align="center"><?php  echo $row["travelling"] ?></td>
                    <td align="center"><?php  echo $row["travelling_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path1']))
                    {
                      echo "<td><a href=" . $row['img_path1'] . " target='_blank'>travelling</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["conveyance"] ?></td>
                    <td align="center"><?php  echo $row["conveyance_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path2']))
                    {
                      echo "<td><a href=" . $row['img_path2'] . " target='_blank'>conveyance</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["food_allowance"] ?></td>
                    <td align="center"><?php  echo $row["food_allowance_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path3']))
                    {
                      echo "<td><a href=" . $row['img_path3'] . " target='_blank'>food_allowance</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>

                    <td align="center"><?php  echo $row["printing_stationary"] ?></td>
                    <td align="center"><?php  echo $row["printing_stationary_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path4']))
                    {
                      echo "<td><a href=" . $row['img_path4'] . " target='_blank'>printing_stationary</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["mobile_telephone"] ?></td>
                    <td align="center"><?php  echo $row["mobile_telephone_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path5']))
                    {
                      echo "<td><a href=" . $row['img_path5'] . " target='_blank'>mobile_telephone</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["medical"] ?></td>
                    <td align="center"><?php  echo $row["medical_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path6']))
                    {
                      echo "<td><a href=" . $row['img_path6'] . " target='_blank'>medical</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["laundry"] ?></td>
                    <td align="center"><?php  echo $row["laundry_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path7']))
                    {
                      echo "<td><a href=" . $row['img_path7'] . " target='_blank'>laundry</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["lodging"] ?></td>
                    <td align="center"><?php  echo $row["lodging_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path8']))
                    {
                      echo "<td><a href=" . $row['img_path8'] . " target='_blank'>lodging</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["advance"] ?></td>
                    <td align="center"><?php  echo $row["advance_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path9']))
                    {
                      echo "<td><a href=" . $row['img_path9'] . " target='_blank'>advance</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["purchase_of_tools"] ?></td>
                    <td align="center"><?php  echo $row["purchase_of_tools_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path10']))
                    {
                      echo "<td><a href=" . $row['img_path10'] . " target='_blank'>purchase_of_tools</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["toll"] ?></td>
                    <td align="center"><?php  echo $row["toll_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path11']))
                    {
                      echo "<td><a href=" . $row['img_path11'] . " target='_blank'>toll</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["miscellaneous"] ?></td>
                    <td align="center"><?php  echo $row["miscellaneous_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path12']))
                    {
                      echo "<td><a href=" . $row['img_path12'] . " target='_blank'>miscellaneous</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["inward_freight"] ?></td>
                    <td align="center"><?php  echo $row["inward_freight_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path13']))
                    {
                      echo "<td><a href=" . $row['img_path13'] . " target='_blank'>inward_freight</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["outward_freight"] ?></td>
                    <td align="center"><?php  echo $row["outward_freight_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path14']))
                    {
                      echo "<td><a href=" . $row['img_path14'] . " target='_blank'>outward_freight</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  $source = $row["created_at"]; $date = new DateTime($source); echo $date->format('d-m-Y'); ?></td> 
                    <td><?php  echo $row["created_by"] ?></td>
                </tr>
        <?php
        //$Refill = $row["cr_dt"];
        //$TotalRefill = $TotalRefill + $Refill;
        $_SESSION['table_array'] = $table_array;
        }
        //echo '<script>console.log($TotalRefill)</script>';
        
        } 
        else { echo "No Entries Found. Check the parameter or Try again."; } ?>
                </table>
        </div>
      </div>
        <?php         
        //echo '<center><h2><b>Total Refill of Selected Date : Rs.'.$TotalRefill.'/-</b></h2></center>';
      }   else{
          $today = date("Y-m-d");
           $display = "The Below Record is of $today";
            $sql = "SELECT * FROM `trips`ORDER BY `id` DESC";
            $result = $link->query($sql);
            

            if ($result->num_rows > 0) {
               
      ?>
      <b>
            <div class="table-scrollable">
            <div style="overflow: scroll; width: 100%;">
      <table class="table table-striped table-bordered table-hover styles" width="100%" height="100" align="center" border="2" style="background-color: white;">
            <thead>
              
        <th style="padding:18px;" width="111" height="55" ><center><font color ="green">Din</font></center></th>
        <th style="padding:18px;" width="111" height="55" ><center><font color ="green">Customer name</font></center></th>
        <th style="padding:16px;"width="106" align="center"><center><font color ="green">Start date</font></center></th>
                <!--<th style="padding:16px;"width="98"  align="center"><center><font color ="green">Cash Type</font></center></th>-->
         <th style="padding:16px;"width="106"  align="center"><center><font color ="green">End date</font></center></th>
         
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Travelling</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Travelling Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Travelling Image</font></center></th>

        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Conveyance</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Conveyance Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Conveyance Image</font></center></th>
        
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Food Allowance</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Food Allowance Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Food Allowance Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Printing and Stationary</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Printing and Stationary Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Printing and Stationary Image</font></center></th>

        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Mobile/telephone</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Mobile/telephone Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Mobile/telephone Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Medical</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Medical Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Medical Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Laundry</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Laundry Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Laundry Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Lodging</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Lodging Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Lodging Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Advance</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Advance Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Advance Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Purchase of tools</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Purchase of tools Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Purchase of tools Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Toll</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Toll Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Toll Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Miscellaneous</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Miscellaneous Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Miscellaneous Image</font></center></th>
         
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Inward Freight</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Inward Freight Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Inward Freight Image</font></center></th>
        
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Outward Freight</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Outward Freight Remarks</font></center></th>
        <th style="padding:16px;"width="106"  align="center"><center><font color ="green">Outward Freight Image</font></center></th>
        
        <th style="padding:18px;" width="111" height="55" ><center><font color ="green">Created at</font></center></th>
        <th style="padding:16px;"width="98"  align="center"><center><font color ="green">Created by</font></center></th>
             </thead>
      <?php 
      while($row = $result->fetch_assoc()){ 
        $table_array[] = array($row['id'], $row['din'], $row['cust_name'], $row['start_date'], $row['end_date'], $row['travelling'], $row['travelling_remarks'], 
        $row['conveyance'], $row['conveyance_remarks'], $row['food_allowance'], $row['food_allowance_remarks'], $row['printing_stationary'], $row['printing_stationary_remarks'], 
        $row['mobile_telephone'], $row['mobile_telephone_remarks'], $row['medical'], $row['medical_remarks'], $row['laundry'], $row['laundry_remarks'], 
        $row['lodging'], $row['lodging_remarks'], $row['advance'], $row['advance_remarks'], $row['purchase_of_tools'], $row['purchase_of_tools_remarks'], 
        $row['toll'], $row['toll_remarks'], $row['miscellaneous'], $row['miscellaneous_remarks'], $row['inward_freight'], $row['inward_freight_remarks'], 
        $row['outward_freight'], $row['outward_freight_remarks'], $row['created_at'], $row['created_by']);
        ?>
              <tr>
                    
          <td align="center"><?php  echo $row["din"] ?></td>
          
          <td align="center"><?php  echo $row["cust_name"] ?></td>
                    <!--<td align="center"><?php  //echo $row["cash_type"] ?></td>-->
          <td align="center"><?php  echo $row["start_date"] ?></td>
            
          <td align="center"><?php  echo $row["end_date"] ?></td>
                    <td align="center"><?php  echo $row["travelling"] ?></td>
                    <td align="center"><?php  echo $row["travelling_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path1']))
                    {
                      echo "<td><a href=" . $row['img_path1'] . " target='_blank'>travelling</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["conveyance"] ?></td>
                    <td align="center"><?php  echo $row["conveyance_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path2']))
                    {
                      echo "<td><a href=" . $row['img_path2'] . " target='_blank'>conveyance</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["food_allowance"] ?></td>
                    <td align="center"><?php  echo $row["food_allowance_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path3']))
                    {
                      echo "<td><a href=" . $row['img_path3'] . " target='_blank'>food_allowance</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>

                    <td align="center"><?php  echo $row["printing_stationary"] ?></td>
                    <td align="center"><?php  echo $row["printing_stationary_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path4']))
                    {
                      echo "<td><a href=" . $row['img_path4'] . " target='_blank'>printing_stationary</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["mobile_telephone"] ?></td>
                    <td align="center"><?php  echo $row["mobile_telephone_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path5']))
                    {
                      echo "<td><a href=" . $row['img_path5'] . " target='_blank'>mobile_telephone</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["medical"] ?></td>
                    <td align="center"><?php  echo $row["medical_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path6']))
                    {
                      echo "<td><a href=" . $row['img_path6'] . " target='_blank'>medical</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["laundry"] ?></td>
                    <td align="center"><?php  echo $row["laundry_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path7']))
                    {
                      echo "<td><a href=" . $row['img_path7'] . " target='_blank'>laundry</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["lodging"] ?></td>
                    <td align="center"><?php  echo $row["lodging_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path8']))
                    {
                      echo "<td><a href=" . $row['img_path8'] . " target='_blank'>lodging</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["advance"] ?></td>
                    <td align="center"><?php  echo $row["advance_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path9']))
                    {
                      echo "<td><a href=" . $row['img_path9'] . " target='_blank'>advance</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["purchase_of_tools"] ?></td>
                    <td align="center"><?php  echo $row["purchase_of_tools_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path10']))
                    {
                      echo "<td><a href=" . $row['img_path10'] . " target='_blank'>purchase_of_tools</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["toll"] ?></td>
                    <td align="center"><?php  echo $row["toll_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path11']))
                    {
                      echo "<td><a href=" . $row['img_path11'] . " target='_blank'>toll</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["miscellaneous"] ?></td>
                    <td align="center"><?php  echo $row["miscellaneous_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path12']))
                    {
                      echo "<td><a href=" . $row['img_path12'] . " target='_blank'>miscellaneous</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["inward_freight"] ?></td>
                    <td align="center"><?php  echo $row["inward_freight_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path13']))
                    {
                      echo "<td><a href=" . $row['img_path13'] . " target='_blank'>inward_freight</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  echo $row["outward_freight"] ?></td>
                    <td align="center"><?php  echo $row["outward_freight_remarks"] ?></td>
                    <?php 
                    if(!empty($row['img_path14']))
                    {
                      echo "<td><a href=" . $row['img_path14'] . " target='_blank'>outward_freight</a></td>";
                    }
                    else 
                    {
                      echo "<td>-</td>";
                    }?>
                    <td align="center"><?php  $source = $row["created_at"]; $date = new DateTime($source); echo $date->format('d-m-Y'); ?></td> 
                    <td align="center"><?php  echo $row["created_by"] ?></td>
                </tr>
        <?php
        //$Refill = $row["cr_dt"];
        //$TotalRefill = $TotalRefill + $Refill;
        $_SESSION['table_array'] = $table_array;
        }
        //echo '<script>console.log($TotalRefill)</script>';
        } 
        else { echo "No Trip Entries Found For Given Date."; } ?>
                </table>
                </div>
        </div>
        <?php         
        //echo '<center><h2><b>Total Refill of Selected Date : Rs.'.$TotalRefill.'/-</b></h2></center>';
        }
        
        $link->close();
        ?>
           
 
                </div>
        
          
 
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
<script>
    loadpage();
    function loadpage() {
        $("#name").hide();
        $("#date").hide();
     
    jQuery("#submit").prop('disabled', true);
    }

  
</script>
<script>
 $("#choice").change(function(){
        console.log(this.value)
        var id = this.value;
        if (id == "name") {
 
            $("#name").show();
            $("#date").hide();
            
      
      //alert('Only upload Image File- JPG/PNG Only,\nNo GIF or PDF will accept.');
        }
        else if (id == "date") {
           $("#name").hide();
            $("#date").show();
     
        }
     
    
    else{
        $("#name").hide();
            $("#date").hide();
     
    }
    });
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
           
            dateFormat: 'yy-m-dd',
            changeMonth: true,
                changeYear: true,
                yearRange: "-100:+100"
        });
    
  } );
  </script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
           
            dateFormat: 'yy-m-dd',
            changeMonth: true,
                changeYear: true,
                yearRange: "-100:+100"
        });
    
  } );
  </script>
</body>
</html>