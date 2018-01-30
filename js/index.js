Number.prototype.pad = function (size) {
  var s = String(this);
  while (s.length < (size || 2)) { s = "0" + s; }
  return s;
}
var test =0;
var questions = [
  { question: "What's your first name?", pattern: /^[a-zA-Z\s]{4,20}$/ },
  { question: "What's your last name?",  pattern: /^[a-zA-Z]{0,20}$/ },
  { question: "College name?", pattern: /^[a-zA-Z\'\s]{1,300}$/ },
  { question: "Name of City?", pattern: /^[a-zA-Z\s]{3,50}$/ },
  { question: "What's your email?", pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/ },
  { question: "Mobile no?(10 digits)", pattern: /^[789][0-9]{9}$/},
  { question: "Set password (>5 characters)", type: "password", pattern: /^.{5,138}$/},
  { question: "Click to choose DOB YYYY-mm-dd", pattern: /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/ },
  { question: "Gender? (M/F)", pattern: /^[MmFf]$/ },
  { question: "Referral code(4 digits)(if any)", pattern: /^([0-9]{4}|[9][0-9]{4}|)$/ },
  
]
//email max length
/**********

  !!!!!
  New Version: https://codepen.io/arcs/pen/rYXrNQ
  !!!!!
  
  Credits for the design go to XavierCoulombeM
  https://dribbble.com/shots/2510592-Simple-register-form
  
  This Pen uses no libraries except fonts and should 
  work on all modern browsers
  
  The answers are stored in the `questions` array
  with the key `value`. 

 **********/

;(function(){

  var tTime = 100  // transition transform time from #register in ms
  var wTime = 200  // transition width time from #register in ms
  var eTime = 1000 // transition width time from inputLabel in ms

  // init
  // --------------
  var position = 0

  putQuestion()

  progressButton.addEventListener('click', validate)
  inputField.addEventListener('keyup', function(e){
    transform(0, 0) // ie hack to redraw
    if(e.keyCode == 13) validate()
  })

  // functions
  // --------------
var picker;
  // load the next question
  function putQuestion() {
    if(position==7){
      picker = new Pikaday(
        {
          field: inputField,
          firstDay: 1,
          format: 'YYYY-MM-D',
          defaultDate: new Date(2000, 01, 01), 
          toString(date, format) {
            // you should do formatting based on the passed format,
            // but we will just return 'D/M/YYYY' for simplicity
            const day = date.getDate().pad(2);
            const month = (date.getMonth() + 1).pad(2);
            const year = date.getFullYear().pad(4);
            return `${year}-${month}-${day}`;
          },
          yearRange: [1990, 2018]
        });
      } else if (position == 8){
        picker.destroy();
    }

    inputLabel.innerHTML = questions[position].question
    inputField.value = ''
    inputField.type = questions[position].type || 'text'  
    // if (position != 7)
    inputField.focus()
    showCurrent()
  }
  function ajaxSend(){
  $("#loadgif").fadeIn();
  $("#centerLoader").fadeIn();
  $("#progress").fadeOut();
    //function submitF(){
    // event.preventDefault();
    var name = questions[0].value + " " + questions[1].value;
    var email = questions[4].value;
    var college = questions[2].value.replace("'", "");
    var fbID = "";
    var city = questions[3].value;
    var password = questions[6].value;
    var dob = questions[7].value;
    var mobile = questions[5].value;
    var sex = questions[8].value;
    var referalcode = questions[9].value;

    console.log("Request Sent");
    $.post("/user/register/User/",
      {
        name: name,
        fbID: fbID,
        email: email,
        college: college,
        city: city,
        dob: dob,
        password: password,
        mobile: mobile,
        sex: sex,
        refcode: referalcode
      },
      function (data, status) {
        console.log("Response");
        console.log("Data: " + data + "\nStatus: " + status);
        if (status == 'success') {//$("#myloader").fadeOut();
          console.log(data);
          $("#loadgif").fadeOut();
          $("#centerLoader").fadeOut();
          $(".center").fadeOut();
          if (data[0] == 1) {
            $("#postajaxmsg").html('<center><div class="posttext"><h3><b>Registration Successful</b><br>Your Anwesha ID is : ANW' + data[1]['pId'] + '.</h3></div></center>');
            $("#emailfill").text('Confirm Account using confirmation email sent on '+email);
            // $("#regloader").fadeOut();
            $("#postajaxmsg").fadeIn();
            $("#hideOnerr").fadeIn();
            $("#phone_number").val(mobile);
            $("#verify").fadeIn();
            // $("#message").css('background','#5FAB22');
            // $("#success").css('color', '#5FAB22');
            // $("input").fadeOut();
            // $(".reg_form").fadeOut();
            // $(".login").fadeOut();
          } else {
            $("#verify").fadeIn();
            $("#postajaxmsg").fadeIn();
            $("#hideOnerr").fadeOut();
            $("#postajaxmsg").html('<center><div class="posttext">Error<br>' + data[1] + '</div></center>');
          }
          //							$('html, body').animate({
          //							        scrollTop: $("#header").offset().top
          //							    }, 500);

        } else {//$("#myloader").fadeOut();
          $("#verify").fadeIn();
          $("#postajaxmsg").fadeIn();
          $("#hideOnerr").fadeOut();
          $("#postajaxmsg").html('<div class="posttext">An error occured.<br> Please try again.</div>');
          $("#loadgif").fadeOut();
          $("#centerLoader").fadeOut();
          console.log("Failed " + data);

        }
      });
  }
  // when all the questions have been answered
  function done() {
    
    console.log(questions);
    // remove the box if there is no next question
    register.className = 'close'
    ajaxSend(questions);
    // add the h1 at the end with the welcome text
    var postajax = document.createElement('div');
    postajax.id = "postajax";
    $("#centerLoader").html("<img id='loadgif' src='/images/load.gif' height'50px'>")
    // setTimeout(function() {
    //   register.parentElement.appendChild(postajax)    
    //   setTimeout(function() {postajax.style.opacity = 1}, 50)
    // }, eTime)
    
  }

  // when submitting the current question
  function validate() {

    // set the value of the field into the array
    questions[position].value = inputField.value

    // check if the pattern matches
    if (!inputField.value.match(questions[position].pattern || /.+/)) wrong()
    else ok(function() {
      
      // set the progress of the background
      progress.style.width = ++position * 100 / questions.length + 'vw'

      // if there is a new question, hide current and load next
      if (questions[position]) hideCurrent(putQuestion)
      else hideCurrent(done)
             
    })

  }

  // helper
  // --------------

  function hideCurrent(callback) {
    inputContainer.style.opacity = 0
    inputProgress.style.transition = 'none'
    inputProgress.style.width = 0
    setTimeout(callback, wTime)
  }

  function showCurrent(callback) {
    inputContainer.style.opacity = 1
    inputProgress.style.transition = ''
    inputProgress.style.width = '100%'
    setTimeout(callback, wTime)
  }

  function transform(x, y) {
    register.style.transform = 'translate(' + x + 'px ,  ' + y + 'px)'
  }

  function ok(callback) {
    register.className = ''
    setTimeout(transform, tTime * 0, 0, 10)
    setTimeout(transform, tTime * 1, 0, 0)
    setTimeout(callback,  tTime * 2)
  }

  function wrong(callback) {

    register.className = 'wrong'
    for(var i = 0; i < 6; i++) // shaking motion
      setTimeout(transform, tTime * i, (i%2*2-1)*20, 0)
    setTimeout(transform, tTime * 6, 0, 0)
    setTimeout(callback,  tTime * 7)
  }

}(jQuery))