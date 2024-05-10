<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lakeview Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/defaultCss.css">
    <style>
        /* Custom CSS for styling */
        .monthly-commit {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;

        }
        a {
          text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><span>LAKEVIEW </span>WEBSITE</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="Login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="monthly-commit mt-5">
            <h2 class="text-center mb-4">LIST</h2>
            <?php
            // Include the SQL handler function
            include_once 'phpCon/SqlHandler.php';

            // Example SQL query
            $sql = "SELECT * FROM sys_Links where id in (1)";

            // Execute the SQL query
            $results = executeSQLQuery($sql);

            foreach ($results as $row) {
                echo "<h5>{$row['Title']}</h5>";
                echo "<div class='user-info'>";
                echo "<ul class='list-unstyled'>";

                // Check and display links
                for ($i = 1; $i <= 4; $i++) {
                    $link = $row["link$i"];
                    $redirectLink = $row["redirect_link$i"];
                    if (!empty($link) && !empty($redirectLink)) {
                        echo "<li><a href='$redirectLink' target='_blank' rel='noopener noreferrer'>$link</a></li>";
                    }
                }

                echo "</ul>";
                echo "</div>"; // Close user-info div
                echo "<hr>";
            }
            ?>
        </div>
    </div>

    <footer class="footer bg-dark text-white p-3 fixed-bottom">
        <div class="container">
            <p class="mb-0">Copyright © Lakeview Baptist Church Biñan</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
