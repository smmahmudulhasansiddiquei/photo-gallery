<?php

    include './db.php';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $id = intval($_POST['id']);

        //getting the image from db by id
        $result = $conn->query("SELECT image_path FROM  photos WHERE id = $id");


        //Check if a photo found
        if($result->num_rows > 0){
            //Fetch the image array
            $row = $result->fetch_assoc();


            //delete from folder
            unlink($row['image_path']);
        }


        //delete from db

        $conn->query("DELETE FROM photos WHERE id = $id");
        header('location: index.php');
        exit;
    }
?>