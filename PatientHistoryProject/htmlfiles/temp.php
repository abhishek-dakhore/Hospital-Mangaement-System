<?php
include("connection.php");
session_start();

if (isset($_SESSION['patientidd'])) {
    $patient_id = $_SESSION['patientidd'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM patients_profiles WHERE id = '$patient_id'";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $filepath=$row['photos'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Patient Profile</title>
  
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 1rem;
        }
        .profile-container {
            max-width: 1200px;
            margin: auto;
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
           
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .header h1 {
            color: #2c3e50;
        }
        .patient-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .card-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }
        .card {
            width: 48%;
            background-color: #ecf0f1;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
        .card h2 {
            text-align: center;
            margin-bottom: 1rem;
            color: #34495e;
        }
        .card-content {
            display: grid;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        .qr-code {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 0.8rem;
            text-align: left;
        }
        th {
            background-color: #1abc9c;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .input-container {
            margin: 20px 0;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        .input-container input {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
         
        }

        .input-container button {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
   
        <img src="images/67938a4b037f9.jpeg" alt='Patient Photo' style='width: 80px; height: auto; border-radius: 10px;'>;
        
</body>
</html>
