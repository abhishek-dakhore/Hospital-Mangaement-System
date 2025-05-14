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
    $uploadir="images/";
    $filename=$row['photos'];
    $filepath=$uploadir.$filename;

    $qrcodes=$row['qr_codes'];
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
            grid-template-columns: repeat(3, 1fr);
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
    <div class="profile-container">
        <div class="header">
            <h1>Patient Profile</h1>
        </div>
        

        <div class="patient-details">
        <div>
        <img src="<?php echo $filepath;?>" alt='Patient Photo' style='width: 100px; height: auto; border-radius: 10px;'>;
        
        </div><br><br><br><br><br><br><br><br><br>
            <div style="font-size: 25px;"><strong>Patient ID:&nbsp;</strong> <?php echo htmlspecialchars($row['id']);?></div>
            <div><strong>Name:&nbsp;</strong> <?php echo htmlspecialchars($row['names']);?></div>
            <div><strong>Age:&nbsp;;&nbsp;</strong><?php echo htmlspecialchars($row['ages']);?></div>
            <div><strong>Gender:&nbsp;</strong> <?php echo htmlspecialchars($row['gender']);?></div>
            <div><strong>Date of Birth: &nbsp;</strong><?php echo htmlspecialchars($row['dob']);?></div>
            <div><strong>Contact:&nbsp;</strong> <?php echo htmlspecialchars($row['contacts']);?></div>
            <div><strong>Height:&nbsp;</strong><?php echo htmlspecialchars($row['heights']);?></div>
            <div><strong>Weight:&nbsp;</strong> <?php echo htmlspecialchars($row['weights']);?></div>
            <div><strong>Adhar No:&nbsp;</strong> <?php echo htmlspecialchars($row['adhar']);?></div>
            <div><strong>Marital-Status:&nbsp;</strong> <?php echo htmlspecialchars($row['marital_status']);?></div>
            <div><strong>Occupation:&nbsp;</strong> <?php echo htmlspecialchars($row['occupation']);?></div>

            <div><strong>Blood Group:&nbsp;</strong> <?php echo htmlspecialchars($row['bloodgroups']);?></div>
            <div><strong>Date of Registration :&nbsp;</strong> <?php echo htmlspecialchars($row['registration_date']);?></div>
            
            </div>         
            <div style="align-content:right">
            <img src="<?php echo $qrcodes;?>" alt='Patient Photo' style='width: 100px; height: auto; border-radius: 10px;'>;
        
        </div>
        </div>


        <div class="table-container" style="text-align:center">
            <h2 style="text-align:center">Medical History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Hospital ID</th>
                        <th>Hospital Name</th>
                        <th>adhar No</th>                 
                        <th>disease found</th>
                        <th>Medicines</th>
                        <th>reports</th>
                        <th>descriptions</th>
                        <th>Checkup by</th>
                        <th>Status</th>
                        <th>scheme</th>
                        <th>charges</th>
                        <th>floor</th>
                        <th>room</th>
                        <th>fatal Disease</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 

                   $sql2="SELECT * FROM patients_histories";
                   $result2=mysqli_query($conn,$sql2);
                   $row2=$result2->fetch_assoc();

                   if($result2->num_rows > 0){
                    while($row2 = mysqli_fetch_assoc($result2)){
                        echo "<tr>";
                    echo "<td>" . htmlspecialchars($row2['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['names']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['dates']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['hosp_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['hosp_names']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['adhar']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['disease']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['medicine']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['reports']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['descriptions']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['dr_names']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['dates']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['schemes']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['charges']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['floors']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['rooms']) . "</td>";
                    echo "<td>" . htmlspecialchars($row2['fatal_disease']) . "</td>";
                    echo "</tr>";                   
                    }
                   }
                   ?>
               </tbody>
            </table>
        </div>
    </div>

</body>
</html>
