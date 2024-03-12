<!DOCTYPE html>

<?php

    $localhost = "localhost";
    $user = "root";
    $password = "";
    $database = "Study";

    $title = "";
    $description = "";
    $type_post = "";

    $error_message = "";
    $success_message = "";

    $mysqli = new mysqli($localhost, $user, $password, $database);

    if($mysqli->connection_error) die("Не удалось подключиться к базе данных: " . $mysqli->connection_error);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $type_post = $_POST["type"];

        do{
            if(trim($title) != "" || trim($description) != "" && trim($type_post) != ""){
                $result = $mysqli->query("INSERT INTO post(id_user, title_post, description_post, type_post) VALUES(10, '$title', '$description', '$type_post')");
                $success_message = "Записб успешно опубликована";
                break;
            } else {
                $error_message = "Не все поля заполнены";
                break;
            }
        } while(false);
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Главная страница</title>
</head>
<body>
    <div class="container">
        <?php include "./pages/header.php"?>
        <main class="form-signin w-100 m-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal">Добавить пост</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="title">
                <label for="floatingInput">Заголовок</label>
            </div>

            <div class="form-floating">
                <textarea type="text" class="form-control" name="description"></textarea>
                <label for="floatingInput">Описание</label>
            </div>

            <select class="form-select" name="type">
                <option selected>Тип поста</option>
                <option value="Развлекательный">Развлекательный</option>
                <option value="Срочные новости">Срочные новости</option>
                <option value="Новинки">Новинки</option>
            </select>

            <?php if(!empty($error_message)): ?>
                <?php
                    echo "
                    <div class='alert alert-warning' role='alert'>
                        $error_message
                    </div>
                "?>
            <?php elseif(!empty($success_message)): ?>
                <?php
                    echo "
                    <div class='alert alert-success' role='alert'>
                        $success_message
                    </div>
                "?>
            <?php endif; ?>
            <button class="btn btn-primary w-100 py-2" type="submit">Выложить</button>
        </form>
    </main>
        <?php include "./pages/footer.php"?>
    </div> 
</body>
</html>