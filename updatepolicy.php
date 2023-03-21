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

    <title>updatepolicy</title>

    <link href="bootstrap.min.css" rel="stylesheet">

    </head>
    <Body>
        <Center>
			
			<H1>
				Update Policy:
			</H1>

        UPDATE Policy
        INNER JOIN Claims 
        ON Policy.PolicyID = Claims.PolicyID
        SET Deductibletodate = Deductibletodate - Amountcharged
        WHERE ClaimID = 'input' 

        UPDATE Policy
        SET Deductibletodate = Deductibletodate - <amount_charged>
        WHERE SSN = (SELECT SSN FROM Claims WHERE ClaimID = <your_claim_id>);