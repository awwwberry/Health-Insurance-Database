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

    <title>validateclaim</title>

    <link href="bootstrap.min.css" rel="stylesheet">

    </head>
    <Body>
        <Center>
			
			<H1>
				Validate Claim:
			</H1>
      
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      ClaimID: <input type="text" name="ClaimID">
      <input type="submit">
      </form>

      <?php
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $ClaimID = $_REQUEST['ClaimID'];
        if (empty($ClaimID)) {
          echo "Empty";
        } else {
          echo $ClaimID;
        }
      }

      $sql = "SELECT * FROM Claims WHERE ClaimID = '$ClaimID'";
      ?>
      SELECT Claims.ClaimID, Services.Cost, Claims.AmountCharged
      FROM Claims
      JOIN Services ON Claims.Medicalcode = Services.Medicalcode
      WHERE Claims.ClaimID = <$ClaimID> AND Claims.AmountCharged = Services.Cost;

      SELECT 
        CASE WHEN Claim.DateofService > Plan.Startdate THEN TRUE ELSE FALSE END AS is_date_of_service_after_start_date
      FROM Claims
      JOIN Policy
      ON Claims.SSN = Policy.SSN 
      WHERE Claims.ClaimID = <$ClaimID>;

