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
		<link rel="stylesheet" href="../assets/css/reg.css">
		<link rel="stylesheet" media="only screen and (min-width: 995px)" href="../assets/css/d.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" media="only screen and (max-width: 994px)" href="../assets/css/m.css" />
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
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
		console.log("Request Send");
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
        					console.log("Response");
        					console.log("Data: " + data + "\nStatus: " + status);
        					if(status=='success'){//$("#myloader").fadeOut();
        						console.log(data);

        						if(data[0]==1){
        							$("#message").html('<center>Registration Successful<br>An activation link has been sent to your email.</center>');
        							$("#message").fadeIn();
        							$("#message").css('background','#5FAB22');
        							$("#form_fill").fadeOut();
        						}else{
        							$("#message").fadeIn();
        							$("#message").html('<center>Error<br>'+data[1]+'</center>');
								}
								$('html, body').animate({
								        scrollTop: $("#header").offset().top
								    }, 500);
     
        					}else{//$("#myloader").fadeOut();
        							$("#message").fadeIn();
        							$("#message").html('An error occured.<br> Please try again.');
        							$('html, body').animate({
								        scrollTop: $("#header").offset().top
								    }, 500);
								    console.log("Failed "+data);

        						}
        						$('html, body').animate({
        scrollTop: $("#header").offset().top
    }, 500);
    			},"json");

			});
		});
		
		</script>
		<style>
		 @import 'https://fonts.googleapis.com/css?family=Exo';
    	 @import 'https://fonts.googleapis.com/css?family=Coming+Soon';
    	 @import 'https://fonts.googleapis.com/css?family=Atma';
    	 #mainForm{
    	 	width:700px;
    	 }
    	 .inputbabe{
    	 	width:90%;
    	 }
		</style>
	</head>
	<body><center><div id="backg"></div>

		<h4 id="header" style="margin-bottom:10px;font-size:55px">Campus Ambassador Registration Form</h4>
		<div class="link" style="display: block;border-radius: 0.3em;border: rgba(0,0,0,0.3) 0.25em solid;margin: 0.5em;background: rgba(20, 66, 106, 0.29);position:absolute;top:50px:top:10px">
			<a style='text-decoration: none;color: #fff9;font-size: 1em;font-family: bebas;' href="../switchca/">Already User<br><span style="font-weight:bolder">Switch to CA</span></a>
		</div>
		
		<div id="mainForm" >
		<!--
			<p style='text-align:center;color:#ff0000;'><?php echo $error; ?></p>
			<p style='text-align:center;color:#33ff33;'><?php echo $success; ?></p><br />-->
			<div id="message"><center></center></div>

			<form action="javascript:" method="post" id="form_fill" accept-charset="UTF-8">
				<input placeholder="Full Name" class="inputbabe coolk" name="name" type="text" value="">
				<input placeholder="College" class="inputbabe coolk" name="college" type="text" value="">
				<input placeholder="City" class="inputbabe coolk" name="city" type="text" value="">
				<input placeholder="Degree" class="inputbabe coolk" name="degree" type="text" value="">
				<input placeholder="Year of Graduation" class="inputbabe coolk" name="graduation" type="text" value="">
				<textarea placeholder="Address" class="inputbabe coolk" name="address" rows="10"></textarea>
				<input placeholder="Email" class="inputbabe coolk" name="email" type="text" value="">
				<input placeholder="Mobile" class="inputbabe coolk" name="mobile" pattern="[789]\d{9}" title="Invalid Mobile Number" type="text" value="">
				<input placeholder="DOB (yyyy-mm-dd)" class="inputbabe coolk" name="dob" pattern="\d{4}-\d{2}-\d{2}" class="datepicker" class="inputbabe coolk" title="Invalid Date Format(yyyy-mm-dd)" value="">
				<input placeholder="Sex(M/F)" class="inputbabe coolk" name="sex" type="text" pattern="[MFmf]" value="">
				<textarea placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha '17." class="inputbabe coolk" name="threethings" rows="10"></textarea>
				<textarea placeholder="Have you held any position of responsibility in your college? If yes, please explain." class="inputbabe coolk" name="responsibility" rows="10"></textarea>
				<textarea placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." class="inputbabe coolk" name="involvement" rows="10"></textarea>
				<input placeholder="Refered by someone?" name="referalcode" class="inputbabe coolk" type="text" value="<?php echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?>><br>
				<input id="submit" class="inputbabe " type="submit" value="Submit">
			</form>
		</div>
		

<div id="biglogo"></div>
	</center></body>
</html>
