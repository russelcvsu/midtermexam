
<?php 
include ('server.php');
   function otp(){
        
    $str=' ';
    for($i=0; $i < 6; $i++){
        $rand = rand(0,9);
        $str.=$rand;
    }
    return $str;
}
$pin = otp();
$sql1 = "UPDATE users SET code = '$pin' WHERE username = '$_SESSION[username]'";
mysqli_query($db,$sql1);

?>

