<!DOCTYPE html>
<html>
<head>
    <title>Add Landmark</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .collr{
            background-color :#008CBA;
            color :white;
        }
        
    </style>
</head>
<body>
    <!-- страница с формой для заполнения  -->
    <?php include'server.php';?>
    <div class="container mt-4">
    <h1>Add Landmark</h1>
    <form method="POST" action="process_landmark.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Атауы</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="city">Қала</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="info">Ақпарат</label>
            <textarea class="form-control" id="info" name="info" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="photo">Фото</label>
            <input type="file" class="form-control-file" id="photo" name="photo" required>
        </div>
        <button type="submit" class="btn collr">Жіберу</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
