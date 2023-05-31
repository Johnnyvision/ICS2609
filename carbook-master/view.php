<?php 
include "config.php";
$sql = "SELECT * FROM listing";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h2>users</h2>
        <table class="table">
            <thead>
                <tr>
                <th>Your Name</th>
                <th>Your Email</th>
                <th>Subject</th>
                <th>Carlist</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr>
                            <td><?php echo $row['yourName']; ?></td>
                            <td><?php echo $row['yourEmail']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['carlist']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>                       
                <?php       
                        }
                    }
                ?>                
            </tbody>
        </table>
    </div> 
</body>
</html>