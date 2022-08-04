<?php
    $errs = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub123'])){
        $uname = safuda($_POST["uname"]);
        if(empty($uname)){
            $errs["name"] = "<span style='color: red'>Please provide the user name</span>";
        }elseif (!preg_match("/^[A-Za-z. ]*$/", $uname)) {
            $errs["name"] = "<span style='color: red'>Invalid user name</span>";
        }else{
            $crrUname = $uname;
        }
      if(empty($uemail)) {
        $errs["email"] = "<span style='color: red'>Please provide the email address</span>";
      }elseif(!filter_var($uemail, FILTER_VALIDATE_EMAIL)){
        $errs["email"] = "<span style='color: red'>Invalid email address</span>";
      }else{
        $crrUemail = $uemail; 
      }  

      if(isset($crrUname) && isset($crrUemail)){
        $msg = "
            <p style='color: green'>Your Name: $crrUname<br>Your Email: $crrUemail</p>
            
        ";
      }
    }

    function safuda ($data) {
        $kata = htmlspecialchars($data);
        $data = trim($kata);
        $data = stripslashes($data);
        return $data;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 1</title>
</head>
<body>
    <form action="./<?= basename($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="text" placeholder="Your Name" name="uname" value="<?= $uname  ?? null;  ?>">
    <?= $errName ?? null ?>
    <br><br>
    <input type="text" placeholder="Email Address" name="uemail" value="<?=
    $uemail ?? null; ?>"><br><br>
    <input type="submit" value="login" name="sub123">
</form>
<?php
    foreach($errs as $err){
        echo $err."<br>";
    }
?>
<?= $msg ?? null ?>
</body>
</html>