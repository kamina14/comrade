<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тіркелу</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icon1.png">
    <link rel="stylesheet" href="main2.css">
</head>
<body>

    <?php require 'blocks/header.php'; ?>
    
    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 md-3">
                <h4>Тіркелу формасы:</h4>
                <form action="" method="post">
                    <label for="username">Сіздің атыңыз</label>
                    <input type="text" name="username" id="username" class="form-control">

                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control">

                    <label for="pass">Құпиясөз</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="user">User</option>
                        <option value="driver">Driver</option>
                    </select><br>

                    <div class="alert alert-danger" id="errorBlock"></div>

                    <button type="button" id="reg_user" class="btn btn-success mt-5">
                        Тіркелу
                    </button>
                </form>
            </div>
        </div>
    </main>

    <?php require 'blocks/footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

        $('#reg_user').click(function (){
            var name = $('#username').val();
            var email = $('#email').val();
            var login = $('#login').val();
            var pass = $('#pass').val();
            var role = $('#role').val(); 

            $.ajax({
                url: 'ajax/reg.php',
                type: 'POST',
                cache: false,
                data: {
                    'username': name,
                    'email': email,
                    'login': login,
                    'pass': pass,
                    'role': role 
                },
                dataType: 'html',
                success: function(data) {
                    if(data == 'Готово') {
                        $('#reg_user').text('Все готово');
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