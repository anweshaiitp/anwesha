
<?php
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$rlist=array();
//parent loop for getting pid and refkey
$sql = "select name,CA.pId,(select count(*) from People P2 where P2.refCode = CA.pId and P2.confirm<>0)*50 +(SELECT COALESCE(SUM(score),0) as score from cascore P3 where P3.pID=CA.pId) +20 as Score from CampusAmberg CA inner join People P on P.pId=CA.pId where P.iitp<>1 and P.confirm<>0 and P.name NOT LIKE 'test%' order by Score DESC,name LIMIT 15";
if ($result=mysqli_query($conn,$sql))
  { 
	while ($row=mysqli_fetch_row($result))
	{   
    $name = $row[0];
    $scoree=$row[2];
    $name=ucwords( strtolower($name) );
    $rlist[]  = array('score' => $scoree,'name' => ucwords($name));
	}

  mysqli_free_result($result);
}
//echo out json encoded 2D array
echo json_encode($rlist); 
?>