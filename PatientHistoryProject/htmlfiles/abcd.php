<?php 
$server="localhost";
$username="root";
$password= "";
$dbname="mydatabase1";

$conn=new mysqli($server,$username,$password,$dbname);

if($_SERVER['REQUEST_METHOD']=='post' || isset( $_POST['submit'] )){

    $username= $_POST['email'];
    $userpass= $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username='$username'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
       if( $row = $result->fetch_assoc()){
            $passDB= $row["password"];
            if($passDB != $userpass){
                echo "Error";
            }else{
                echo "Welcome";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form method="post">
        Username : <input type="email" name="email"/>
        <br><br>
        Password : <input type="password" name="pass"/>
        <br><br>
        <input type="submit" name="submit"/>
    </form>
</body>
</html>