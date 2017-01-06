<html>
	<body>
		

		<?php
		
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

			$sql = "SELECT `name`,`pId` FROM People WHERE `confirm`=1 ";
        $result = mysqli_query($conn, $sql);
        if($result){
            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            		$personID=$row['pId'];
            		$personName=$row['name'];
                	 $sqlN = "SELECT `name` FROM People WHERE `refcode`=$personID";
        				$resultN = mysqli_query($conn, $sqlN);
        				if(mysqli_num_rows($resultN)!=0){
        					echo "<strong><i>$personName</i></strong><br>";
        				}
        			if($resultN){
            		while ($rowN = mysqli_fetch_array($resultN, MYSQL_ASSOC)) {
                		//$rowN[''];
                		$refName=$rowN['name'];
        					echo "<strong><i>$refName</i></strong><br>";
                			
            			}
        			}
                $name = $row['name'];
                $token = $row['csrfToken'];
                $pid = $row['pId'];
                
            }
        }
		?>
	</body>
</html>