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
</head>
<body>
<div class="opm" style="display: flex; flex-wrap: wrap;justify-content: center;position: relative;top:  110px; border: black 3px solid; width: 400px; left: 35%; border-top-left-radius: 1em; border-top-right-radius: 1em; border-bottom-right-radius: 1em; border-bottom-left-radius: 1em; background-color: grey; height: 500px;>">
    <form method="post">
        <input type="text" name="user" placeholder="Username" style="position: absolute; width: 360px; height: 30px; left: 15px; top: 200px; border-radius: 20px; border: none; padding: 4px;"><br>
        <input type="password" name="pas" placeholder="password" style="position: absolute; width: 360px; height: 30px; left: 15px; top: 265px; border-radius: 20px; border: none; padding: 4px;"><br>
        <button type="submit" name="login" style="position: absolute; width: 100px; height: 40px; left: 139px; top: 335px; border-radius: 20px; border:">Login</button>
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