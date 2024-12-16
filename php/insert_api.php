<?php 


header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include('config.php');
$c1 = new Config();

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $postion = $_POST['postion'];
    $salary = $_POST['salary'];

    $res = $c1->insert($name, $age, $postion, $salary);

    if($res)
    {
        $arr['msg'] = "Data inserted successfully";
    }
    else{
        $arr['msg'] = "Failed to insert data";
    }
}
else{
    $arr['error']  = "Only Post type is allowed";
}

echo json_encode($arr);
?>