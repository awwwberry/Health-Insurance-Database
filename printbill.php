include('dbConfig.php');

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>printbill</title>

    <link href="bootstrap.min.css" rel="stylesheet">

    </head>
    <Body>
        <Center>
			
			<H1>
				Print a Bill:
			</H1>

            <?php
                echo Billfor ClaimID: $ClaimID;
                echo The total cost of services recieved is: $Cost;
                echo The cost covered by insurance is: $AmountCharged;
                echo The outstanding bill amount is: $AmountCharged - $Cost; 
            ?>
    </body> 
</html> 