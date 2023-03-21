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

    <title>doctorinnetwork</title>

    <link href="bootstrap.min.css" rel="stylesheet">

    </head>
    <Body>
        <Center>
			<H1>
				Verify if your Doctor is in Network:
			</H1>

            <?php
                if(isset($_POST['submit']))
            {
                $npi = $_POST['npi'];
                $sql = "SELECT * FROM doctors WHERE NPI = '$npi'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "Your Doctor is in Network";
                }
                else
                {
                    echo "Your Doctor is not in Network";
                }
            }
            ?>
            <form method="post" action="doctorinnetwork.php">
                <input type="text" name="npi" placeholder="Enter NPI">
                <input type="submit" name="submit" value="Check">
                </form>
    </body>
</html>