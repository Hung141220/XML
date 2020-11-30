<?php
    include './khachhang.php';
    include './donhang.php';
    $mak = "";
    $mah = "";
    $ten = "";
    $gia = "";
    $ob = new DH(0,0,0,0);
    $kq = $ob->select();
?>
<html>
    <body>
        <form action="" method="post">
            Makh: <select name="mak">
                        <?php
                            foreach($kq as $vl){
                                $i=0;
                         ?>       
                         <option value="<?php echo $vl[$i];?>"?>
                                <?php echo $vl[$i];?>
                        </option>
                        <?php
                               $i++; 
                            }
                        ?>    
                    </select><br>
            Mah: <input type="text" name="mah" value="<?php echo $mah;?>"><br>
            Tenh: <input type="text" name="ten" value="<?php echo $ten;?>"><br>
            Gia: <input type="text" name="gia" value="<?php echo $gia;?>"><br>
            <input type="submit" name="load" value="View">
            <input type="submit" name="add" value="Them">
            <input type="submit" name="update" value="Sua">
            <input type="submit" name="delete" value="Xoa">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['load'])){
        $ob->load();
    }
    if(isset($_POST['add'])){
        $mak = $_POST['mak'];
        $mah = $_POST['mah'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $ob = new DH($mak, $mah, $ten, $gia);
        $ob->add();
    }
    if(isset($_POST['update'])){
        $mak = $_POST['mak'];
        $mah = $_POST['mah'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $ob = new DH($mak, $mah, $ten, $gia);
        $ob->update();
    }
    if(isset($_POST['delete'])){
        $mak = $_POST['mak'];
        $mah = $_POST['mah'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $ob = new DH($mak, $mah, $ten, $gia);
        $ob->delete();
    }
?>
