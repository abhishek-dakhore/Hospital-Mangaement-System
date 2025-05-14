<?php 

include 'connection.php';
$sql ="SELECT * FROM hospitals";

$result =mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hospital Information</title>
    </head>

<body>
    <div class="container">
    <div class="btn-container">
            <button type="button" class="btn" onclick="history.back()">Home</button>
        </div>
        <h2>Hospitals Details</h2>
        <table>
            <tr>
                <th>Hospital Name</th>
                <th>hospital Id</th>
                <th>Address</th>
                <th>Rooms</th>
                <th>deaths</th>
                <th>rating</th>
               <th>date</th>
            </tr>
            <?php
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
           echo "<tr>
                <td>".$row['name']."</td>
                <td>". $row['id']."</td>
                <td>". $row['address']."</td>
                <td>". $row['rooms']."</td>
                <td>". $row['deaths']."</td>
                <td>". $row['rating']."</td>
                <td>". $row['open_date']."</td>
            </tr>";
                }
             } ?>
        </table>

    </div>
</body>
</html>
