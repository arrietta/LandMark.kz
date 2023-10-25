<!DOCTYPE html>
<html>
<head>
    <title>Landmark Details</title>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #36545B;
        }
        .card {
            margin-top: 50px;
            position: relative;
        }
        .card-header {
            font-weight: bold;
            font-size: 24px;
        }
        .card-body p {
            margin-bottom: 10px;
        }
        .ig{
            height: 30rem;
            width: 70%;
            margin:auto;
            object-fit: cover;
        }
        
            
        @media (max-width: 1000px) {
            
            .ig{
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
        
        }
    </style>
</head>
<body>

<?php
include "server.php";



// Проверьте, предоставлены ли параметры запроса
if (isset($_GET['name']) && isset($_GET['city']) && isset($_GET['info']) && isset($_GET['photo'])) {

    
    // Получение информации о месте из параметров запроса
    $name = $_GET['name'];
    $city = $_GET['city'];
    $info = $_GET['info'];
    $photoURL = $_GET['photo'];
    
    $sql = "SELECT * FROM links WHERE name LIKE '%$name%'";
    $sql2 = "SELECT * FROM map WHERE name LIKE '%$name%'";
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        $links = '<h4>Links:</h4>';
        $map = '';
    
        // Проверьте, соответствуют ли какие-либо достопримечательности поисковому запросу
        if ($result->num_rows > 0) {
            // Отображение совпадающих 
            while ($row = $result->fetch_assoc()) {
                $link = $row['link'];
                    
                $links= $links . '
                <a href="https://'.$link.'">
                    '.$link.'
                </a><br>';
            }
        } else {
            $links= $links . '
                No links<br>';
        }
        // отоброжение html
        if ($result2->num_rows > 0) {
            // Отображение совпадающих 
            while ($row = $result2->fetch_assoc()) {
                
                    
                $map = 'Расположение : <a href="https://'.$row['map'].'">'.$row['map'].'</a>';
            }
        } 

    echo '
    <div class="container">
        <div class="card">
            <img src="img/' . $photoURL . '" class="card-img-top ig" alt="' . $name . '">
            <div class="card-header">
                ' . $name . '
            </div>
            <div class="card-body">
                <p><strong>Қала:</strong> ' . $city . '</p>
                <p><strong>Ақпарат:</strong></p>
                <p>' . $info . '</p>
                <p>'. $map .'</p>
                <p>' . $links . '<p>
                
            </div>
        </div>
    </div>';
} else {
    echo "No landmark details found.";
}
?>
<?php include'footer.php'?>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
