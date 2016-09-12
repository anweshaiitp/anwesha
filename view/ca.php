<?php
$error="";
$success="";
$referalcode="";
if(isset($match[1]))
	$referalcode = $match[1];

?>                                                                                                                   
<!DOCTYPE HTML>
<html>
	<head>
		<title>Campus Ambassador Registration Form</title>
		<link rel="stylesheet" media="only screen and (max-width: 994px)" href="../assets/css/m_ca.css" />
		<link rel="stylesheet" href="../assets/css/campusambassador.css">
		<meta name="viewport" content="width=device-width, initial-scale=1"><script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
		<script>
		$(document).ready(function(){
			$("#submit").click(function(){
				var name=$("[name='name']").val();
		var email=$("[name='email']").val();
		var college=$("[name='college']").val();
		var degree=$("[name='degree']").val();
		var city=$("[name='city']").val();
		var graduation=$("[name='graduation']").val();
		var address=$("[name='address']").val();
		var dob=$("[name='dob']").val();
		var mobile=$("[name='mobile']").val();
		var sex=$("[name='sex']").val();
		var responsibility=$("[name='responsibility']").val();
		var involvement=$("[name='involvement']").val();
		var threethings=$("[name='threethings']").val();
		var referalcode=$("[name='referalcode']").val();
		$.post("../user/register/CampusAmbassador/",
    						{        						
       						name: name,
        					email: email,
        					college: college,
        					degree: degree,
        					city:city,
        					graduation:graduation,
        					address:address,
        					dob:dob,
        					mobile:mobile,
        					sex:sex,
        					responsibility:responsibility,
        					involvement:involvement,
        					threethings:threethings,
        					referalcode:referalcode
    						},
    						function(data, status){
        					//alert("Data: " + data + "\nStatus: " + status);
        					if(status=='success'){//$("#myloader").fadeOut();
        					console.log(data);

        						if(data[0]==1){
        							$(".container").html('<div id="message"><center>Registration Successful<br>An activation link has been sent to your email.</center></div>');
        							$("#message").fadeIn();
        							$("#message").css('background','#5FAB22');
        						}else{
        							$("#message").fadeIn();
        							$("#message").html('<center>Error<br>'+data[1]+'</center>');
								}
     
        					}else{//$("#myloader").fadeOut();
        							$("#message").fadeIn();
        							$("#message").html('An error occured.<br> Please try again.');

        						}
        						document.getElementById('message').scrollIntoView();
    			},"json");
			});
		});
		
		</script>
	</head>
	<body>
		<div id="bg"></div>
		<center><h4 id="cahead">Campus Ambassador Registration Form</h4></center>
		
		<div class="container">
		<!--
			<p style='text-align:center;color:#ff0000;'><?php echo $error; ?></p>
			<p style='text-align:center;color:#33ff33;'><?php echo $success; ?></p><br />-->
			<div id="message"><center></center></div>
			<form action="javascript:" method="post">
				<input placeholder="Full Name" name="name" type="text" value="">
				<input placeholder="College" name="college" type="text" value="">
				<input placeholder="City" name="city" type="text" value="">
				<input placeholder="Degree" name="degree" type="text" value="">
				<input placeholder="Year of Graduation" name="graduation" type="text" value="">
				<textarea placeholder="Address" name="address" rows="10"></textarea>
				<input placeholder="Email" name="email" type="text" value="">
				<input placeholder="Mobile" name="mobile" pattern="[789]\d{9}" title="Invalid Mobile Number" type="text" value="">
				<input placeholder="DOB (yyyy-mm-dd)" name="dob" pattern="\d{4}-\d{2}-\d{2}" class="datepicker" title="Invalid Date Format(yyyy-mm-dd)" value="">
				<input placeholder="Sex(M/F)" name="sex" type="text" pattern="[MF]" value="">
				<textarea placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha '17." name="threethings" rows="10"></textarea>
				<textarea placeholder="Have you held any position of responsibility in your college? If yes, please explain." name="responsibility" rows="10"></textarea>
				<textarea placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." name="involvement" rows="10"></textarea>
				<input placeholder="Refered by someone?" name="referalcode" type="text" value="<?php echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?>>
				<input id="submit" type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>

