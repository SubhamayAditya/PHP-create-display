<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Table</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fafb;
            padding: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background-color: #6366f1;
            color: white;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        img {
            max-width: 60px;
            border-radius: 8px;
        }

        @media (max-width: 600px) {

            th,
            td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <h2>Student List</h2>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <?php include('connection.php');
            $qur = 'select * from crud';
            $result = mysqli_query($conn, $qur);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><img src="./uploads/<?php echo htmlspecialchars($row['st_image']); ?>" alt="Student Image"></td>
                        <td><?php echo $row['stname']; ?></td>
                        <td><?php echo $row['stemail']; ?></td>
                        <td><?php echo $row['stlocation']; ?></td>
                    </tr>
            <?php
                }
            }
            ?>


        </tbody>
    </table>
    <button type="button"><a href="index.php">INSERT</a></button>

</body>

</html>