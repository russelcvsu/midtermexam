
    <?php  include('server.php'); ?>
       
<html>
    <head>
        <title>Activity #2</title>
        <link rel="stylesheet" type="text/css" href="style.css">   
    </head>
    <body>
        <div class="header">
            <h2>Home</h2>
        </div>


        <div class="content">

            <?php if(isset($_SESSION['success'])): ?> 
                    <div class="error success">
                        <h3>
                            <?php

                            echo $_SESSION['success'];
                            unset($_SESSION['success']);

                            ?>
                        </h3>
                    </div>
                <?php endif ?>

                <?php if(isset($_SESSION['username'])): ?>
                    <p><?php echo"Welcome " .$_SESSION['username']; ?></p>
                    <p><a href="index.php?logout='1'"style="color: red;">Logout</a></p>
                <?php endif ?>

                

        </div>
        

    </body>
</html>