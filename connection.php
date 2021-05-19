
<?php
$servername = 'sql6.freemysqlhosting.net';
$user = 'sql6413339';
$pass = 'j2uGfMzcZM';
$dbname = 'sql6413339';

$conn = mysqli_connect($servername,$user,$pass,$dbname);

if(!$conn){
  die("Could Not Connect to the database".mysqli_connect_error());
}

?>
