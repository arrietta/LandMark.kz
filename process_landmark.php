<?php
// Проверьте, отправлена ли форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $city = $_POST['city'];
    $info = $_POST['info'];

    // Обработка загрузки файлов
    $targetDir = 'img/';
    $fileName = $_FILES['photo']['name'];
    $targetPath = $targetDir . $fileName;
    $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

    // Проверка типа файла (необязательно)
    $allowedExtensions = array('jpg', 'jpeg', 'png');
    if (!in_array(strtolower($fileType), $allowedExtensions)) {
        echo "Only JPG, JPEG, and PNG files are allowed.";
        exit;
    }

    // Переместить загруженный файл в папку назначения
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
        // File upload successful, save file name to database
        $conn = new mysqli('localhost', 'root', '', 'landmark');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Вставка данных в базу данных
        $sql = "INSERT INTO landmarks (name, city, info, photo_url) VALUES ('$name', '$city', '$info', '$fileName')";
        if ($conn->query($sql) === TRUE) {
            // Перенаправление на index.html
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error uploading the file.";
    }
}
?>
