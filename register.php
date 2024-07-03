<?php

$conn = mysqli_connect("localhost","root", "", "webmakanan");
if(!$conn)
{
    echo "Koneksi Gagal !";
}


if(isset($_POST["submit"])){
    $Username = $_POST["Username"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $Re_Password = $_POST["Re_Password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM login WHERE Username = '$Username' OR Email = '$Email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    }
    else{
        if($Password == $Re_Password){
            $query = "INSERT INTO login VALUES ('$Username','$Email','$Password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful'); 
            document.location.href='index.html'; </script>";
        }
        else{
            echo
            "<script> alert('Password Does Not Match'); 
         </script>";
        }
    }
        



    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
		<form method="post">
			<h1>Register</h1>
            <div class="input-box">
				<input type="text" placeholder="Email" name="Email" require>
				<i class='bx bxs-user'></i>
			</div>
			<div class="input-box">
				<input type="text" placeholder="Username" name="Username" require>
				<i class='bx bxs-user'></i>
			</div>
			<div class="input-box">
				<input type="password" placeholder="Password" name="Password" require>
				<i class='bx bxs-lock-alt'></i>
			</div>
            <div class="input-box">
				<input type="password" placeholder="Re-Password" name="Re_Password" require>
				<i class='bx bxs-lock-alt'></i>
			</div>

			<button type="submit" name="submit" class="btn">Register</button>

			<div class="register-link">
				<p>Have an account? <a 
					href="login.php">Login</a></p>
			</div>
		</form>
	</div>
</body>
</html>