<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="width: 300px; margin: 100px auto;">
    <?php
        $tuso1=0;$mauso1=0;
        $tuso2=0;$mauso2=0;
        $ts3=0;$ms3=0;
        require('phanso.php');
        if(isset($_POST['load'])){
            $xml=new SimpleXMLElement("phanso.xml",null,true);
            $tuso1=$xml->PS[0]->TS;
            $tuso2=$xml->PS[1]->TS;
            $mauso1=$xml->PS[0]->MS;
            $mauso2=$xml->PS[1]->MS;

        }
    ?>
    <?php
        if(isset($_POST['cong'])){
            $tuso1=$_POST['ts1'];$mauso1=$_POST['ms1'];
            $tuso2=$_POST['ts2'];$mauso2=$_POST['ms2'];
            $ob1= new Phanso($tuso1,$mauso1);
            $ob2=new Phanso($tuso2,$mauso2);
            $ob3=new Phanso(0,0);
            $ob3=$ob1->tong($ob1,$ob2);
            $ob3=$ob1->toigian($ob3);
            $ts3=$ob3->getTS();
            $ms3=$ob3->getMS();
        }
    ?>
     <?php
        if(isset($_POST['tru'])){
            $tuso1=$_POST['ts1'];$mauso1=$_POST['ms1'];
            $tuso2=$_POST['ts2'];$mauso2=$_POST['ms2'];
            $ob1= new Phanso($tuso1,$mauso1);
            $ob2=new Phanso($tuso2,$mauso2);
            $ob3=new Phanso(0,0);
            $ob3=$ob1->tru($ob1,$ob2);
            $ob3=$ob1->toigian($ob3);
            $ts3=$ob3->getTS();
            $ms3=$ob3->getMS();
        }
    ?>
     <?php
        if(isset($_POST['nhan'])){
            $tuso1=$_POST['ts1'];$mauso1=$_POST['ms1'];
            $tuso2=$_POST['ts2'];$mauso2=$_POST['ms2'];
            $ob1= new Phanso($tuso1,$mauso1);
            $ob2=new Phanso($tuso2,$mauso2);
            $ob3=new Phanso(0,0);
            $ob3=$ob1->nhan($ob1,$ob2);
            $ob3=$ob1->toigian($ob3);
            $ts3=$ob3->getTS();
            $ms3=$ob3->getMS();
        }
    ?>
     <?php
        if(isset($_POST['chia'])){
            $tuso1=$_POST['ts1'];$mauso1=$_POST['ms1'];
            $tuso2=$_POST['ts2'];$mauso2=$_POST['ms2'];
            $ob1= new Phanso($tuso1,$mauso1);
            $ob2=new Phanso($tuso2,$mauso2);
            $ob3=new Phanso(0,0);
            $ob3=$ob1->chia($ob1,$ob2);
            $ob3=$ob1->toigian($ob3);
            $ts3=$ob3->getTS();
            $ms3=$ob3->getMS();
        }
    ?>



    <!-- form------------------------------------ -->
    <form action="" method="post" style="background-color: pink; padding: 10px;">
        Tu so 1: <input type="text" name="ts1" value="<?php echo $tuso1;?>"><br><br>
        Mau so 1: <input type="text" name="ms1" value="<?php echo $mauso1;?>"><br><br>
        Tu so 2: <input type="text" name="ts2" value="<?php echo $tuso2;?>"><br><br>
        Mau so 2: <input type="text" name="ms2" value="<?php echo $mauso2;?>"><br><br>
        KQ      : <input type="text" name="ts3" value="<?php echo $ts3;?>"><br><br>
        KQ      : <input type="text" name="ms3" value="<?php echo $ms3;?>"><br><br> 
        <input type="submit" name="load" value="Load">
        <input type="submit" name="cong" value="Cong">
        <input type="submit" name="tru" value="Tru">
        <input type="submit" name="nhan" value="Nhan">
        <input type="submit" name="chia" value="Chia">
    </form>
</body>
</html>