<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Ma mon: <input type="text" name="mamon"><br>
        Ten mon: <input type="text" name="tenmon" id=""><br>
        Ten giang vien: <input type="text" name="tengv" id=""><br>
        Thoi gian: <input type="text" name="thoigian"><br>
        <input type="submit" name="add" value="Them">
        <input type="submit" name="update" value="Sua">
        <input type="submit" name="delete" value="Xoa">
        <input type="submit" name="load" value="Load">
    </form>
    <?php

        include 'config.php';
        $ob=new Monhoc(0,0,0,0);
        if(isset($_POST['load'])){
            echo $ob->load();
        }
        if(isset($_POST['add'])){
            $mamon=$_POST['mamon'];
            $tenmon=$_POST['tenmon'];
            $tengv=$_POST['tengv'];
            $thoigian=$_POST['thoigian'];
            $ob->add($mamon,$tenmon,$tengv,$thoigian);
        }
        if(isset($_POST['update'])){
            $mamon=$_POST['mamon'];
            $tenmon=$_POST['tenmon'];
            $tengv=$_POST['tengv'];
            $thoigian=$_POST['thoigian'];
            $ob->update($mamon,$tenmon,$tengv,$thoigian);
        }
        if(isset($_POST['delete'])){
            $mamon=$_POST['mamon'];
            // $tenmon=$_POST['tenmon'];
            // $tengv=$_POST['tengv'];
            // $thoigian=$_POST['thoigian'];
            $ob->delete($mamon);
        }
    ?>
</body>
</html>