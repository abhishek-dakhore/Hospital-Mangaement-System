
<?php 

include("connection.php");
session_start();
$email=$_SESSION['reception'];
$_SESSION['reception'] = $email;
$sql ="SELECT * FROM receptionist WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
        $id= $row["id"];
        $hosp_id=$row["hosp_ids"];
        $name=$row["names"];
        $hospital=$row["hosp_names"];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Receptionist Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #333;
            color: white;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            border-bottom: 1px solid #444;
        }
        .sidebar a:hover {
            background-color: #575757;
            font-size: large;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
        }
        h2 {
            color: #007bff;
            text-align: center;
        }
       
    </style>
</head>
<body>

<div class="header"> <strong><?php echo $hospital;?></strong></div>

<div class="container">
    <div class="sidebar">
        <a href="#"> Dashboard</a>
        <a href="complaintbox.php"> View Complaints</a>
        <a href="registerpatientbyrece.php"> Register Patient</a>
        <a href="logout.php"> Logout</a>
    </div>

    <div class="content">
        <strong><h2>Welcome, <?php echo $name;?></h2></strong>
    </div>
</div>

</body>
</html>
