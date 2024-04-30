<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Меньшиков А.Д.</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container nav_bar">
            <div class="row">
                <div class="row">
                    <div class="col-3 nav_logo"></div>
                    <div class="col-9">
                        <div class="nav_text">Информация обо мне!</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Коротко обо мне!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <p>
                        <h3>Меньшиков Александр - ваш персональный кибер-ниндзя, готовый расправиться с любыми цифровыми злодеями,
                         будь то вирусы, хакеры или те самые "случайные" клики по подозрительным ссылкам. 
                         Мои алгоритмы защиты такие же непроницаемые, как китайская стена, и я могу развлекать вас шутками о нулевом дне,
                          чтобы не дать врагам шансов. Доверьтесь мне, и я защищу вашу информацию с таким же рвением, как кот защищает свою коробку!</h3>
                    </p>
                    <div class="title_text"><i>Текст сформирован ChatGPT 3.5</i></div>
                </div>
                <div class="col-4">
                    <div class="row Kandinsky"></div>
                    <div class="title_photo"><p>Меньшиков А.Д.</p></div>
                </div>
            </div>   
        </div>
        <div class="container">
            <div class="row">
                <div class="button_js col-12">
                    <button id="myButton">Click me</button>
                    <p id="demo"></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="hello">
                        Привет,<?php echo $_COOKIE['User'];?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="/profile.php" enctype="multipart/form-data" name="upload">
                        <input class="form" type="text" name="title" placeholder="Заголовок вашего поста">
                        <textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста ..."></textarea>
                        <input type="file" class="form" name="file" /><br>
                        <button type="submit" class="btn_red" name="submit">Отправить</button>
                    </form>
                </div>
            </div>   
        </div>
        <script type="text/javascript" src="js/button.js"></script>
    </body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'mariadb', 'users_db');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ('Заполните все поля!');

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
}
?>