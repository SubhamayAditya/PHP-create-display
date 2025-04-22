<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #6366f1;
            outline: none;
        }

        .form-group input::placeholder {
            color: #aaa;
        }

        .form-container input[type="submit"] {
            background-color: #6366f1;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #4f46e5;
        }
    </style>
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
        <h2>Student Details</h2>

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
    </form>

    <!-- <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script> -->

    <button type="button"><a href="display.php">DISPLAY</a></button>
</body>

</html>