<?php
session_start();

// Check if the user is not logged in or is not an admin
if (!isset($_SESSION["loggedin"])) {
    // Redirect the user to the login page or another appropriate page
    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/LOGO.png" type="image/png">
    <title>Default</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="defaultCss.css">
</head>
<body>

<body>
    <section>
        <nav class="navbar navbar-expand-xl bg-dark navbar-dark p-4 fixed-top ">
            <span href="#" class="navbar-brand"><span>Lake </span>View Baptist Church</span>
            <!-- <li class="nav-item ml-auto">
                <a class="nav-link go-back text-white" href="../">Go Back</a>
            </li> -->
    </section>  

<!-- ATEC E-LOGSHEET (LIVE) -->

<!-- <div class="AtecWebsite">
    <h5>ATEC E-LOGSHEET (LIVE)</h5>
  <nav>
    <ul>
      <li><a href="http://192.168.1.66:408/Account/Login.aspx" id="Prod" target="_blank" rel="noopener noreferrer">E-LOGSHEET</a></li>
      <li><a href="#" target="_blank" rel="noopener noreferrer">E-LOGSHEET (Full Access)</a></li>  
    </ul>
    </div>
  </nav> -->

<!-- ATEC WEBMES (LIVE) -->

    <!-- <div class="AtecWebsite">
    <h5>ATEC WEBMES (LIVE)</h5>
  <nav>
    <ul>
      <li><a href="http://192.168.5.9:400" id="Prod" target="_blank" rel="noopener noreferrer">WEBMES PROD</a></li>
    </ul>
    </div>
  </nav> -->
  
<!-- ATEC WEBMES SUPPORT -->

    <!-- <div class="AtecWebsite">
    <h5>ATEC WEBMES SUPPORT</h5>
  <nav>
    <ul>
      <li><a href="http://192.168.5.12:200" target="_blank" rel="noopener noreferrer">WEBMES SUPPORT</a></li>
    </ul>
    </div>
  </nav> -->


<!-- ATEC CONNECTIVITY SYSTEMS WebMES -->

<!-- <div class="AtecWebsite">
  <h5>ATEC CONNECTIVITY SYSTEMS</h5>
<nav>
  <ul>
    <li><a href=" http://192.168.101.68:400/" target="_blank" rel="noopener noreferrer">WEBMES</a></li>
    <li><a href="http://192.168.101.68:100/Login.aspx?" target="_blank" rel="noopener noreferrer">KITTING APP</a></li>
    <li><a href="http://192.168.101.68:400/" target="_blank" rel="noopener noreferrer">CONNECTIVITY PORTAL</a></li>
  </ul>
  </div>
</nav> -->


<div class="container">
    <div class="row">
        <?php
        // Include the SQL handler function
        include_once 'phpCon/SqlHandler.php';

        // Example SQL query
        $sql = "SELECT * FROM sys_Links";

        // Execute the SQL query
        $results = executeSQLQuery($sql);

        foreach ($results as $row) {
            echo "<div class='col-md-5 mb-4'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['Title']}</h5>";
            echo "<ul class='list-group list-group-flush'>";

            // Check and display link1
            if (!empty($row['redirect_link1'])) {
                echo "<li class='list-group-item'><a href='" . $row['redirect_link1'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link1'] . "</a></li>";
            }

            // Check and display link2
            if (!empty($row['redirect_link2'])) {
                echo "<li class='list-group-item'><a href='" . $row['redirect_link2'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link2'] . "</a></li>";
            }

            // Check and display link3
            if (!empty($row['redirect_link3'])) {
                echo "<li class='list-group-item'><a href='" . $row['redirect_link3'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link3'] . "</a></li>";
            }

            // Check and display link4
            if (!empty($row['redirect_link4'])) {
                echo "<li class='list-group-item'><a href='" . $row['redirect_link4'] . "' target='_blank' rel='noopener noreferrer'>" . $row['link4'] . "</a></li>";
            }

            echo "</ul>";
            echo "</div>"; // Close card-body
            echo "</div>"; // Close card
            echo "</div>"; // Close col-md-3
        }
        ?>
    </div> <!-- Close row -->
</div> <!-- Close container -->


<!-- Footer -->
<footer class="footer bg-dark text-white p-1 fixed-bottom">
    <div class="container Cfooter">
    <p>Copyright © Lakeview Baptist Church Biñan</p>
        <p>IT Development Team 2024</p>
    </div>
</footer>
    <script src="script.js"></script>
</body>
</html>
</body>
</html>