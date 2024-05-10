<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lakeview Baptist Church</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            padding-top: 70px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><span>MONTHLY </span>Commitment</a>
    </div>
</nav>

<div class="container mt-5">
    <?php
    // Include the SQL handler function
    include_once 'phpCon/SqlHandler.php';

    // Pagination parameters
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10; // Number of records per page
    $offset = ($page - 1) * $limit;

    // Example SQL query with pagination
    $sql = "SELECT * FROM (
        SELECT *, ROW_NUMBER() OVER (ORDER BY (SELECT NULL)) AS RowNum FROM LBC_Users
    ) AS UsersWithRowNum
    WHERE RowNum BETWEEN $offset + 1 AND $offset + $limit
    ORDER BY Full_Name DESC";

    // Execute the SQL query
    $results = executeSQLQuery($sql);

    // Check if there are any results
    if ($results) {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Full Name</th>";
        echo "<th>May</th>";
        echo "<th>Jun</th>";
        echo "<th>Jul</th>";
        echo "<th>Aug</th>";
        echo "<th>Sep</th>";
        echo "<th>Oct</th>";
        echo "<th>Nov</th>";
        echo "<th>Dec</th>";
        echo "<th>Jan</th>";
        echo "<th>Feb</th>";
        echo "<th>Mar</th>";
        echo "<th>Apr</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>{$row['Full_Name']}</td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='May' " . (isset($row['May']) && $row['May'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='June' " . (isset($row['June']) && $row['June'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='July' " . (isset($row['July']) && $row['July'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='August' " . (isset($row['August']) && $row['August'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='September' " . (isset($row['September']) && $row['September'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='October' " . (isset($row['October']) && $row['October'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='November' " . (isset($row['November']) && $row['November'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='December' " . (isset($row['December']) && $row['December'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='January' " . (isset($row['January']) && $row['January'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='February' " . (isset($row['February']) && $row['February'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='March' " . (isset($row['March']) && $row['March'] ? 'checked' : '') . "></td>";
            echo "<td><input type='checkbox' class='form-check-input month-checkbox' data-id='" . (isset($row['ID']) ? $row['ID'] : '') . "' data-month='April' " . (isset($row['April']) && $row['April'] ? 'checked' : '') . "></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        // Pagination links
        $total_records = count(executeSQLQuery("SELECT * FROM LBC_Users"));
        $total_pages = ceil($total_records / $limit);
        echo "<nav aria-label='Page navigation'>";
        echo "<ul class='pagination justify-content-center'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
        }
        echo "</ul>";
        echo "</nav>";
    } else {
        echo "<div class='alert alert-info' role='alert'>No data found.</div>";
    }
    ?>
</div>

<footer class="footer bg-dark text-white p-3">
    <div class="container text-center">
        <p class="mb-0">Copyright © Lakeview Baptist Church Biñan</p>
    </div>
</footer>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.month-checkbox').change(function() {
        var userId = $(this).data('id');
        var month = $(this).data('month');
        var isChecked = $(this).is(':checked') ? 1 : 0;

        // Send AJAX request to update database
        $.ajax({
            type: "POST",
            url: "update_month.php",
            data: { userId: userId, month: month, isChecked: isChecked },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

</body>
</html>
