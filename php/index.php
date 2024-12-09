<?php 



       include("config.php");
        $c1=new Config();
      
        $is_btn_set =isset($_POST['button']);
        if($is_btn_set){
                $name=$_POST['name'];
                $age=$_POST['age'];
                $salary=$_POST['salary'];
                $c1->insert($name,$age,$salary);      
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Form</title>
</head>
<body>
        <center>
        <h1> Employee Registration Form</h1>
        <form  method="post">
                <input placeholder="Name" name="name"><br><br>
                <input type="number" placeholder="Age" name="age"><br><br>
                <input type="number" placeholder="Salary" name="salary"><br><br>
                <button name="button" type="submit">Submit</button>
                
        </form>
</center>
        
</body>
</html>