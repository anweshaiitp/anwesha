<?php
$user='CA_2015_CA';
$pass='fcamp%us$$Ambes&2015';
if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER']!=$user) || ($_SERVER['PHP_AUTH_PW']!=$pass))
{
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Campus Princess 2015 Anwesha Auditions"');
    exit('Authorization failed.');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Campus Ambassador registration</title>
</head>
<style type="text/css">
	td, th {
	  border: 1px solid #999;
	  padding: 0.5rem;
	}
	table {
	  border-spacing: 0.5rem;
	}
	th {
	  background: black;
	  color: white;
	  border-color: white;
	}
	body{
	padding : 2rem;
	}
	.even{
		background-color: orange;
		color: black;
	}
	.odd{
		background-color: yellow;
		color: black;
	}
</style>
<body>
<table><tr><th>Name</th><th>College</th><th>City</th><th>State</th><th>Address</th><th>Degree</th><th>Graduation</th><th>Email</th><th>Phone</th><th>Three Things</th><th>Leader</th><th>Involvement in College</th><th>Verification Status</th><th>Referral Code</th></tr>
<?php

$conn = mysqli_connect("localhost", "anwesha_2016", ")z%1ZM3R68Os", "anwesha_2016");
    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }

$sql = "SELECT * FROM campusambreg";
$result = mysqli_query($conn,$sql);
//echo "total entries = " . mysqli_num_rows($result);
// $res = array();

while($row = mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row['name']."</td><td>".$row['college']."</td><td>".$row['city']."</td><td>".$row['state']."</td><td>".$row['address']."</td><td>".$row['degree']."</td><td>".$row['graduation']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['threethings']."</td><td>".$row['leader']."</td><td>".$row['invol']."</td><td>". ($row['status'] == '1') . "</td><td>".$row['referalcode']."</td></tr>";}
?>
</table>
</body>
</html>