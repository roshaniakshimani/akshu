<?php
session_start();

$email=$_SESSION['email'];
        if($email==true)
       {

      }
       else
     {
    header('location:login.php');
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php'?>
    <?php include 'style.php'?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .error {color: #FF0000;}
    </style>

</head>

<?php 

include "conn.php";


    if (isset($_POST['update'])) {

        $name = $_POST['name'];

        $user_id = $_POST['user_id'];

        $mobile = $_POST['mobile'];

        $gender = $_POST['gender']; 


        $sql = "UPDATE `registeration` SET `name`='$name',`mobile`='$mobile',`gender`='$gender' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

             echo "<script>alert('Record Upadated')</script>";
            ?>
    
                  <meta http-equiv = "refresh" content = "0; url =http://localhost:8080/sign%20up/admin.php"/>
                <?php

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `registeration` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $name = $row['name'];

            $mobile = $row['mobile'];

            $gender = $row['gender'];

            $id = $row['id'];

        } 

    ?>

<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id=form>
               <table><center><b><h2>Edit Form</h2></b>
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


            Name:<br>

            <input type="text" name="name" value="<?php echo $name; ?>"><br><br>

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">


          
    

           Mobile:<br>

          <input type="text" name="mobile" value="<?php echo $mobile; ?>">

          <br><br>

          Gender:<br>

<input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="female") echo "checked";?> >Male

<input type="radio" name="gender" value="female"<?php if (isset($gender) && $gender=="male") echo "checked";?> >Female

<br><br>


            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 
        </center></table>

        </body>

        </html> 

    <?php

    }
   
}

?> 
</body>
</html>
