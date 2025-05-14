<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
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
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1100px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #333;
        }
     
        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        form {
            display: none;
            margin-top: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hospital Management System</h2>
        <button onclick="showForm('hospitalForm')">Add Hospital</button>
        <button onclick="showForm('doctorForm')">Add Doctor</button>
        <form method="post">
        <button  name="viewhosp">View Hospitals</button>
        <button  name="viewdoct">View Doctors</button>
        </form>
        <form id="hospitalForm" action="" method="post">
            <h3>Add Hospital</h3>
          
            <input type="text" name="hospital_name" placeholder="Hospital Name">
            <input type="text" name="hospital_id" placeholder="Hospital ID">
            <input type="text" name="receptionist" placeholder="Receptionist">
            <input type="text" name="contacts" placeholder="Contacts">
            <input type="text" name="city" placeholder="City">
            <input type="date" name="date">
            <textarea name="address" placeholder="Address"></textarea>
            <input type="submit" name="submit_hospital" value="Submit">
        </form>
        
        <form id="doctorForm" action="" method="post">
            <h3>Add Doctor</h3>
            <input type="text" name="dr_name" placeholder="Doctor Name">
            <input type="text" name="doctor_id" placeholder="Doctor ID">
            <input type="text" name="hosp_id" placeholder="Hospital ID" required>
            <input type="text" name="hosp_name" placeholder="hosp_name">
            <input type="text" name="contacts" placeholder="Contacts">
            <input type="date" name="date" placeholder="Select Date">
            <input type="submit" name="submit_doctor" value="Submit">
        </form>
        
        <div id="dataDisplay">
            <?php
                $conn = new mysqli("localhost", "root", "", "patientproject");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                if (isset($_POST['submit_hospital'])) {
                    $sql = "INSERT INTO hospitals (id, hosp_names, receptionist, address,city, contacts, date) VALUES ('$_POST[hospital_id]', '$_POST[hospital_name]', '$_POST[receptionist]', '$_POST[address]', '$_POST[city]', '$_POST[contacts]', '$_POST[date]')";
                    if( $conn->query($sql)){
                        ?><script> alert("sata saved");</script><?php
                       }
                }
                if (isset($_POST['submit_doctor'])) {
                    $sql = "INSERT INTO doctors (id, hosp_ids, hosp_names, dr_names, contacts,address) VALUES ('$_POST[doctor_id]', '$_POST[hosp_id]', '$_POST[hosp_name]', '$_POST[dr_name]', '$_POST[contacts]', '$_POST[date]')";
                   if( $conn->query($sql)){
                    ?><script> alert("sata saved");</script><?php
                   }
                }
              
            
         
            ?>
        </div>
    </div>
    
    <script>
        function showForm(formId) {
            document.getElementById('hospitalForm').style.display = 'none';
            document.getElementById('doctorForm').style.display = 'none';
            document.getElementById(formId).style.display = 'block';
        }      
    </script>
</body>
</html>
