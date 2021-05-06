
<html>

<head>
    <title>New Password</title>
    <?php include('server.php'); ?>



    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
<body>

    <div class="header">
        <h2>Create New Password</h2>
    </div>
    <form method="POST" action="newpassword.php">
         <!-- errors --> 
        <div class="input-group">
        <?php include('errors.php'); ?>
            <label>Create New Password</label>
            <input type="text" name="newpass1">
        </div>

        <div class="input-group">
            <label>Confirm Your Password</label>
            <input type="text" name="newpass2">
        </div>
        
        <div class="input-group">
            <button class="btn" type="submit" name="confirm" id="confirm">Confirm</button>
        </div>
        
    </p>
    </form>

<script type="text/javascript" src="action.js"></script>


</body>
</html>