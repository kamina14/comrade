<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test.Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icon1.png">
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <?php require 'blocks/header.php'; ?>
    
    <main class="container mt-5">
    <div class="container">
    <div class="row">
        <?php
            require_once 'mysql_connect.php';

            $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
            $query = $pdo->query($sql);
            while($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo "<div class='col-sm-3 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <h5 class='card-title'>$row->title</h5>
                                <p class='card-text'><b>Жөнелтілетін орын:</b><mark>$row->city1</mark></p>
                                <p class='card-text'><b>Қабылданатын орыын:</b><mark>$row->city2</mark></p>
                                <p class='card-text'><b>Бағасы:</b><mark>$row->cost</mark></p>
                                <p class='card-text'><b>Тапсырыс беруші:</b><mark>$row->avtor</mark></p>
                                <button class='btn btn-primary mb-5'>Тапсырысты қабылдау</button>
                            </div>
                        </div>
                    </div>";
            }
        ?>
    </div>
</div>

    </main>

    <?php require 'blocks/footer.php'; ?>
</body>
</html>