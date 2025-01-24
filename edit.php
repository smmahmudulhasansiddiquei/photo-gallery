<?php

    include './db.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery App</title>
    <?PHP include './CSS.PHP' ?>
</head>
<body>
    <div class="container">

        <!-- photo Uploading Section Start-->

        <h1>Photo Gallery</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Photo Title" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Upload</button>
        </form>
        <!-- photo Uploading Section End-->
        <hr>
        
    </div>
</body>
</html>