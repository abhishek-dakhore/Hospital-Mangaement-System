<?php 
include("connection.php");
$msg=null;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hosp_id = $_POST['hospitalid'];
    $complainer = $_POST['name'];
    $complaint = $_POST['complaint'];
   

    $query = "SELECT * FROM hospitals WHERE id = '$hosp_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $sql2="INSERT INTO complaintbox(hosp_id,complainer_name,complaint,date) VALUES('$hosp_id','$complainer','$complaint',NOW())";
            $result2 = mysqli_query($conn, $sql2);
            if($result2){
                echo "<script>alert('Complaint Saved Successfully..!');</script>";
                header("Location: index.php");
            }
        } else {
            echo "<script>alert('Please Enter Valid Hospital Id');</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Registration</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f7f7;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 1.1em;
            margin-bottom: 8px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: #f44336;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .success {
            color: #4CAF50;
            font-size: 1.1em;
            text-align: center;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Complaint Registration</h2>
        
        <!-- Registration Form -->
        <form id="complaint-form" method="post">
            <div class="form-group">
                <label for="hospital-id">Hospital ID</label>
                <input type="text" id="hospital-id" name="hospitalid" placeholder="Enter Hospital ID">
                <div id="hospital-id-error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="complainer-name">Complainer Name</label>
                <input type="text" id="complainer-name" name="name" placeholder="Enter Complainer Name">
                <div id="complainer-name-error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="complaint-description">Complaint Description</label>
                <textarea id="complaint-description" name="complaint" placeholder="Describe your complaint"></textarea>
                <div id="complaint-description-error" class="error"></div>
            </div>

            <button type="submit" name="submit">Submit Complaint</button>
        </form>

        <div id="success-message" class="success" style="display: none;">
           <?php echo "$msg"; ?>
        </div>
    </div>

</body>
</html>
