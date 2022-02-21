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
                        <a class="nav-link active" href="emp_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Додати співробітника</h2>
            <div class="row after_menu"></div>
            <form action="emp_add.php" method="post">

             <fieldset class="form-group">
                <label for="emp_pip">ПІП співробітника</label>
                <input type="text" class="form-control" name="emp_pip">
            </fieldset>
            <fieldset class="form-group">
                <label for="emp_age">Вік</label>
                <input type="text" class="form-control" name="emp_age">
            </fieldset>
            <fieldset class="form-group">
                <label for="emp_sex">Стать</label>
                <input list="emp_sex" class="form-control" name="emp_sex">
                <datalist id="emp_sex">
                    <option value="Чоловік">
                        <option value="Жінка">
                        </datalist>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="emp_address">Адреса</label>
                        <input type="text" class="form-control" name="emp_address">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="emp_phone">Номер телефону</label>
                        <input type="text" class="form-control" name="emp_phone">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="emp_passport">Номер паспорта</label>
                        <input type="text" class="form-control" name="emp_passport">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="emp_posit">Посада</label>
                        <input type="text" class="form-control" name="emp_posit">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="emp_rank">Звання</label>
                        <input type="text" class="form-control" name="emp_rank">
                    </fieldset>
                    <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>
                </form>
                <?php
                if(isset($_POST['123'])){
                    if(!empty($_POST['emp_pip']) and !empty($_POST['emp_age']) and !empty($_POST['emp_sex']) and !empty($_POST['emp_address']) and !empty($_POST['emp_phone']) and !empty($_POST['emp_passport']) and !empty($_POST['emp_posit']) and !empty($_POST['emp_rank'])){
                        $emp_pipp=$_POST['emp_pip'];
                        $emp_age=$_POST['emp_age'];
                        $emp_sexx=$_POST['emp_sex'];
                        $emp_addresss=$_POST['emp_address'];
                        $emp_phonee=$_POST['emp_phone'];
                        $emp_passportt=$_POST['emp_passport'];
                        $emp_positt=$_POST['emp_posit'];
                        $emp_rankk=$_POST['emp_rank'];

                        $sql="INSERT INTO employees(emp_pip, emp_age, emp_sex, emp_address, emp_phone, emp_passport, emp_posit, emp_rank) VALUES ('$emp_pipp','$emp_age', '$emp_sexx', '$emp_addresss', '$emp_phonee', '$emp_passportt', '$emp_positt', '$emp_rankk')";
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