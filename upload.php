<?php

    include './db.php';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        // var_dump($_POST);
        $title = $_POST['title'];
        // echo "<pre>";
        // print_r($_FILES['image']);
        // echo"<pre>";
        $image = $_FILES['image'];   

        // CHECK if the image uploaded 
        if(isset($image) && $image['tmp_name'] !== ""){
            $uploadDir = 'uploads/';
            $filePath = $uploadDir . basename($image['name']);

            // echo $filePath;

            //upload the file
            if(move_uploaded_file($image['tmp_name'], $filePath)){
                //insert the file into database
                $conn->query("INSERT INTO photos (title, image_path) VALUES ('$title', '$filePath')");

                header('location: index.php');
                exit;
            }else{
                echo "File Upload Failed";
            }
        }else{
            echo "Please select a file";
        }
    }

?>