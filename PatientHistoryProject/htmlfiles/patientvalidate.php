
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Patient ID</title>
    <style>
        /* Basic body styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the form */
        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            box-sizing: border-box;
        }

        form label {
            font-size: 14px;
            color: #333;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s ease;
        }

        form input[type="text"]:focus {
            border: 1px solid #007BFF;
            outline: none;
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
        }

        form p {
            color: red;
            font-size: 14px;
            text-align: center;
        }

        /* Add animation for form submission */
        form button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="patient_id">Enter Patient ID:</label>
        <input type="text" id="patient_id" name="patient_id" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    include("connection.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $patient_id = $_POST['patient_id'];
        $_SESSION['adhar']=$patient_id;

        
        if ($conn->connect_error) {
            die('Database connection failed: ' . $conn->connect_error);
        }

        $sql = "SELECT * FROM patient_profile WHERE adhar= '$patient_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
           
            header("Location: patientprofile.php");
            exit;
        } else {
            echo "<script>alert('Enter Valid Patinet Id');</script>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
