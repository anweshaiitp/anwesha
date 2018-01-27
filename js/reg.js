
	$(document).ready(function(){
	$("#sub_but").click(function(event){
		$("#regloader").fadeIn();
	//function submitF(){
		// event.preventDefault();
		var name=$("[name='name']").val();
		var email=$("[name='email']").val();
		var college=$("[name='college']").val().replace("'","");
		var fbID=$("[name='fbID']").val();
		var city=$("[name='city']").val();
		var password=$("[name='password']").val();
		var password_=$("[name='password_']").val();
		var dob=$("[name='DOB']").val();
		var mobile=$("[name='mobile']").val();
		var sex=$("[name='gender']").val();
		var referalcode=$("[name='referalcode']").val();
		if((password.length<6 || password==null ) && !(fbID > 1 && fbID!=null && fbID!='')){//(fbID > 1 && fbID!=null ) implies fbID isset
			$("#message,#message2").fadeIn();
			$("#message,#message2").html('<center>Error<br>Password too short, must be atleast 6 characters.</center>');
			return;
		}else if((password != password_) && !(fbID > 1 && fbID!=null && fbID!='')){
			$("#message,#message2").fadeIn();
			$("#message,#message2").html('<center>Error<br>Password and confirmation don\'t match</center>');
			return;
		}

		console.log("Request Sent");
		$.post("/user/register/User/",
			{        						
				name: name,
				fbID:fbID,
				email: email,
				college: college,
				city:city,
				dob:dob,
				password:password,
				mobile:mobile,
				sex:sex,
				refcode:referalcode
			},
			function(data, status){
			console.log("Response");
			console.log("Data: " + data + "\nStatus: " + status);
				if(status=='success'){//$("#myloader").fadeOut();
					console.log(data);
					$("#regloader").fadeOut();
					if(data[0]==1){
						$("#success").html('<center><h3><b>Registration Successful</b><br>Your Anwesha ID is : ANW'+data[1]['pId']+'<br>A confirmation email has been sent to '+email+'.</h3></center>');
						// $("#regloader").fadeOut();
						$("#success").fadeIn();
						// $("#message").css('background','#5FAB22');
						$("#success").css('color','#5FAB22');
						$("input").fadeOut();
						$(".reg_form").fadeOut();
						$(".login").fadeOut();
					}else{
						$("#message,#message2").fadeIn();
						$("#message,#message2").html('<center>Error<br>'+data[1]+'</center>');
					}
//							$('html, body').animate({
//							        scrollTop: $("#header").offset().top
//							    }, 500);

				}else{//$("#myloader").fadeOut();
						$("#message,#message2").fadeIn();
						$("#message,#message2").html('An error occured.<br> Please try again.');
					$("#regloader").fadeOut();
					    console.log("Failed "+data);

					}
	    			});

	});


	$("#login_but").click(function(event){
	//function submitF(){
	// event.preventDefault();
	var username=$("[name='username']").val();
	var password=$("[name='password']").val();
	console.log("Request Sent");
	$.post("/user/register/User/",
		{        						
			password: password,
			username:username,
		},
		function(data, status){
		console.log("Response");
		console.log("Data: " + data + "\nStatus: " + status);
		if(status=='success'){//$("#myloader").fadeOut();
			console.log(data);
			if(data["status"]==200){
				$("#success").html('<center>Logged In!</center>');
				$("#success").fadeIn();
				// $("#message").css('background','#5FAB22');
				$("#message").css('color','#5FAB22');
				$(".login").fadeOut();
				$(".reg_form").fadeOut();
				$(".login_form").fadeOut();
			}else{
				$("#message,#message2").fadeIn();
				$("#message,#message2").html('<center>Error<br>'+data["msg"]+'</center>');
			}
//							$('html, body').animate({
//							        scrollTop: $("#header").offset().top
//							    }, 500);

		}else{//$("#myloader").fadeOut();
				$("#message,#message2").fadeIn();
				$("#message,#message2").html('An error occured.<br> Please try again.');
				
			    console.log("Failed "+data);

			}
			});

	});


	var refreshIntervalId = setInterval(function(){
	FB.getLoginStatus(function(Lstatus) {
	    console.log(Lstatus);
	    fbID = Lstatus.authResponse['userID'];
	    console.log(fbID);
	    	console.log(Lstatus.status);
	 $("input[name='fbID']").val(fbID);
	    if(Lstatus.status == "connected"){
	    	console.log("in");
	    	clearInterval(refreshIntervalId);
	    	$.get( "/user/CAcheck/" + fbID + "/", function( data ) {
	    	  // var obj = JSON.parse(data);
	    	  console.log(data);
	    	  console.log(data[1]);

	    	// if(data[-1])
	    	//REST call with FB userID fetches if signedu or not.
	    	//If not, then post request to the same for registering and validation.
		FB.api('/me?fields=name,first_name,education,gender,birthday,email,picture.width(500).height(500)', function(response) {
			console.log(response);
	      console.log('Successful login for: ' + response.name);
	      name = response.name;
	      gender = response.gender;
	      email = response.email;
	      DOB = response.birthday;
	      pic = response.picture;
	      //is signed up, display, your ref code is: and listing of users, leaderboard
	      if(name){
		      $("input[name='name']").val(name);
	      	  $("input[name='name']").attr('disabled','true');
	      }
	      if(gender){
      		if(gender=='male'){
      			$('select>option:eq(1)').attr('selected', true);
      		} else if(gender=='female') {
      			$('select>option:eq(2)').attr('selected', true);

      		}
	      	  $("input[name='gender']").attr('disabled','true');
	      }
	  	  if(email){
		      $("input[name='email']").val(email);
		  	  $("input[name='email']").attr('disabled','true');
	  	  }
	  	  if(DOB){//dob format check
		      $("input[name='DOB']").val(DOB);
		      var dobArr = DOB.split("/");
		      var dobNo = dobArr.length - 1;
		      var dobStr = '';
		      if(dobNo==2){
		      	dobStr += dobArr[2] + '-';
		      	dobStr += dobArr[0] + '-';
		      	dobStr += dobArr[1];
		      	$("input[name='DOB']").val(dobStr);
		      }
	  	  // $("input[name='DOB']").attr('disabled','true');
	  	  }
	  	  $(".pswd").hide();
	  	  console.log("parse",data[1]);
	  	  console.log('fboatuth',data[1].pId);
	  	  if(data[0]<1){
			  $("#FB-Oauth").html("Hi! " +response.first_name+"! <br>Plese fill missing details below:");
			  
			  $("#signUp").css("display","block");
	  	  }else if(data[1].pId>1){
	  	  	$(".reg_form").fadeOut();
	  	  	$("#FB-Oauth").html("Hi! " +response.first_name+"<br>Already registered using this FB ID<br>Anwesha ID is :"+data[1].pId);
	  	  	$(".login").html('<img src="images/witch.png"> Hi!'+response.first_name);
	  	  }
		});
		});
		}
    });
	
},1000);

});
