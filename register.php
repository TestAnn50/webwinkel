<?php

$host = 'localhost';
$gebruiker = 'root';
$wachtwoord = '';
$database = 'webwinkel';
?>
<!doctype html>  
<html>  
<head>  
<title>Registreer</title>  
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
    color: lightslategrey;  
    font-family: verdana;  
    font-size: 100%;  
}
<style><?php include 'C:\xampp\htdocs\phpfiles\loginstyle.css'; ?></style> 
</style>  
</head>  
<body>  
     <div id="div_login">
    <center><h1>Registreer pagina</h1></center>  
   <p><a href="register.php">Registreer</a> | <a href="login.php">Login</a></p>  
    <center><h2>Registratie</h2></center>  
	
<form action="" method="POST">  
    
      
Gebruikersnaam: <center><input type="text" name="user"><br />  </center> 
Email: <center><input type="text" name="email"><br />  </center> 
Wachtwoord: <center><input type="password" name="pass"><br />  </center> <p>  </p> 
<center><input type="submit" value="Registreer" name="submit" />  </center> 
              </div>
        
</form>  

<?php  
if(isset($_POST["submit"])){  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];
    $Encryp_pass = password_hash($pass,PASSWORD_DEFAULT); #encrypt wachtwoord
    $email=$_POST['email'];  
    $con=mysqli_connect($host,$gebruiker,$wachtwoord,$database); 

    $query=mysqli_query($con,"SELECT * FROM login WHERE gebruikersnaam='".$user."'");  #controleer of deze gebruiker al bestaat of niet
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)   #als gebruiker nog niet bestaat, voeg gebruiker en bijbehoorende gegevens toe aan database
    {  
    $sql="INSERT INTO login(gebruikersnaam,wachtwoord,mailadres) VALUES('$user','$Encryp_pass','$email')";  
  
    $result=mysqli_query($con,$sql);  
        if($result){  
    echo "Account Aangemaakt";  #wanneer gebruiker is aangemaakt,write
    } else {  
    echo "Fout!";  #wanneer query niet is gelukt, write fout 
    }  
  
    } else {  
    echo "Deze gebruikersnaam bestaat al, graag een andere invoeren aub.";  #wanneer gebruikersnaam al in database staat, write fout
    }  
  
} else {  
    echo "Vul alle velden in!";  #wanneer niet alle velden zijn ingevult, write
}  
}  
?>  
</body>  
</html>   