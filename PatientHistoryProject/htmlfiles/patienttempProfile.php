<?php 
include 'connection.php';
session_start();
$adhar = $_SESSION['adhar'];

$sql = "SELECT * FROM patient_data WHERE adhar='$adhar'";


$result= mysqli_query($conn,$sql);


if(($result->num_rows)>0){
    $row=$result->fetch_assoc();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #28a745;
            color: #fff;
        }
        .btn-container {
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Patient Details</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Status</th>
                <th>Room No</th>
                <th>Floor</th>
                <th>Hospital Name</th>
                <th>Hospital Address</th>
            </tr>
            <>
                <td><?php $row['name'];?></td>
                <td>nn</td>
                <td><?php $row['status'];?></td>
                <td><?php $row['room'];?></td>
                <td><?php $row['floor'];?></td>
                <td><?php $row['hosp_name'];?></td>
                <td><?php $row['hosp_name'];?></td>
    </tr>
        </table>
        <div class="btn-container">
            <button type="button" class="btn" onclick="history.back()">Chech another</button>
        </div>
    </div>
</body>
</html>
