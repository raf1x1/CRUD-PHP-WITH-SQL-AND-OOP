<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Data</h2>
        <?php
        include_once("classes/Crud.php");
        include_once("classes/Validation.php");

        $crud = new Crud();
        $validation = new Validation();

        if(isset($_POST['Submit'])) {  
            $name = $crud->escape_string($_POST['name']);
            $age = $crud->escape_string($_POST['age']);
            $email = $crud->escape_string($_POST['email']);
                
            $msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
            $check_age = $validation->is_age_valid($_POST['age']);
            $check_email = $validation->is_email_valid($_POST['email']);
            

            if($msg != null) {
                echo '<div class="error-message">' . $msg . '</div>';
                echo "<a href='javascript:self.history.back();'>Go Back</a>";
            } elseif (!$check_age) {
                echo '<div class="error-message">Please provide proper age.</div>';
            } elseif (!$check_email) {
                echo '<div class="error-message">Please provide proper email.</div>';
            }   
            else { 
                $result = $crud->execute("INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
                
                echo "<p style='color: green;'>Data added successfully.</p>";
                echo "<a href='index.php'>View Result</a>";
            }
        }
        ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" id="age" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <input type="submit" name="Submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
