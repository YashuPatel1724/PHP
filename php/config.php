<?php
 class Config{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="employee";
    private $connection;

    public function connect()
    {
       $this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
      //  if($res)
      //  {
      //   echo"Database connected Successflly !";
      //  }
      //  else
      //  {
      //   echo"Database connected failed !";
      //  }

    }
   
    public function __construct()
    {
      $this->connect();
    }
    public function insert($name,$age,$salary)
    {
      $query = "INSERT INTO employee (name,age,salary) VALUES('$name',$age,$salary)";
      $res=mysqli_query($this->connection,$query);
      if($res)
      {
         echo"Data inserted successfully !";
      }
      else
      {
         echo"Data inserted failed !";
      }
    }





 }


?>