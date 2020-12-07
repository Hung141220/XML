<?php
    include './kh.php';
    $ma = "";
    $ten = "";
    $dc = "";
    if(isset($_GET['ma']) && isset($_GET['ten']) && isset($_GET['dc'])){
        $ma = $_GET['ma'];
        $ten = $_GET['ten'];
        $dc = $_GET['dc'];
    }
    if(isset($_POST['load'])){
        $ob = new KH(0,0,0);
        $ob -> load();
        $ma = "";
        $ten = "";
        $dc = "";
    }
    if(isset($_POST['add'])){
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $dc = $_POST['dc'];
        $ob = new KH($ma, $ten, $dc);
        $ob->add();
    }
    if(isset($_POST['update'])){
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $dc = $_POST['dc'];
        $ob = new KH($ma, $ten, $dc);
        $ob->update();
    }
    if(isset($_POST['delete'])){
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $dc = $_POST['dc'];
        $ob = new KH($ma, $ten, $dc);
        $ob->delete();
    }
?>
<html>
    <body>
        <form action="" method="post">
            Makh: <input type="text" name="ma" value="<?php echo $ma;?>"><br>
            Tenkh: <input type="text" name="ten" value="<?php echo $ten;?>"><br>
            DC: <input type="text" name="dc" value="<?php echo $dc;?>"><br>
            <input type="submit" name="load" value="View">
            <input type="submit" name="add" value="Them">
            <input type="submit" name="update" value="Sua">
            <input type="submit" name="delete" value="Xoa">
        </form>
    </body>
</html>