
<html>

    <head>
        <title>Login form</title>
        <?php include('server.php'); ?>


        <link rel="stylesheet" type="text/css" href="style.css">   
    </head>
    <body>

        <div class="header">
            <h2>Login</h2>
        </div>
        <form method="POST" action="login.php">
             <!-- errors --> 
            <div class="input-group">
            <?php include('errors.php'); ?>
                <label>Username</label>
                <input type="text" name="username" id="username" value ="<?php echo $username; ?>">
            </div>
        
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" onfocus="this.value=''" value ="<?php echo $password; ?>">
            </div>
            <div class="input-group">
                <label>ENTER OTP:</label>
                <input type="text" name="otp" id="otp">
            </div>
            <a href="fpas.php">Forgot Password?</a>
            <div class="input-group">
                <button class="btn" type="submit" name="sendOTP" id="sendOTP">Login</button>
              
            </div>
            
            <div class="input-group">
                <button class="btn" type="submit" name="login" id="login">SEND OTP</button>
              
            </div>
            
            <p>Not a member? <a href="register.php">Sign up</a>
        </p>
        </form>

    <script type="text/javascript" src="action.js"></script>
    

    </body>
</html>