<?php 
    include('config.php');
    session_start();
    $c1 = new Config();

    // Handle form submission to insert data
    if (isset($_POST['button'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $postion = $_POST['postion'];
        $salary = $_POST['salary'];  
        $c1->insert($name, $age, $postion, $salary);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } 

    
    $res = $c1->fetch();
    if (isset($_POST['delete'])) {
        $id = $_POST['deleteId'];
        if ($c1->delete($id)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    if(isset($_POST['update']))
    {
        $id = $_POST['deleteId'];
        $name = $_POST['nameId'];
        $age = $_POST['ageId'];
        $postion = $_POST['postionId'];
        $salary = $_POST['salaryId'];

        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;
        $_SESSION['postion'] = $postion;
        $_SESSION['salary'] = $salary;
        header("Location: update.php");
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
            <h1 class="mb-4">Employee Registration Form</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" class="form-control" placeholder="Full Name" name="name" required pattern="[A-Za-z ]+" title="Name should only contain letters and spaces.">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" id="age" class="form-control" placeholder="Age" name="age" required min="18" max="100">
            </div>
            <div class="mb-3">
                <label for="postion" class="form-label">Postion</label>
                <input type="text" id="postion" class="form-control" placeholder="postion" name="postion" required pattern="[A-Za-z ]+" title="Name should only contain letters and spaces.">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" id="salary" class="form-control" placeholder="Salary" name="salary" required min="1">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="button">Submit</button>
            </div>
        </form>
    </div>

    <div class="container my-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>postion</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <th scope="row"><?php echo $data['id']; ?></th>
                            <td><?php echo htmlspecialchars($data['name']); ?></td>
                            <td><?php echo $data['age']; ?></td>
                            <td><?php echo $data['postion']; ?></td>
                            <td><?php echo $data['salary']; ?></td>
                            <td>
                                <form method="POST" class="d-inline">
                                    <input type="hidden" value="<?php echo $data['id']; ?>" name="deleteId">
                                    <input type="hidden" value="<?php echo $data['name']; ?>" name="nameId">
                                    <input type="hidden" value="<?php echo $data['age']; ?>" name="ageId">
                                    <input type="hidden" value="<?php echo $data['postion']; ?>" name="postionId">
                                    <input type="hidden" value="<?php echo $data['salary']; ?>" name="salaryId">
                                    <button type="submit" class="btn btn-outline-warning" name = "update">Update</button>
                                    <button type="submit" class="btn btn-outline-danger" name="delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if (mysqli_num_rows($res) === 0) { ?>
                <p class="text-center text-muted">No records found.</p>
            <?php } ?>
        </div>
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