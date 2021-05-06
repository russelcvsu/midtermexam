<?php include('server.php'); ?>

<html>
    <head>
        <title>Registration form</title>
        <link rel="stylesheet" type="text/css" href="style.css">   
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>

        <form method="POST" action="register.php">
                <!-- errors -->
                <?php include('errors.php');?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
           
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="text" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="text" name="password_2">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="register">Register</button>
            </div>
            <p>Already a member? <a href="login.php">Sign in</a>
        </p>
        </form>



    </body>
</html>