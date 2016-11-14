<?php
	$referalcode = "";

	//Works to be done by frontend after loading
	$todo  = "";
	$todo_args  = array();
	if(isset($match[1]) && $match[1]=="register") {
		$todo = 'bregister';
		if(isset($match[2]))
			$referalcode = $match[2];
	}
	else if(isset($match[1]) && $match[1]=="ca") {
		$todo = 'bregister_ca';
		if(isset($match[2]))
			$referalcode = $match[2];
	}
	else if(isset($match[1]) && $match[1]=="leaderboard")
		$todo = 'bleaderboard';

?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Anwesha '17</title>

		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="icon" href="favicon.ico" type="image/x-icon" />

		<script src='assets/js/jquery.min.js'></script>
		<script src='assets/js/jquery.transit.min.js'></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var i;
				
				$.post("leaderboard/api/",
    						{	},
    						function(data, status){
							var AJAXresponse = data;
        					if(status=='success'){
        						for (i = 0;AJAXresponse[i]['name']; i++) {
    									$("tbody").append("<tr><td>"+AJAXresponse[i]['name']+"</td><td>"+AJAXresponse[i]['score']+"</td></tr>");
								}

        					}else{

        						}
    			},"json");
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
		$.post("user/register/CampusAmbassador/",
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
        							$("#messagew").fadeIn();
        							$("#messagew").html('<center>Error<br>'+data[1]+'</center>');
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
        	var myDiv = document.getElementById('box');
myDiv.innerHTML = variableLongText;
myDiv.scrollTop = 0;
    			},"json");

			});
			});

		
		</script>
		<meta property="og:image" content="http://2016.anwesha.info/images/preview.png" />
		<link rel="shortcut icon" href="favicon.ico">
		<style type="text/css">
			#datagrida,.box{
				overflow-y: scroll;
				height:300px;
			}
		</style>
	</head>

	<body>


		<div id="intro">
			<ul class="links">
				<a id='bregister' href="#register"><li>Registration</li></a>
				<a id='bregister_ca' href="#register_ca"><li>Campus Ambassador</li></a>
                <a id='bleaderboard' href="#leaderboard"><li>Campus Ambassador Leaderboard</li></a>
			</ul>

            
           
			<div id="date">
				<div id="glass">
					<div id="top"></div>
					<div id="bottom"></div>
					<div id="line"></div>
				</div>
				<div class="text">
					Jan 27 28 29
				</div>
			</div>
		</div>

		<div class="parallelogram">
			<div class="content">

				<h1>ABOUT ANWESHA</h1>
				 ANWESHA is the annual social and cultural festival of IIT Patna. It marks days of absolute ecstasy,
             providing the budding artists a competing platform in diverse fields such as music, dance, theater, 
            photography, literature, fine arts, quizzing and debating. Anwesha is an avenue to be comforted from the
             routine life and to embrace the fun and frolic embedded with tantalizing professional performances from India
             along with an addressal to the social responsibility with its underlying social theme.
				<br><br><br>
			</div>
		
		</div>
        
		<button id="expand-navigation" style='visibility:hidden'>-</button>
		<section class="wrapper opened">
		<!--
			<ul>
				<li><a href="#galleryload" onclick="gallery();">Pics</a></li>
				<li><a href="#">Spons</a></li>
				<li><a href="#">Event</a></li>
				<li><a href="#">Social</a></li>
				<li><a href="#">Team</a></li>
			</ul>
		-->
		</section>


		<div class="overlay on-overlay"></div>

		<div id="preloader">
			<div class="bg"></div>
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<div class="circle"></div>
			<div class="tagline">
				Think.Dream.Live
			</div>
		</div>

		<div id="register" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Register</h2>
				<div class="box" style="overflow-y:scroll; overflow-x:hidden; height:400px;">
				<input class="inp" name="username" type="text" placeholder="Username" onblur="if(this.value == ''){this.value = 'Username';}" onfocus="if (this.value == 'Username') {this.value = '';}">
				<input class="inp" name="password" type="password" placeholder="Password" onblur="if(this.value == ''){this.value = 'Password';}" onfocus="if (this.value == 'Password') {this.value = '';}">
				<input class="inp" name="name" type="text" placeholder="Full Name" onblur="if(this.value == ''){this.value = 'Full Name';}" onfocus="if (this.value == 'Full Name') {this.value = '';}">
				<input class="inp" name="phone" type="text" placeholder="Phone" onblur="if(this.value == ''){this.value = 'Phone';}" onfocus="if (this.value == 'Phone') {this.value = '';}">
                <input class="inp" name="email" type="text" placeholder="Email" onblur="if(this.value == ''){this.value = 'email';}" onfocus="if (this.value == 'email') {this.value = '';}">
                <input class="inp" name="DOB" type="date" placeholder="DOB" onblur="if(this.value == ''){this.value = 'dob';}" onfocus="if (this.value == 'dob') {this.value = '';}">
                <input placeholder="Sex(M/F)" class="inp"  name="sex" type="text" pattern="[MFmf]" value="" >
				<input class="inp" name="city" type="text" placeholder="City" onblur="if(this.value == ''){this.value = 'city';}" onfocus="if (this.value == 'city') {this.value = '';}">
                <input class="inp" name="ref" type="text" placeholder="Reference Code" value="<?php  echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?> onblur="if(this.value == ''){this.value = 'ref';}" onfocus="if (this.value == 'ref') {this.value = '';}">
				<input class="button" type="submit" value="Submit">
			</div>
		</div>

		<div id="register_ca" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Register</h2>

			<div class="box" id="box"><center>
				<div id="message" style="color: red !important;"></div></center>

			<form action="javascript:" method="post" id="form_fill" accept-charset="UTF-8">
				<input placeholder="Full Name" class="inp" coolk" name="name" type="text" value="">
				<input placeholder="College" class="inp" coolk" name="college" type="text" value="">
				<input placeholder="City" class="inp" coolk" name="city" type="text" value="">
				<input placeholder="Degree" class="inp" coolk" name="degree" type="text" value="">
				<input placeholder="Year of Graduation" class="inp" coolk" name="graduation" type="text" value="">
				<textarea placeholder="Address" class="inp" coolk" name="address" rows="10"></textarea>
				<input placeholder="Email" class="inp" coolk" name="email" type="text" value="">
				<input placeholder="Mobile" class="inp" coolk" name="mobile" pattern="[789]\d{9}" title="Invalid Mobile Number" type="text" value="">
				<input placeholder="DOB (yyyy-mm-dd)" class="inp" coolk" name="dob" pattern="\d{4}-\d{2}-\d{2}" class="datepicker" class="inp" coolk" title="Invalid Date Format(yyyy-mm-dd)" value="">
				<input placeholder="Sex(M/F)" class="inp" coolk" name="sex" type="text" pattern="[MFmf]" value="">
				<textarea placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha &lsquo;17." class="inp" coolk" name="threethings" rows="10"></textarea>
				<textarea placeholder="Have you held any position of responsibility in your college? If yes, please explain." class="inp" coolk" name="responsibility" rows="10"></textarea>
				<textarea placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." class="inp" coolk" name="involvement" rows="10"></textarea>
				<input placeholder="Refered by someone?" name="referalcode" class="inp" coolk" type="text" value="<?php echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?> ><br>
				<center><div id="messagew" style="color: red !important;"></div></center>
				<input id="submit" class="inp" " type="submit" value="Submit">
				
			</form>
			</div>
		</div>

		<div id="login" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Login</h2>
			<div class="box">
				<input class="inp" name="username" type="text" value="Username" onblur="if(this.value == ''){this.value = 'Username';}" onfocus="if (this.value == 'Username') {this.value = '';}">
				<input class="inp" name="password" type="password" value="Password" onblur="if(this.value == ''){this.value = 'Password';}" onfocus="if (this.value == 'Password') {this.value = '';}">
				<input class="button" type="submit" value="login">
			</div>
		</div>

        <div id="leaderboard" class="lightbox logreg">
            <div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
            <h2>LEADERBOARD</h2>
            <center>
                <div style="width:50%; align-content:center;">
                    <div class="datagrid">
                        <div class="datagrid" id="datagrida">

                            <table>
                                <thead><tr><th>Name</th><th>Score</th></tr></thead>
                                <tbody>
                                    

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </center>
        </div>

		<div id="galleryload" class="lightbox">
		</div>

       


		<script src="assets/js/index.js"></script>	
		<script type="text/javascript">
			function afterload() {
				<?php
				if(!empty($todo)) {
				?>
					$(<?php echo "\"#$todo\"" ?>).click();
				<?php
				}
				?>
			}
			afterload();
		</script>
	</body>
</html>
