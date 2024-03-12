<!DOCTYPE html>

<?php

    $localhost = "localhost";
    $user = "root";
    $password = "";
    $database = "Study";

    $email = "";
    $password = "";

    $mysqli = new mysqli($localhost, $user, $password, $database);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
    }

    $result = $mysqli->query("SELECT role, password FROM users WHERE email = '$email'");

    $field_result = $result->fetch_row();
    

    $db_password = $field_result[1];

    $num_rows = $result -> num_rows;

    if($num_rows != 0 && $password == $db_password){
        setcookie("role", $field_result[0], time() + 10000, "/");
        setcookie("JWS", $password, time() + 10000, "/");
        header("Location: /index.php");
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
                <input type="email" class="form-control" name="email">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>

    <?php include "./pages/footer.php"?>

</body>
</html>

