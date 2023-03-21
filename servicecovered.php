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

    <title>servicecovered</title>

    <link href="bootstrap.min.css" rel="stylesheet">

    </head>
    <Body>
        <Center>
			<H1>
				Verify if the Service is Covered by Insurance:
			</H1>

            <?php
                if(isset($_POST['submit']))
            {
                $code = $_POST['code'];
                $sql = "SELECT * FROM services WHERE Medicalcode = '$code'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    echo "The Service is Covered by Insurance";
                }
                else
                {
                    echo "The Service is not Covered by Insurance";
                }
            }
            ?>
            <form method="post" action="servicecovered.php">
                <input type="text" name="Medicalcode" placeholder="Enter Medical Code">
                <input type="submit" name="submit" value="Check">
                </form>
    </body>
</html>