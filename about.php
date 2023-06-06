<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио - Байжанов Нурсат</title>
    <link rel="icon" href="icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-img {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 50%;
        }
        body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        }
    </style>
</head>
<body>
    <?php include'server.php'?>
    <div>
    <header class="text-center mt-4">
        <h1>Турмуратов Мирас Тажибаевич</h1>
    </header>

    <section class="container mt-5">
        <div class="row">
        <div class="col-md-6 text-center">
            <img class="profile-img" src="photo.jpg" alt="Фото профиля">
        </div>
        <div class="col-md-6">
            <h3>қосымша ақпарат:</h3>
            <p>Аты: Турмуратов Мирас Тажибаевич</p>
            <p>Телефон: 87071565715</p>
            <p>Email: turmuratov.04miras1@gmail.com</p>
            <p>Instagram: <a href="https://www.instagram.com/mirasturmuratov" target="_blank">@mirasturmuratov</a></p>
            
            
        </div>
        </div>
    
    </section>
    </div>
    

  
  <?php include 'footer.php';?>
  

</body>
</html>
