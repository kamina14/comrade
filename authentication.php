<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cайтқа кіру</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icon1.png">
    <link rel="stylesheet" href="main2.css">
    <style></style>
</head>
<body>

    <?php require 'blocks/header.php'; ?>
    
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 md-3">
                <?php
                    if($_COOKIE['login'] == ''):
                ?>
                <h4>Сайтқа кіру формасы:</h4>
                <form action="" method="post">
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control">

                    <label for="pass">Құпиясөз</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger" id="errorBlock"></div>

                    <button type="button" id="auth_user" class="btn btn-success mt-5">
                        Сайтқа кіру
                    </button>
                </form>
                <?php
                    else:
                ?>
                <h2><?=$_COOKIE['login']?></h2>
                <h2><?=$_COOKIE['role']?></h2>
                <button class="btn btn-danger" id="exit_btn">Шығу</button>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>

        $('#exit_btn').click(function (){
            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data) {
                    document.location.reload(true);
                }
            });
        });

        $('#auth_user').click(function (){
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/auth.php',
                type: 'POST',
                cache: false,
                data: {'login': login, 'pass': pass},
                dataType: 'html',
                success: function(data) {
                    if(data == 'Готово') {
                        $('#auth_user').text('Готово');
                        $('#errorBlock').hide();
                        document.location.reload(true);
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