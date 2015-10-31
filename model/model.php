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
        }  else if (!preg_match('/^[a-zA-Z0-9.]*$/', $n)) {
            $error = "Invalid Name";
        }  else if (!preg_match('/^[a-zA-Z0-9.]*$/', $col)) {
            $error = "Invalid College Name";
        }  else if ($se!='M' && $se!='F') {
            $error = "Invalid Sex";
        }  else if (!preg_match('/^[789][0-9]{9}$/', $mob)) {
            $error = "Invalid Mobile Number";
        }  else if (!preg_match(!filter_var($em, FILTER_VALIDATE_EMAIL))) {
            $error = "Invalid Email-ID";
        }  else if (DateTime::createFromFormat('Y-m-d', $db) == FALSE) {
            $error = "Invalid D.O.B";
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
        $sql = " SELECT * FROM People WHERE id = $id";
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
        $row = mysqli_fetch_assoc($result);
        $arr = array();
        $arr[]=1;
        $arr[]=$row;
        return $arr;
    }

    public function getGroups($id, $conn){

    }

    public function createUser($n,$col,$se,$mob,$em,$db,$cit,$conn){
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
        }
        $row = mysqli_fetch_assoc($result);
        $id = $row['ID'];

        $time = time() ;

        $sqlInsert = "INSERT INTO People(name,pId,college,sex,mobile,email,dob,city,feePaid,confirm,time) VALUES ($n, $id, $col, $se, $mob, $em, $dob, $cit, 0, 0,$time)";

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
        self::Email($em,$n,$token,$id);
        return getUser($id);
    }

    public function Email($emailId,$name,$link,$id)
    {
        $baseURL = '';
        $link = $baseURL . '' . $id . '/' . $link; 
        // mail($to,$subject,$message);
        $message = "Hi $name,\nThank you for registering for Anwesha2k16. Your Registered Id is : ANW$id. To complete your registration, you need to verify your email account. Click here for email verification link: $link .\nIn case you have any registration related queries feel free to contact Aditya Gupta(+918292337923) or Arindam Banerjee(+919472472543) or drop an email to registration@anwesha.info. You can also visit our website http://2016.anwesha.info/ for more information.\nThank You.\nRegistration Desk\nAnwesha 2k16";
        $subject = "Email Verification, Anwesha2k16";
        mail($emailId,$subject,$message);
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
        $arr[] = mysqli_fetch_assoc($result);
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
        $arr[] = mysqli_fetch_assoc($result);
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
        $arr[] = mysqli_fetch_assoc($result);
        return $arr;
    }

}

?>
