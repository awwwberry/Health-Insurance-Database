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

    <title>insertclaim</title>

    <link href="bootstrap.min.css" rel="stylesheet">

    </head>
    <Body>
        <Center>
			
			<H1>
				Insert new claim into the database:
			</H1>
			
			<?php	
				$ClaimID = $_POST["ClaimID"];
				$PolicyID = $_POST["PolicyID"];
				$SSN = $_POST["SSN"];
				$NPI = $_POST["NPI"];
				$HospitalID = $_POST["HospitalID"];
				$Medicalcode = $_POST["Medicalcode"];
				$DateofService = $_POST["DateofService"];
				$Amountcharged = $_POST["Amountcharged"];
				

				$sql = "INSERT INTO Claims VALUES(ClaimID = '{$ClaimID}', PolicyID = '{$PolicyID}', 
									SSN = '{$SSN}', NPI = '{$NPI}', HospitalID = '{$HospitalID}', 
									Medicalcode = '{$Medicalcode}', DateofService = '{$DateofService}', 
									Amountcharged = '{$Amountcharged}')";
				

				if ($db->query($sql) === TRUE) {
					echo "Record updated successfully";
				} else {
					echo "Error updating record: " . $db->error;
				}
				?>
			
			Your updated information:	
			<?php 
			$sql = "SELECT * FROM Claims WHERE ClaimID = $ClaimID";
			$result = $db->query($sql);
			
			while($row = $result->fetch_assoc()) {
			?>
			<head>
			<style>
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			</style>
			</head>
			<table>
				<thead>
						<td>ClaimID</td>
						<td>PolicyID</td>
						<td>SSN</td>
						<td>NPI</td>
						<td>HospitalID</td>
						<td>Medicalcode</td>
						<td>DateofService</td>
						<td>Amountcharged</td>
						
						<tr>
							<td><?php echo $row["ClaimID"]?></td>
							<td><?php echo $row["PolicyID"]?></td>
							<td><?php echo $row["SSN"]?></td>
							<td><?php echo $row["NPI"]?></td>
							<td><?php echo $row["HospitalID"]?></td>
							<td><?php echo $row["Medicalcode"]?></td>
							<td><?php echo $row["DateofService"]?></td>
							<td><?php echo $row["Amountcharged"]?></td>
						</tr>
			<?php 
				} 						
			?>
			<br>
			</tbody>
			</table>	
				
				

		</Center>
	</Body>
</html>