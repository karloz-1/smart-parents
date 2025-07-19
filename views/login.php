<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Parents</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login_card">
        <div class="card_content">
            <div class="card_title"><h1>Iniciar Sesión</h1></div>
            <div class="card_form">
                <form action="actions/login.php" method="POST">
                    <div class="form__user">
                        <label for="user">Usuario</label>
                        <input type="text" name="user" required>
                    </div>
                    <div class="form__password">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form__submit">
                        <input type="submit" name="submit-btn" value="Ingresar" required>
                    </div>
                </form>
            </div>
            <div class="card_btn_login"></div>
        </div>
    </div>
</body>
</html>