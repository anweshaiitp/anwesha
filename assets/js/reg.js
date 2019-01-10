
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
		var dob=$("[name='DOB']").val();
		var mobile=$("[name='mobile']").val();
		var sex=$("[name='gender']").val();
		var referalcode=$("[name='refcode']").val();
		if((password.length<6 || password==null ) && !(fbID > 1 && fbID!=null && fbID!='')){//(fbID > 1 && fbID!=null ) implies fbID isset
			$("#message,#message2").fadeIn();
			$("#message,#message2").html('<center>Error<br>Password too short, must be atleast 6 characters.</center>');
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


});
