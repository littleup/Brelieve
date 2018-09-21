<?php  session_start(); ?>  

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

      if($user == "nicole" && $pass == "trustno1")  // username is  set to "Ank"  and Password   
         {                                   // is 1234 by default     

          $_SESSION['use']=$user;


         echo '<script type="text/javascript"> window.open("home.php","_self");</script>';            //  On Successful Login redirects to home.php

        }

        else
        {
            echo "invalid UserName or Password";        
        }
}
 ?>
<html>
<STYLE type="text/css">
form {
  margin: auto;
  width: 30em; /* try other values as well */
  background: #f29429;
}

img {
    display: block;
    margin: 0 auto;
}

</STYLE>
<head>

<title> Login Page   </title>

</head>
<body>

<img src="img/login_logo.png">
<br />
<form action="" method="post">
<h2 align="center">Clinical Record Management System</h2>
    <table width="200" border="0" align="center">
  <tr>
    <td>  UserName</td>
    <td> <input type="text" name="user" > </td>
  </tr>
  <tr>
    <td> Password  </td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
  </tr>
</table>
</form>

</body>
</html>

