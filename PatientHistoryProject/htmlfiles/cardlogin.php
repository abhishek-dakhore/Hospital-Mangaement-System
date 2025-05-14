<?php 
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_POST['user'];
    $dob = $_POST['pass'];
    $_SESSION['adhar']=$patient_id;

    
    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM patients_profiles WHERE id= '$patient_id' AND dob='$dob'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        header("Location: card.php");
        exit;
    } else {
        echo "<script>alert('Enter Valid Patinet Id && password');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
 
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

     
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #333;
        }

        .login-box p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
        }

    
        .login-form .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .login-form .input-group label {
            display: block;
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 5px;
        }

        .login-form .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .login-form .input-group input:focus {
            border-color: #6a11cb;
        }

      
        .login-button {
            width: 100%;
            padding: 12px;
            background: #6a11cb;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
          
        }

        .login-button:hover {
            background: #2575fc;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Login to</h1>
            <p>Get your ArogyaPatra</p>
            <form class="login-form" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="user" placeholder="Enter your username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="date" id="password" name="pass" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
            </form>

        </div>
    </div>
</body>
</html>