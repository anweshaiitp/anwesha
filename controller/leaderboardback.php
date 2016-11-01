
<?php
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$name = array();
$score=array();
$rlist=array();
//parent loop for getting pid and refkey
$sql = "select refCode,count(*)*50 as Score from People P group by refCode having (select count(*) from CampusAmberg where pId = P.refCode) > 0 order by Score DESC";
        // $result = mysqli_query($conn, $sql);
        if ($result=mysqli_query($conn,$sql))
  				{
  					while ($row=mysqli_fetch_row($result))
    				{ $scoree=$row[1];
        				//get name query
    		    		$sqle = "SELECT `name` FROM `People` where `pId`='".$row[0]."'";
        				if ($resulte=mysqli_query($conn ,$sqle))
  						{
  							while ($rowe=mysqli_fetch_row($resulte))
    						{
    		    				//set name and score to associative array
    		    				$rlist[]['score']=$scoree;
    		    				$rlist[max(array_keys($rlist))]['name']=$rowe[0];
    						}
  						  mysqli_free_result($resulte);
	 					   }	
    				}
  		
  				mysqli_free_result($result);
				}
//echo out json encoded 2D array
echo json_encode($rlist); 
?>