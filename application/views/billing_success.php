<html>
    <head>
        <title>Shop cart class</title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    </head>
    <body>
       <div id='result_div'>
            <?php
            // this will show you thank you message.
            echo "<h1 align='center'>Thank You! your order has been placed!</h1>";
            echo "<span id='go_back'><a class='fg-button teal' href=" . base_url() . "index.php/shopping>Go back</a></span>";
            ?>
        </div>
    </body>
</html>
