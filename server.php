

<script type="text/javascript" src="action.js" defer></script>
<?php 
session_start();
  $db = mysqli_connect('localhost', 'root', '','act2');
$email = "";
$errors = array(); 

    //connection
$username = '';
$password = '';



    //reg button clicked
    if(isset($_POST['register'])){
        $username = mysqli_real_escape_string($db,$_POST['username']);

        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

    //filled form
    if(empty($username)){
        array_push($errors, "Username is required!"); 
    }
    if(empty($email)){
        array_push($errors, "Email is required!"); 
    }
    if(empty($password_1)){
        array_push($errors, "Password is required!"); 
    }
    if($password_1 != $password_2){
        array_push($errors, "Passwords do not match");
    }

    //strong password validation
    $uppercase = preg_match('@[A-Z]@', $password_1);
   $lowercase = preg_match('@[a-z]@', $password_1);
     $number    = preg_match('@[0-9]@', $password_1);
    $specialChars = preg_match('@[^\w]@', $password_1);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_1) < 8){
        array_push($errors,"Password should be at least 8 characters in length and should include at least one upper case letter, 
        one number, and one special character.");
    }
    //username and email taken validation
    $sql_u = "SELECT * FROM users WHERE username = '$username'";
    $sql_e = "SELECT * FROM users WHERE email = '$email'";
    $res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

      if (mysqli_num_rows($res_u) > 0) {
        array_push($errors,"Username is already taken");
  	}else if(mysqli_num_rows($res_e) > 0){
  	  array_push($errors,"Email is already taken"); 	
  	}else{
        if(count($errors) == 0) {
            $username = mysqli_real_escape_string($db,$_POST['username']);
            $_SESSION['username'] = $username;
            $password = $password_1; //encrypt pword
            $sql2 = "INSERT INTO activities (username, activity,time) VALUES ('$_SESSION[username]', 'Registered',  CURRENT_TIMESTAMP())";
            mysqli_query($db,$sql2);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($db,$sql);
        
            $_SESSION['success'] = "You are now logged in!";
            header('location: index.php'); 
        }
      }

    }

//verify
if(isset($_POST['sendOTP'])){
    $otp = mysqli_real_escape_string($db,$_POST['otp']);
    $username = mysqli_real_escape_string($db,$_POST['username']);

if(empty($otp)){
    array_push($errors, "Verification code is required!"); 
    }else{
if(count($errors) == 0){
        $sql = "UPDATE users SET loginTS=CURRENT_TIMESTAMP() WHERE username= '$username'"; 
        mysqli_query($db, $sql);
        $query = "SELECT * FROM users WHERE code = '$otp' AND username='$username'";
        $result = mysqli_query ($db, $query);
        if(mysqli_num_rows($result)==1){
            $sql1 = "UPDATE users SET code = 'qwlekjqlwkejqlwkej' WHERE username = '$_SESSION[username]'";
            mysqli_query($db,$sql1);
            $sql = "INSERT INTO activities (username, activity,time) VALUES ('$_SESSION[username]', 'Login Success',  CURRENT_TIMESTAMP())";
            mysqli_query($db,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in!";
            header('location: index.php'); 
        }
         else{
             array_push($errors, "INVALID VERIFICATION CODE");
         }
        }
  }   
}


//code


//login
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
if(empty($username)){
    array_push($errors, "Username is required!"); 
}
if(empty($password)){
    array_push($errors, "Password is required!"); 
}else{
if(count($errors) == 0){
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query ($db, $query);
        if(mysqli_num_rows($result)==1){
            $_SESSION['username'] = $username;
            $sql = "INSERT INTO activities (username, activity,time) VALUES ('$_SESSION[username]', 'Login Attempt',  CURRENT_TIMESTAMP())";
            mysqli_query($db,$sql);
            echo "    <script>
              window.open('otp.php');
            </script>";
        }else{
            array_push($errors, "Wrong username or password combination");
           
             }
        }
    }
}

//forgot password
if(isset($_POST['otpBtn'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
if(empty($username)){
    array_push($errors, "Username is required!"); 
}
else{
if(count($errors) == 0){
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query ($db, $query);
        if(mysqli_num_rows($result)==1){
            $_SESSION['username'] = $username;
            echo "    <script>
              window.open('code.php');
            </script>";
        }else{
            array_push($errors, "Incorrect Username");
           
             }
        }
    }
}

//change password
if(isset($_POST['nextBtn'])){
    $fCode = mysqli_real_escape_string($db,$_POST['fCode']);
    $username = mysqli_real_escape_string($db,$_POST['username']);

if(empty($fCode)){
    array_push($errors, "Verification code is required!"); 
    }else{
if(count($errors) == 0){
        $query = "SELECT * FROM users WHERE passCode = '$fCode' AND username='$username'";
        $result = mysqli_query ($db, $query);
        if(mysqli_num_rows($result)==1){
            $sql1 = "UPDATE users SET passCode = '192847192847123123123' WHERE username = '$_SESSION[username]'";
            mysqli_query($db,$sql1);
            $_SESSION['username'] = $username;
            header('location: newpassword.php'); 
          }
         else{
             array_push($errors, "INVALID CODE");
            } 
        }
  }   
}

//create new password
if(isset($_POST['confirm'])){
    $newpass1 = mysqli_real_escape_string($db,$_POST['newpass1']);
    $newpass2 = mysqli_real_escape_string($db,$_POST['newpass2']);


    if($newpass1 != $newpass2){
        array_push($errors, "Passwords do not match");
    }else{
        if(count($errors) == 0) {
            $password = $newpass1;
            $username = mysqli_real_escape_string($db,$_POST['username']); 
            $sql = "UPDATE users SET password='$password' WHERE username='$_SESSION[username]'";
            mysqli_query($db,$sql);
            $sql1 = "INSERT INTO activities (username, activity,time) VALUES ('$_SESSION[username]', 'Change Password',  CURRENT_TIMESTAMP())";
            mysqli_query($db,$sql1);
            $_SESSION['success'] = "Password changed successfully!";
            header('location: success.php'); 
        }
      }
}
//logout
   if(isset($_GET['logout'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $sql = "UPDATE users SET logoutTS=CURRENT_TIMESTAMP() WHERE username='$_SESSION[username]'";
        mysqli_query($db, $sql);
    $sql1 = "INSERT INTO activities (username, activity,time) VALUES ('$_SESSION[username]', 'Logout',  CURRENT_TIMESTAMP())";
    mysqli_query($db,$sql1);
       session_destroy();
       unset($_SESSION['username']);
       header('location: login.php');
   }
?>

