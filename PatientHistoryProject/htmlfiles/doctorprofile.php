<?php 
include("connection.php");
session_start();
$email=$_SESSION['email'];
$_SESSION['email']=$email;
$sql ="SELECT id,hosp_ids,dr_names,address,hosp_names FROM doctors WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
        $id= $row["id"];
        $hospital_id=$row["hosp_ids"];
        $name=$row["dr_names"];
        $hospital_name=$row["hosp_names"];
        $hospital_address=$row["address"];
    }

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Profile</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding: 1rem;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }
        .sidebar h2 {
            color: #ecf0f1;
            text-align: center;
            margin-bottom: 2rem;
        }
        .menuitem {
            text-decoration: none;
            color: #bdc3c7;
            padding: 0.8rem;
            margin: 0.3rem 0;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s;
        }
        .menuitem:hover {
            background-color: #34495e;
            color: #ecf0f1;
        }
        .content {
            margin-left: 260px;
            padding: 2rem;
        }
        .header {
            background-color: #1abc9c;
            color: white;
            padding: 1rem;
            text-align: center;
            border-radius: 5px;
        }
       
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="registerpatient.php" class="menuitem">Register Patient</a>
        <a href="redirectPatient.php" class="menuitem">Enter Patient ID</a>
        <a href="updatepatient.php" class="menuitem">Update Patient</a>
        <a href="complaintbox.php" class="menuitem">View Complaint Box</a>
        <a href="logout.php" class="menuitem">Logout</a>
    </div>
    <div class="content">
        <div class="header">
            <h1><?php echo $hospital_name?></h1>
        </div>
        <div class="section">
            <h2>Welcome,<?php echo " $name"?></h2>
            <p><?echo $hospital_address?></p>
           
        </div>
    </div>
</body>
</html>
