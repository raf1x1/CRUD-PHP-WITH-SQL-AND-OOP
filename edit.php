<?php

include_once("classes/Crud.php");

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

$result = $crud->getData("SELECT * FROM users WHERE id=$id");

foreach ($result as $res) {
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
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
            width: calc(100% - 10px);
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
        .form-group a {
            display: inline-block;
            margin-left: 10px;
            text-decoration: none;
            color: #007bff;
        }
        .form-group a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data</h2>
        
        <form name="form1" method="post" action="editaction.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $name;?>">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" value="<?php echo $age;?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $email;?>">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <input type="submit" name="update" value="Update">
                <a href="index.php">Home</a>
            </div>
        </form>
    </div>
</body>
</html>
