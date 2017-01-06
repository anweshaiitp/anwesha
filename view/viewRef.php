<html>
	<body>
		

		<?php

			$sql = "SELECT `name`,`pId` FROM People WHERE `confirm`=1 ";
        $result = mysqli_query($conn, $sql);
        if($result){
            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                	 $sqlN = "SELECT `name` FROM People WHERE `refcode`=$row['pId'] ";
        				$resultN = mysqli_query($conn, $sqlN);
        				if(mysqli_num_rows($resultN)!=0){
        					echo "<strong><i>$row['name']</i></strong><br>";
        				}
        			if($resultN){
            		while ($rowN = mysqli_fetch_array($resultN, MYSQL_ASSOC)) {
                		//$rowN[''];
        					echo "<strong><i>$rowN['name']</i></strong><br>";
                			
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