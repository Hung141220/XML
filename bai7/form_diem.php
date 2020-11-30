<?php
    include './diem.php';
    $xmlsv = new SimpleXMLElement("sv.xml", null, true);
    $xmlm = new SimpleXMLElement("mon.xml", null, true);
    $xml = new SimpleXMLElement("diem.xml", null, true);
?>
<html>
    <body>
        <form action="" method="post">
            MaSV: <select name="masv">
                <?php
                    foreach($xmlsv as $sv){
                        echo "<option value='{$sv->masv}'>{$sv->masv}</option>";
                    }
                ?>
            </select><br>
            MaMH: <select name="mamh">
                <?php
                    foreach($xmlm as $mh){
                        echo "<option value='{$mh->mamh}'>{$mh->mamh}</option>";
                    }
                ?>
            </select><br>
            Diem: <input type="text" name="diem"><br>
            <input type="submit" name="load" value="View">
            <input type="submit" name="add" value="Them">
            <input type="submit" name="update" value="Sua">
            <input type="submit" name="delete" value="Xoa">
        </form>
    </body>
</html>
<?php
    $ob = new Diem(0,0,0);
    if(isset($_POST['load'])){
        $ob->load();
    }
    if(isset($_POST['add'])){
        $masv = $_POST['masv'];
        $mamh = $_POST['mamh'];
        $diem = $_POST['diem'];
        $ob = new Diem($masv, $mamh, $diem);
        $ob->add();
    }
    if(isset($_POST['update'])){
        $masv = $_POST['masv'];
        $mamh = $_POST['mamh'];
        $diem = $_POST['diem'];
        $ob = new Diem($masv, $mamh, $diem);
        $ob->update();
    }
    if(isset($_POST['delete'])){
        $masv = $_POST['masv'];
        $mamh = $_POST['mamh'];
        $diem = $_POST['diem'];
        $ob = new Diem($masv, $mamh, $diem);
        $ob->delete();
    }
?>