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
//$table_array = array();
//echo $result;
  


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

          <!-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas> -->
          <a href="insert.php" class="btn btn-sm btn-outline-primary">Insert Trip Expenses</a>
          <h2>Expense Data</h2>

          <h3>View Data using</h3>
          <form action="export_csv.php" method="post">
                  <input type="drop-down" >
                  <!-- <input type="submit" name= "export" value="Export" class="btn btn-sm btn-outline-secondary"> -->

          </form>


          
          
<?php
$username = $_SESSION["username"];
//echo $username;
$sql = "SELECT * FROM trips";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
    
      

     // echo '<div class="container">';
      echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-sm" align="center">';
        echo '<thead>';
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>din</th>";
                echo "<th>Customer name</th>";
                echo "<th>Start date</th>";
                echo "<th>End date</th>";
                echo "<th>Travelling</th>";
                echo "<th>Travelling Image </th>";
                echo "<th>Conveyance</th>";
                echo "<th>Conveyance Image </th>";
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
            //$table_array[] = $result;
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
                if(!empty($row['img_path1']))
                {
                  echo "<td><a href=" . $row['img_path1'] . " target='_blank'>travelling</a></td>";
                }
                else 
                {
                  echo "<td>-</td>";
                }  
                echo "<td>" . $row['conveyance'] . "</td>";
                if(!empty($row['img_path2']))
                {
                  echo "<td><a href=" . $row['img_path2'] . " target='_blank'>conveyance</a></td>";
                }
                else 
                {
                  echo "<td>-</td>";
                }
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
        //echo '</div>';
        // Free result set
        $_SESSION['table_array'] = $table_array;
        //print_r ($table_array);
        //mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
}


?>
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


</body>
</html>