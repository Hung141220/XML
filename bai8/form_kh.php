<?php
    include './khachhang.php';
    $ma = "";
    $ten = "";
    $dc = "";
    if(isset($_GET['ma']) && isset($_GET['ten']) && $_GET['dc']){
        $ma = $_GET['ma'];
        $ten = $_GET['ten'];
        $dc = $_GET['dc'];
    }
?>
<html>
    <body>
        <form action="" method="post">
            Makh: <input type="text" name="ma" value="<?php echo $ma;?>"><br>
            Tenkh: <input type="text" name="ten" value="<?php echo $ten;?>"><br>
            Diachi: <input type="text" name="dc" value="<?php echo $dc;?>"><br>
            <input type="submit" name="load" value="View">
            <input type="submit" name="add" value="Them">
            <input type="submit" name="update" value="Sua">
            <input type="submit" name="delete" value="Xoa">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['load'])){
        $ob = new KH(0, 0, 0);
        $ob->load();
    }
    if(isset($_POST['add'])){
        $maf = $_POST['ma'];
        $tenf = $_POST['ten'];
        $dcf = $_POST['dc'];
        $ob = new KH($maf, $tenf, $dcf);
        $ob->add();
    }
    if(isset($_POST['update'])){
        $maf = $_POST['ma'];
        $tenf = $_POST['ten'];
        $dcf = $_POST['dc'];
        $ob = new KH($maf, $tenf, $dcf);
        $ob->update();
    }
    if(isset($_POST['delete'])){
        $maf = $_POST['ma'];
        $tenf = $_POST['ten'];
        $dcf = $_POST['dc'];
        $ob = new KH($maf, $tenf, $dcf);
        $ob->delete();
    }
?>