<?php 
require("../connect.php");
require_once("header.php");

$sql="SELECT * FROM victims ";
$res_victim=mysqli_query($connect,$sql);

$sql="SELECT * FROM articles_tb ";
$res_articlee=mysqli_query($connect,$sql);

$sql="SELECT * FROM employees ";
$res_emp=mysqli_query($connect,$sql);
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
                        <a class="nav-link active" href="off_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="off_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="off_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Додати порушника</h2>
            <div class="row after_menu"></div>
            <form action="off_add.php" method="post">

                <fieldset class="form-group">
                    <label for="off_pip">ПІП порушника</label>
                    <input type="text" class="form-control" name="off_pip">
                </fieldset>
                <fieldset class="form-group">
                    <label for="off_birth">Дата народження</label>
                    <input type="text" class="form-control" name="off_birth">
                </fieldset>
                <fieldset class="form-group">
                    <label for="off_sex">Стать</label>
                    <input list="off_sex" class="form-control" name="off_sex">
                    <datalist id="off_sex">
                        <option value="Чоловік">
                            <option value="Жінка">
                            </datalist>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="off_address">Адреса</label>
                            <input type="text" class="form-control" name="off_address">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="victim_code">Постраждалий</label>
                            <select class="custom-select" name="selectVictim">
                                <option selected>Виберіть постраждалого</option>
                                <?php 
                                while($result=mysqli_fetch_array($res_victim)){
                                    $a0=$result[0];
                                    $a1=$result[1];
                                    echo "<option value=\"$a0\"";
                                    if(!empty($_POST['selectVictim']) && $_POST['selectVictim']=="$a0"){echo "selected";}
                                    echo ">$a1</option>";
                                }
                                ?>
                            </select><br><br>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="articlee">Стаття</label>
                            <select class="custom-select" name="selectArt">
                                <option selected>Виберіть статтю</option>
                                <?php 
                                while($result=mysqli_fetch_array($res_articlee)){
                                    $a0=$result[0];
                                    $a1=$result[1];
                                    echo "<option value=\"$a0\"";
                                    if(!empty($_POST['selectArt']) && $_POST['selectArt']=="$a0"){echo "selected";}
                                    echo ">$a1</option>";
                                }
                                ?>
                            </select><br><br>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="emp_code">Співробітник</label>
                            <select class="custom-select" name="selectEmp">
                                <option selected>Виберіть співробітника</option>
                                <?php 
                                while($result=mysqli_fetch_array($res_emp)){
                                    $a0=$result[0];
                                    $a1=$result[1];
                                    echo "<option value=\"$a0\"";
                                    if(!empty($_POST['selectEmp']) && $_POST['selectEmp']=="$a0"){echo "selected";}
                                    echo ">$a1</option>";
                                }
                                ?>
                            </select><br><br>
                        </fieldset>
                        
                        <button type="submit" class="btn btn-primary" value="123" name="123">Зберегти</button>
                    </form>
                    <?php
                    if(isset($_POST['123'])){
                        if(!empty($_POST['off_pip']) and !empty($_POST['off_birth']) and !empty($_POST['off_sex']) and !empty($_POST['off_address']) and !empty($_POST['selectVictim']) and !empty($_POST['selectArt']) and !empty($_POST['selectEmp'])){
                            $off_pipp=$_POST['off_pip'];
                            $off_birthh=$_POST['off_birth'];
                            $off_sexx=$_POST['off_sex'];
                            $off_addresss=$_POST['off_address'];
                            $selectVictimm=$_POST['selectVictim'];
                            $selectArtt=$_POST['selectArt'];
                            $selectEmpp=$_POST['selectEmp'];
                            $sql="INSERT INTO offender (off_pip, off_birth, off_sex, off_address, victim_code, articlee, emp_code) VALUES ('$off_pipp','$off_birthh','$off_sexx','$off_addresss','$selectVictimm','$selectArtt','$selectEmpp')";
                            $res=mysqli_query($connect,$sql);
                        } else {
                            echo '  * Заповніть усі поля!';
                        } 
                    }?>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </body>
        </html>