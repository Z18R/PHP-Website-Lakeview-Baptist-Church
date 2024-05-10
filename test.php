<!DOCTYPE html>
<html>
<head>
    <title>Update Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <?php
    // Database connection details
    $serverName = "DESKTOP-6E9LU1F\\SQLEXPRESS"; // Server name
    $connectionOptions = array(
        "Database" => "CentralAccess", // Database name
        "Uid" => "sa",                 // Username
        "PWD" => "18Bz23efBd0J"        // Password
    );

    // Create connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    // Check connection
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Update data if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $id = $_POST["id"];
        $may = $_POST["may"];
        $june = $_POST["june"];
        $july = $_POST["july"];
        $august = $_POST["august"];
        $september = $_POST["september"];
        $october = $_POST["october"];
        $november = $_POST["november"];
        $december = $_POST["december"];
        $january = $_POST["january"];
        $february = $_POST["february"];
        $march = $_POST["march"];
        $april = $_POST["april"];

        $sql = "UPDATE LBC_Users SET May='$may', June='$june', July='$july', August='$august', September='$september', October='$october', November='$november', December='$december', January='$january', February='$february', March='$march', April='$april' WHERE ID=$id";

        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo "<div class='alert alert-success' role='alert'>Record updated successfully</div>";
        }
    }

    // Select data
    $sql = "SELECT TOP (200) ID, Full_Name, May, June, July, August, September, October, November, December, January, February, March, April FROM LBC_Users";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        echo "<table class='table'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>ID</th><th>Full Name</th><th>May</th><th>June</th><th>July</th><th>August</th><th>September</th><th>October</th><th>November</th><th>December</th><th>January</th><th>February</th><th>March</th><th>April</th><th>Update</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo "<form method='post'>";
            echo "<tr>";
            echo "<td>" . $row["ID"] . "<input type='hidden' name='id' value='" . $row["ID"] . "'></td>";
            echo "<td>" . $row["Full_Name"] . "</td>";
            echo "<td><input type='text' name='may' class='form-control' value='" . $row["May"] . "'></td>";
            echo "<td><input type='text' name='june' class='form-control' value='" . $row["June"] . "'></td>";
            echo "<td><input type='text' name='july' class='form-control' value='" . $row["July"] . "'></td>";
            echo "<td><input type='text' name='august' class='form-control' value='" . $row["August"] . "'></td>";
            echo "<td><input type='text' name='september' class='form-control' value='" . $row["September"] . "'></td>";
            echo "<td><input type='text' name='october' class='form-control' value='" . $row["October"] . "'></td>";
            echo "<td><input type='text' name='november' class='form-control' value='" . $row["November"] . "'></td>";
            echo "<td><input type='text' name='december' class='form-control' value='" . $row["December"] . "'></td>";
            echo "<td><input type='text' name='january' class='form-control' value='" . $row["January"] . "'></td>";
            echo "<td><input type='text' name='february' class='form-control' value='" . $row["February"] . "'></td>";
            echo "<td><input type='text' name='march' class='form-control' value='" . $row["March"] . "'></td>";
            echo "<td><input type='text' name='april' class='form-control' value='" . $row["April"] . "'></td>";
            echo "<td><button type='submit' name='update' class='btn btn-primary'>Update</button></td>";
            echo "</tr>";
            echo "</form>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Form for adding new record
    echo "<form method='post' class='row g-3'>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='full_name' class='form-control' placeholder='Enter Full Name'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='may' class='form-control' placeholder='May'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='june' class='form-control' placeholder='June'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='july' class='form-control' placeholder='July'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='august' class='form-control' placeholder='August'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='september' class='form-control' placeholder='September'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='october' class='form-control' placeholder='October'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='november' class='form-control' placeholder='November'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='december' class='form-control' placeholder='December'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='january' class='form-control' placeholder='January'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='february' class='form-control' placeholder='February'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='march' class='form-control' placeholder='March'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<input type='text' name='april' class='form-control' placeholder='April'>";
    echo "</div>";
    echo "<div class='col-md-auto'>";
    echo "<button type='submit' name='insert' class='btn btn-success'>Add</button>";
    echo "</div>";
    echo "</form>";

    // Insert data if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        $full_name = $_POST["full_name"];
        $may = $_POST["may"];
        $june = $_POST["june"];
        $july = $_POST["july"];
        $august = $_POST["august"];
        $september = $_POST["september"];
        $october = $_POST["october"];
        $november = $_POST["november"];
        $december = $_POST["december"];
        $january = $_POST["january"];
        $february = $_POST["february"];
        $march = $_POST["march"];
        $april = $_POST["april"];

        $sql = "INSERT INTO LBC_Users (Full_Name, May, June, July, August, September, October, November, December, January, February, March, April) VALUES ('$full_name', '$may', '$june', '$july', '$august', '$september', '$october', '$november', '$december', '$january', '$february', '$march', '$april')";

        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo "<div class='alert alert-success' role='alert'>Record inserted successfully</div>";
        }
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
    ?>
</div>

</body>
</html>
