<?php 
require("../connect.php");
require_once("header.php");
$sql="SELECT * FROM employees";
$res=mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
</head>
<body>
    <div class="row first_div"></div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="row" >
                <ul class="nav nav-tabs"align="center">
                    <li class="nav-item">
                        <a class="nav-link " href="emp_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="emp_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="emp_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Редагувати дані про співробітника</h2>
            <div class="row after_menu"></div>
            <form method="post" action="emp_updata.php">
                <select class="custom-select" name="selectEmp">
                    <option selected>Виберіть співробітника</option>
                    <?php 
                    while($result=mysqli_fetch_array($res)){
                        $a0=$result[0];
                        $a1=$result[1];
                        $a2=$result[2];
                        $a3=$result[3];
                        $a4=$result[4];
                        $a5=$result[5];
                        $a6=$result[6];
                        $a7=$result[7];

                        echo "<option value=\"$a0\"";
                        if(!empty($_POST['selectEmp']) && $_POST['selectEmp']=="$a0"){echo "selected";}
                        echo ">$a1</option>";
                    }
                    ?>
                </select><br><br>
                <input type="submit" class="btn btn-primary" value="Редагувати" name='123'></button>
                <br><hr><br>
                <?php 
                if(!empty($_POST['selectEmp'])){
                    if($_POST['selectEmp']!="Виберіть співробітника"){
                        $a=$_POST['selectEmp'];
                        $sql="SELECT * FROM employees WHERE emp_code = '$a'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        ?>

                        <fieldset class="form-group">
                            <label for="emp_pip">ПІП співробітника</label>
                            <input type="text" class="form-control" name="emp_pip" value="<?php echo $result[1]?>">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="emp_age">Вік</label>
                            <input type="text" class="form-control" name="emp_age" value="<?php echo $result[2]?>">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="emp_sex">Стать</label>
                            <input list="emp_sex" class="form-control" name="emp_sex" value="<?php echo $result[3]?>">
                            <datalist id="emp_sex">
                                <option value="Чоловік">
                                    <option value="Жінка">
                                    </datalist>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="emp_address">Адреса</label>
                                    <input type="text" class="form-control" name="emp_address" value="<?php echo $result[4]?>">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="emp_phone">Номер телефону</label>
                                    <input type="text" class="form-control" name="emp_phone" value="<?php echo $result[5]?>">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="emp_passport">Номер паспорта</label>
                                    <input type="text" class="form-control" name="emp_passport" value="<?php echo $result[6]?>">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="emp_posit">Посада</label>
                                    <input type="text" class="form-control" name="emp_posit" value="<?php echo $result[7]?>">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="emp_rank">Звання</label>
                                    <input type="text" class="form-control" name="emp_rank" value="<?php echo $result[8]?>">
                                </fieldset>
                                <button type="submit" class="btn btn-primary" name="789">Зберегти зміни</button><br>
                                <?php 
                                if(isset($_POST['789'])){
                                    $emp_pipp=$_POST['emp_pip'];
                                    $emp_age=$_POST['emp_age'];
                                    $emp_sexx=$_POST['emp_sex'];
                                    $emp_addresss=$_POST['emp_address'];
                                    $emp_phonee=$_POST['emp_phone'];
                                    $emp_passportt=$_POST['emp_passport'];
                                    $emp_positt=$_POST['emp_posit'];
                                    $emp_rankk=$_POST['emp_rank'];
                                    $id=$_POST['selectEmp'];
                                    $sql="UPDATE employees SET emp_pip='$emp_pipp', emp_age='$emp_age', emp_sex='$emp_sexx', emp_address='$emp_addresss', emp_phone='$emp_phonee', emp_passport='$emp_passportt', emp_posit='$emp_positt', emp_rank='$emp_rankk' WHERE emp_code='$id'";
                                    $res=mysqli_query($connect,$sql);
                                    if($res){
                                        echo '<script>alert(" *** Редагування успішно завершено *** ")</script>'; 
                                    } }
                                } }
                                ?>
                            </form>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                </body>
                </html>