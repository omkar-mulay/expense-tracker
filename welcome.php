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
?>

<?php

if(isset($_POST["export"]))  
 {  
  //print_r ($table_array);
  $table_array = $_SESSION['table_array'];
      header('Content-Type: application/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=Users.csv');
      $output = fopen('php://output', 'w');
      fputcsv($output, array("id","din", "cust_name", "start_date", "end_date", "travelling", "conveyance", "food_allowance", "printing_stationary", 
      "mobile_telephone", "medical", "laundry", "lodging", "advance", "purchase_of_tools", "toll", "miscellaneous", "inward_freight",  "outward_freight", "created_at", "created_by"));
      
      if (count($table_array) > 0) {
        foreach ($table_array as $row) {
            fputcsv($output, $row);
        }
      }  
      fclose($output);
      exit();  
 }
 

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif;  }
    </style>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["first_name"]); ?></b>. Welcome.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
  <br>
    <!-- <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1248155/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe> -->
      <a href="insert.php" class="btn btn-primary">Insert Trip Expenses</a>
      <!-- <a href="view.php" class="btn btn-primary">View Trip Expenses</a> -->
      <br>
      <p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="submit" name= "export" value="Export" class="btn btn-primary">
      </form>
      </p>

</div>

<p>

<?php
$username = $_SESSION["username"];
//echo $username;
$sql = "SELECT * FROM trips WHERE created_by = '".$username."' ORDER BY `id` DESC";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
      echo '<div class="container">';
      echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-sm">';
        echo '<thead>';
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>din</th>";
                echo "<th>Customer name</th>";
                echo "<th>Start date</th>";
                echo "<th>End date</th>";
                echo "<th>Travelling</th>";
                echo "<th>Conveyance</th>";
                echo "<th>Food Allowance</th>";
                echo "<th>Printing and Stationary</th>";
                echo "<th>Mobile/telephone</th>";
                echo "<th>Medical</th>";
                echo "<th>Laundry</th>";
                echo "<th>Lodging</th>";
                echo "<th>Advance</th>";
                echo "<th>Purchase of tools</th>";
                echo "<th>Toll</th>";
                echo "<th>Miscellaneous</th>";
                echo "<th>Inward Freight</th>";
                echo "<th>Outward Freight</th>";
                echo "<th>Created at</th>";
                echo "<th>Created by</th>";
        echo '</thead>';        
            echo "</tr>";

            echo '<tbody>';
        while($row = mysqli_fetch_array($result)){
        $table_array[] = array($row['id'], $row['din'], $row['cust_name'], $row['start_date'], $row['end_date'], $row['travelling'], $row['conveyance'], $row['food_allowance'], $row['printing_stationary'], $row['mobile_telephone'],
        $row['medical'], $row['laundry'], $row['lodging'], $row['advance'], $row['purchase_of_tools'], $row['toll'], $row['miscellaneous'], $row['inward_freight'], $row['outward_freight'], $row['created_at'], $row['created_by']);
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['din'] . "</td>";
                echo "<td>" . $row['cust_name'] . "</td>";
                echo "<td>" . $row['start_date'] . "</td>";
                echo "<td>" . $row['end_date'] . "</td>";
                echo "<td>" . $row['travelling'] . "</td>";
                echo "<td>" . $row['conveyance'] . "</td>";
                echo "<td>" . $row['food_allowance'] . "</td>";
                echo "<td>" . $row['printing_stationary'] . "</td>";
                echo "<td>" . $row['mobile_telephone'] . "</td>";
                echo "<td>" . $row['medical'] . "</td>";
                echo "<td>" . $row['laundry'] . "</td>";
                echo "<td>" . $row['lodging'] . "</td>";
                echo "<td>" . $row['advance'] . "</td>";
                echo "<td>" . $row['purchase_of_tools'] . "</td>";
                echo "<td>" . $row['toll'] . "</td>";
                echo "<td>" . $row['miscellaneous'] . "</td>";
                echo "<td>" . $row['inward_freight'] . "</td>";
                echo "<td>" . $row['outward_freight'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>" . $row['created_by'] . "</td>";
                
            echo "</tr>";
        }
        echo '</tbody>';
        echo "</table>";
        echo '</div>';
        echo '</div>';
        // Free result set
        $_SESSION['table_array'] = $table_array;
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
}


?>


</p>      
</body>
</html>