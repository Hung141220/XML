<?php
    include './p.php';
    include './kh.php';
    include './thue.php';
?>
<html>
    <body>
        <form action="" method="post">
            <input name="mak" type="text" placeholder="Nhap ma khach hang..."><br>
            <input type="text" name="map" placeholder="Nhap ma phong..."><br>
            <input type="submit" name="ok" value="Xem">
        </form>
    </body>
</html>
<?php
    $xmlk = new SimpleXMLElement("kh.xml", null, true);
    $xmlp = new SimpleXMLElement("phong.xml", null, true);
    $xmlt = new SimpleXMLElement("thue.xml", null, true);
    if(isset($_POST['ok'])){
        echo "<table border='1'>
                <tr>
                    <td>Ten KH</td>
                    <td>Ten Phong</td>
                    <td>Gia</td>
                    <td>So ngay</td>
                    <td>Tong tien</td>
                </tr>
        ";
        foreach($xmlk as $vl){
            if($vl->makh == $_POST['mak']){
            echo "<tr>
                    <td>{$vl->makh}</td>
            ";
            }
        }
        $gia = "";
        foreach($xmlp as $vl){
            if($vl->maphong == $_POST['map']){
                $gia = $vl->gia;
                echo "<td>{$vl->tenphong}</td>
                    <td>{$vl->gia}</td>
                ";
            }
            
        }
        $so = "";
        foreach($xmlt as $vl){
            if($vl->makh == $_POST['mak']){
                $so = $vl->songay;
                echo "
                        <td>{$vl->songay}</td>
                ";
            }
        }
        echo "<td>";
        $sum = $gia * $so;
        echo "$sum";
        echo "</td>

        </tr>";
        echo "</table>";
    }
?>