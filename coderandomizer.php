
<?php 
include ('server.php');
   function passCode(){
        
    $str=' ';
    for($i=0; $i < 6; $i++){
        $rand = rand(0,9);
        $str.=$rand;
    }
    return $str;
}
$pin2 = passCode();
$sql1 = "UPDATE users SET passCode = '$pin2' WHERE username = '$_SESSION[username]'";
mysqli_query($db,$sql1);
?>

