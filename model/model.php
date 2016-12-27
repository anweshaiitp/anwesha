<?php
/**
 *
 *                             PPPPPP                        lll
 *                             PP   PP   eee   oooo  pp pp   lll   eee
 *                             PPPPPP  ee   e oo  oo ppp  pp lll ee   e
 *                             PP      eeeee  oo  oo pppppp  lll eeeee
 *                             PP       eeeee  oooo  pp      lll  eeeee
 *                                                   pp
 */

/**
 * class People cotains information of users registered for anwesha
 */
class People{
    /**
     * name of the user
     * @var string
     */
    var $name;
    /**
     * registered id of the user
     * @var int
     */
    var $pId;
    /**
     * user's college name
     * @var string
     */
    var $college;
    /**
     * gender information
     * @var string
     */
    var $sex;
    /**
     * 10 digit mobile number
     * @var int
     */
    var $mobile;
    /**
     * email id of user
     * @var string
     */
    var $email;
    /**
     * dob of the user
     * @var date
     */
    var $dob;
    /**
     * city of user
     * @var string
     */
    var $city;
    /**
     * numeric fee
     * @var int
     */
    var $feePaid;
    /**
     * [$confirm description]
     * 0 - Unconfirmed
     * 1 - User Confirmed
     * 2 - Confirmed as CampusAmbassador
     * @var [type]
     */
    var $confirm;
    /**
     * registration time of user
     * @var time
     */
    var $time;


    public function __construct(){
        $this->$name = null;
        $this->$pId = null;
        $this->$college = null;
        $this->$sex = null;
        $this->$mobile = null;
        $this->$email = null;
        $this->$dob = null;
        $this->$city = null;
        $this->$feePaid = null;
        $this->$confirm = null;
        $this->$time = null;
    }

    /**
     * Checks if the data entered for registraion is avlid or not
     * @param  string $n   name
     * @param  string $col college
     * @param  string $se  gender
     * @param  int $mob 10 digit mobile number
     * @param  string $em  emailId
     * @param  string $db  date of birth
     * @param  string $cit city
     * @param  string $rc Referral Code
     * @return string      if null then no errors, else returns the error.
     */
    public function validateData($n,$col,&$se,$mob,$em,$db,$cit,$rc){

        $error = null;
        if (strlen($n)<4 || strlen($n) > 40){
            $error = 'Username is too long or too short';
        }  else if (!preg_match('/^[a-zA-Z0-9.\s]*$/', $n)) {
            $error = "Invalid Name";
        }  else if (!preg_match('/^[a-zA-Z0-9.\s]*$/', $col)) {
            $error = "Invalid College Name";
        }  else if (!preg_match('/^[MFmf]$/', $se)) {
            $error = "Invalid Sex";
        }  else if (!preg_match('/^[789][0-9]{9}$/', $mob)) {
            $error = "Invalid Mobile Number ";
        }  else if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Email-ID";
        }  else if (DateTime::createFromFormat('Y-m-d', $db) == FALSE) {
            $error = "Invalid D.O.B [".$db."]";
        }  else if (!preg_match('/^[a-zA-Z0-9.@]*$/', $cit)) {
            $error = "Invalid City";
        }  else if (!preg_match('/^([0-9]{4}|)$/', trim($rc))) {
            $error = "Invalid Referral $rc Code";
        }
        $se = strtoupper($se);
        return $error;
    }

    public function validateString($param){

        $error = 1;
        if (!preg_match('/^[a-zA-Z0-9.]*$/', $param)) {
            $error = -1;

        }
        return $error;
    }

    /*
     *Checks the validity of the Anwesha IDs and that no IDs are repeated
     * @param string $param AnweshaID
     * @param  MySQLi object $conn variable containing connection details
     * @return boolean AnweshaID valid or not
     */
    public function validateID($userIds,$size,$conn){
        for($i=0; $i < $size; $i++ ){
            if( strlen($userIds[$i]) != 4 ){
                return -1;
            }
        }

        $sql = "SELECT COUNT(*) FROM People WHERE pId in (".implode(',',$userIds).")";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        if ( $row['COUNT(*)']==$size ){
            return 1;
        } else {
            return -1;
        }

    }


    function IsNullOrEmptyString($val){
        return (!isset($val) || trim($val)==='');
    }


    /**
     * to get People object with given id
     * @param  int $id   anwesha id of user
     * @param  MySQLi object $conn variable containing connection details
     * @return array       array
     */
    public function getUser($id,$conn){
        $sql = " SELECT * FROM People WHERE pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $error = "Error in displaying result for Anwesha ID";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        $row = mysqli_fetch_assoc($result);

        $arr = array();
        $arr[]=1;
        $arr[]=$row;
        return $arr;
    }
    /**
     * Check if User is a CampusAmbassador
     * @param  int $id   anwesha id of user
     * @param  MySQLi object $conn variable containing connection details
     * @return isCampusAmbassador
     */
    public function checkIfCampusAmbassador($id,$conn){
        $sql = "SELECT 1 FROM CampusAmberg WHERE pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            return false;
        }
        return true;
    }
    /**
     * parse all details of the user from loginTable
     * @param  int $id   anwesha id
     * @param  mysqli $conn connection link
     * @return array
     */
    public function getUserLoginInfo($id,$conn){
        $sql = " SELECT * FROM LoginTable WHERE pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $error = "Problem in displaying result for Anwesha ID";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        $row = mysqli_fetch_assoc($result);
        $arr = array();
        $arr[]=1;
        $arr[]=$row;
        return $arr;
    }
    /**
     * gives the events in which user is registered
     * @param  int $id   anwesha id
     * @param  mysqli $conn mysqli link
     * @return array       index 0 is 1 or -1, index 1 is array or string.
     */
    public function getEvents($id, $conn){
        $sql = "SELECT Events.eveName FROM Registration INNER JOIN Events ON Registration.eveId = Events.eveId AND Registration.pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $arr = array();
            $arr[]=-1;
            return $arr;
        }
        $arr = array();
        $results = array();
        while($row = mysqli_fetch_assoc($result)){
            $results[] = $row['eveName'];
        }
        $arr[]=1;
        $arr[] = $results;
        return $arr;
    }

    public function getGroups($id, $conn){

    }
    /**
     * Registers a new user for anwesha
     * @param  string $n    name of user
     * @param  string $col  college name
     * @param  string $se   M or F
     * @param  int $mob  10 digit mobile number
     * @param  string $em   email id of user
     * @param  string $db   date of birth of user on YYYY-MM-DD format
     * @param  string $cit  City
     * @param  boolean $ca if true then registers a campus ambassador
     * @param  string $rc   Referral Code
     * @param  MySQLi $conn database connection object
     * @return array       index 0 :- 1(success), -1(error);
     */
    public function createUser($n,$col,$se,$mob,$em,$db,$cit,$ca,$rc,$conn){
        $error = self::validateData($n,$col,$se,$mob,$em,$db,$cit,$rc);
        if(isset($error)){
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        // $conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
        $Err = '';

        $sql = "SELECT pId FROM Pids LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)==0){
            $Err = 'Problem in Getting A New ID';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        $row = mysqli_fetch_assoc($result);
        $id = $row['pId'];

        $time = time() ;

        $sqlInsert = "INSERT INTO People(name,pId,college,sex,mobile,email,dob,city,refcode,feePaid,confirm) VALUES ('$n', $id, '$col', '$se', '$mob', '$em', '$db', '$cit', '$rc', 0, 0)";

        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            $Err = 'Error! Maybe EmailId is already in use.';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }

        $sqlDeletePid="DELETE FROM Pids WHERE pId=$id";
        $result = mysqli_query($conn,$sqlDeletePid);
        if(!$result){
            $Err='An Internal Error Occured... Please try later';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        $token = sha1(base64_encode((openssl_random_pseudo_bytes(15))));
        $sqlInsert = "INSERT INTO LoginTable(pId,password,csrfToken,type) VALUES ($id,NULL,'$token',1)";

        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            $Err = 'Problem in Creating login Id. Contact Registration team for help.';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        if(!$ca) {
            // Mail will be send from Campus Ambassador
            self::Email($em,$n,$token,$id,$ca);
        }
        return self::getUser($id, $conn);
    }

    /**
     * Registers a new campus ambassador
     * @param  string $name       name of user
     * @param  string $college    college name
     * @param  string $sex        M or F
     * @param  int $mob        10 digit mobile number
     * @param  string $email      email id of user
     * @param  string $dob        date of birth of user on YYYY-MM-DD format
     * @param  string $city       City
     * @param  string $address    Address
     * @param  string $degree     Degree (B.Tech. etc.)
     * @param  int $grad       Graduation Year
     * @param  string $leader     Response for leaderShip in college
     * @param  string $involvement Response for participation in anwesha in the past
     * @param  string $threethings Three Things like to do as CA
     * @param  string $rc         RefferalCode
     * @param  MySQLi $conn       database connection object
     * @return array             index 0 :- 1(success), -1(error);
     */
    public function createCampusAmbassador($name,$college,$sex,$mob,$email,$dob,$city,$address,$degree,$grad,$leader,$involvement,$threethings,$rc,$conn){
        $returnArray = self::createUser($name,$college,$sex,$mob,$email,$dob,$city,true,$rc,$conn);
        if($returnArray[0]==-1){
            return $returnArray;
        }
        // Escaping String
        $address = mysqli_real_escape_string($conn,$address);
        $degree = mysqli_real_escape_string($conn,$degree);
        $grad = mysqli_real_escape_string($conn,$grad);
        $leader = mysqli_real_escape_string($conn,$leader);
        $involvement = mysqli_real_escape_string($conn,$involvement);
        $threethings =  mysqli_real_escape_string($conn,$threethings);

        $pid = $returnArray[1]['pId'];
        $sql = "INSERT INTO `CampusAmberg` (`pId`, `refKey`, `address`, `degree`, `grad`, `leader`, `involvement`,`threethings`) VALUES ($pid, '0', '$address', '$degree', '$grad', '$leader', '$involvement','$threethings')";

        $result = mysqli_query($conn, $sql);
        if(!$result){
            $error = "Could not register the Campus Ambassador";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }

        $token = sha1(base64_encode((openssl_random_pseudo_bytes(15))));
        $sqlUpdateTokenType = "UPDATE LoginTable SET type = 2,csrfToken='$token' WHERE pId = $pid";

        $result = mysqli_query($conn,$sqlUpdateTokenType);
        if(!$result){
            $Err = 'Problem in Generating Confirmation Token for CampusAmbassador. Contact Registration team for help.';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        self::Email($email,$name,$token,$pid,true);
        return $returnArray;

    }

    /**
     * Switch normal User to campus ambassador
     * @param  string $anwid      Anwesha ID
     * @param  string $email      email id of user  [Local Verification]
     * @param  string $address    Address
     * @param  string $degree     Degree (B.Tech. etc.)
     * @param  int $grad       Graduation Year
     * @param  string $leader     Response for leaderShip in college
     * @param  string $involvement Response for participation in anwesha in the past
     * @param  string $threethings Three Things like to do as CA
     * @param  MySQLi $conn       database connection object
     * @return array             index 0 :- 1(success), -1(error);
     */
    public function switchCampusAmbassador($anwid,$email,$address,$degree,$grad,$leader,$involvement,$threethings,$conn){
        $thisUser = self::getUser($anwid, $conn);
        if($thisUser[0]==-1){
            return $thisUser;
        }
        if(strcmp($email,$thisUser[1]['email'])!=0){
            $error = "Email not matching with given AnweshaID";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }

        // Escaping String
        $address = mysqli_real_escape_string($conn,$address);
        $degree = mysqli_real_escape_string($conn,$degree);
        $grad = mysqli_real_escape_string($conn,$grad);
        $leader = mysqli_real_escape_string($conn,$leader);
        $involvement = mysqli_real_escape_string($conn,$involvement);
        $threethings =  mysqli_real_escape_string($conn,$threethings);

        $pid = $thisUser[1]['pId'];
        $name = $thisUser[1]['name'];
        
        if(self::checkIfCampusAmbassador($pid,$conn)) {
            $error = "Already a Campus Ambassador!";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
      
        $sql = "INSERT INTO `CampusAmberg` (`pId`, `refKey`, `address`, `degree`, `grad`, `leader`, `involvement`,`threethings`) VALUES ($pid, '0', '$address', '$degree', '$grad', '$leader', '$involvement','$threethings')";

        $result = mysqli_query($conn, $sql);
        if(!$result){
            $error = "Could not switch to Campus Ambassador";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        
        $token = sha1(base64_encode((openssl_random_pseudo_bytes(15))));
        $sqlUpdateTokenType = "UPDATE LoginTable SET type = 2,csrfToken='$token' WHERE pId = $pid";

        $result = mysqli_query($conn,$sqlUpdateTokenType);
        if(!$result){
            $Err = 'Problem in Generating Confirmation Token for CampusAmbassador. Contact Registration team for help.';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        self::Email($email,$name,$token,$pid,true);
        return $thisUser;

    }

    /**
     * In case of Emergency
     * Sends Verification mail to all those who have not confirmed
     * Need in case,after fixing mass bug on mail system 
     * @param  MySQLi $conn       database connection object
     */
    public static function sendVerificationMailToAll($conn) {
        $sql = "SELECT * FROM People NATURAL JOIN LoginTable WHERE type > 0 ";
        $result = mysqli_query($conn, $sql);
        if($result){
            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                $email = $row['email'];
                $name = $row['name'];
                $token = $row['csrfToken'];
                $pid = $row['pId'];
                People::Email($email,$name,$token,$pid,false);
                echo "Email send to ". $email . "\n";
            }
        } else {
                echo "Error in Query Execution";
        }
    }


    /**
     * Sends email for verification
     * @param string $emailId Email Id to be verified
     * @param string $name    Name of user
     * @param string $link    Token to be sent for verification
     * @param int $id      Anwesha Id for registered user
     * @param boolean $ca      if true then link is for CampusAmbassador
     */
    public static function Email($emailId,$name,$link,$id,$ca)
    {
        require('defines.php');
        $baseURL = $ANWESHA_URL;
        $baseURL = $baseURL . 'verifyEmail/User/';
        $link = $baseURL . '' . $id . '/' . $link;
        // mail($to,$subject,$message);
        $message = "Hi $name,<br>Thank you for registering for $ANWESHA_YEAR. Your Registered Id is : <b>ANW$id</b>. To complete your registration, you need to verify your email account. Click <a href = \"$link\">here</a> for email verification.<br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>. You can also visit our website <i>$ANWESHA_URL</i> for more information.<br>Thank You.<br>Registration Desk<br>$ANWESHA_YEAR";
        $subject = "Email Verification, $ANWESHA_YEAR";

        require('resources/PHPMailer/PHPMailerAutoload.php');
        require('emailCredential.php');

        $mail = new PHPMailer;

        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // 3 = verbose debug output
        $mail->SMTPDebug = 0;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = MAIL_SMTP_AUTH;                               // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;                 // SMTP username
        $mail->Password = MAIL_PASSWORD;                           // SMTP password
        $mail->SMTPSecure = MAIL_SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = MAIL_PORT;                                    // TCP port to connect to

        $mail->setFrom($ANWESHA_REG_EMAIL, 'Anwesha Registration & Planning Team');
        $mail->addAddress($emailId, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($ANWESHA_REG_EMAIL, 'Registration & Planning Team');
        // $mail->addCC('guptaaditya.13@gmail.com');
        // $mail->addBCC($ANWESHA_YEAR);

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = "Hi $name,\nThank you for registering for $ANWESHA_YEAR. Your Registered Id is : ANW$id. To complete your registration, you need to verify your email account. Click here for email verification link: $link .\nIn case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>. You can also visit our website $ANWESHA_URL for more information.\nThank You.\nRegistration Desk\n$ANWESHA_YEAR";;
        $mail->send();
        // if(!$mail->send()) {
        //     echo 'Message could not be sent.';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        // } else {
        //     echo 'Message has been sent';
        // }
    }

    /**
     * Verfies the user registraion
     * @param int $id      Anwesha Id for registered user
     * @param string $token     Confirmation Token
     */
    public function verifyEmail($id,$token,$conn){
        $sql = "SELECT * FROM People NATURAL JOIN LoginTable WHERE pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $error = "No such User - Invalid Link";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $row = mysqli_fetch_assoc($result);
        if(strcmp($token,$row['csrfToken'])!=0){
            $error = "Invalid Link or Link Expired";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }

        $confirmationType = $row['type'];
        if(!($confirmationType == 1 || $confirmationType == 2)) {
            $error = "Unexpected Error!, Verifing Confirmation Type. Please contact Registration Team";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $passwordAlreadySet = false;
        if(!($row['password']== NULL || empty($row['password'])))
            $passwordAlreadySet = true;
            

        $name = $row['name'];
        $email = $row['email'];
        $sqlUpdate = "UPDATE People SET confirm = $confirmationType WHERE pId = $id";
        $result = mysqli_query($conn, $sqlUpdate);
        if(!$result){
            $error = "Some Internal Error Occured - Please try again.";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $sqlUpdate = "UPDATE LoginTable SET csrfToken = '', type = 0 WHERE pId = $id";
        $result = mysqli_query($conn, $sqlUpdate);
        if(!$result){
            $error = "Some Internal Error Occured - Please try again.";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $arr = array();
        $arr[]=1;
        $randPass = "[Same as Old One]";

        if(!$passwordAlreadySet) {
            $randPass=Auth::randomPassword();                                                  //vinay edit
            $privateKey = Auth::randomPassword();
            $sqlUpdate = "UPDATE LoginTable SET password = sha('$randPass'), privateKey = sha('$privateKey') where pId = $id";                         //vinay edit
            $result = mysqli_query($conn, $sqlUpdate);
            if(!$result){
                $error = "Some Internal Error Occured - Please try again.";
                $arr = array();
                $arr[] = -1;
                $arr[] = $error;
                return $arr;
            }
        }

        Auth::passEmail($email,$name,$randPass,$id);                                                                 //vinay edit
        $arr[]=$randPass;                                                                  //vinay edit
        return $arr;


    }

    public function sendEventRegistrationEmail($userID,$eveID,$conn)
    {
        require('defines.php');
        $user = People::getUser($userID,$conn);
        $sql = "SELECT eveName FROM Events WHERE eveId = $eveID";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $eveName = $row['eveName'];
        $name = $user[1]['name'];
        $emailId = $user[1]['email'];
        // mail($to,$subject,$message);
        $message = "Hi $name,<br>You have been registered for event<b> $eveName.</b> Thank You! <br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_YEAR</i>. You can also visit our website <i>$ANWESHA_URL</i> for more information.<br><br>Registration Desk<br>$ANWESHA_YEAR";
        $subject = "$eveName Registration $ANWESHA_YEAR";

        require('resources/PHPMailer/PHPMailerAutoload.php');
        require('emailCredential.php');

        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = MAIL_SMTP_AUTH;                               // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;                 // SMTP username
        $mail->Password = MAIL_PASSWORD;                           // SMTP password
        $mail->SMTPSecure = MAIL_SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = MAIL_PORT;                                    // TCP port to connect to
        
        $mail->setFrom($ANWESHA_YEAR, 'Anwesha Registration & Planning Team');
        $mail->addAddress($emailId, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($ANWESHA_YEAR, 'Registration & Planning Team');
        // $mail->addCC('guptaaditya.13@gmail.com');
        // $mail->addBCC($ANWESHA_YEAR);

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = "Hi $name,\nYou have been registered for event $eveName. Thank You!\nIn case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to $ANWESHA_YEAR. You can also visit our website http://2017.anwesha.info/ for more information.\nRegistration Desk\nAnwesha 2k17";;
        $mail->send();

    }

    /**
     * Registers an user to an event of size 1
     * @param  int $userID  anwesha id of the user
     * @param  int $eventID event id of the event
     * @param  mysqli $conn    connection variable
     * @return array          associative array, index "status" is boolean, index "msg" carries corresponding message
     */
    public function registerEventUserSingle($userID, $eventID, $conn){
        $sql = "INSERT INTO Registration VALUES ($eventID,$userID,null)";
        $result = mysqli_query($conn,$sql);
        if($result){
            self::sendEventRegistrationEmail($userID,$eventID,$conn);
            return array("status"=>true, "msg" => "You have been registered!");
        } else {
            return array("status"=>false, "msg"=> "Registration failed, already registered!");
        }
    }

    /*
     * Check if the users are in another group for the same event
     * @param array(string) $ID userIds of the group members
     * @param int $eId event id of the event
     * @param  mysqli $conn    connection variable
     * @return int 1/-1 if valid/invalid group
     */
    public function checkUserEventVacant($ID,$eId,$conn){
        $sql="SELECT COUNT(*) FROM `Registration` WHERE `eveId` = '$eId' AND `pId` in (".implode(',',$ID).")";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            return -1;
        }
        $row = mysqli_fetch_assoc($result);

        if ($row['COUNT(*)']!=0) {
            return -1;
        }
        return 1;
    }
    /**
     * Registers a group to an event of size > 1
     * @param array(string) $userIDs AnweshaIDs of the group members
     * @param int $gsize size of the array
     * @param int $eventID event id of the event
     * @param string $groupName name of the group
     * @param  mysqli $conn    connection variable
     * @return array          associative array, index "status" is boolean, index "msg" carries corresponding message
     */
    public function registerGroupEvent($userIDs,$gsize,$eventID,$groupName,$conn)
    {

        //Check if group name is valid
        if(self::validateString($groupName)==-1){
            return array("status"=>false, "msg"=> "Group Name is invalid. It should only consist of alphanumerics.");
        }

        //Trim 'ANW' from the IDs
        for($i=0; $i<count($userIDs); $i++){
            if($userIDs[$i]!=""){
                $str = $userIDs[$i];
                $userIDs[$i] = preg_replace('/[^0-9]/', '', $str);
            }
        }

        $size=count($userIDs);

        if($gsize < $size){
            return array("status"=>false, "msg"=> "The size of the group is more than the allowed size for this event.");
        }

        sort($userIDs);

        //check validity of IDs provided
        if(self::validateID($userIDs,$size,$conn) == -1){
            return array("status"=>false, "msg"=> "One or more Anwesha IDs are invalid or repeated. Please try again!");
        }

        //Check repitition in AnweshaIDs - NOT NEEDED
        /* for ($i=0; $i < $size-1; $i++) { */ 
        /*     if($userIDs[$i] == $userIDs[$i + 1]){ */
        /*         return array("status"=>false, "msg"=> "One or more Anwesha IDs are repeated. Try again!"); */
        /*     } */
        /* } */

        //check if the user is already registered in this event in another group.
        if ( self::checkUserEventVacant($userIDs,$eventID,$conn) == -1) {
            return array("status"=>false, "msg"=> "Some member(s) of this group are already registered in this event with another group. If this is an error please contact the Registration and Planning Team, Anwesha.");
        }

        //By now, we are pretty sure that the given team members can form a
        //valid team - so lets make the team.

        //First get a grpID and delete it from the table
        $sql = "SELECT grpId FROM Grpids LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if(!$result || mysqli_num_rows($result)==0){
            //SHOULD NOT HAPPEN - IF YOU ARE HERE - YOUR'E IN TROUBLE
            return array("status"=>false, "msg"=> "Could not get a valid GroupID");
        }

        $row = mysqli_fetch_assoc($result);
        $grpId = $row['grpId'];

        $sqlDeletePid="DELETE FROM Grpids WHERE grpId=$grpId";
        $result = mysqli_query($conn,$sqlDeletePid);
        if(!$result){
            //SHOULD NOT HAPPEN - IF YOU ARE HERE - YOUR'E IN TROUBLE
            //WTF is even happpening ??
            return array("status"=>false, "msg"=> "An Internal Error Occured... Please try later");
        }


        //Update GroupRegistration Table
        $idstr="";
        for ($i=0; $i < $size ; $i++) { 
            $idstr=$idstr . $userIDs[$i] . " ";
        }
        $sqlInsert = "INSERT INTO GroupRegistration(grpId,eveId,pIds,grpName) VALUES ('$grpId','$eventID','$idstr','$groupName')";

        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            return array("status"=>false, "msg"=> "An Internal Error Occured While Registering... Please try later");

        }        
        
        //Yosh, now lets insert the members in the tables and we'll be done.
        $values = array();
        foreach ($userIDs as $uId) {
            $values[] = "('$eventID', '$uId', '$grpId')";
        }

        $values = implode(", ", $values);


        $sqlInsert = "INSERT INTO Registration(eveId,pId,grpId) VALUES $values ";
        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            return array("status"=>false, "msg"=> "An Internal Error Occured while registering... Please try later");
        }



        return array("status"=>true, "msg" => "Congratulations !! The group $groupName has been registered.");



    }


    /*
     *Checks the validity of the Anwesha IDs and that no IDs are repeated
     * @param string $param AnweshaID
     * @param  MySQLi object $conn variable containing connection details
     * @return boolean AnweshaID valid or not
     */
    public function validateAnweshaID($id,$conn){
        if( strlen($id) != 4 ){
            return -1;
        }

        $sql = "SELECT COUNT(*) FROM People WHERE pId = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        if ( $row['COUNT(*)']==1 ){
            return 1;
        } else {
            return -1;
        }

    }


    public function requestAccomodation($id,$dates,$conn)
    {
        
        if($id!=""){
            $str = $id;
            $id = preg_replace('/[^0-9]/', '', $str);
        }
        $size=count($dates);

        sort($dates);

        if(self::validateAnweshaID($id,$conn)==-1){
            return array("status"=>false, "msg"=> "Anwesha ID inavalid.");
        }

        $valDates = array();

        if(array_search('21',$dates) !== false){
            $valDates[] = 1;
        }else {
            $valDates[] = 0;
        }
        if(array_search('22',$dates) !== false){
            $valDates[] = 1;
        }else {
            $valDates[] = 0;
        }
        if(array_search('23',$dates) !== false){
            $valDates[] = 1;
        }else {
            $valDates[] = 0;
        }
        if(array_search('24',$dates) !== false){
            $valDates[] = 1;
        }else {
            $valDates[] = 0;
        }
        if(array_search('25',$dates) !== false){
            $valDates[] = 1;
        }else {
            $valDates[] = 0;
        }
        if(array_search('26',$dates) !== false){
            $valDates[] = 1;
        }else {
            $valDates[] = 0;
        }

        $sql = "INSERT INTO Accomodation values ($id,".implode(',',$userIds).")";
        $result = mysqli_query($conn,$sql);

        if (!$result){
            return array("status"=>false, "msg"=> "Ther was some error while arranging for accomodation. Please try again later.");
        } else {
            return array("status"=>true, "msg"=> "Your accomodation details have been recorded. We hope you have a great stay.");
        }
    }

}
/**
 *                            EEEEEEE                        tt
 *                            EE      vv   vv   eee  nn nnn  tt     sss
 *                            EEEEE    vv vv  ee   e nnn  nn tttt  s
 *                            EE        vvv   eeeee  nn   nn tt     sss
 *                            EEEEEEE    v     eeeee nn   nn  tttt     s
 *                                                                sss
 *
 */
/**
 *
 */
class Events{
    public function getMainEvents($conn){
        $sql = " SELECT * FROM Events WHERE code = -1";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result || mysqli_num_rows($result)==0){
            $error = "No Top Level Events found";
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $arr[] = 1;
        $results = array();
        while($row = mysqli_fetch_assoc($result)){
            $results[] = $row;
        }
        $arr[] = $results;
        return $arr;
    }

    public function getAllEvents($conn){
        $sql = "SELECT * FROM Events";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result || mysqli_num_rows($result)==0){
            $error = "Error in retrieving database info";
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        $arr[] = 1;
        $results = array();
        while($row = mysqli_fetch_assoc($result)){
            $results[] = $row;
        }
        $arr[] = $results;
        return $arr;
    }

    public function getSubEvent($mainEvent,$conn){

        $sql = "SELECT * FROM Events WHERE code = '$mainEvent'";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result || mysqli_num_rows($result)==0){
            $error = "Could not get Sub Events for $mainEvent";
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        $arr[] = 1;
        $results = array();
        while($row = mysqli_fetch_assoc($result)){
            $results[] = $row;
        }
        $arr[] = $results;
        return $arr;
    }
    /**
     * Returns the size of the event.
     * @param  int $eveID Event id
     * @param  mysqli $conn  mysqli connection variable
     * @return int        size of the event. -1 if event does not exist.
     */
    public function getEventSize($eveID,$conn)
    {
        $sql = "SELECT size FROM Events WHERE eveId = $eveID";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            return -1;
        }
        $row = mysqli_fetch_assoc($result);
        return $row['size'];
    }

}


/**
 *
 */
class Auth
{
    /**
     * @return string
     * generates a random string.
     */
    public function randomPassword() {
        $len=8;
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = ''; //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $len; $i++) {
            $n = rand(0, $alphaLength);
            $pass = $pass . $alphabet[$n];
        }
        return $pass; //turn the array into a string
    }

    /**
     * Sends email for password
     * @param string $emailId       password is send to this email id
     * @param string $name          Name of user
     * @param string $randPass      random generated string
     * @param int    $id               Anwesha Id for registered user
     */
    public function passEmail($emailId,$name,$randPass,$id) {
        // mail($to,$subject,$message);
        require('defines.php');
        $message = "Hi $name,<br>Thank you for registering for $ANWESHA_YEAR. Your Registered Id is : <b>ANW$id</b>.<br>Your temporary auto generated password is : <b>$randPass</b><br>You can change the password after login.<br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_YEAR</i>. You can also visit our website <i>$ANWESHA_URL</i> for more information.<br>Thank You.<br>Registration Desk<br>$ANWESHA_YEAR";
        $subject = "AnweshaID Password, $ANWESHA_YEAR";

        require('resources/PHPMailer/PHPMailerAutoload.php');
	require('emailCredential.php');

        $mail = new PHPMailer;

        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // 3 = verbose debug output
        $mail->SMTPDebug = 0;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = MAIL_SMTP_AUTH;                               // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;                 // SMTP username
        $mail->Password = MAIL_PASSWORD;                           // SMTP password
        $mail->SMTPSecure = MAIL_SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = MAIL_PORT;                                    // TCP port to connect to
        $mail->setFrom($ANWESHA_YEAR, 'Anwesha Registration & Planning Team');
        $mail->addAddress($emailId, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($ANWESHA_YEAR, 'Registration & Planning Team');
        // $mail->addCC('guptaaditya.13@gmail.com');
        // $mail->addBCC($ANWESHA_YEAR);

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = "Hi $name,\nThank you for registering for $ANWESHA_YEAR. Your Registered Id is : ANW$id.\nYour temporary auto generated password is : $randPass\nYou can change the password after loging in.\nIn case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to $ANWESHA_YEAR. You can also visit our website $ANWESHA_URL for more information.\nThank You.\nRegistration & Planning Team\n$ANWESHA_YEAR";
        $mail->send();
        // if(!$mail->send()) {
        //     echo 'Message could not be sent.';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        // } else {
        //     echo 'Message has been sent';
        // }
    }

    /**
     * Searches the database for user's private key using its public key(username)
     * @param  int $userID anwesha id of the user
     * @param  mysqli $conn   connection variable
     * @return array         associative array. index "status" is boolean, index "key" has usual meaning, index "msg" has te usual meaning.
     */
    public function getUserPrivateKey($userID,$conn){

        $sql = "SELECT privateKey FROM LoginTable WHERE pId = $userID";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            return array("status"=>false, "key"=>null, "msg" => "User does not exist!");
        } else {
            $row = mysqli_fetch_assoc($result);
            $privateKey = $row['privateKey'];
            return array("status"=> true, "key" => $privateKey, "msg" => "Login Successful!");
        }
    }
    /**
     * Login the user and return its public key.
     * @param  int $userID   Anwesha Id of the user
     * @param  string $password password of the user
     * @param  mysqli $conn     mysqli connection variable
     * @return array
     */
    public function loginUser($userID,$password,$conn){

        $password = sha1($password);

        $sql = "SELECT People.name, People.college, People.sex, People.mobile, People.email, People.dob, People.city, People.feePaid, People.confirm, People.time AS regTime, LoginTable.totalLogin, LoginTable.lastLogin, LoginTable.privateKey AS 'key' FROM People INNER JOIN LoginTable ON People.pId = LoginTable.pId AND People.pId = $userID AND LoginTable.password = '$password'";

        $result = mysqli_query($conn,$sql);
        if(!$result OR mysqli_num_rows($result) != 1){
            return array("status" => false, "msg" => "Invalid credentials");
        } else {
            $row = mysqli_fetch_assoc($result);
            $row["status"] = True;
            $row["msg"] = "Login Successful";
            $sql = "UPDATE LoginTable SET totalLogin = totalLogin + 1, lastLogin = NOW() WHERE pId = $userID";
            $result = mysqli_query($conn,$sql);
            session_start();
            $_SESSION['userID'] = $userID;
            return $row;
        }

    }

    public function verifyPassword($userId,$password,$conn){
        $password = sha1($password);

        $sql = "SELECT People.name, People.college, People.sex, People.mobile, People.email, People.dob, People.city, People.feePaid, People.confirm, People.time AS regTime, LoginTable.totalLogin, LoginTable.lastLogin, LoginTable.privateKey AS 'key' FROM People INNER JOIN LoginTable ON People.pId = LoginTable.pId AND People.pId = $userId AND LoginTable.password = '$password'";

        $result = mysqli_query($conn,$sql);
        if(!$result OR mysqli_num_rows($result) != 1){
            return false;
        } else {
            $row = mysqli_fetch_assoc($result);
            return true;
        }
    }
    /**
     * Authenticates that the request was sent by the user after login
     * @param  string $privateKey    privateKey of the user from the database
     * @param  string $hashedContent Hashed data received
     * @param  string $content       Data without hash
     * @return boolean                if new hashedData matches to the old one the true else false.
     */
    public function authenticateRequest($privateKey,$hashedContent,$content){
        $newHashed = hash_hmac('sha256',$content,$privateKey);
        return md5($newHashed) == md5($hashedContent);
    }

    public function changePassword($userId, $newPassword, $conn){
        $password = sha1($newPassword);
        $privateKey = sha1(self::randomPassword());
        $sql = "UPDATE LoginTable SET password = '$password', privateKey = '$privateKey' WHERE pId = $userId";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            return false;
        } else {
            return true;
        }
    }
    /**
     * uses regex to check if anwesha id format is correct or not.
     * @param  int $ID ANW1234
     * @return associative array     index status says if format is valid or not, index key has the numeric part of it.
     */
    public function sanitizeID($ID)
    {
        if(preg_match('/^ANW([0-9]{4})$/', $ID, $match)){
            return array("status" => true, "key" => $match[1]);
        } else {
            return array("status" => false);
        }
    }
}

?>
