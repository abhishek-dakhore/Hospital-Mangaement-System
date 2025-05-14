

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aadhaar Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .aadhaar-card {
            width: 350px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            border-top: 5px solid orange;
            border-bottom: 5px solid green;
        }

        .aadhaar-header {
            display: flex;
            align-items: center;
         
            
        }
        .aadhaar-logo{
            width: 80%;
            height: 100px;
        }

        .aadhaar-photo {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            border: 2px solid black;
        }

        .aadhaar-details {
            text-align: left;
            margin-top: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }

        .aadhaar-details p {
            margin: 5px 0;
            font-size: 14px;
        }

        .aadhaar-qr {
            margin-top: 10px;
        }

        .aadhaar-qr img {
            width: 80px;
        }

        .aadhaar-id {
            font-size: 18px;
            font-weight: bold;
            color: rgb(2, 107, 6);
            margin-top: 10px;
        }

        .aadhaar-footer {
            font-size: 12px;
            margin-top: 10px;
            color: gray;
        }
        .blue-line {
            border: none;
            height: 4px;
            background-color: blue;
            width: 90%; /* Adjust width */
            margin: 20px auto; /* Center the line */
        }
        .download-btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            display: block;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .download-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="aadhaar-card">
        <div class="aadhaar-header">
            <img src="healthlogo.jpg" alt="Aadhaar Logo" class="aadhaar-logo">
        </div>
        <hr class="blue-line">
        <img src="tempimagesMyphoto.jpg" alt="User Photo" class="aadhaar-photo">

        <div class="aadhaar-details">
            <p><strong>Name:</strong> John Doe</p>
            <p><strong>DOB:</strong> 01/01/1990</p>
            <p><strong>Gender:</strong> Male</p>
            <p><strong>Blood Group:</strong> O+</p>
            <p><strong>Address:</strong> 123, Green Street, New Delhi</p>
           
        </div>

        <div class="aadhaar-id">XXXX-XXXX-XXXX</div>

        <div class="aadhaar-qr">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=Aadhaar123456789" alt="QR Code">
        </div>

        <div class="aadhaar-footer">
           Patient Unique ID |आरोग्यपत्र  - तुमचे आरोग्य आमचे प्राधान्य
        </div>
    </div>
    <button class="download-btn" onclick="downloadCard()">Download Card</button>

<script>
    function downloadCard() {
        html2canvas(document.getElementById("aadhaar-card")).then(canvas => {
            let link = document.createElement("a");
            link.href = canvas.toDataURL("image/png");
            link.download = "Arogya_card.png";
            link.click();
        });
    }
</script>

</body>
</html>
