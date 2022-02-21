<?php 
require("../connect.php");
require_once("header.php");

$sql="SELECT * FROM offender ";
$res_off=mysqli_query($connect,$sql);

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
                        <a class="nav-link " href="off_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="off_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="off_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Редагувати дані про порушника</h2>
            <div class="row after_menu"></div>
            <form method="post" action="off_updata.php">
                <select class="custom-select" name="selectOff">
                    <option selected>Виберіть порушника</option>
                    <?php 
                    while($result=mysqli_fetch_array($res_off)){
                        $a0=$result[0];
                        $a1=$result[1];
                        $a2=$result[2];
                        $a3=$result[3];
                        $a4=$result[4];
                        $a5=$result[5];
                        $a6=$result[6];

                        echo "<option value=\"$a0\"";
                        if(!empty($_POST['selectOff']) && $_POST['selectOff']=="$a0"){echo "selected";}
                        echo ">$a1</option>";
                    }
                    ?>
                </select><br><br>
                <input type="submit" class="btn btn-primary" value="Редагувати" name='123'></button>
                <br><hr><br>
                <?php 
                if(!empty($_POST['selectOff'])){
                    if($_POST['selectOff']!="Виберіть порушника"){
                        $a=$_POST['selectOff'];
                        $sql="SELECT * FROM offender WHERE off_code = '$a'";
                        $res_off=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res_off);
                        ?>

                        <fieldset class="form-group">
                            <label for="off_pip">ПІП порушника</label>
                            <input type="text" class="form-control" name="off_pip" value="<?php echo $result[1];?>">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="off_birth">Дата народження</label>
                            <input type="text" class="form-control" name="off_birth" value="<?php echo $result[2];?>">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="off_sex">Стать</label>
                            <input list="off_sex" class="form-control" name="off_sex" value="<?php echo $result[3];?>">
                            <datalist id="off_sex">
                                <option value="Чоловік">
                                    <option value="Жінка">
                                    </datalist>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="off_address">Адреса</label>
                                    <input type="text" class="form-control" name="off_address" value="<?php echo $result[4]?>">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="victim_code">Постраждалий</label>
                                    <select class="custom-select" name="selectVictim" value="<?php echo $result[5];?>">
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
                                    <select class="custom-select" name="selectArt" value="<?php echo $result[6];?>">
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
                                    <select class="custom-select" name="selectEmp" value="<?php echo $result[7];?>">
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

                                <button type="submit" class="btn btn-primary" name="789">Зберегти зміни</button><br>
                                <?php 
                                if(isset($_POST['789'])){
                                    $off_pipp=$_POST['off_pip'];
                                    $off_birthh=$_POST['off_birth'];
                                    $off_sexx=$_POST['off_sex'];
                                    $off_addresss=$_POST['off_address'];
                                    $selectVictimm=$_POST['selectVictim'];
                                    $selectArtt=$_POST['selectArt'];
                                    $selectEmpp=$_POST['selectEmp'];
                                    $id=$_POST['selectOff'];
                                    $sql="UPDATE offender SET off_pip='$off_pipp', off_birth='$off_birthh', off_sex='$off_sexx', off_address='$off_addresss', selectVictim='$selectVictimm', selectArt='$selectArtt', selectEmp='$selectEmpp' WHERE off_code='$id'";
                                    $sql="SELECT * FROM offender ";
                                    $res_off=mysqli_query($connect,$sql);
                                    if($res_off){
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