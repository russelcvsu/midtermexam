
<html>

<head>
    <title>Login form</title>
    <?php include('server.php'); ?>


    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
<body>

    <div class="header">
        <h2>Enter your Username</h2>
    </div>
    <form method="POST" action="fpas.php">
         <!-- errors --> 
        <div class="input-group">
        <?php include('errors.php'); ?>
            <label>Username</label>
            <input type="text" name="username" id="username" value='<?php echo $username?>'>
        </div>

        <div class="input-group">
            <label>Code</label>
            <input type="text" name="fCode" id="fCode">
        </div>
        
        <div class="input-group">
            <button class="btn" type="submit" name="otpBtn" id="otpBtn">Send Code</button>
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="nextBtn" id="nextBtn">NEXT</button>
        </div>
    </form>

<script type="text/javascript" src="action.js"></script>


</body>
</html>