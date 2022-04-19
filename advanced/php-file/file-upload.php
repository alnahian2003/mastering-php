<?php
/* 
 * Date: 19 April, 2022
 * Time: 
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Uploading Files And So On in PHP
 */

/* 
 We need to do couple of things also some test cases.
 1. upload the file
 2. check if the uploaded file is an image, then
    > # check if the file already exists, abort upload if exists.
    > # check if the file size exceeded 500kb, abort upload if exceed.
    > # check if the file type withing png, jpg or jpeg, abort upload if doesn't match the filetype.
    > # finally upload the file. 
 3. if any of the cases is false then cancel the upload.   
 */

$targetDirectory = "uploads/"; // Where the uploaded files will be saved
$uploaded = 1;
$supportedFileType = array("png", "jpg", "jpeg");

//  Check for the file upload form submission
if (isset($_POST["upload"])) {
    $uploadedFile = $_FILES["uploadImage"];

    // Check for if the uploaded file is empty or not
    if (($uploadedFile["size"] != 0) && $uploadedFile["error"] == 0) {
        $targetFile = $targetDirectory . basename($uploadedFile["name"]);
        $temp_name = $uploadedFile["tmp_name"];

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($temp_name);
        if (!$check == false) {
            $uploaded = 1;
        } else {
            echo "Please upload an image. </br>";
            $uploaded = 0;
        } // Aborts the upload

        // Check for file already exists
        if (file_exists($targetFile)) {
            echo "File already exists! </br>";
            $uploaded = 0;
        }

        // Limit File Size (Max 500kb)
        if (filesize($temp_name) > (1000 * 500)) {
            echo "Sorry, the image size is too large. Max 500 kilobytes! </br>";
            $uploaded = 0;
        }

        // Limit File Type (Only PNG,JPG,JPEG)
        if (!in_array($imageFileType, $supportedFileType)) {
            echo "Only PNG/JPG/JPEG files are allowed! </br>";
            $uploaded = 0;
        }

        // Check if $uploaded = 0 set for any error. It will stop the file upload
        if ($uploaded == 0) {
            "Sorry, your file was not uploaded successfully!";
        } else {
            if (move_uploaded_file($temp_name, $targetFile)) {
                echo htmlspecialchars(basename($uploadedFile["name"])) . " has been uploaded successfully!";
            } else {
                echo "Sorry, there was an error while uploading";
            }
        }
    } else {
        echo "You must select an image to upload.";
    }
}

// Work with directory
$openDirectory = @opendir($targetDirectory) or die("Unable to open folder"); // Open "uploads/" file where all images uploaded
$dirContent = scandir($targetDirectory);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader</title>

    <style>
        html,
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .avatars {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 4fr));
            grid-auto-rows: auto;
            grid-column-gap: 10px;
            grid-row-gap: 10px;
            justify-items: center;
            justify-items: center;
            align-items: center;
            text-align: center;
        }

        img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>Upload Your Image</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="upload">Select Image to Upload: </label>
        <input type="file" name="uploadImage" id="upload">
        <br>
        <small>(Max file size is 500kb. Only JPG/JPEG/PNG filetype acceptable)</small>
        <br>
        <br>
        <input type="submit" name="upload" value="Upload">
    </form>

    <!-- Diplay all the uploaded images from "uploads/" directory -->
    <div class="avatars">

        <?php
        foreach ($dirContent as $key => $imgName) {
            $imgPath = $targetDirectory . $imgName;

            // Extract File Name for Using them as a fictional User name
            $userName = explode(".", $imgName);
            $userName = $userName[0];
            $userName = ucfirst($userName);

            if ($imgName != '.' && $imgName != '..') {
                echo "<div class='avatar'>"; // Begin the .avatar Div
                echo "<img src='{$imgPath}' alt='{$userName}'/>";
                echo "<p>{$userName}</p>";
                echo "</div>"; // End the .avatar div
            }
        }
        closedir($openDirectory);
        ?>
    </div>
</body>

</html>