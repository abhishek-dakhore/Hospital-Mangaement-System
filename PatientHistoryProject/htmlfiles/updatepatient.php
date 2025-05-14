<?php 
session_start();

$server="localhost";
$username="root";
$pass="pass";
$dbname="patientproject";
$conn=mysqli_connect($server,$username,$pass,$dbname);

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql ="SELECT id,hosp_names,hosp_ids,dr_names from doctors WHERE email='$email'";
   $result=$conn->query($sql);
   if(($result->num_rows)>0){
    $row=$result->fetch_assoc();
   }
}

if($_SERVER['REQUEST_METHOD']=='post' || isset($_POST['submit'])){
    
    $patientid= $_POST['patientid'];
    $pname= $_POST['patientname'];
    $hospid= $_POST['hospitalid'];
    $doctorid= $_POST['drid'];
    $hospitalname= $_POST['hospitalname'];
    $scheme= $_POST['scheme'];
    $reports= $_POST['reports'];
    $adhar= $_POST['adhar'];
    $disease= $_POST['disease'];
    $medicine= $_POST['medicine'];
    $room= $_POST['room'];
    $floor= $_POST['floor'];
    $doctorname= $_POST['doctorname'];
    $status= $_POST['status'];
    $fees= $_POST['fees'];
    $diseasedesc= $_POST['diseasedesc'];
    $fatal= $_POST['fatal'];

    $sql = "INSERT INTO patients_histories(id,hosp_id,hosp_names,names,adhar,disease,medicine,reports,descriptions,dr_names,status,dates,schemes,charges,floors,rooms,fatal_disease) VALUES('$patientid','$hospid','$hospitalname','$pname','$adhar','$disease','$medicine','$reports','$diseasedesc','$doctorname','$status',NOW(),'$scheme','$fees','$floor','$room','$fatal')";

    if($conn->query($sql)){
        ?><script>alert("Patient Updated Successfully>>!");</script><?php
        header("Location: doctorprofile.php");
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            width: 48%;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    
    <div class="form-container">
        <br>
       
        <h2>Add Patient Details</h2>
        <form action="#" method="POST">
            <div class="form-group">
                 <label for="patient-id">Patient ID</label>
                 <input type="number" id="patient-id" name="patientid">
            </div>

            <div class="form-group">
                 <label for="patient-id">Patient Name</label>
                 <input type="text" id="patientname" name="patientname" required>
            </div>

            <div class="form-group">
                <label for="hospital-id">Hospital ID</label>
                <input type="name" value="<?php echo $row['hosp_ids']; ?>" name="hospitalid" readonly>
            </div>

            <div class="form-group">
                <label for="hospital-id">Doctor ID</label>
                <input type="name" value="<?php echo $row['id']; ?>" name="drid" readonly>
            </div>
            <div class="form-group">
                <label for="hospital-id">Hospital name</label>
                <input type="text" value="<?php echo $row['hosp_names']; ?>" name="hospitalname" readonly>
            </div>
           
            <div class="form-group">
                <label for="scheme">Scheme</label>
                <input type="text" id="disease" name="scheme" >
            </div>

            <div class="form-group">
                <label for="reports">Reports</label>
                <input type="text" id="reports" name="reports" >
            </div>
            <div class="form-group">
                <label for="number">Adhar</label>
                <input type="number" id="adhar" name="adhar" >
            </div>

            <div class="form-group">
                <label for="treatment">Disease Name</label>
                <input type="text" id="disease" name="disease">
            </div>

            <div class="form-group">
                <label for="medicine">Medicine</label>
                <input type="text" id="medicine" name="medicine" >
            </div>

            <div class="form-group">
                <label for="number">Room No :</label>
                <input type="text" id="room" name="room" >
            </div>
            <div class="form-group">
                <label for="number">floor :</label>
                <input type="text" id="room" name="floor" >
            </div>

            <div class="form-group">
                <label for="doctor-name">Doctor's Name</label>
                <input type="text" id="doctor-name" name="doctorname" value="<?php echo $row['dr_names']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status">
                    <option value="sick">Sick</option>
                    <option value="healthy">Healthy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fees-paid">Charges</label>
                <input type="number" id="fees-paid" name="fees" required>
            </div>

            <div class="form-group">
                <label for="disease-description">Disease Description</label>
                <textarea id="disease-description" name="diseasedesc" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="disease-description">Fatal Injury</label>
                <input type="text" id="fatal" name="fatal" rows="4" required></>
            </div>

            <input type="submit" id="button" name="submit">
        </form>
    </div>
</body>
</html>
