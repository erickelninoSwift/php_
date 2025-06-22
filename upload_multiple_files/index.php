<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple files</title>
</head>

<body>
    <h2> Upload Multiple files</h2>

    <form action="process.php" method="POST" enctype="multipart/form-data">

        <span>Select Files to upload: </span>
        <input type="file" name="files[]" multiple />
        <br>
        <br>
        <input type="submit" name="submit" />
    </form>
</body>

</html>