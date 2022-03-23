<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>  
<!doctype html>  
<html>  
<head>  
<title>Welkom</title>  
    <style>   
        body{  
              
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    color: steelblue;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h2 {  
    color: lightslategrey;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h1 {  
    color: lightslategrey;  
    font-family: verdana;  
    font-size: 100%;  
}  
              
          
    </style>  
</head>  
<body>  
<style><?php include 'C:\wamp64\www\phpfiles\loginstyle.css'; ?></style>
<div id="div_login">
    <center><h1>TITEL PAGINA</h1></center>  
      

<h2>Welkom, <?=$_SESSION['sess_user'];?>!  
<p>  
testestestest
</p>  
<a href="loguit.php">Uitloggen</a></h2> 
</div>
</body>  
</html>  
<?php  
}  
?>  