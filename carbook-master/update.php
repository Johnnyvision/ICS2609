<?php 
    include "config.php";
    if (isset($_POST['update'])) {
        $yourName = $_POST['yourName'];
        $yourEmail = $_POST['yourEmail'];
        $subject = $_POST['subject'];
        $carlist = $_POST['carlist'];
        $message = $_POST['messageA']; 
        $user_id = $_POST['user_id'];
        $sql = "UPDATE `listing` SET `yourName`='$yourName',`yourEmail`='$yourEmail',`subject`='$subject',`carlist`='$carlist',`message`='$message' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 
        if ($result == TRUE) {
            echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 

if (isset($_GET['id'])) {
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM `listing` WHERE `id`='$user_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $yourName = $row['yourName'];
            $yourEmail = $row['yourEmail'];
            $subject = $row['subject'];
            $carlist  = $row['carlist'];
            $message = $row['message'];
            $id = $row['id'];
        } 
    ?>
        <h2>User Update Form</h2>
        <form action="" method="post">
          <fieldset>
            <legend>Personal information:</legend>
            Your name:<br>
            <input type="text" name="yourName" value="<?php echo $yourName; ?>">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <br>
            Your Email:<br>
            <input type="text" name="yourEmail" value="<?php echo $yourEmail; ?>">
            <br>

            Subject:<br>
            <input type="text" name="subject" value="<?php echo $subject; ?>">
            <br>

            Car List:<br>
            <input type="radio" name="carlist" value="groupA" id="groupA"> Group A <br>
            <input type="radio" name="carlist" value="groupB" id="groupB"> Group B <br>
            <input type="radio" name="carlist" value="groupC" id="groupC"> Group C <br>
            <input type="radio" name="carlist" value="groupD" id="groupD"> Group D <br>
            <br>

            Message:<br>
            <input type="text" name="messageA" value="<?php echo $message; ?>">
            <br><br>

            <input type="submit" value="Update" name="update">
            <a href="view.php">Go Back</a>
          </fieldset>
        </form> 
        </body>
        </html> 
    <?php
    }
    else{ 
        header('Location: view.php');
    } 
}
?>