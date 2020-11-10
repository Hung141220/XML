<?php
	include 'header.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<form method="post">
    	Ma khach hang: <select name="makh">
        <?php
			include 'donhang.php';
			include 'khachhhang.php';
        	$j=0;$k=0;
			$xml=new SimpleXMLElement("donhang.xml",null,true);
			$xml1=new SimpleXMLElement("khachhang.xml",null,true);
			$donhang=array();
			$khachhang=array();
			foreach($xml as $dh){
				$donhang[$j]=new Donhang($dh->makh, $dh->mahang, $dh->tenhang, $dh->dongia);
				$j++;	
			}
			foreach($xml1 as $kh){
				$khachhang[$k]=new Khachhang($kh->makh, $kh->hoten, $kh->diachi);
				$k++;
			}
			for($i=0; $i < $k; $i++){
				$makh=$khachhang[$i]->getMakh();
				echo "<option value='$makh'>$makh</option>";	
			}
			
		?>
        </select><br>
        Ma hang: <input type="text" name="mahang"><br>
        Ten hang: <input type="text" name="tenhang"><br>
        Don gia: <input type="text" name="dongia"><br>
        <input type="submit" name="Add" value="Them">
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa">
        <input type="submit" name="Load" value="Xem thong tin">
    </form>
    <?php
    	if(isset($_POST['Load'])){
			echo "<table border='1' cellpadding='5' cellspacing='10'>
					<tr>
						<td>Ma khach</td>
						<td>Ma hang</td>
						<td>Ten hang</td>
						<td>Don gia</td>
					</tr>";	
			foreach($donhang as $dh){
				echo "<tr>
						<td>{$dh->getMakh()}</td>
						<td>{$dh->getMahang()}</td>
						<td>{$dh->getTenhang()}</td>
						<td>{$dh->getDongia()}</td>
					</tr>";	
			}
			echo "</table>";
		}
		if(isset($_POST['Add'])){
			$ma=$_POST['makh'];
			$ma1=$_POST['mahang'];
			$ten=$_POST['tenhang'];
			$gia=$_POST['dongia'];
			$donhang= new Donhang($ma,$ma1,$ten,$gia);
			$donhang->add();	
		}
		if(isset($_POST['Update'])){
			$ma=$_POST['makh'];
			$ma1=$_POST['mahang'];
			$ten=$_POST['tenhang'];
			$gia=$_POST['dongia'];
			$donhang= new Donhang($ma,$ma1,$ten,$gia);
			$donhang->update();	
		}
		if(isset($_POST['Delete'])){
			$ma=$_POST['makh'];
			$ma1=$_POST['mahang'];
			$ten=$_POST['tenhang'];
			$gia=$_POST['dongia'];
			$donhang= new Donhang($ma,$ma1,$ten,$gia);
			$donhang->delete();	
		}
	?>
</body>
</html>