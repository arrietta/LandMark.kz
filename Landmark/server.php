
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand " href="index.php" ><img src="logo.png" height="40rem" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Каталог</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_mark.php">Ұсыныс</a>
            </li>
            
            <form class="form-inline mt-2 mt-lg-0" action="index.php" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button id="submit" class="btn btn-outline-light my-2 my-sm-0" type="submit">Іздеу</button>
                </form>
            
        </ul>
        
    </div>
</nav>

<?php
// подключение к серверу по следующим параметрам
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "landmark";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>