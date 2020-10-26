<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $phanthuc1=0;$phanao1=0;
        $phanthuc2=0;$phanao2=0;
        $pt3=0;$pa3=0;
        require('sophuc.php');
        if(isset($_POST['load'])){
            $xml=new SimpleXMLElement("sophucs.xml",null,true);
            $phanthuc1=$xml->sophuc[0]->phanthuc;
            $phanao1=$xml->sophuc[0]->phanao;
            $phanthuc2=$xml->sophuc[1]->phanthuc;
            $phanao2=$xml->sophuc[1]->phanao;
        }
    ?>
    <?php
        if(isset($_POST['cong'])){
            $phanthuc1=$_POST['pt1'];
            $phanao1=$_POST['pa1'];
            $phanthuc2=$_POST['pt2'];
            $phanao2=$_POST['pa2'];
            $sp1=new Sophuc($phanthuc1,$phanao1);
            $sp2=new Sophuc($phanthuc2,$phanao2);
            $kq=new Sophuc(0,0);
            $kq=$sp2->cong($sp1,$sp2);
            $pt3=$kq->getPT();
            $pa3=$kq->getPA();
        }
    ?>
    <?php
        if(isset($_POST['tru'])){
            $phanthuc1=$_POST['pt1'];
            $phanao1=$_POST['pa1'];
            $phanthuc2=$_POST['pt2'];
            $phanao2=$_POST['pa2'];
            $sp1=new Sophuc($phanthuc1,$phanao1);
            $sp2=new Sophuc($phanthuc2,$phanao2);
            $kq=new Sophuc(0,0);
            $kq=$sp2->tru($sp1,$sp2);
            $pt3=$kq->getPT();
            $pa3=$kq->getPA();
        }
    ?>
    <?php
        if(isset($_POST['nhan'])){
            $phanthuc1=$_POST['pt1'];
            $phanao1=$_POST['pa1'];
            $phanthuc2=$_POST['pt2'];
            $phanao2=$_POST['pa2'];
            $sp1=new Sophuc($phanthuc1,$phanao1);
            $sp2=new Sophuc($phanthuc2,$phanao2);
            $kq=new Sophuc(0,0);
            $kq=$sp2->nhan($sp1,$sp2);
            $pt3=$kq->getPT();
            $pa3=$kq->getPA();
        }
    ?>
    <?php
        if(isset($_POST['chia'])){
            $phanthuc1=$_POST['pt1'];
            $phanao1=$_POST['pa1'];
            $phanthuc2=$_POST['pt2'];
            $phanao2=$_POST['pa2'];
            $sp1=new Sophuc($phanthuc1,$phanao1);
            $sp2=new Sophuc($phanthuc2,$phanao2);
            $kq=new Sophuc(0,0);
            $kq=$sp2->chia($sp1,$sp2);
            $pt3=$kq->getPT();
            $pa3=$kq->getPA();
        }
    ?>
    <!-- form---------------------- -->
    <form action="" method="post">
        Phan thuc 1: <input type="text" name="pt1" value="<?php echo $phanthuc1;?>"><br><br>
        Phan ao 1: <input type="text" name="pa1" value="<?php echo $phanao1;?>"><br><br>
        Phan thuc 2: <input type="text" name="pt2" value="<?php echo $phanthuc2;?>"><br><br>
        Phan ao 2: <input type="text" name="pa2" value="<?php echo $phanao2;?>"><br><br>
        KQ: <input type="text" name="pt3" value="<?php echo $pt3;?>"><br><br>
        KQ: <input type="text" name="pa3" value="<?php echo $pa3;?>"><br><br>
        <input type="submit" name="load" value="Load">
        <input type="submit" name="cong" value="Cong">
        <input type="submit" name="tru" value="Tru">
        <input type="submit" name="nhan" value="Nhan">
        <input type="submit" name="chia" value="Chia">
    </form>
</body>
</html>