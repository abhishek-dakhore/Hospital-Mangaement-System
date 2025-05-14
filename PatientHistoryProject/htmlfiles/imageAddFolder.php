<?php

    if(isset($_FILES['image'])){
        
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $filetype = $_FILES['image']['type'];

        $allowedsize= 100 * 1024;
        $allowedtype = array('pdf');
        $finalname= explode(".",$filename);
        $ext = strtolower(end($finalname));
    
        if(isset($_POST['submit'])){
            if(in_array($ext,$allowedtype)){
                if($allowedsize>1024){
                    echo "Size greateer than 100 kb";
                }else{
                    $path= "C:/pdffile";
                    mkdir($path,0777,true);
                    move_uploaded_file($_FILES['image'],$path);
                    echo "file Uploaded Successfully";
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
    <form action= ""  method="post" enctype="multipart/form-data">
    <br/><br/>
 <input type="file" name="image" />
    <br/><br/>
    <input type="submit" name="submit"/>

    </form> 
    
</body>
</html>