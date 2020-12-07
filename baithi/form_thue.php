<?php
    include './thue.php';
    $xmlk = new SimpleXMLElement("kh.xml", null, true);
    $xmlp = new SimpleXMLElement("phong.xml", null, true);
?>
<html>
    <body>
        <form action="" method="post">
            Makh: <select name="mak">
                <?php
                    foreach($xmlk as $vl){
                        $ma = $vl->makh;
                ?>
                    <option value="<?php echo $ma;?>"><?php echo $ma;?></option>
                <?php
                    }
                ?>
            </select><br>
            Map: <select name="map">
                <?php
                    foreach($xmlp as $vl){
                        $ma = $vl->maphong;
                ?>
                    <option value="<?php echo $ma;?>"><?php echo $ma;?></option>
                <?php
                    }
                ?>
            </select><br>
            So ngay: <input type="text" name="so"><br>
            <input type="submit" name="load" value="View">
            <input type="submit" name="add" value="Them">
            <input type="submit" name="update" value="Sua">
            <input type="submit" name="delete" value="Xoa">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['load'])){
        $ob = new T(0,0,0);
        $ob->load();
    }
    if(isset($_POST['add'])){
        $mak = $_POST['mak'];
        $map = $_POST['map'];
        $so = $_POST['so'];
        $ob = new T($mak, $map, $so);
        $ob->add();
    }
    if(isset($_POST['update'])){
        $mak = $_POST['mak'];
        $map = $_POST['map'];
        $so = $_POST['so'];
        $ob = new T($mak, $map, $so);
        $ob->update();
    }
    if(isset($_POST['delete'])){
        $mak = $_POST['mak'];
        $map = $_POST['map'];
        $so = $_POST['so'];
        $ob = new T($mak, $map, $so);
        $ob->delete();
    }
?>