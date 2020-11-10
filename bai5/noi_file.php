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
    	Nhap ma khach hang: <input type="text" name="makh"><br>
        <input type="submit" name="Load" value="Xem thong tin"><br><br>
    </form>
    <?php
    	include 'khachhhang.php';
		include 'donhang.php';
		$xml= new SimpleXMLElement("khachhang.xml",null,true);
		$xml1= new SimpleXMLElement("donhang.xml", null,true);
		$i=0;$j=0;
		$khachhang=array();
		$donhang=array();
		$ma="";
		$tenkhach="";
		$diachi="";
		if(isset($_POST['Load'])){
			echo "<table border='1' cellpadding='5' cellspacing='10'
					<tr>
						<td>Ten khach hang</td>
						<td>Ma hang</td>
						<td>Ten hang</td>
						<td>Don gia</td>
					</tr>
			";
			foreach($xml as $mh){
				$khachhang[$i]=new Khachhang($mh->makh,$mh->hoten,$mh->diachi);
				$i++;	
			}
			foreach($xml1 as $dh){
				$donhang[$j]=new Donhang($dh->makh, $dh->mahang, $dh->tenhang, $dh->dongia);
				$j++;
			}
			foreach($khachhang as $khach){
				if(($khach->getMakh()) == $_POST['makh']){
					$ma=$khach->getMakh();
					$tenkhach=$khach->getHoten();
					$diachi=$khach->getDiachi();	
					
				}
			}
			foreach($donhang as $don){
				if($don->getMakh() == $_POST['makh']){
					$mahang=$don->getMahang();
					$tenhang=$don->getTenhang();
					$dongia=$don->getDongia();
					echo "<tr>";
					echo "<td>$tenkhach</td>";
					echo "<td>$mahang</td>";
					echo "<td>$tenhang</td>";
					echo "<td>$dongia</td>"	;
					echo "</tr>";
				}
			}
		}
	?>
</body>
</html>