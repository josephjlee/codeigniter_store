<?php
$grand_total = 0;
// Calculate grand total.
if ($cart = $this->cart->contents()):
    foreach ($cart as $item):
        $grand_total = $grand_total + $item['subtotal'];
    endforeach;
endif;
?>
<html>
    <head>
        <title>Codeigniter cart class</title>
         <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
    </head>
    <body>
        <div id="bill_info">
            
            <?php // Create form for enter user imformation and send values 'shopping/save_order' function?>
            <form name="billing" method="post" action="<?php echo base_url() . 'index.php/shopping/save_order' ?>" >
                <input type="hidden" name="command" />
                <div align="center">
                    <h1 align="center">Billing Info</h1>
                    <table border="0" cellpadding="2px">
                        <tr><td>Order Total:</td><td><strong>$<?php echo number_format($grand_total, 2); ?></strong></td></tr>
                        <tr><td>Your Name:</td><td><input type="text" name="name" required=""/></td></tr>
                        <tr><td>Address:</td><td><input type="text" name="address" required="" /></td></tr>
                        <tr><td>Email:</td><td><input type="text" name="email" required="" /></td></tr>
                        <tr><td>Phone:</td><td><input type="text" name="phone"  required="" /></td></tr>
                        <tr><td><?php
                        // This button for redirect main page.
                        echo "<a class ='fg-button teal' id='back' href=" . base_url() . "index.php/shopping>Back</a>";  ?>
                            </td><td><input type="submit" class ='fg-button teal' value="Place Order" /></td></tr> 
                     
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>