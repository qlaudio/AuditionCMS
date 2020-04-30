<?php
 $host = "localhost";  
 $username = "audition-kr";  
 $passdb = "modoaudition";  
 $database = "audition";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $passdb);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
// Code for checking userid availabilty
if(!empty($_POST["userid"])) {
$uname= $_POST["userid"];
$sql ="SELECT userid FROM  userdata WHERE userid=:uname";
$query= $connect->prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> userid already exists.</span>";
} else{
echo "<span style='color:green'> userid available for Registration.</span>";
}
}
// Code for checking email availabilty
if(!empty($_POST["email"])) {
$email= $_POST["email"];
$sql ="SELECT UserEmail FROM  userdata WHERE UserEmail=:email";
$query= $connect -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'>Email-id already exists.</span>";
} else{
echo "<span style='color:green'>Email-id available for Registration.</span>";
}
}
?>