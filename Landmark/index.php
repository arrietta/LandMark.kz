<!DOCTYPE html>
<html>
<head>
    <title>Landmark.kz</title>
    <meta charset="UTF-8">
    <link rel="icon" href="icon.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #36545B;
        }
        /* Параметры сайта при ширине экрана 1000 */
        @media (max-width: 1000px) {
            .navbar-brand,
            .navbar-nav .nav-link {
                font-size: 1.5rem;
                margin: auto;
                text-align: center;
            }
            .navbar-toggler {
                font-size: 1.75rem;
                padding: 0.375rem 0.75rem;
            }
            .form-inline{
                margin: auto;
            }
            #submit{
                margin: auto;
            }
            .card{
                height: 23rem;
                padding: auto;
                display: flex;
                
            }
            .ig{
                height: 17rem;
            }
            
        
        }
        .card{
            height: 23rem;
            padding: auto;
            display: flex;
            
        }
        .ig{
            height: 15rem;
        }
        
    </style>
</head>
<body>

<?php include 'server.php';?>
<div class="container mt-4">
    <div class="row">
    <?php
    
    // Проверьте, предоставлен ли поисковый запрос
    if (isset($_GET['search'])) {
        // Получение поискового запроса
        $search = $_GET['search'];
    
        // Построить SQL-запрос
        $sql = "SELECT * FROM landmarks WHERE name LIKE '%$search%' OR city LIKE '%$search%' OR info LIKE '%$search%'";
        $result = $conn->query($sql);
    
       // Проверьте, соответствуют ли какие-либо достопримечательности поисковому запросу
        if ($result->num_rows > 0) {
            // Отображение совпадающих ориентиров
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $city = $row['city'];
                $info = $row['info'];
                $photoURL = $row['photo_url'];
    
                // Вывод HTML
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="landmark.php?name=' . urlencode($name) . '&city=' . urlencode($city) . '&info=' . urlencode($info) . '&photo=' . urlencode($photoURL) . '">
                            <img src="img/' . $photoURL . '" class="card-img-top ig" alt="' . $name . '">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">' . $name . '</h5>
                            <p class="card-text">' . $city . '</p>
                        </div>
                    </div>
                </div>';
            }
        } else {
           // Не найдено ни одного места, соответствующей поисковому запросу
            echo "No landmarks found.";
        }
    } else {
        // Получение данных об ориентирах из базы данных
        $sql = "SELECT * FROM landmarks order by rand()";
        $result = $conn->query($sql);
    
        // Генерировать данные для каждой достопримечательности
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $city = $row['city'];
                $info = $row['info'];
                $photoURL = $row['photo_url'];
    
                // вывод HTML
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="landmark.php?name=' . urlencode($name) . '&city=' . urlencode($city) . '&info=' . urlencode($info) . '&photo=' . urlencode($photoURL) . '">
                            <img src="img/' . $photoURL . '" class="card-img-top ig" alt="' . $name . '">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">' . $name . '</h5>
                            <p class="card-text">' . $city . '</p>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "No landmarks found.";
        }
    }
        
    ?>
    


    </div>
</div>

<!-- добавление на сайт данных с другой страницы -->
<?php include 'footer.php';?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
