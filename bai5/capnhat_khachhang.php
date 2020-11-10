<?php
	include 'header.php';
?>
<html>
	<body>
    	<form method="post">
        	Ma khach: <input type="text" name="makh"><br>
            Ho ten: <input type="text" name="hoten"><br>
            Dia chi: <input type="text" name="diachi"><br>
            <input type="submit" name="Add" value="Them">
            <input type="submit" name="Update" value="Sua">
            <input type="submit" name="Delete" value="Xoa">
            <input type="submit" name="Load" value="Xem thong tin"> 
        </form>
        <?php
        	require 'khachhhang.php';
			$xml=new SimpleXMLElement("khachhang.xml",null,true);
			if(isset($_POST['Load'])){
				echo "<table border='1' cellpadding='5' cellspacing='10'>";
				echo "<tr>
							<td>Ma khach</td>
							<td>Ho ten</td>
							<td>Dia chi</td>
						</tr>";
				foreach($xml as $vl){
					echo "<tr>
							<td>{$vl->makh}</td>
							<td>{$vl->hoten}</td>
							<td>{$vl->diachi}</td>
						</tr>";	
				}
				echo "</table>";
			}
			if(isset($_POST['Add'])){
				$ma=$_POST['makh'];
				$ten=$_POST['hoten'];
				$dc=$_POST['diachi'];
				$khachhang=new Khachhang($ma,$ten,$dc);
				$khachhang->add();
			}
			if(isset($_POST['Update'])){
				$ma=$_POST['makh'];
				$ten=$_POST['hoten'];
				$dc=$_POST['diachi'];
				$khachhang=new Khachhang($ma,$ten,$dc);
				$khachhang->update();
			}
			if(isset($_POST['Delete'])){
				$ma=$_POST['makh'];
				$ten=$_POST['hoten'];
				$dc=$_POST['diachi'];
				$khachhang=new Khachhang($ma,$ten,$dc);
				$khachhang->delete();
			}
		?>
    </body>
</html>