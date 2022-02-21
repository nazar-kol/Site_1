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
                        <a class="nav-link" href="emp_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="emp_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Видалити дані про співробітника</h2>
            <div class="row after_menu"></div>
            <form method="post" action="emp_delete.php">
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
                <input type="submit" class="btn btn-primary" value="Видалити" name='123'></button>
                <br><hr><br>
                <?php 
                if(isset($_POST['123'])){
                    $id=$_POST['selectEmp'];
                    $sql="DELETE FROM employees WHERE emp_code='$id'";
                    $res=mysqli_query($connect,$sql);
                    echo '<script>alert(" *** Видалення успішно завершено *** ")</script>'; 
                } 
                ?>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
    
</body>
</html>