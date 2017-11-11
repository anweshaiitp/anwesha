<div class="register_div">
	<img class="close_div" src="images/close.png"/>
	<form class="reg_form" id="regForm">
		<input type="hidden" name="fbID"/>
		<img id="login_img" src="images/witch.png" style="height: 100px"><br><center><div id="FB-Oauth">Sign-Up using FB:<br>
		<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div></div></center>
		
		<div id="message" style="color:#FF0000"></div>
		<br>
		Name
		<br>
		<input type="text" name="name" placeholder="Enter Name" />
		<br>
		Contact No
		<br>
		<input type="number" name="mobile" placeholder="Phone Number" />
		
		<br>
		Email
		<br>
		<input type="email" name="email" placeholder="something@else.com" />
		<br>
		Date Of Birth
		<br>
		<input type="date" name="DOB"/>
		<br>
		Sex
		<br>
		<select name="gender"> 
			<option value="choose"></option>
			<option value="M">Male</option>
			<option value="F">Female</option> 
		</select>
		<br>
		College
		<br><input type="text" name="college">
		<br>
		City
		<br>
		<input type="text" name="city">
		<br>Ref Code
		<br>
		<input type="number" name="referalcode">
		<br><br>
		<input id="sub_but" type="button" name="register" value="register"/>
	</form>

</div>

