<?php
// Initialize the session
session_start();

if(isset($_POST["export"]))  
 {  
  //print_r ($table_array);
  $table_array = $_SESSION['table_array'];
      header('Content-Type: application/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=Users.csv');
      $output = fopen('php://output', 'w');
      fputcsv($output, array("id","din", "cust_name", "start_date", "end_date", "travelling", "travelling_remarks", "conveyance", "conveyance_remarks", 
      "food_allowance", "food_allowance_remarks", "printing_stationary", "printing_stationary_remarks", "mobile_telephone", "mobile_telephone_remarks", 
      "medical", "medical_remarks", "laundry", "laundry_remarks", "lodging", "lodging_remarks", "advance", "advance_remarks", 
      "purchase_of_tools", "purchase_of_tools_remarks", "toll", "toll_remarks", "miscellaneous", "miscellaneous_remarks", 
      "inward_freight", "inward_freight_remarks", "outward_freight", "outward_freight_remarks", "created_at", "created_by"));
      
      if (count($table_array) > 0) {
        foreach ($table_array as $row) {
            fputcsv($output, $row);
        }
      }  
      fclose($output);  
 }


exit();

 header("location: dashboard.php");

?>