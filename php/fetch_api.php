<?php 


header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include('config.php');
$c1 = new Config();

if($_SERVER["REQUEST_METHOD"] == 'GET')
{

    $res = $c1->fetch();
    $employee = [];
    if($res)
    {
        while($data = mysqli_fetch_assoc($res))
        {
            array_push($employee, $data);
            $arr['data'] = $employee;
        }
    }
    else{
        $arr['err'] = "Failed to insert data";
    }
}
else{
    $arr['error']  = "Only GET type is allowed";
}

echo json_encode($arr);
?>