<?php 


$conn = mysqli_connect("localhost", "root", "", "webmakanan");
if (!$conn) {
    echo "Koneksi Gagal !";
}

if (isset($_POST["submit"])) {
    $Username = mysqli_real_escape_string($conn, $_POST["Username"]);
    $Password = mysqli_real_escape_string($conn, $_POST["Password"]);

    $query_sql = "SELECT * FROM Login WHERE Username = '$Username'";
    $result = mysqli_query($conn, $query_sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Password'] == $Password) {
            header("Location: index2.php?user_id=" . $row["Username"]);
            exit(); // Tambahkan exit() setelah header location
        } else {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    } else {
        echo "<script> alert('Username Not Found'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">forgot password</a>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
