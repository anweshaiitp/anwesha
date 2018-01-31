<?php
session_start();
// ini_set('display_errors', '1');  
	
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
    ///############# User not logged in
    $user = null;
    $uID = -1;
    $title = "";
    $conf = 0;
	if(!isset($_SESSION['userID'])){
        $nologin = 1;
        $title = "Login first<br><a class='button is-info is-outlined' href ='/eventAdmin/'>Login here</a>";
	}else{
        $uID = $_SESSION['userID'];
    }
    $resp = People::isSpecial($_SESSION['userID'],$conn);
	if((!isset($resp["isRegTeam"]) || $resp["isRegTeam"]<=0) && isset($_SESSION['userID'])){
		$nologin = 1;
        $title = "Not a registration team member.";
    }
    if(isset($_POST['anwID']) && isset($_POST['amt']) && $nologin!=1 && $_POST['anwID']>999 && $_POST['anwID']<10000 ){
        $user = People::getUser($_POST['anwID'],$conn);
        if($user[0]==1){
            $registree = mysqli_real_escape_string($conn,$_POST['anwID']);
            $user = $user[1];
            $pastpay = [];
            $sql = " SELECT * FROM payments WHERE pId = $registree ";
            alog("pay: $sql");
            $result = mysqli_query($conn, $sql);
            echo mysqli_error($conn);
            while($row = mysqli_fetch_assoc($result)){
                $pastpay[] = $row;
            }    
            $conf = 1;
        }else{
            $user = null;
        }
        // echo json_encode($user);
    }
?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin Payment control panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
	html {
    height: 100%;
    }
    body {
    min-height: 100%;
                background: #00d0b2;
    
    }
    .preset{
        margin:10px;
    }
		
		.field{
			width:300px;
		}

	</style>
</head>
<body bgcolor="#00d0b2">
<center>

	<section class="hero is-primary" >
		<div class="tags has-addons" style="position: fixed;left: 0;top:0;cursor:pointer">
	      <span class="tag is-success is-large" onclick="window.location='/eventAdmin';">
			  <h1>Home</h1>
			  <!-- <button class="delete is-small"></button> -->
			</span>
			
	    </div>
        <?php
			if($nologin!=1)
				echo "<div class=\"tags has-addons\" style=\"position: fixed;right: 0;top:0 cursor:pointer\">
					<span class=\"tag is-danger is-large\" id=\"logout\" onclick=\"window.location='/eventAdmin/logout';\">
						  Logout
						  <button class=\"delete\"></button>
						</span>
				    </div>";
		?>
         <br><br>
  <div class="hero-body is-fullheight">
    <div class="container is-fullheight">
      <h1 class="title">
        <?php if($nologin==1){echo $title;die();} ?>
       	Payment control panel
      </h1>
      <h2 class="subtitle" id="subtitle">
        <span style="color:#ff0000 !important"><?php if($user==null && isset($_POST['anwID']))echo"User does not exist"; ?></span>
      </h2>
      <form action='' id="initform" method='POST'  style="display:none"  >
		<div class='field'>
  			<label class='label'>Anwesha ID</label>
			<div class='control'>
				<input class='input' type='number' pattern="[0-9]{4}" required name='anwID' placeholder='Anwesha ID 4 digits'>
			</div>
		</div>
        Preset :<br>
        <span id="" data-amt="100" data-comment="Registration" data-inc="0" class="button is-warning preset" >Registration (100)</span>
        <span id="" data-amt="150" data-comment="Band pass" data-inc="0" class="button is-warning preset" >Band pass (150)</span>
        <span id="" data-amt="200" data-comment="Registration + band pass" data-inc="0" class="button is-warning preset" >Registration + band pass (200)</span><br>
        <span id="" data-amt="150" data-comment="Accommodation for one day" data-inc="0" class="button is-warning preset" >Accommodation x1 (150)</span>
        <span id="" data-amt="400" data-comment="Accommodation for three days" data-inc="0" class="button is-warning preset" >Accommodation x3 (400)</span>
        <span id="" data-amt="500" data-comment="Accommodation for four days" data-inc="0" class="button is-warning preset" >Accommodation x4 (500)</span>
        <span id="" data-amt="300" data-comment="T-Shirt" data-inc="0" class="button is-warning preset" >T-Shirt (300)</span>
        <script>
                
            $(".preset").click(function(e){
                var exp = '  &  ';
                // console.log(parseInt($("#amount").val()));
                e.preventDefault();
                if($(this).data('inc')==0){
                    if($("#amount").val()==0)
                        exp = '';
                    $(this).data('inc',1);
                    $(this).removeClass('is-warning');
                    $(this).addClass('is-success');
                    $("#amount").val(parseInt($("#amount").val())+parseInt($(this).data('amt')));
                    
                    $("#comments").val($("#comments").val()+exp+$(this).data('comment'));
                }else{
                    $(this).data('inc',0);
                    $(this).addClass('is-warning');
                    $(this).removeClass('is-success');
                    $("#amount").val(parseInt($("#amount").val())-parseInt($(this).data('amt')));
                     $("#comments").val($("#comments").val().replace($(this).data('comment'), ''));
                     $("#comments").val($("#comments").val().replace('  &  ',''));
                }
            });
        </script>
		<div class='field'>
  			<label class='label'>Amount Recieved INR</label>
			<div class='control'>
				<input class='input' id="amount" type='number' pattern="[0-9]{1,5}" value = '0' required name='amt' >
			</div>
		</div>
        <div class='field'>
  			<label class='label'>For:</label>
			<div class='control'>
				<input class='input' id="comments" type='text' placeholder='Registration/Accomodation/Band Pass' required name='comment' >
			</div>
		</div>
        <button id= "proc" class="button is-danger" >Proceed</button>
        </form>

        <article id="confdat" style="display:none" class="tile notification is-danger">
            <p class="title">Confirm payment?</p>
            <p class="subtitle"> </p>
            <div class="content">
                From <span id="name"><?php echo $user['name']; ?></span><br>Email ID:<?php echo $user['email']; ?><br>Last 4 digits of phone:<?php echo $user['mobile']%10000; ?> <br> Already paid: INR<?php echo $user['feePaid']; ?><br>Amount to add : INR<?php echo $_POST['amt']; ?><br> New Total Amount: INR<?php echo $_POST['amt']+$user['feePaid']; ?> <br>
                <a id= "confsend" class="button is-success is-outlined" >Confirm</a>
                <a style="" href ='/payment/' class="button is-warning is-outlined" >Cancel</a>
            <br>
            
            <?php 
            if(isset($pastpay)){

                echo "List of past payments:<div style='overflow-x:auto'><table class=\"table\">
  <thead>
    <tr>
      <th><abbr title=\"Serial No.\">Sr.No.</abbr></th>
      <th><abbr title=\"Amount Paid\">Amt</abbr></th>
      <th>Date & Time</th>
      <th>Comments</th>
      <th>Deduct</th>
    </tr>
  </thead>
  <tbody>";
                foreach ($pastpay as $key=>$val) {
                    echo "<tr> <th>".($key+1)."</th> <td>".$val['amount']."</td> <td>".$val['time']."</td>
                        <td>".$val['comments']."</td><td><a href='/payment/delete/".$val['payID']."'><button class=\"delete\"></button></td>
                        </tr>";
                }
                echo "</tbody></table></div>";
            }
            ?>
            </div>
            
        </article>
        <div class="notification " id="postajax" style="display:none">
        
        </div>

        
    </div>
    <div style='position:absolute;bottom:10px;left:50%;transform:translateX(-50%)'>For issues with this application, contact: Tameesh Biswas(+91 9920126830)</div>
    <script>
        var uID = <?php echo $uID; ?> ;
        $(document).ready(function(){
            <?php if($user != null)echo"$('#confdat').fadeIn();" ;else echo"$('#initform').show();$('#initform').fadeIn();" ; ?>
            $("#confsend").click(function(e){
                $("#confsend").addClass('is-loading');
                e.preventDefault();
                $.post("/pay/"+<?php if(isset($_POST['anwID']))echo $_POST['anwID'];else echo"0"; ?>,
					{
						uID: <?php echo $uID; ?>,
						amt:<?php if(isset($_POST['amt']))echo $_POST['amt'];else echo "0";  ?>,
                        comment:'<?php if(isset($_POST['comment']))echo $_POST['comment'];else echo "Registration";  ?>'
					},
					function(data, status){
					console.log("Response");
					console.log("Data: " + data + "\nStatus: " + status);
					if(status=='success'){
                        $("#confsend").removeClass('is-loading');
						console.log(data);
						if(data["httpstat"]==200){
							$("#postajax").fadeIn();
                            $("#postajax").addClass("is-warning");
                            $("#postajax").removeClass("is-danger");
                            $("#confdat").fadeOut();
                            $("#postajax").html('<center>'+data['message']+'<br><a href="/payment/" class="button is-primary" >Add New Payment</a></center>');
						}else{
                            $("#postajax").removeClass("is-warning");
                            $("#postajax").addClass("is-danger");
							$("#postajax").fadeIn();
                            $("#confdat").fadeOut();
                            $("#postajax").html('<center>'+data['message']+'<br><a href="/payment/" class="button is-primary" >Try again</a></center>');
						}
					}else{

					}
                });
            });
        });
    </script>
    </section>
</center>
</body>
</html>
