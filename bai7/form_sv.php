<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        include './sinhvien.php';
        $ma = "";
        $ten = "";
        $gt = "";
        if(isset($_GET['masv']) && isset($_GET['tensv']) && isset($_GET['gtsv'])){
            $ma = $_GET['masv'];
            $ten = $_GET['tensv'];
            $gt = $_GET['gtsv'];
        }
        if(isset($_POST['load'])){
            $masv = $_POST['ma'];
            $tensv = $_POST['ten'];
            $gtsv = $_POST['gt'];
            $ob = new Sinhvien(0, 0, 0);
            $ob->load();
            $ma = "";
            $ten = "";
            $gt = "";
        }
        if(isset($_POST['update'])){
            $masv = $_POST['ma'];
            $tensv = $_POST['ten'];
            $gtsv = $_POST['gt'];
            $ob = new Sinhvien($masv, $tensv, $gtsv);
            $ob->update();
        }
        if(isset($_POST['delete'])){
            $masv = $_POST['ma'];
            $tensv = $_POST['ten'];
            $gtsv = $_POST['gt'];
            $ob = new Sinhvien($masv, $tensv, $gtsv);
            $ob->delete();
        }
        if(isset($_POST['add'])){
            $masv = $_POST['ma'];
            $tensv = $_POST['ten'];
            $gtsv = $_POST['gt'];
            $ob = new Sinhvien($masv, $tensv, $gtsv);
            $ob->add();
        }
        
    ?>
    <form action="" method="post">
        Masv: <input type="text" name="ma" value="<?php echo $ma;?>"><br>
        Hotensv: <input type="text" name="ten" value="<?php echo $ten;?>"><br>
        Gioitinh: <input type="text" name="gt" value="<?php echo $gt;?>"><br>
        <input type="submit" name="load" value="view">
        <input type="submit" name="update" value="Sua">
        <input type="submit" name="delete" value="Xoa">
        <input type="submit" name="add" value="Them">
    </form>
</body>
</html>