<link rel="stylesheet" href="./css/header.css" />
<header>
    <div class="navbar">
        <img src="img/logo365_1.png" alt="Nav Logo" class="navlogo">
        <nav>
            <ul>
                <?php
                    if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
                        header("Location: ./login.php", true, 307);
                        exit();
                    }
                    if (isset($_SESSION["page"])) {
                        if ($_SESSION["page"] == "manageswimmers")
                            echo ('<li><a href = "manageswimmers.php" type = "text/html" class = "active">Manage Swimmers</a></li>');
                        else
                            echo ('<li><a href = "manageswimmers.php" type = "text/html">Manage Swimmers</a></li>');

                        if ($_SESSION["page"] == "managelocations")
                            echo ('<li><a href = "managelocations.php" type = "text/html" class = "active">Manage Locations</a></li>');
                        else
                            echo ('<li><a href = "managelocations.php" type = "text/html">Manage Locations</a></li>');

                        if ($_SESSION["page"] == "logresults")
                            echo ('<li><a href = "logresults.php" type = "text/html" class = "active">Log Results</a></li>');
                        else
                            echo ('<li><a href = "logresults.php" type = "text/html">Log Results</a></li>');

                        if ($_SESSION["page"] == "uploadmedia")
                            echo ('<li><a href = "uploadmedia.php" type = "text/html" class = "active">Upload Media</a></li>');
                        else
                            echo ('<li><a href = "uploadmedia.php" type = "text/html">Upload Media</a></li>');

                        if ($_SESSION["page"] == "viewstatistics")
                            echo ('<li><a href = "viewstatistics.php" type = "text/html" class = "active">View Stats</a></li>');
                        else
                            echo ('<li><a href = "viewstatistics.php" type = "text/html">View Stats</a></li>');
                    }
                ?>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>