# ANWESHA 2018
- Website for anwesha 2018

##Instructions:
- PHP version - 5.6.12
- Apache : Apache/2.4.16 (Unix) OpenSSL/1.0.1p PHP/5.6.12 mod_perl/2.0.8-dev Perl/v5.16.3
- MySQL : 5.6.26
- Place the anwesha folder in your server's root direcory. If not then edit the __RewriteBase__ in __.htaccess__ accordingly.
- Create database anwesha.
- For creating database tables import __migrations/anwesha.sql__ in mysql ~~OR run __migrations/setupdb.php__~~
- For populating database import __migrations/data.sql__ in mysql ~~OR run __migrations/migrate.php__~~
- For generating random anwesha ID run __migration/randomID.php__
- Use can change the caching time by updating $cache_time variable in the specific controller. Current cache time is 60 second.
- For removing cached files - delete contents of /cache/ folder (/cache/*.hmtl) 


### Using Auth:
- If accessing from web browser ignore this section(for web browser, session support is there).

#### For login
- use URL /login/
- send username and password by POST. index - username, password
- Response will contain user information. Private key is given in index key.
- Further communication will take place by using private key and username

#### For user-event-registration:
- use URL /register/dddd/dd (awnwesha id, event id)
- add a POST request along with this.
- generate any word.
- put it on index 'content'
- Use equivalent of PHP function has_hmac('sha256', content, privatekey) (salted hash) and put it on index 'hash'
- send the request

## TODO
- [x] Social links update.
- [x] Add youtube link.
- [x] Main content font and text.
- [x] Dashboard->leaderboard.
- [x] center line
- [x] anchor #.
- [x] form field error.
- [x] Blue background
- [ ] Step 1 remove after signup.
- [ ] Change email
- [ ] Copyrights
- [ ] Post signup notify and message box.
- [ ] Testing Events Details [With Image rendering].
- [ ] Add caching to Events.
- [ ] Write fb/twitter/google/github register backend and frontend.
- [ ] Add __re-captcha__ on registration page.
- [ ] Login for users.
- [ ] Write registration for particular Event.
- [ ] Write group registration.
- [ ] Suggest list of colleges, cities, states. __FRONTEND!__
- [x] Use PHPMailer
- [ ] ~~Create a nice looking HTML page for email~~
- [ ] ~~Scheduling (Fontend + backend).~~
- [ ] ~~OTP!~~
- [ ] Write backend for registration of Femina Miss India.
- [ ] Login for Core/organizing committee
- [ ] Expanded Features for above (delete/add registration, add/delete/edit teams)
- [ ] Fee payment portal.

## API
- user/CAcheck/{fbID}/ Check if fbID is already registered
JSON: [1,{"name":"Tameesh Biswas","pId":"4159","fbID":"1591893497571424","college":"sgs","sex":"M","mobile":"9999999999","email":"social@tameesh.in","dob":"1998-04-10","city":"Mumbai","refcode":"","feePaid":"0","confirm":"1","time":"2017-10-03 21:04:32","iitp":"0"}]  

- localhost:8000/qrReg/{cryptographic hash from QR}
test: 9224b6579e4258e2a76c0f781191e05ab0883bd97dba
POST: (optional, in case of no post data, only user info will be displayed. Otherwise, user will be registered if organiser is authorised)
JSON: For no POST data: {"status":1,"http":200,"message":{"name":"ALEgjigoiho","pId":"9224","fbID":"-1508967356","college":"IITP","sex":"M","mobile":"9920126812","email":"aijfaoijg@tameesh.in","dob":"2017-10-11","city":"Mumbai","refcode":"","feePaid":"0","confirm":"0","time":"2017-10-26 03:06:05","iitp":"0","qrurl":"http:\/\/localhost:8000\/qr\/anw9224.png"}}   
With POST   
[1,200,"User successfully registered for event."]   
[-1,409,"User already registered for the event"]  

- additional login info inside "special" field of login JSON object   can also access from /user/special/{userID} 4 digit
{"count":1,"eventOrganiser":{"eveCount":1,"0":{"id":"1","name":"Code"}},"isRegTeam":0}

- registration JSON response
{
0: "1", //status
1: {  
city: "Mumbai",
college: "IITp",
confirm: "0",
dob: "1998-05-10",
email: "aaaa____@tameesh.in",    
fbID: "-1509445681", //negative because FB not used during reg    
feePaid: "0",
iitp: "0",
isRegTeam: "0", //is part of reg commitee
mobile: "9940150030",
name: "Name Name2",
pId: "9427",//anw ID
qrurl: "http://anwesha.info/qr/anw9427.png",
refcode: "",
sex: "M",
time: "2017-10-31 10:28:01",   
}
