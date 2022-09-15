<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'work-management-app';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()) {
        exit('error connecting to the database' .mysqli_connect_error());
}
if(!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['image'])) {
    exit('empty field(s)');
}
if(empty($_POST['username'] || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['image']))) {
    exit('value empty');
}

if($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $image = $_FILES['image']['name'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;


    if($stmt->num_rows>0) {
        echo 'Username already Exists. Try again';
    }
    else{
        if($stmt = $con->prepare('INSERT INTO users (username, password, email, image) VALUES(?,?,?,?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $_POST['password'], $_POST['email'], $_POST['image']);
            $stmt->execute();
        }elseif($image_size > 2000000){
            $message[] = 'Image size is too large!';
    }else{
        $insert = mysqli_query($con, "INSERT INTO 'form'(username, email, password, image) VALUES ('$name', '$email', '$password', '$image')") or die('query failed');
    
        if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered succcessfully!';
            header('location: index.php');
        }else{
            $message[] = 'registration failed';
        }
       
    }
    $stmt->close();
}
}
$con->close();
?>