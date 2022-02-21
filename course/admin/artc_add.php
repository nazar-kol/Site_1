<?php 
require("../connect.php");
require_once("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="row first_div"></div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="row">
                <ul class="nav nav-tabs"align="center">
                    <li class="nav-item">
                        <a class="nav-link active" href="artc_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artc_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artc_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Додати статтю</h2>
            <div class="row after_menu"></div>
            <form action="artc_add.php" method="post">
                
                <fieldset class="form-group">
                    <label for="titleNews">Номер статті</label>
                    <input type="text" class="form-control" name="article_num">
                </fieldset>
                <fieldset class="form-group">
                    <label for="textNews">Визначення</label>
                    <textarea rows="5" cols="30" name="definition" class="form-control"></textarea>
                </fieldset>
                <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>
            </form>
            <?php
            if(isset($_POST['123'])){
                if(!empty($_POST['article_num']) and !empty($_POST['definition'])){
                    $n=$_POST['article_num'];
                    $text=$_POST['definition'];
                    $sql="INSERT INTO articles_tb(artc_code, artc_def) VALUES ('$n','$text')";
                    $res=mysqli_query($connect,$sql);
                } else {
                    echo '<script>alert(" *** Заповніть усі поля *** ")</script>';
                } 
            }?>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
</html>