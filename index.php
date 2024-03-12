<!DOCTYPE html>
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

        <?php
            $localhost = "localhost";
            $user = "root";
            $password = "";
            $database = "Study";
        
            $mysqli = new mysqli($localhost, $user, $password, $database);

            if($mysqli->connection_error) die("Не удалось подключиться к базе данных: " . $mysqli->connection_error);

            $result = $mysqli->query("SELECT * FROM post");

            if (!$result) {
                die("Некорректный запрос" . $mysqli->error);
            }
            
            if($_COOKIE["JWS"]){
                while ($row = $result->fetch_assoc()){
                    $show_img = base64_encode($row['image_post']);
                    echo "
                    <div class='row mb-2'>
                        <div class='col-md-6'>
                            <div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
                                <div class='col p-4 d-flex flex-column position-static'>
                                    <strong class='d-inline-block mb-2 text-success-emphasis'>$row[type_post]</strong>
                                    <h3 class='mb-0'>$row[title_post]</h3>
                                    <p class='mb-auto'>$row[description_post]</p>
                                </div>
                            </div>
                        </div>
                    </div> ";
                }
            } else {
                return;
            }
            
        ?>
            
        <?php include "./pages/footer.php"?>
    </div> 
</body>
</html>