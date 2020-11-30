<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include './mon.php';
        $ma = "";
        $ten = "";
        $so = "";
        if(isset($_GET['ma1']) && isset($_GET['ten1']) && isset($_GET['so1'])){
            $ma = $_GET['ma1'];
            $ten = $_GET['ten1'];
            $so = $_GET['so1'];
        }
        
    ?>
    <form action="" method="post">
        Ma mon: <input type="text" name="ma" value="<?php echo $ma;?>"><br>
        Ten mon: <input type="text" name="ten" value="<?php echo $ten;?>"><br>
        So tc: <input type="text" name="so" value="<?php echo $so;?>"><br>
        <input type="submit" name="load" value="View">
        <input type="submit" name="add" value="Them">
        <input type="submit" name="update" value="Sua">
        <input type="submit" name="delete" value="Xoa">
    </form>
    <?php
        if(isset($_POST['load'])){
            $mam = $_POST['ma'];
            $tenm = $_POST['ten'];
            $som = $_POST['so'];
            $ob = new Mon("", "", "");
            $ob->load();
        }
        if(isset($_POST['add'])){
            $mam = $_POST['ma'];
            $tenm = $_POST['ten'];
            $som = $_POST['so'];
            $ob = new Mon($mam, $tenm, $som);
            $ob->add();
        }
        if(isset($_POST['update'])){
            $mam = $_POST['ma'];
            $tenm = $_POST['ten'];
            $som = $_POST['so'];
            $ob = new Mon($mam, $tenm, $som);
            $ob->update();
        }
        if(isset($_POST['delete'])){
            $mam = $_POST['ma'];
            $tenm = $_POST['ten'];
            $som = $_POST['so'];
            $ob = new Mon($mam, $tenm, $som);
            $ob->delete();
        }
        
    ?>
</body>
</html>