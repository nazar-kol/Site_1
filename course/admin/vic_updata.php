<?php 
require("../connect.php");
require_once("header.php");
$sql="SELECT * FROM victims";
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
                        <a class="nav-link " href="vic_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="vic_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vic_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Редагувати дані про постраждалого</h2>
            <div class="row after_menu"></div>
            <form method="post" action="vic_updata.php">
                <select class="custom-select" name="selectVic">
                    <option selected>Виберіть постраждалого</option>
                    <?php 
                    while($result=mysqli_fetch_array($res)){
                        $a0=$result[0];
                        $a1=$result[1];
                        $a2=$result[2];
                        $a3=$result[3];

                        echo "<option value=\"$a0\"";
                        if(!empty($_POST['selectVic']) && $_POST['selectVic']=="$a0"){echo "selected";}
                        echo ">$a1</option>";
                    }
                    ?>
                </select><br><br>
                <input type="submit" class="btn btn-primary" value="Редагувати" name='123'></button>
                <br><hr><br>
                <?php 
                if(!empty($_POST['selectVic'])){
                    if($_POST['selectVic']!="Виберіть постраждалого"){
                        $a=$_POST['selectVic'];
                        $sql="SELECT * FROM victims WHERE victim_code = '$a'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        ?>

                        <fieldset class="form-group">
                            <label for="vic_pip">ПІП постраждалого</label>
                            <input type="text" class="form-control" name="vic_pip" value="<?php echo $result[1]?>">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="vic_birth">Дата народження</label>
                            <input type="text" class="form-control" name="vic_birth" value="<?php echo $result[2]?>">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="vic_sex">Стать</label>
                            <input list="vic_sex" class="form-control" name="vic_sex" value="<?php echo $result[3]?>">
                            <datalist id="vic_sex">
                                <option value="Чоловік">
                                    <option value="Жінка">
                                    </datalist>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="vic_address">Адреса</label>
                                    <input type="text" class="form-control" name="vic_address" value="<?php echo $result[4]?>">
                                </fieldset>
                                <button type="submit" class="btn btn-primary" name="789">Зберегти зміни</button><br>
                                <?php 
                                if(isset($_POST['789'])){
                                    $vic_pipp=$_POST['vic_pip'];
                                    $vic_birthh=$_POST['vic_birth'];
                                    $vic_sexx=$_POST['vic_sex'];
                                    $vic_addresss=$_POST['vic_address'];
                                    $id=$_POST['selectVic'];
                                    $sql="UPDATE victims SET vic_pip='$vic_pipp', vic_birth='$vic_birthh', vic_sex='$vic_sexx', vic_address='$vic_addresss' WHERE victim_code='$id'";
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