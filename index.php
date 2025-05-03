<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Form</title>
    <link rel="stylesheet" href="style.css">

</head>
<?php
include('connection.php');

if (isset($_POST['submit'])) {
    $name = $_POST['stuname'];
    $stmail = $_POST['stuemail'];
    $stloc = $_POST['stuloc'];

    $stimgName = $_FILES['stuimg']['name'];
    $stimgTmp = $_FILES['stuimg']['tmp_name'];
    $imgPath = './uploads/' . $stimgName;

    // print_r($name);
    // die();

    if (move_uploaded_file($stimgTmp, $imgPath)) {
        $query = "insert into crud (stname,stemail,stlocation,st_image) values ('$name','$stmail','$stloc','$stimgName')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Data Inserted successfully')</script>";
        } else {
            echo "<script>alert('Data Insertaion failed')</script>";
        }
    } else {
        echo "<script>alert('photo not Inserted successfully')</script>";
    }
}

?>

<body>

    <form method="post" action="" class="form-container" enctype="multipart/form-data">
        <h2>Add Student Details</h2>

        <div class="form-group">
            <input type="text" name="stuname" placeholder="Student Name">
        </div>
        <div class="form-group">
            <input type="email" name="stuemail" placeholder="Student Email">
        </div>
        <div class="form-group">
            <input type="text" name="stuloc" placeholder="Student Location">
        </div>
        <div class="form-group">
            <label for="stuimg">Upload Student Image</label>
            <input type="file" id="stuimg" name="stuimg">
        </div>
        <input type="submit" value="Submit" name="submit">
        <a href="display.php" class="display-btn">Display</a>
    </form>

    <!-- <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script> -->


</body>

</html>