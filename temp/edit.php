<?php
//getting id from url
include_once("config.php");
$id = $_GET['id'];
$queryedit ="SELECT id,name,division,email FROM register where id = " .$id; 
$result1 = $conn->query($queryedit);

foreach($result1 as $row)    {
 $name = $row['name'];
    $division = $row['division'];
    $email = $row['email'];
    }

 ?>
<html>
<head>    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 
<body>

    <br/><br/>
    
    <form name="form1" method="post" action="index.php?action=update">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Division</td>
                <td><input type="text" name="division" value="<?php echo $division;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
                
            </tr>
            <td><input type="submit" name="update" value="Update"></td>
        </table>
    </form>
</body>
