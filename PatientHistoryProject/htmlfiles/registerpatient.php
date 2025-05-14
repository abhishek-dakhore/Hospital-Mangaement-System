<?php 
session_start();
include ('phpqrcode/qrlib.php');
include ('connection.php');
$servername="localhost";
$username= "root";
$password= "";
$dbname= "patientproject";
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $sql1 ="SELECT * FROM doctors WHERE email='$email'";
    $result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
}

if($conn->connect_error){
    die("Connection Failed". $conn->connect_error);
}else{
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['name'];
        $address=$_POST['address'];
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $adhar=$_POST['adhar'];
        $married=$_POST['marital'];
        $dob=$_POST['dob'];
        $occupation=$_POST['occupation'];
        $contact=$_POST['contact'];
        $hospital_id=$_POST['hospital_id'];
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        $blood=$_POST['blood'];
 
        function generateUniqueNumber($conn) {
            do {
             
                $uniqueNumber = mt_rand(100000000000, 999999999999);
        
                
                $query = "SELECT COUNT(*) as count FROM patients_profiles WHERE id = '$uniqueNumber'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
        
            } while ($row['count'] > 0); 
        
            return $uniqueNumber;
        }
        $uniqueID = generateUniqueNumber($conn);

       
           
            $qrText = "Name: $name\nAddress: $address\nGender: $gender\nDOB: $dob\nContact: $contact\nBlood Group: $blood\nHeight: $height\nWeight: $weight";      
            $fileName = time(). '_qrcode.png';
            $filePath = 'qrcode/' . $fileName;          
            QRcode::png($qrText, $filePath, QR_ECLEVEL_L, 5);

        if(isset($_FILES['photo'])){
            $photo=$_FILES['photo'];
            $photo_name=$photo['name'];
            $photo_tmp_name=$photo['tmp_name'];
            $photo_size=$photo['size'];
            $photo_ext=pathinfo($photo_name,PATHINFO_EXTENSION);

            $allowed_exts=['jpg','jpeg','png','gif'];

            if(in_array(strtolower($photo_ext),$allowed_exts)){
                $upload_dir="images/";
                if(!is_dir($upload_dir)){
                    mkdir($upload_dir);
                }
                $new_photo_name=uniqid().'.'.$photo_ext;
                $upload_path=$upload_dir.$new_photo_name;




                if(move_uploaded_file($photo_tmp_name,$upload_path)){
                    $sql ="INSERT INTO patients_profiles(id,hosp_id,photos,names,dob,ages,adhar,address,bloodgroups,marital_status,contacts,occupation,heights,weights,gender,qr_codes,qr_text) VALUES('$uniqueID','$hospital_id','$new_photo_name','$name','$dob','$age','$adhar','$address','$blood','$married','$contact','$occupation','$height','$weight','$gender','$filePath','$qrText')";

                    if($conn->query($sql)===TRUE){
                        ?><script>alert("Patient Register Successfully..!");</script><?php
                        header('Location: doctorprofile.php');

                      

                    }else{
                        echo "Erro".$sql."<br>".$conn->error;
                    }
                }else{
                    echo "error uploading the photo";
                }
            }else{
                echo "Invalid file type";
            }
        }else{
            echo "Errror with photo";
        }
    }
   
}
$conn->close();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Patient</title>
    <script>
        function calculateAge() {
            var dob = document.getElementById("dob").value;
            if (dob) {
              
                var birthDate = new Date(dob);
                var today = new Date();
                
         
                var age = today.getFullYear() - birthDate.getFullYear();
                var monthDifference = today.getMonth() - birthDate.getMonth();
                
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                document.getElementById("age").value = age;
            }
        }
    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            width: 80%;
            max-width: 800px;
            height: 90%;
            overflow-y: auto;
            box-sizing: border-box;
           
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }
        label {
            flex: 1 1 100%;
            font-weight: bold;
            color: #34495e;
        }
        input, select, textarea {
            flex: 1 1 calc(50% - 1rem);
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }
        input[type="file"] {
            padding: 0.4rem;
        }
        textarea {
            flex: 1 1 100%;
            resize: none;
        }
        button {
            background-color: #1abc9c;
            color: white;
            border: none;
            padding: 0.8rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            flex: 1 1 100%;
        }
        button:hover {
            background-color: #16a085;
        }
        button {
            background-color: #1abc9c;
            color: white;
            border: none;
            padding: 0.8rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            flex: top;
        }
        button:hover {
            background-color: #16a085;
        }
        
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Register Patient</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="blood-group">Blood Group:</label>
            <select id="blood-group" name="blood" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" onchange="calculateAge()" required>

            <label for="height">Height (in cm):</label>
            <input type="number" id="height" name="height" required>

            <label for="weight">Weight (in kg):</label>
            <input type="number" id="weight" name="weight" required>

            <label for="adhar">Aadhar Number:</label>
            <input type="text" id="adhar" name="adhar" required>

            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" required>

            <label for="marital-status">Marital Status:</label>
            <select id="marital-status" name="marital" required>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
            </select>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation">

            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" name="contact" required>

            <label for="hospital-id">Hospital ID:</label>
            <input type="text" id="hospital_id" name="hospital_id" value="<?php echo $row1['hosp_ids']; ?>" readonly>

            <label for="age">Age</label>
            <input type="text" id="age" name="age" readonly>

            <button type="submit" name="submit">Register Patient</button>
        </form>
        
    </div>
    
</body>
</html>
