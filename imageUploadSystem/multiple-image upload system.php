<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fName = $_FILES['myFile']['name'];
    $tmpName = $_FILES['myFile']['tmp_name'];

if(empty($fName)){
    echo "<script>alert('Please choose a file')</script>";
    }elseif(!getimagesize($tmpName)){
        echo "<script>alert('Invalid image file')</script>";
    }else{
        if (!is_dir("images")) {
            mkdir("images");
        }
     
        $alfa = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
        $direction = "images/".str_shuffle(substr($alfa, 0, 6).date("hisMdYDl")).uniqid().$fName;
        $move = move_uploaded_file($tmpName, $direction);
        if(!$move){
            
             echo "<script>alert('Image upload problem')</script>";
        }else {
            echo "<script>alert('Image upload successfully')</script>";
        }
    }
}



?>

<form action="" method="post" enctype="multipart/form-data" >
    <input type="file" name="myFile">
    <input type="submit" value="Upload File">
</form>