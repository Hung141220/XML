<html>
    <body>
        <form action="" method="post">
            <input type="text" name="ma" placeholder="Nhap ma khach hang">
            <input type="submit" name="ok" value="Xem">
        </form>
    </body>
</html>
<?php
    include './khachhang.php';
    include './donhang.php';
    $xml = new SimpleXMLElement("donhang.xml", null, true);
    $xml1 = new SimpleXMLElement("khachhang.xml", null, true);
    if(isset($_POST['ok'])){
        echo "<table border='1'>
                <tr>
                    <td>Ten Khach Hang</td>
                    <td>Ten hang</td>
                    <td>Gia</td>
                </tr>
        ";
        foreach($xml1 as $vl){
            if($vl->mak == $_POST['ma']){
                echo "<tr>
                        <td>$vl->ten</td>
                ";
            }
        }
        foreach($xml as $vl){
            if($vl->mak == $_POST['ma']){
                echo "<td>$vl->ten</td>
                        <td>$vl->gia</td>";
            }
        }

        echo "</tr>";
        echo "</table>";
    }
?>