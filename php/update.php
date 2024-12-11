<?php 
session_start();
include("config.php");

$c1 = new Config();

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
$postion = $_SESSION['postion'];
$salary = $_SESSION['salary'];

if(isset($_POST['button']))
{
    $name = $_POST['name'];
    $age = $_POST["age"];
    $postion = $_POST['postion'];
    $salary = $_POST['salary'];

    $c1->update($id,$name,$age,$postion,$salary);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container my-4">
        <!-- Form for Employee Registration -->
        <form method="POST" id="employeeForm">
            <h1 class="mb-4">Update Form</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" class="form-control" placeholder="Full Name" name="name" value="<?php echo $name ?>" required pattern="[A-Za-z ]+" title="Name should only contain letters and spaces." >
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" id="age" class="form-control" placeholder="Age" value="<?php echo $age ?>" name="age" required min="18" max="100">
            </div>
            <div class="mb-3">
                <label for="postion" class="form-label">Postion</label>
                <input type="text" id="postion" class="form-control" placeholder="postion" value="<?php echo $postion?>" name="postion" required pattern="[A-Za-z ]+" title="postion should only contain letters and spaces.">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" id="salary" class="form-control" placeholder="Salary" value="<?php echo $salary?>" name="salary" required min="1">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="button">Update</button>
            </div>
        </form>
    </div>

    

    <script>
        document.getElementById('employeeForm').addEventListener('submit', function(event) {
            const name = document.getElementById('name');
            const age = document.getElementById('age');
            const postion = document.getElementById('postion');
            const salary = document.getElementById('salary');

            if (!name.value.match(/[A-Za-z ]+/)) {
                alert('Name should only contain letters and spaces.');
                event.preventDefault();
            }
            if (age.value < 18 || age.value > 100) {
                alert('Age must be between 18 and 100.');
                event.preventDefault();
            }
            if (!postion.value.match(/[A-Za-z ]+/)) {
                alert('Name should only contain letters and spaces.');
                event.preventDefault();
            }
            if (salary.value <= 0) {
                alert('Salary must be a positive number.');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>