<html>
    <body>
        <form action="" method="post">
            Ma khach hang: <input type="text" name="makh" id=""><br>
            Ten khach hang: <input type="text" name="tenkh"><br>
            Tuoi: <input type="text" name="tuoi"><br>
            Dien thoai: <input type="text" name="dt" ><br>
            <input type="submit" name="add" value="Them">
            <input type="submit" name="update" value="Sua">
            <input type="submit" name="delete" value="Xoa">
            <input type="submit" name="load" id="" value="Load">
            <input type="submit" name="check" id="" value="Khach hang chua 20">
        </form>
        <?php
            include 'config.php';
            $ob=new Khachhang();
            if(isset($_POST['load'])){
                echo $ob->load();
            }
            if(isset($_POST['add'])){
                $makh=$_POST['makh'];
                $tenkh=$_POST['tenkh'];
                $tuoi=$_POST['tuoi'];
                $dt=$_POST['dt'];
                $ob->add($makh,$tenkh,$tuoi,$dt);
            }
            if(isset($_POST['update'])){
                $makh=$_POST['makh'];
                $tenkh=$_POST['tenkh'];
                $tuoi=$_POST['tuoi'];
                $dt=$_POST['dt'];
                $ob->update($makh,$tenkh,$tuoi,$dt);
            }
            if(isset($_POST['delete'])){
                $makh=$_POST['makh'];
                $tenkh=$_POST['tenkh'];
                $tuoi=$_POST['tuoi'];
                $dt=$_POST['dt'];
                $ob->delete($makh);
            }
            if(isset($_POST['check'])){
                echo $ob->check();
            }
        ?>
    </body>
</html>