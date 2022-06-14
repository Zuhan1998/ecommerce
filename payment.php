<html>
    <head>
        <?php
        include('order.php')
        ?>
    </head>
    <body>
        <form method="post" action="invoice.php">
            <select name="taskOption">
                <option value="Credit Card">Credit Card</option>
                <option value="Cash on Delivery">Cash on Delivery</option>
                <option value="Internet Banking">Internet Banking</option>
            </select>
        <input type="submit" value="Submit the form"/>
    </form>
        <!-- <button type="submit" name="submit" class="btn btn-primary" value="submit">Generate invoice</button> -->

        <?php

        ?>
    </body>
</html>