
<?php
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$rlist=array();
//parent loop for getting pid and refkey
$sql = "select name,CA.pId,(select count(*) from People P2 where P2.refCode = CA.pId)*50 as Score from CampusAmberg CA inner join People P on P.pId=CA.pId order by Score DESC,name;";
if ($result=mysqli_query($conn,$sql))
  { 
	while ($row=mysqli_fetch_row($result))
	{   
    $name = $row[0];
    $scoree=$row[2];
    $rlist[]  = array('score' => $scoree,'name' => ucwords($name));
	}

  mysqli_free_result($result);
}
//echo out json encoded 2D array
echo json_encode($rlist); 
?>