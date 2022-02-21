<?php 
require("../connect.php");
require_once("header.php");
$sql="SELECT * FROM articles_tb";
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
                        <a class="nav-link " href="artc_add.php">Додати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="artc_updata.php">Редагувати</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artc_delete.php">Видалити</a>
                    </li>
                </ul>
            </div>
            <div class="row after_menu"></div>
            <h2 align="center">Редагувати статтю</h2>
            <div class="row after_menu"></div>
            <form method="post" action="artc_updata.php">
                <select class="custom-select" name="selectSt">
                    <option selected>Виберіть статтю</option>
                    <?php 
                    while($result=mysqli_fetch_array($res)){
                        $a0=$result[0];
                        $a1=$result[1];
                        echo "<option value=\"$a0\"";
                        if(!empty($_POST['selectSt']) && $_POST['selectSt']=="$a0"){echo "selected";}
                        echo ">$a1</option>";
                    }
                    ?>
                </select><br><br>
                <input type="submit" class="btn btn-primary" value="Редагувати" name='123'></button>
                <br><hr><br>
                <?php 
                if(!empty($_POST['selectSt'])){
                    if($_POST['selectSt']!="Виберіть статтю"){
                        $a=$_POST['selectSt'];
                        $sql="SELECT * FROM articles_tb WHERE artc_id='$a'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);

                        ?>

                        <fieldset class="form-group">
                            <label for="titleNews">Номер статті</label>
                            <input type="text" class="form-control" name="article_num" value="<?php echo $result[1]?>">
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="textNews">Визначення</label>
                            <textarea rows="5" cols="30" name="definition" class="form-control" ><?php echo $result[2]?></textarea>
                        </fieldset>
                        <button type="submit" class="btn btn-primary" name="789">Зберегти зміни</button><br>
                        <?php 
                        if(isset($_POST['789'])){
                            $n=$_POST['article_num'];
                            $text=$_POST['definition'];
                            $id=$_POST['selectSt'];
                            $sql="UPDATE articles_tb SET artc_code='$n',artc_def='$text' WHERE artc_id='$id'";
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