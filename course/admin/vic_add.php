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
                        <a class="nav-link active" href="vic_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vic_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vic_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Додати постраждалого</h2>
            <div class="row after_menu"></div>
            <form action="vic_add.php" method="post">

               <fieldset class="form-group">
                <label for="vic_pip">ПІП постраждалого</label>
                <input type="text" class="form-control" name="vic_pip">
            </fieldset>
            <fieldset class="form-group">
                <label for="vic_birth">Дата народження</label>
                <input type="text" class="form-control" name="vic_birth">
            </fieldset>
            <fieldset class="form-group">
                <label for="vic_sex">Стать</label>
                <input list="vic_sex" class="form-control" name="vic_sex">
                <datalist id="vic_sex">
                    <option value="Чоловік">
                        <option value="Жінка">
                        </datalist>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="vic_address">Адреса</label>
                        <input type="text" class="form-control" name="vic_address">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>
                </form>
                <?php
                if(isset($_POST['123'])){
                    if(!empty($_POST['vic_pip']) and !empty($_POST['vic_birth']) and !empty($_POST['vic_sex']) and !empty($_POST['vic_address'])){
                        $vic_pipp=$_POST['vic_pip'];
                        $vic_birthh=$_POST['vic_birth'];
                        $vic_sexx=$_POST['vic_sex'];
                        $vic_addresss=$_POST['vic_address'];

                        $sql="INSERT INTO victims(vic_pip, vic_birth, vic_sex, vic_address) VALUES ('$vic_pipp','$vic_birthh', '$vic_sexx', '$vic_addresss')";
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