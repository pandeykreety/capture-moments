<html>
<head>
    <title> Login </title>
    <style>
    body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background: url('login2.jpg') no-repeat center center fixed;
    background-size: cover;
    position: relative;
    height: 100vh;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3); 
    /* This darkens the background */
    z-index: 0;
}

.login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 350px;
    padding: 40px;
    background: rgba(255, 255, 255, 0.1); /*Semi-transparent background*/
    /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.7); */
    transform: translate(-50%, -50%);
    z-index: 1;
    border-radius: 8px;
}

.login-box h1 {
    text-align: center;
    color: #fff;
    margin-bottom: 30px;
    font-size: 24px;
}

.login-box input[type="text"], 
.login-box input[type="password"] {
    width: 100%;
    padding: 10px;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    outline: none;
    color: #fff;
    font-size: 16px;
    margin-bottom: 20px;
    border-radius: 4px;
    box-sizing: border-box;
}

.login-box input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: #1c8adb;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    color: #fff;
    cursor: pointer;
    transition: background 0.3s ease;
}

.login-box input[type="submit"]:hover {
    background: #39dc79;
    color: #000;
}

.login-box a {
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    display: block;
    text-align: center;
    margin-top: 20px;
}

.login-box a:hover {
    color: #39dc79;
}
.avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}



p {
    font-size: 18px;
    color: #fff;
}

#link {
    font-size: 15px;
    font-style: italic;
    color: #fff;
}
</style>
 
</head>
    <body>
    <div class="login-box">
        <img class="avatar" src="login4.jpg" alt="">
        <h1>Admin Login</h1>
		<form name="login" method="POST" autocomplete="off">
			 
           
		   <p>User Name</p>
            <input type="text" name="name" placeholder="Enter Admin's username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
			     
            
			
            <input type="submit" name="submit" value="Login">
            
			</form>
       </div>
    </body>
</html>
<?php
session_start();
include 'connect.php';
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $pass=$_POST['password'];
    $query="select * from admin where username='$name' and password='$pass' ";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        $_SESSION['username'] = $name;
        header("Location: http://localhost/capturek/admin.php");
    }
    else{
        echo '<script>alert("Invalid username or password! Please try again")</script>';
    }
}
?>