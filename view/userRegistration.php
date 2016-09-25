<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico">
 	<meta name="theme-color" content="#16627a">
 	<link rel="stylesheet" href="../assets/css/reg.css" />
 	<link rel="stylesheet" media="only screen and (min-width: 995px)" href="../assets/css/d.css" />
 	<link rel="stylesheet" media="only screen and (max-width: 994px)" href="../assets/css/m.css" />
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
   $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: new Date(1910,0,1),
      maxDate: new Date(2017,1,22),
       yearRange: '1910:2017',
       dateFormat:'yy-mm-dd',
       defaultDate: new Date(1998, 01, 23)
    });
  } );
  </script>

	<script type="text/javascript">
	var nr=0;
	 function validateEmail($email) {
  		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  		return emailReg.test( $email );
	}
	function genchk(){
					if($("#gender").val()=='n' || $("#gender").val()==null){
	  					$("#gender").removeClass("coolk");$("#gender").addClass("cooll");
	  				}else{
	  					$("#gender").addClass("coolk");$("#gender").removeClass("cooll");
	  				}
	}
		$(document).ready(function(){ 
			//$("#error").css('width',$("#mainForm").width());
			$("#datepicker").keydown(function(e){e.preventDefault();});
			$("#submit").click(function(){
				$(".inputbabe").removeClass("cooll");
	  				$(".inputbabe").addClass("coolk");
				var name=$("#name").val();
				var email=$("#email").val();				
				var college=$("#college").val();
				var mobile=$("#mobilekn").val();
				var dob=$("#datepicker").val();
				var sex=$("#gender").val();
				var city=$("#city").val();
				var refid=$("#refcode").val();
				if(name=='' || name== null || name==$("#name").attr('data')){nr=1;
					$("#name").removeClass("coolk");
	  				$("#name").addClass("cooll");}
	  			if(email=='' || email== null || email==$("#email").attr('data')){nr=1;
					$("#email").removeClass("coolk");
	  				$("#email").addClass("cooll");}	
	  			if(college=='' || college== null || college==$("#college").attr('data')){nr=1;
					$("#college").removeClass("coolk");
	  				$("#college").addClass("cooll");}
	  			if(mobile=='' || mobile== null || mobile.length!=10){nr=1;
					$("#mobilekn").removeClass("coolk");
	  				$("#mobilekn").addClass("cooll");}	
	  			if(dob=='' || dob== null || dob==$("#datepicker").attr('data')){nr=1;
					$("#datepicker").removeClass("coolk");
	  				$("#datepicker").addClass("cooll");}
	  			if(sex=='' || sex== null || sex=='n'){nr=1;
					$("#gender").removeClass("coolk");
	  				$("#gender").addClass("cooll");}
	  			if(city=='' || city== null || city==$("#city").attr('data')){nr=1;
					$("#city").removeClass("coolk");
	  				$("#city").addClass("cooll");}	

				//ajax send
				if(nr!=1){$("#myloader").fadeIn();
				$.post("../user/register/User/",
    						{        						
       						name: name,
        					email: email,
        					college: college,
        					sex:sex,
        					mobile:mobile,
        					email:email,
        					dob:dob,
        					city:city,
        					refcode:refid
    						},
    						function(data, status){
							var AJAXresponse = data;
        					if(status=='success'){$("#myloader").fadeOut();
        					
        						if(AJAXresponse[0]==1){
        							$("#mainForm").html('<h1>Registered!</h1>An activation link has been sent to '+ email+'<br>');
        							$("#mainForm").css('background','#5FAB22');
    								document.getElementById('mainForm').scrollIntoView();
								
        							$("#error").fadeOut();
        						}else{
        							$("#error").fadeIn();
        							$("#error").html('<h5>ERROR</h5><br>'+AJAXresponse[1]);
        							document.getElementById('error').scrollIntoView();
								}
     
        					}else{$("#myloader").fadeOut();
        							$("#error").fadeIn();
        							$("#error").html('An error occured.<br> Please try again.');
    								document.getElementById('error').scrollIntoView();
								

        						}
    			},"json");}//end of if condition and post method
				nr=0;
			});
			$("#datepicker").val("DOB");
			$(".inputbabe").focus(function(){
	  						if($(this).val()==$(this).attr('data')){
	  							$(this).val('');
	  						}
	  		});
	  		$(".inputbabe").blur(function(){
	  						if($(this).val()=='' || $(this).val()=='+91'){
	  							$(this).val($(this).attr('data'));
	  						}
	  		});
	  		$("#email").blur(function(){
	  			if( !validateEmail($("#email").val())  && $("#email").val()!='email') {
	  				$("#email").removeClass("coolk");
	  				$("#email").addClass("cooll");
	  			}else{
	  				$("#email").addClass("coolk");
	  				$("#email").removeClass("cooll");
	  			}
	  		});
	  		$("#email").keydown(function(){
	  			if( !validateEmail($("#email").val()) && $("#email").val()!='email') {
	  				$("#email").removeClass("coolk");
	  				$("#email").addClass("cooll");
	  			}else{
	  				$("#email").addClass("coolk");
	  				$("#email").removeClass("cooll");
	  			}
	  		});
	  		$("#gender").blur(function(){
	  				genchk();
	  		});
	  		$("#gender").change(function(){
	  				genchk();
	  		});
			
		});
	</script>
<style>
    @import 'https://fonts.googleapis.com/css?family=Exo';
    @import 'https://fonts.googleapis.com/css?family=Coming+Soon';
    @import 'https://fonts.googleapis.com/css?family=Atma';

    	#mainForm{
			width:500px;
		}

</style>
</head>
<body>

<center>
<div id="backg"></div>
<h1 id="header">Registration</h1><img src="../images/reg/ajax-loader.gif" width="30px" id="myloader">
		<div id="error" style="width:-moz-fit-content;display:none;box-radius:5px;box-shadow:#000000 0 0 10px;background:#6fce2d;padding:20px;font-size:20px;margin:10px">An error occured</div>
		<div id="mainForm">
			
			<form   action="javascript:">
				<input type="text" class="inputbabe coolk" data="Full name" value="Full name" id="name" style="text-transform: capitalize">
				<input type="text" class="inputbabe coolk" data="College" value="College" id="college">
				<input type="text" class="inputbabe coolk" data="Phone no." value="Phone no." id="mobilekn">
				<input type="text" class="inputbabe coolk" data="email" value="email" id="email">
				<input type="text" data="DOB" value="DOB" id="datepicker" class="inputbabe coolk"><br><span class="" id="genderLabel" style="border:0px">Gender:</span>
				<select id="gender" data="n" value="Gender" class="inputbabe coolk">
						<option value="n"  selected>Select</option>
    					<option value="M">Male</option>
    					<option value="F">Female</option>
    			</select><br>
  				
				<input type="text" class="inputbabe coolk" data="City" value="City" id="city" style="text-transform: capitalize">
				<input type="text" class="inputbabe coolk"
				 placeholder="Reference Code" value=
				 <?php 
				 		if(isset($match[1]) && !empty($match[1]))
				 			echo '"'.$match[1].'" disabled';
				 		else
				 			echo '""';
				 ?> id="refcode" >
				  <br>
				<button id="submit" class="inputbabe">Register!</button>
		</form>
		</div>
	
</center>


<div id="biglogo"></div>
</body>
</html>
