<?php
    include './p.php';
    $ma = "";
    $ten = "";
    $gia = "";
    if(isset($_GET['ma']) && isset($_GET['ten']) && isset($_GET['gia'])){
        $ma = $_GET['ma'];
        $ten = $_GET['ten'];
        $gia = $_GET['gia'];
    }
    if(isset($_POST['load'])){
        $ob = new P(0,0,0);
        $ob -> load();
        $ma = "";
        $ten = "";
        $gia = "";
    }
    if(isset($_POST['add'])){
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $ob = new P($ma, $ten, $gia);
        $ob->add();
    }
    if(isset($_POST['update'])){
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $ob = new P($ma, $ten, $gia);
        $ob->update();
    }
    if(isset($_POST['delete'])){
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $ob = new P($ma, $ten, $gia);
        $ob->delete();
    }
?>
<html>
    <body>
        <form action="" method="post">
            Map: <input type="text" name="ma" value="<?php echo $ma;?>"><br>
            Tenp: <input type="text" name="ten" value="<?php echo $ten;?>"><br>
            Gia: <input type="text" name="gia" value="<?php echo $gia;?>"><br>
            <input type="submit" name="load" value="View">
            <input type="submit" name="add" value="Them">
            <input type="submit" name="update" value="Sua">
            <input type="submit" name="delete" value="Xoa">
        </form>
    </body>
</html>