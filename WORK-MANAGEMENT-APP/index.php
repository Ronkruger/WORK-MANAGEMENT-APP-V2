
<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Baloo+2:wght@400;800&family=Carter+One&family=Dela+Gothic+One&family=Fjalla+One&family=Fredoka+One&family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@1,300&family=Play&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300&family=Saira+Condensed:wght@100&display=swap" rel="stylesheet">
  <style>
    
    body {

background: #D20514;
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
flex-direction: column;

}

*{
  font-family: 'Poppins', sans-serif;
box-sizing: padding-box;
}

form {
width: 600px;
height: 450px;
padding: 20px;
/* From https://css.glass */
background: rgba(255, 255, 255, 0.2);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
border: 1px solid rgba(255, 255, 255, 0.3);
border-radius: 20px;

}

.title {
text-align: center;
margin-bottom: 40px;
}

input {
display: block;
border: 2px solid #ccc;
width: 95%;
padding: 10px;
margin: 10px auto;
border-radius: 5px;
}

label {
color: #888;
font-size: 18px;
padding: 10px;
}

button {

float: right;
background: rgb(35, 174, 202);
padding: 10px 15px;
color: #fff;
border-radius: 5px;
margin-right: 10px;
border: none;
position: absolute;
top: 80%;
left: 80%;
}

button:hover{
opacity: .10;
}

.error {
background: #F2DEDE;
color: #0c0101;
padding: 10px;
width: 95%;
border-radius: 5px;
margin: 20px auto;
}

h1 {
text-align: center;
color: rgb(134, 3, 3);
}

a {
float: right;
background: rgb(183, 225, 233);
padding: 10px 15px;
color: #fff;
border-radius: 10px;
margin-right: 10px;
border: none;
text-decoration: none;
}

a:hover{

opacity: .7;

}
#profile_logo{
  font-size: 40px;
}
.redirect{
float: left;
background: rgb(35, 174, 202);
color: #fff;
}
.redirect:hover{
  opacity: .7;
}
  </style>
</head>

<body>
  <div class="navbar-brand">
  <h1><i class="fa fa-youtube-play" style="font-size:36px;color:red"></i>   Tubeless</h1>
  </div>
     <form action="login.php" method="post">

     <h1 class="title"><span class="material-symbols-outlined" id="profile_logo">
account_circle
</span></h1>

<?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

        <label>username</label>

        <input type="text" name="username" placeholder="username"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

          <a href="registration.php" class="redirect">sign up here</a>
        

     </form>

</body>

</html>