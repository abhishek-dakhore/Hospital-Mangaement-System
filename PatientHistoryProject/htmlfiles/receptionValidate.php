
<?php 
include('connection.php');
session_start();


    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM receptionist WHERE email='$username' AND password='$password'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $_SESSION['LOG']=true;
            $_SESSION['reception']=$username;
            header("Location: receptionprofile.php");
        }else{
            ?>
            <script>alert("No email and password found");</script><?php
            header("Location: receptionValidate.php");
        }

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #1abc9c, #16a085);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logincontainer {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            text-align: center;
        }
        .logincontainer h1 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }
        .logincontainer form {
            display: flex;
            flex-direction: column;
        }
        .logincontainer input {
            margin: 0.5rem 0;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .logincontainer button {
            margin-top: 1rem;
            padding: 0.8rem;
            background-color: #1abc9c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .logincontainer button:hover {
            background-color: #16a085;
        }
        .logincontainer a {
            margin-top: 1rem;
            display: block;
            color: #16a085;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .logincontainer a:hover {
            text-decoration: underline;
        }
        
       
    </style>
</head>
<body>
    <div class="logincontainer">
        <h1>Login</h1>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="login">Login</button>
        </form>
        <a href="#">Forgot Password?</a>
    </div>
</body>
</html>
