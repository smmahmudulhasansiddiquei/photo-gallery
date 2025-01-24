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
        
        <!-- photo Gallery Section Start-->
        <div>
            <!-- photo details -->
            <?php
            
                $result = $conn->query("SELECT * FROM photos ORDER BY created_at DESC");

                if($result->num_rows > 0):
                    while($row = $result->fetch_assoc()):
            ?>
            <div>
                <h2><?php echo $row['title']; ?></h2>
                <img src="<?= $row['image_path']; ?>" alt="image" width="250 px" height="300 px">
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
                <div>
                    <form action="edit.php" method="POST">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit">Edit</button>
                    </form>
                </div>
            </div>
            <?php 
                endwhile; 
                else:
                    echo "No photos uploaded yet.";
                endif;
            ?>
        </div>
        
        <!-- photo Gallery Section End-->
    </div>
</body>
</html>