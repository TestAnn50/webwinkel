<?php
#connectiegegevens
$host = 'localhost'; 
$gebruiker = 'root';
$wachtwoord = '';
$database = 'webwinkel';
?>
<!doctype html>  
<html>  
<head>  
<title>Login</title>  
    <style>   
        body{  
              
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h1 {  
    color: lightslategrey;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h2 {  
    color:lightslategrey;  
    font-family: verdana;  
    font-size: 100%;  
}
<style><?php include 'C:\xampp\htdocs\phpfiles\loginstyle.css'; ?></style> <!––Include css file––>
 </style>  
</head>  
<body>  
<div id="div_login">
     <center><h1>Login Pagina</h1></center>  
   <p><a href="register.php">Registreer</a> | <a href="login.php">Login</a></p>  
<center><h2>Login</h2>  </center>
<form action="" method="POST">  
Gebruikersnaam: <center><input type="text" name="user"><br /></center>    
Wachtwoord: <center><input type="password" name="pass"><br />    </center><p>  </p> 
<center><input type="submit" value="Login" name="submit" />   </center> 
</div>
</div>
</form>  
<?php  
if(isset($_POST["submit"])){ #wanneer knop gedrukt wordt:
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  #zet ingevulde gegevens in variabele
    $pass=$_POST['pass'];
    #$email=$_POST['email'];  
  
    $con=mysqli_connect($host,$gebruiker,$wachtwoord,$database) ;  #connectie database
    $query1=mysqli_query($con,"select wachtwoord from login where gebruikersnaam='".$user."'"); 

    $numrows1=mysqli_num_rows($query1);  
    if($numrows1!=0)  #wanneer gegevens verschillend zijn van 0
    {  
    while($row1=mysqli_fetch_assoc($query1))  #uitlezen gegevens
    {  
    $Encryp_pass=$row1['wachtwoord'];  
    }
    }
    else {  
    echo "Foute gebruikersnaam of wachtwoord!";  #wanneer wachtwoord niet klopt, write
    }   
    echo $Encryp_pass;
    echo $pass;
    $verify = password_verify($pass,$Encryp_pass);
    if($verify)
    {
        $query=mysqli_query($con,"SELECT * FROM login WHERE gebruikersnaam='".$user."' AND wachtwoord='".$Encryp_pass."'"); 
        #selecteer gegevens van gebruiker
	
        $numrows=mysqli_num_rows($query);  
        if($numrows!=0)  #wanneer gegevens verschillend zijn van 0
        {  
        while($row=mysqli_fetch_assoc($query))  #uitlezen gegevens
        {  
        $dbusername=$row['gebruikersnaam'];  
        $dbpassword=$row['wachtwoord'];  
        #$dbemail=$row['mailadres'];  
        }  
  
        if($user == $dbusername && $Encryp_pass == $dbpassword)  #als gebruikersnaam,wachtwoord en email kloppen
        {  
        session_start();  #start sessie
        $_SESSION['sess_user']=$user;  
  
        /* Redirect browser */  
        header("Location: gebruiker.php");  #ga naar volgende pagina
        }  
        } else {  
        echo "Foute gebruikersnaam of wachtwoord!";  #wanneer wachtwoord niet klopt, write
        }  
    }
    else
    {  
        echo "Foute gebruikersnaam of wachtwoord!";  #wanneer wachtwoord niet klopt, write
    }  
    
    
  
} else {  
    echo "Vul alle velden in!";   #wanneer niet alle velden zijn ingevult, write
}  
}  
?>  
</body>  
</html>   