<?php 

class Config
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'demo';
    private $connection;
    

    public function __construct() {
        $this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
    }

    public function insert($name,$age,$postion,$salary){
        $query = "INSERT INTO employee (name,age,postion,salary) VALUES('$name',$age,'$postion','$salary')";
        $res =  mysqli_query($this->connection,$query);
        return $res;
    }

    public function fetch()
    {
        $query = "SELECT * FROM employee";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    public function delete($id)
    {
        $query = "DELETE FROM employee WHERE id = $id ";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }

    public function update($id, $name, $age, $postion, $salary)
    {
        $query = "UPDATE employee SET name = '$name', age = $age, postion = '$postion', salary = '$salary' WHERE id = $id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }
    
}

?>