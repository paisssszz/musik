<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="opm" style="display: flex; flex-wrap: wrap;justify-content: center;position: relative;top:  110px; border: black 3px solid; width: 400px; left: 35%; border-radius: 1px; background-color: #D2D6DC; height: 400px; border: none;">
    <div class="logo"><img src="asdw.png" alt=""></div>
    <form method="post">
        <input type="text" name="user" placeholder="Username" required style="position: absolute; width: 360px; height: 30px; left: 15px; top: 100px; border-radius: 5px; border: none; padding: 4px; font-size: 15px;"><br>
        <input type="password" name="pas" placeholder="Password" required style="position: absolute; width: 360px; height: 30px; left: 15px; top: 165px; border-radius: 5px; border: none; padding: 4px;font-size: 15px;"><br>
        <button type="submit" name="login" style="position: absolute; width: 360px; height: 40px; left: 15px; top: 275px; border-radius: 3px; border: none; font-size: 20px; cursor:pointer;">Login</button>
    </form>
</div>

    
    <?php
        if (isset($_POST['login'])) {
            $username = $_POST['user'];
            $password = $_POST['pas'];
            $qer = mysqli_query($connect,"SELECT * FROM login WHERE username = '$username' AND password = md5('$password')");
            
            $tes = mysqli_num_rows($qer);
            if ($tes==1) {
                $_SESSION['userweb']=$username;
                header ("Location:dashboard.php");
                exit;
            }
            else{
                echo "<script>alert('Username atau Passwordmu salah');window.location='login.php'</script>";
            }
        }
    ?>
</body>
</html>