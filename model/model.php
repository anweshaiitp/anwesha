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
     * @return string      if null then no errors, else returns the error.
     */
    public function validateData($n,$col,$se,$mob,$em,$db,$cit){

        $error = null;
        if (strlen($n)<6 || strlen($n) > 40){
            $error = 'Username is too long or too short';
        }  else if (!preg_match('/^[a-zA-Z0-9.\s]*$/', $n)) {
            $error = "Invalid Name";
        }  else if (!preg_match('/^[a-zA-Z0-9.\s]*$/', $col)) {
            $error = "Invalid College Name";
        }  else if ($se!='M' && $se!='F') {
            $error = "Invalid Sex";
        }  else if (!preg_match('/^[789][0-9]{9}$/', $mob)) {
            $error = "Invalid Mobile Number ";
        }  else if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Email-ID";
        }  else if (DateTime::createFromFormat('Y-m-d', $db) == FALSE) {
            $error = "Invalid D.O.B".$db;
        }  else if (!preg_match('/^[a-zA-Z0-9.@]*$/', $cit)) {
            $error = "Invalid City";
        }
        return $error;
    }

    public function validateString($param){

        $error = null;
        if (!preg_match('/^[a-zA-Z0-9.]*$/', $param)) {
            $error = "Invalid Name";

        }
        return $error;
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

    public function getEvents($id, $conn){

        $sql = " SELECT * FROM Registration WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)==0){
            $error = "The user is registered in no Events";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        $arr = array();
        $results = array();
        while($row = mysqli_fetch_assoc($result)){
            $results[] = $row;
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
     * @param  MySQLi $conn database connection object
     * @return array       index 0 :- 1(success), -1(error);
     */
    public function createUser($n,$col,$se,$mob,$em,$db,$cit,$ca,$conn){
        $error = self::validateData($n,$col,$se,$mob,$em,$db,$cit);
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

        $sqlInsert = "INSERT INTO People(name,pId,college,sex,mobile,email,dob,city,feePaid,confirm) VALUES ('$n', $id, '$col', '$se', '$mob', '$em', '$db', '$cit', 0, 0)";

        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            $Err = 'Problem in Creating new registration - Maybe mobile number already in use.';
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
        $sqlInsert = "INSERT INTO LoginTable(pId,password,csrfToken) VALUES ($id,NULL,'$token')";

        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            $Err = 'Problem in Creating login Id. Contact Registration team for help.';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        self::Email($em,$n,$token,$id,$ca);
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
     * @param  string $involement Response for participation in anwesha in the past
     * @param  MySQLi $conn       database connection object
     * @return array             index 0 :- 1(success), -1(error);
     */
    public function createCampusAmbassador($name,$college,$sex,$mob,$email,$dob,$city,$address,$degree,$grad,$leader,$involement,$conn){
        $returnArray = self::createUser($name,$college,$sex,$mob,$email,$dob,$city,true,$conn);
        if($returnArray[0]==-1){
            return $returnArray;
        }

        $pid = $returnArray[1]['pId'];
        $sql = "INSERT INTO `anwesha`.`CampusAmberg` (`pId`, `refKey`, `address`, `degree`, `grad`, `leader`, `involvement`) VALUES ($pid, '0', '$address', '$degree', $grad, '$leader', '$involvement')";

        $result = mysqli_query($conn, $sql);
        if(!$result){
            $error = "Could not register the Campus Ambassador";
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }

        return $returnArray;

    }
    /**
     * Sends email for verification
     * @param string $emailId Email Id to be verified
     * @param string $name    Name of user
     * @param string $link    Token to be sent for verification
     * @param int $id      Anwesha Id for registered user
     * @param boolean $CA      if true then link is for CampusAmbassador
     */
    public function Email($emailId,$name,$link,$id,$ca)
    {
        $baseURL = '';
        if ($ca){
            $baseURL = $baseURL . 'verifyEmail/CampusAmbassador/';
        } else {
            $baseURL = $baseURL . 'verifyEmail/User/';
        }
        $link = $baseURL . '' . $id . '/' . $link;
        // mail($to,$subject,$message);
        $message = "Hi $name,<br>Thank you for registering for Anwesha2k16. Your Registered Id is : <b>ANW$id</b>. To complete your registration, you need to verify your email account. Click <a href = \"$link\">here</a> for email verification.<br>In case you have any registration related queries feel free to contact Aditya Gupta(+918292337923) or Arindam Banerjee(+919472472543) or drop an email to <i>registration@anwesha.info</i>. You can also visit our website <i>http://2016.anwesha.info/</i> for more information.<br>Thank You.<br>Registration Desk<br>Anwesha 2k16";
        $subject = "Email Verification, Anwesha2k16";

        require('resources/PHPMailer/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // 3 = verbose debug output
        $mail->SMTPDebug = 0;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'lnx36.securehostdns.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'registration@anwesha.info';                 // SMTP username
        $mail->Password = 'anw_reg_2015_codered';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('registration@anwesha.info', 'Anwesha Registration & Planning Team');
        $mail->addAddress($emailId, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('registration@anwesha.info', 'Registration & Planning Team');
        // $mail->addCC('guptaaditya.13@gmail.com');
        // $mail->addBCC('registration@anwesha.info');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = "Hi $name,\nThank you for registering for Anwesha2k16. Your Registered Id is : ANW$id. To complete your registration, you need to verify your email account. Click here for email verification link: $link .\nIn case you have any registration related queries feel free to contact Aditya Gupta(+918292337923) or Arindam Banerjee(+919472472543) or drop an email to registration@anwesha.info. You can also visit our website http://2016.anwesha.info/ for more information.\nThank You.\nRegistration Desk\nAnwesha 2k16";;
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
        $name = $row['name'];
        $email = $row['email'];
        $sqlUpdate = "UPDATE People SET confirm = 1 WHERE pId = $id";
        $result = mysqli_query($conn, $sqlUpdate);
        if(!$result){
            $error = "Some Internal Error Occured - Please try again.";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $sqlUpdate = "UPDATE LoginTable SET csrfToken = ''";
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
        $randPass=Auth::randomPassword();                                                  //vinay edit
        $sqlUpdate = "UPDATE LoginTable SET password = sha('$randPass')";                         //vinay edit
         $result = mysqli_query($conn, $sqlUpdate);
        if(!$result){
            $error = "Some Internal Error Occured - Please try again.";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }

        Auth::passEmail($email,$name,$randPass,$id);                                                                 //vinay edit
        $arr[]=$randPass;                                                                  //vinay edit
        return $arr;


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
        $sql = " SELECT * FROM Events WHERE code = 1";
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
        $message = "Hi $name,<br>Thank you for registering for Anwesha2k16. Your Registered Id is : <b>ANW$id</b>.<br>Your temporary auto generated password is : <b>$randPass</b><br>You can change the password after login.<br>In case you have any registration related queries feel free to contact Aditya Gupta(+918292337923) or Arindam Banerjee(+919472472543) or drop an email to <i>registration@anwesha.info</i>. You can also visit our website <i>http://2016.anwesha.info/</i> for more information.<br>Thank You.<br>Registration Desk<br>Anwesha 2k16";
        $subject = "AnweshaID Password, Anwesha2k16";

        require('resources/PHPMailer/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // 3 = verbose debug output
        $mail->SMTPDebug = 0;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'lnx36.securehostdns.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'registration@anwesha.info';                 // SMTP username
        $mail->Password = 'anw_reg_2015_codered';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('registration@anwesha.info', 'Anwesha Registration & Planning Team');
        $mail->addAddress($emailId, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('registration@anwesha.info', 'Registration & Planning Team');
        // $mail->addCC('guptaaditya.13@gmail.com');
        // $mail->addBCC('registration@anwesha.info');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = "Hi $name,\nThank you for registering for Anwesha2k16. Your Registered Id is : ANW$id.\nYour temporary auto generated password is : $randPass\nYou can change the password after loging in.\nIn case you have any registration related queries feel free to contact Aditya Gupta(+918292337923) or Arindam Banerjee(+919472472543) or drop an email to registration@anwesha.info. You can also visit our website http://2016.anwesha.info/ for more information.\nThank You.\nRegistration & Planning Team\nAnwesha 2k16";
        $mail->send();
        // if(!$mail->send()) {
        //     echo 'Message could not be sent.';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        // } else {
        //     echo 'Message has been sent';
        // }
    }
}

?>
