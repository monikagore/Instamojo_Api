<?php
//$conn=mysqli_connect("151.106.124.51","u188140722_instamojo","Admin@123","u188140722_instamojo");

<?php
$servername='151.106.124.51';
$username="u188140722_instamojo";
$password="Admin@123";
try
{
    $con=new PDO("mysql:host=$servername;dbname=u188140722_instamojo",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
?>
?>