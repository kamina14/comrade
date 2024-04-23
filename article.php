<?php
    if($_COOKIE['login'] == '') {
        header('Location: registration.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тапсырыс беру</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icon1.png">
    <link rel="stylesheet" href="main2.css">
</head>
<body>

    <?php require 'blocks/header.php'; ?>
    
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 md-3">
                <h4>Тапсырыс беру формасы:</h4>
                <form action="" method="post">
                    <label for="title">Тауар түрі</label>
                    <input type="text" name="title" id="title" class="form-control">

                    <label for="city1">Қай жерден</label>
                    <textarea name="city1" id="city1" class="form-control"></textarea>

                    <label for="city2">Қайда</label>
                    <textarea name="city2" id="city2" class="form-control"></textarea>

                    <label for="cost">Бағасы</label>
                    <input type="number" name="cost" id="cost" class="form-control">

                    <label for="text">Толығырақ</label>
                    <textarea name="text" id="text" class="form-control"></textarea>

                    <div class="alert alert-danger" id="errorBlock"></div>

                    <button type="button" id="article_send" class="btn btn-success mt-3 mb-3">
                        Тапсырыс беру
                    </button>
                </form>
            </div>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

        $('#article_send').click(function (){
            var title = $('#title').val();
            var city1 = $('#city1').val();
            var city2 = $('#city2').val();
            var cost = $('#cost').val();
            var text = $('#text').val();

            $.ajax({
                url: 'ajax/add_article.php',
                type: 'POST',
                cache: false,
                data: {'title': title, 'city1': city1, 'city2': city2, 'cost': cost, 'text': text},
                dataType: 'html',
                success: function(data) {
                    if(data == 'Готово') {
                        $('#article_send').text('Все готово');
                        $('#errorBlock').hide();
                    }
                    else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        });

    </script>
</body>
</html>