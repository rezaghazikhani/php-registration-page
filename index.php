<?php
    $name = $password = $email = "";
    $errors =array('name' =>'','email' =>'','password' =>'',);
if (isset($_POST['submit'])){

    //Name 
    if (empty($_POST['name'])) {
        $errors['name'] = "Error Name";
    }else{
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-z\s+$]/',$name)) {
            $errors['name'] =  'name must be letters and spaces only <br>';
        }
    }

    //>Email 
    if (empty($_POST['email'])) {
        $errors['email'] = "Erorr email";  
    }else{
        $email = $_POST['email'];
        if (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email not Valid';
        }
    }

    //password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Error password';
    }else{
        $password = $_POST['password'];
        if (!preg_match('/^[a-zA-Z\s]+(,\s?[a-zA-Z\s]*)*$/' , $password)) {
            $errors['password'] = 'password shoud Separated by Comma <br>'; 
        }        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    
    <title>Document</title>
</head>
<body>
<div class="login-container">
    <h2>login form</h2>
    <form action="index.php" method="POST"> 
        <label for="name">name :</label>
        <input type="text" name="name" placeholder="Enter your Name " value="<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your Emial" value="<?php echo htmlspecialchars($email)?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

        <label for="password"> password:</label>
        <input type="password" name="password" placeholder="Enter your password" value="<?php echo htmlspecialchars($password)?>">
        <div class="red-text"><?php echo $errors['password']; ?></div>

        <input type="submit" name="submit" value="Submit" >
    </form>
</div>
</body>
</html>