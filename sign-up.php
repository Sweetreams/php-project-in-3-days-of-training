<!DOCTYPE html>

<?php

    $localhost = "localhost";
    $user = "root";
    $password = "";
    $database = "Study";

    $login = "";
    $email = "";
    $password = "";
    $currect_password = "";
    $role = "";

    $mysqli = new mysqli($localhost, $user, $password, $database);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = $_REQUEST["login"];
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $currect_password = $_REQUEST["confirm_password"];
        $role = (int)$_REQUEST["role"];
    }

    if(trim($login) != "" || trim($email) != "" || trim($password) != "" || trim($currect_password) != "" || trim($role) != ""){

        if($password == $currect_password){
            $mysqli->query("INSERT INTO users(login, password, email, role) VALUES('$login', '$password', '$email', $role)");

            setcookie("role", $role, time() + 10000, "/");
            setcookie("JWS", $password, time() + 10000, "/");

            header("Location: /index.php");
        }
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <main class="form-signin w-100 m-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="login" class="form-control" name="login">
                <label for="floatingInput">Login</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" name="email">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="confirm_password">
                <label for="floatingPassword">Confirm password</label>
            </div>

            <select class="form-select" name="role">
                <option selected>Роли</option>
                <option value="1">Пользователь</option>
                <option value="2">Модератор</option>
                <option value="3">Админ</option>
            </select>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>

    <?php include "./pages/footer.php"?>

</body>
</html>

