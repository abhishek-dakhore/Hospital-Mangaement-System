<?php
session_start();
include("connection.php");

$email=$_SESSION["reception"];
$sql = "SELECT * FROM receptionist WHERE email='$email'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$receptionHospital =$row['hosp_ids'];
$hospitalls =$row['hosp_names'];

$sqlcomplaint="SELECT * FROM complaintbox WHERE hosp_id='$receptionHospital'";
$result2=$conn->query($sqlcomplaint);
$row2=$result2->fetch_assoc();


if (isset($_POST['delete'])) {
    $complaint_id = $_POST['complaint_id'];

        $sql5 = "DELETE FROM complaintbox WHERE id = $complaint_id";
       if($conn->query($sql5)){
        echo "<script>alert('Complaint deleted successfully.'); window.location.href='';</script>";
       }else{
        echo "<script>alert('Failed to Delete Complaint.'); window.location.href='';</script>";
       }
   
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Complaint Box</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg,rgb(132, 175, 236),rgb(232, 227, 240)); 
            font-family: 'Roboto', sans-serif;
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            margin-top: 90px;
            background: linear-gradient(135deg,rgb(132, 175, 236),rgb(232, 227, 240)); 
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            height: 100%;
            overflow: hidden;
            text-align: center;
            justify-content: center;
        }

        h2 {
         
            top: 20px; /* Distance from the top */
            margin-left: 30%;
            background-color:rgba(230, 230, 249, 0.36);
            text-align: center;
            color:white;
            margin-bottom: 20px;
            font-size: 2em;
            width: 40%;
            padding: 5px;
            border-radius: 5px;
        }

        table {
            width: 100%;
           border: none;
            margin-bottom: 20px;
            font-size: 1.1em;
            border-spacing: 20px;
        }

        th {
            background-color:rgba(255, 255, 255, 0.47);
            color:black;
            padding: 12px;
            text-align: center;
            border-radius: 8px;
        }

        td {
            padding: 12px;
            text-align: center;
            color:white;
            border: none;
            transition: background-color 0.3s ease;
        }
        .complaint-details {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .complaint-details h3 {
            color: #4CAF50;
            margin-top: 0;
            font-size: 1.6em;
        }

        .complaint-details p {
            margin: 10px 0;
            font-size: 1.1em;
        }


        .delete-btn {
            background-color:rgba(253, 252, 252, 0.25);

            color: white; 
            border: none;
            padding: 12px 24px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .delete-btn:hover {
            background-color:rgba(255, 255, 255, 0.76); 
            color: black;
            transform: scale(1.05); 
            box-shadow: 0 0 20px rgba(250, 250, 251, 0.7); 
        }

        .delete-btn:active {
            background-color:rgb(253, 253, 253); 
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
            transform: scale(0.98);
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Complaint Box</h2>
        <?php

if ($row2 !== null && isset($row2['hosp_id'])) {
    if ($row2['hosp_id'] == $receptionHospital) {

        $sqlcomplai="SELECT * FROM complaintbox WHERE hosp_id='$receptionHospital'";
        $result3=$conn->query($sqlcomplai);
     
   
if ($result3->num_rows > 0) {
    

    echo "<table border='1'>
            <tr>
                <th>Sr</th>
                <th>Hospital</th>
                <th>Complainer</th>
                <th>Complaint</th>
                <th>Date</th>
                <th>Action</th>
            </tr>";
$count=1;
    while ($row3 = $result3->fetch_assoc()) {
        echo "<tr>
                <td>" . $count . "</td>
                <td>" . $hospitalls. "</td>
                <td>" . $row3['complainer_name']."</td>
                <td>" .$row3['complaint']. "</td>
                <td>" . $row3['date'] . "</td>
                 <td>
                    <form method='POST' onsubmit='return confirmDelete();'>
                        <input type='hidden' name='complaint_id' value='" . $row3['id'] . "'>
                        <button type='submit' class='delete-btn' name='delete'>Delete</button>
                    </form>
                </td>
              </tr>";
              $count++;
    }

    echo "</table>";
} else {
    echo "No records found for hosp_id " . $hosp_id;
}
} else {
      
}
} else {
echo "There are no Complaints about yours Hospitals ";
}
?>
    </div>


</body>
</html>
