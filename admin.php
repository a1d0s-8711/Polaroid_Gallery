<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>
<body>
    <h2>Uploading images</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
        <input type="submit" value="Uploading images" name="submit">
    </form>
</body>
</html>
