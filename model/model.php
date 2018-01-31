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
    * Validate if date is valid
    * @param $date
    */
    static function validateDate($date)
    {
        $format = 'Y-m-d';
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
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
    public static function validateData($n,$fbID,$col,&$se,$mob,$em,$pass = null,$db,$cit,$rc){

        $error = null;
        if (strlen($n)<4 || strlen($n) > 40){
            $error = 'Username is too long or too short. Should not exceed 40 characters.';
        } else if (strlen($col)>=300){
            $error = 'College Name too long. Error reference ID:'.alog('College Name too long'.$col);
        } else if (strlen($em)>=60){
            $error = 'Email ID too long. Error reference ID:'.alog('email too long'.$em);;
        } else if ($pass != null && strlen($pass)<5){
            $error = 'Password too short';
        } else if (strlen($cit)>=50){
            $error = 'City name too long. Error reference ID:'.alog('City Name too long'.$cit);
        }  else if (!preg_match('/^[a-zA-Z0-9.\s]*$/', $n)) {
            $error = "Invalid Name. Error reference ID:".alog('Name inv'.$n);
        }  else if (!preg_match('/^[a-zA-Z0-9.\s]*$/', $col)) {
            $error = "Invalid College Name. Error reference ID:".alog('clg inv'.$col);
        }  else if (!preg_match('/^[MFmf]$/', $se)) {
            $error = "Invalid Sex. Error reference ID:".alog('gen inv'.$se);
        }  else if (!preg_match('/^[789][0-9]{9}$/', $mob)) {
            $error = "Invalid Mobile Number. Error reference ID:".alog('mob inv'.$mob);;
        }  else if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Email-ID. Error reference ID:".alog('em inv'.$em);;
        }  else if (!self::validateDate($db)) {
            $error = "Invalid D.O.B [".$db."]. Error reference ID:".alog('dob inv'.$db);
        }  else if (!preg_match('/^[a-zA-Z0-9.@]*$/', $cit)) {
            $error = "Invalid City. Error reference ID:".alog('city inv'.$cit);
        }  else if (!preg_match('/^([0-9]{4}|[9][0-9]{4}|)$/', trim($rc))) {
            $error = "Invalid Referral $rc Code. Error reference ID:".alog('ref inv'.$rc);
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

    public static function HTTPPost($url, array $params) {
        $query = http_build_query($params);
        $ch    = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    function IsNullOrEmptyString($val){
        return (!isset($val) || trim($val)==='');
    }

    public static function updateUser($field, $data, $pId, $conn){
        $sql = "UPDATE `People` SET `$field` = '$data' WHERE `People`.`pId` = $pId;";
        if($result = mysqli_query($conn,$sql)){
            return 1;
        } else {
            alog(mysqli_error($conn));
            return -1;
        }
    }

    /**
     * to get People object with given id
     * @param  int $id   anwesha id of user
     * @param  MySQLi object $conn variable containing connection details
     * @return array       array
     */
    public static function getUser($id, $conn){
        $sql = " SELECT * FROM People WHERE pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $errorH = alog("getuser error: numrows : ". mysqli_num_rows($result)."error:".mysqli_error($conn));
            $error = "Error in displaying result for Anwesha ID. Err no: #".$errorH;
            error_log("Error: $errorH ". mysqli_num_rows($result).mysqli_error($conn));
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        $row = mysqli_fetch_assoc($result);

        $arr = array();
        $arr[0]=1;
        $arr[1]=$row;
        if($row["qrurl"]=="" || $row["qrurl"]==NULL){

            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            if(file_exists($_SERVER['DOCUMENT_ROOT'].'/qr/anw'.$row["pId"].'.png')){
                $QRurl = $actual_link.'/qr/anw'.$row["pId"].'.png';

            }else{

                $QRurl = self::genQR($row["pId"])[3];

            }

            self::updateUser('qrurl', $QRurl, $row["pId"], $conn);
            //email
            $arr[1]["qrurl"] = $QRurl;
        }
        return $arr;
    }

    /**
     * to get People object with given email
     * @param  int $id   email id of user
     * @param  MySQLi object $conn variable containing connection details
     * @return array       array
     */
    public function getUserByEmail($emailID,$conn){
        $sql = " SELECT * FROM People WHERE `email` = '$emailID'";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $error = "Error in displaying result for given email ID";
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

    /**
     * Check if user is registered
     * @param  int $fbID   FBID
     * @param  DB conn
     * @return PID of user
     */
    public static function checkReg($fbID, $conn){
        $sql = "SELECT pId FROM People where fbID = $fbID";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $arr = array();
            $arr[]=-1;
            return $arr;
        }
        $arr = array();
        $result_ = -1;
        while($row = mysqli_fetch_assoc($result)){
            $result_ = $row['pId'];
        }
        // $arr[]=1;
        // $arr[] = $result_;
        $arr = self::getUser($result_,$conn);
        $isSpecial = self::isSpecial($result_,$conn);
        if (array_shift($isSpecial) == 1)
            $arr["special"] = $isSpecial;
        else
            $arr["special"]["count"] = 0;
        $eve = People::getEvents($result_,$conn);
        if(($eve[0] == 1) && count($eve) > 1){
            $arr['1']['event'] = $eve[1];//dump all event data
        } else {
            $arr['1']['event'] = null;
        }
        $auth = Auth::getUserPrivateKey($result_,$conn);
        if($auth["status"]==true)
             $arr['1']['key'] = $auth["key"]; 

        return $arr;
    }

    public function getGroups($id, $conn){

    }

    public static function resize($newWidth, $targetFile, $originalFile) {

        $info = getimagesize($originalFile);
        $mime = $info['mime'];

        switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
        }

        $img = $image_create_func($originalFile);
        list($width, $height) = getimagesize($originalFile);

        $newHeight = ($height / $width) * $newWidth;
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        if (file_exists($targetFile)) {
                unlink($targetFile);
        }
        $image_save_func($tmp, "$targetFile");
    }

    public static function genQR($anwID){
        require('resources/phpqr/qrlib.php');
        require('defines.php');
        
        $tempDir = 'qr/';
        
        $codeContents = $anwID.sha1($anwID.$AESKey);
        
        // we need to generate filename somehow, 
        // with md5 or with database ID used to obtains $codeContents...
        $fileName = 'anw'.$anwID.'.png';
        
        $pngAbsoluteFilePath = $tempDir.$fileName;
        $urlRelativeFilePath = 'qr/'.$fileName;
        $ret = "";
        // generating
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png($codeContents, $pngAbsoluteFilePath);
            $ret = self::resize(500,$_SERVER['DOCUMENT_ROOT'].'/qr/'.$fileName,$_SERVER['DOCUMENT_ROOT'].'/qr/'.$fileName);
        } else {
            return[-1,409,"Already generated"];
        }
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        return [1,200,$urlRelativeFilePath,$actual_link.'/'.$pngAbsoluteFilePath];
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
    public static function createUser($n,$fbID = null,$col,$se,$mob,$em,$pass = null,$db,$cit,$ca,$rc,$conn){
        // error_log('1');
        $error = self::validateData($n,$fbID,$col,$se,$mob,$em,$pass,$db,$cit,$rc);
        // error_log('Data validated');

        if(isset($error)){
            $arr = array();
            $arr[]=-1;
            $arr[]=$error;
            return $arr;
        }
        // $conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
        $Err = '';

        if(!$ca)
            mysqli_autocommit($conn,FALSE);
        
        try
        { 
            $pidpref = "1" ;
            if($rc>90000){
                $pidnum = $rc%10000;
                $pidpref = "pId >= $pidnum ORDER BY pId ASC";
                $rc = null; //err?
            }
            // error_log('Try: before select');
            $sql = "SELECT pId FROM Pids WHERE $pidpref LIMIT 1";
            $result = mysqli_query($conn, $sql);
            if(!$result || mysqli_num_rows($result)==0){
                error_log(mysqli_error($conn));
                alog(mysqli_error($conn));
                $Err = 'Problem in Getting A New ID';
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                return $arr;
            }
            // error_log('before mysql fetch');
            $row = mysqli_fetch_assoc($result);
            $id = $row['pId'];

            $time = time() ;
            $confirm = ($fbID)?1:0;
            if($fbID==null ||  $fbID=="")
                $fbID = -time()*rand(1,5);
            $qrurl = self::genQR($id)[3];
            // error_log('time()');
            $sqlInsert = "INSERT INTO People(name,fbID,pId,college,sex,mobile,email,dob,city,refcode,feePaid,confirm,qrurl) VALUES ('$n', $fbID, $id, '$col', '$se', '$mob', '$em', '$db', '$cit', '$rc', 0, $confirm, '$qrurl')";
            $result = mysqli_query($conn,$sqlInsert);
            // error_log('Query 2');
            if(!$result){
		$dup='';
		if(strpos(mysqli_error($conn),"Duplicate entry")!==false){
			$strExp=explode("'",mysqli_error($conn));
			$dup.=$strExp[count($strExp)-2]." already exists.";
		}
                $Err ='Error! '.$dup.' Please contact registration team. #'.alog(mysqli_error($conn));
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                mysqli_rollback($conn);
                return $arr;
            }

            $sqlDeletePid="DELETE FROM Pids WHERE pId=$id";
            $result = mysqli_query($conn,$sqlDeletePid);
            // error_log('Query 3');

            if(!$result){
                $Err='An Internal Error Occured... Please try later. #'.alog(mysqli_error($conn));
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                mysqli_rollback($conn);
                return $arr;
            }
            $token = sha1(base64_encode((openssl_random_pseudo_bytes(15))));
            $password = (isset($pass))?"sha('".mysqli_real_escape_string($conn,$pass)."')":"NULL";
            $privateKey = (isset($pass))?"sha('".Auth::randomPassword()."')":"NULL";
            $sqlInsert = "INSERT INTO LoginTable(pId,password,privateKey,csrfToken,type) VALUES ($id,$password,$privateKey,'$token',1)";
            // error_log('Query 4');

            $result = mysqli_query($conn,$sqlInsert);
            if(!$result){
                $Err = 'Problem in Creating login Id. Contact Registration team for help. #'.alog(mysqli_error($conn));
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                mysqli_rollback($conn); 
                return $arr;
            }
            if(!$ca) {
            // error_log('Before email');

                // Mail will be send from Campus Ambassador
            self::Email($em,$n,$token,$id,$ca,!$confirm);
            // error_log('After email');
                mysqli_commit($conn);
            // error_log('MYSQLi Commit');
            }

            return self::getUser($id, $conn);
        } finally {
            // error_log('finally Commit');
            if(!$ca)
                mysqli_autocommit($conn,TRUE);            
            // error_log('MYSQLi autoCommit');
        } 
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
    public static function createCampusAmbassador($name,$fbID = NULL,$college,$sex,$mob,$email,$dob,$city,$address,$degree,$grad,$leader,$involvement,$threethings,$rc,$conn){
        mysqli_autocommit($conn,FALSE);
        try
        {
            $returnArray = self::createUser($name,$fbID,$college,$sex,$mob,$email,null,$dob,$city,true,$rc,$conn);
            if($returnArray[0]==-1){
                mysqli_rollback($conn);
                return $returnArray;
            }
            // Escaping String
            $address = mysqli_real_escape_string($conn,$address);
            $fbID = mysqli_real_escape_string($conn,$fbID);
            $degree = mysqli_real_escape_string($conn,$degree);
            $grad = mysqli_real_escape_string($conn,$grad);
            $leader = mysqli_real_escape_string($conn,$leader);
            $involvement = mysqli_real_escape_string($conn,$involvement);
            $threethings =  mysqli_real_escape_string($conn,$threethings);

            $pid = $returnArray[1]['pId'];
            $sql = "INSERT INTO `CampusAmberg` (`pId`,`fbID`, `refKey`, `address`, `degree`, `grad`, `leader`, `involvement`,`threethings`) VALUES ($pid, $fbID, '0', '$address', '$degree', '$grad', '$leader', '$involvement','$threethings')";

            $result = mysqli_query($conn, $sql);
            if(!$result){
                $error = "Could not register the Campus Ambassador, #".alog(mysqli_error($conn));
                $arr = array();
                $arr[]=-1;
                $arr[]=$error;
                mysqli_rollback($conn);
                return $arr;
            }

            $token = sha1(base64_encode((openssl_random_pseudo_bytes(15))));
            $sqlUpdateTokenType = "UPDATE LoginTable SET type = 2,csrfToken='$token' WHERE pId = $pid";

            $result = mysqli_query($conn,$sqlUpdateTokenType);
            if(!$result){
                $Err = 'Problem in Generating Confirmation Token for CampusAmbassador. Contact Registration team for help. #'.alog(mysqli_error($conn));
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                mysqli_rollback($conn);
                return $arr;
            }
            self::Email($email,$name,$token,$pid,true,0);
            mysqli_commit($conn);
            return $returnArray;
        }finally{
            mysqli_autocommit($conn,TRUE);
        }
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
        mysqli_autocommit($conn,FALSE);
        try
        {
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
                $error = "Could not switch to Campus Ambassador. #".alog(mysqli_error($conn));;
                $arr = array();
                $arr[]=-1;
                $arr[]=$error;
                mysqli_rollback($conn);
                return $arr;
            }
            
            $token = sha1(base64_encode((openssl_random_pseudo_bytes(15))));
            $sqlUpdateTokenType = "UPDATE LoginTable SET type = 2,csrfToken='$token' WHERE pId = $pid";

            $result = mysqli_query($conn,$sqlUpdateTokenType);
            if(!$result){
                $Err = 'Problem in Generating Confirmation Token for CampusAmbassador. Contact Registration team for help. #'.alog(mysqli_error($conn));
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                mysqli_rollback($conn);
                return $arr;
            }
            self::Email($email,$name,$token,$pid,true);
            mysqli_commit($conn);
            return $thisUser;
        }finally{
             mysqli_autocommit($conn,TRUE);
        }

    }

    /**
     * In case of Emergency
     * Sends Verification mail to all those who have not confirmed
     * Need in case,after fixing mass bug on mail system 
     * @param  MySQLi $conn       database connection object
     */
    public static function sendVerificationMailToAll($conn,$userarr) {
        // $ids = join(",",$userarr); 
        //3898,4960,8084,2798,1578,6701,6524,7486,3231,8496,3590,6063,3732,2745,9169,6041
        $sql = "SELECT * FROM People NATURAL JOIN LoginTable WHERE pId IN ($userarr) ";
        $result = mysqli_query($conn, $sql);
        if($result){
            while ($row = mysqli_fetch_assoc($result)) {
                $email = $row['email'];
                $name = $row['name'];
                $token = $row['csrfToken'];
                $pid = $row['pId'];
                if($row['type']==2){   
                    echo "CA : ";
                    People::Email($email,$name,$token,$pid,1,0);
                    // People::Email($emailId,$name,$link,$id,$ca,$ver = null);
                }
                else if($row['type']==1){   
                    echo "regUser : ";
                    People::Email($email,$name,$token,$pid,false,1);
                }

                echo " Email send to ". $email . "\n<br>".PHP_EOL;
            }
        } else {
                echo "Error in Query Execution". "\n<br>".PHP_EOL;
        }
    }

    /**
     * Returns if a userID is owner of which events and if the user is a part of the reg commitee
     * Originally intended for the QR code app for additional login info on regular login.
     * this tells the app if the user being logged in has special privilages to register users
     * for fest or events and accept payments.
     */
    public static function isSpecial($userID,$conn) {
        $ret = array();
        $eve = array();
        $count = 0;
        $reg = 0;
        $eveIdarr = array();
        $ownerQ = "owner1 = $userID || owner2 = $userID || owner3 = $userID || owner4 = $userID || owner5 = $userID || owner6 = $userID || owner7 = $userID || owner8 = $userID || owner9 = $userID || owner10 = $userID";
        $sql = "SELECT eveName,eveId FROM Events WHERE ($ownerQ OR code IN (SELECT eveId FROM Events WHERE $ownerQ ))";
        $result = mysqli_query($conn, $sql);
        if($result){
            $eve["eveCount"]=mysqli_num_rows($result);
            while ($row = mysqli_fetch_assoc($result)) {
               $count++;
               $eve[] = [
                    "id"=>$row['eveId'],
                    "name"=>$row['eveName'],
                ];
                $eveIdarr[] = $row['eveId'];
            }

            // $sql = "SELECT eveName,eveId FROM Events WHERE find_in_set((SELECT eveId FROM Events WHERE $ownerQ ), code)";
            // $sql = "SELECT eveName,eveId FROM Events WHERE find_in_set((SELECT eveId FROM Events WHERE owner1 = 1000 || owner2 = 1000 || owner3 = 1000 || owner4 = 1000 ), code)";
            // $result_ = mysqli_query($conn, $sql);
            // if($result_){
            //     $eve["eveCount"] += mysqli_num_rows($result_);
            //     while ($row_ = mysqli_fetch_assoc($result_)) {
            //        $count++;
            //        $eve[] = [
            //             "id"=>$row_['eveId'],
            //             "name"=>$row_['eveName'],
            //         ];
            //     }
            // }else{
            //     error_log(mysqli_error($conn));
            // }

        } else {
            $eve[]=0;
            error_log(mysqli_error($conn));
        }
        array_unique($eve);
        $user = self::getUser($userID,$conn);
        if($user[0]==1){
            $userDat = $user[1];
            if($userDat['isRegTeam']>0){
                $count++;
                $reg = $userDat['isRegTeam'];
            }
        }
        if( $reg > 0 ){
            $eve["eveCount"]++;
            $eve[] =  [
                    "id" => 0,
                    "name" => 'register',
                ];
        }

        $ret = [
            1,
            //count of how many positions of administration the user holds 1 for each event and 1 for reg team
            "count" => $count,
            "eventOrganiser" => $eve,
            "isRegTeam" => $reg
        ];
        return $ret;
    }


    /**
     * Sends email for verification
     * @param string $emailId Email Id to be verified
     * @param string $name    Name of user
     * @param string $link    Token to be sent for verification
     * @param int $id      Anwesha Id for registered user
     * @param boolean $ca      if true then link is for CampusAmbassador
     */
    public static function Email($emailId,$name,$link,$id,$ca,$ver = null)
    {
        require('defines.php');
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $qrDir = $_SERVER['DOCUMENT_ROOT'].'/qr/anw'.$id.'.png';
        $baseURL = $ANWESHA_URL;
        $baseURL = $baseURL . 'verifyEmail/User/';
        $link = $baseURL . '' . $id . '/' . $link;
        // mail($to,$subject,$message);
        $message = "Thank you for registering for $ANWESHA_YEAR. Your Registered Id is : <b>ANW$id</b>.<br>";
        if($ver==1)
            $message .= " To complete your registration, you need to verify your email account. Click here for email verification link: $link .<br>";
        else
            $message .= " Your registration is complete but you can also login using your email ID by verifying it first: $link .<br>";
        $ca_shareurl = $ANWESHA_URL . 'register_' . $id;
        if($ca)
            $message = $message."<br>Hearty Congratulations!! You have been appointed as the Campus Ambassador for Anwesha 2k18 and now you are a part of our team which will take the responsibility of representing Anwesha in your college. Your registration ID  is $id.
                <br>

                 All you have to do is spread the news about Anwesha 2k18 - One of Eastern India’s  Largest  Festival,  and help your friends  live some of the best moment of life - learning & exploring themselves.
                 <br>
                On top of that you also get a chance to win exciting goodies with the top Campus Ambassador getting an opportunity to click a selfie with our celebrity guests at Anwesha 2k18.  
                <br>
                Here is rulebook for the Campus Ambassador Program.
                <br>
                ".$ANWESHA_URL."ca_rulebook.pdf
                <br>
                <br>
                Thank you for registering for Anwesha2k18.";

        $message .= "In case you have any registration related queries feel free to contact, $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>.
            <br> 
            You can also visit our website <i>$ANWESHA_URL</i> for more information.";
        if(file_exists($qrDir))
            $message .= "<br>Yor Registration QRcode is as below and is also attached to this email:<br>
            <img src='".$actual_link."/qr/anw".$id.".png' height='100' width='100' >";
        
        // $message .="<br>Thank You.
        //     <br>Registration Desk
        //     <br>
        //     Anwesha 2018
        //     <br>
        //     IIT Patna
        //     <br>
        //     <br>
        //     Anwesha Facebook Page - https://www.facebook.com/anwesha.iitpatna/
        //     <br>
        //     Anwesha Youtube channel - https://www.youtube.com/AnweshaIITP
        //     <br>
        //     Anwesha Instagram Page - https://www.instagram.com/anwesha.iitp
        //     ";
        $subject = "Email Verification, $ANWESHA_YEAR";

        // require('resources/PHPMailer/PHPMailerAutoload.php');
        require('emailCredential.php');

        // $mail = new PHPMailer;

        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // 3 = verbose debug output
        $SMTPDebug = 0;

        // $mail->isSMTP();                                      // Set mailer to use SMTP
        $Host = MAIL_HOST;  // Specify main and backup SMTP servers
        $SMTPAuth = MAIL_SMTP_AUTH;                               // Enable SMTP authentication
        $Username = MAIL_USERNAME;                 // SMTP username
        $Password = MAIL_PASSWORD;                           // SMTP password
        $SMTPSecure = MAIL_SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
        $Port = MAIL_PORT;                                    // TCP port to connect to

        // $mail->setFrom($ANWESHA_REG_EMAIL, 'Anwesha Registration & Planning Team');
        // $mail->addAddress($emailId, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo($ANWESHA_REG_EMAIL, 'Registration & Planning Team');
        // $mail->addCC('guptaaditya.13@gmail.com');
        // $mail->addBCC($ANWESHA_YEAR);
        // if(file_exists($qrDir))
        // $mail->addAttachment( $qrDir, 'qrcode.png');    // Optional name

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->isHTML(true);                                  // Set email format to HTML

        // $mail->Subject = $subject;
        // $mail->Body    = $message;
        $altBody = "Hi $name,\nThank you for registering for $ANWESHA_YEAR. Your Registered Id is : ANW$id. To complete your registration, you need to verify your email account. Click here for email verification link: $link .\n";
        if($ca)
            $altBody = $altBody."<br>Your Referal Code is last four digits of your AnweshaID. Or you can also share $ca_shareurl for other people registration.<br>";
        $altBody = $altBody . "In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>. You can also visit our website $ANWESHA_URL for more information.\nThank You.\nRegistration Desk\n$ANWESHA_YEAR";
        // $mail->AltBody = $altBody;
        $nodemailerBody = [
            "authID" => $NodeMailerAuthToken,
            "emailTo"=> $emailId,
            "emailSub"=>$subject,
            "url"=>$link,
            "name"=>$name,
            "bodyhtml"=>$message,
            "bodyplain"=>$altBody,
            "anwID"=>$id
        ];
        self::HTTPPost("https://anwesha2018.herokuapp.com/qr", $nodemailerBody);
        // $mail->send();
        // if(!$mail->send()) {
        //     echo 'Message could not be sent.';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        // } else {
        //     echo 'Message has been sent';
        // }
    }


    /**
     * Sends email 
     * @param string $emailId Email Id
     * @param string $title    title
     * @param string $content  Content To send
     */
    public static function EmailWithText($emailId,$title,$content,$url =null,$btnname = null)
    {
        require('defines.php');
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

        $mail->setFrom($ANWESHA_REG_EMAIL, 'Anwesha Web Team');
        $mail->addAddress($emailId);
        $mail->addReplyTo($ANWESHA_REG_EMAIL, 'Web Team');
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $title;
        $mail->Body    = $content;
        $mail->AltBody = $content;
        if($btnname==null)
            $btnname = "Reset Password";
        $nodemailerBody = [
            "authID" => $NodeMailerAuthToken,
            "emailTo"=> $emailId,
            "emailSub"=>$title,
            "bodyhtml"=>$content,
            "bodyplain"=>$content,
            "purp"=>"evereg",
            "title"=> $title,
            "url"=>$url,
            "btnname"=> $btnname 

        ];
        self::HTTPPost("https://anwesha2018.herokuapp.com/text", $nodemailerBody);

        // $mail->send();
   
    }

    /**
     * Sends email for password
     * @param string $emailId       password is send to this email id
     * @param string $name          Name of user
     * @param string $randPass      random generated string
     * @param int    $id               Anwesha Id for registered user
     */
    public static function passEmail( $emailId, $name, $randPass = null, $id, $conn) {
        // mail($to,$subject,$message);
        require('defines.php');
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $userObj = self::getUser($id,$conn)[1];
        $userEmail = $userObj['email'];
        $resetURL = $actual_link."/reset/".$userEmail;
        if(isset($randPass)){
            $message = "Hi $name,<br>Thank you for registering for $ANWESHA_YEAR. Your Registered Id is : <b>ANW$id</b>.<br>Your temporary auto generated password is : <b>$randPass</b><br>You can change the password by clicking <a href='$resetURL'>Reset Password.</a><br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>.";
            $messagePlain = "Hi $name,\nThank you for registering for $ANWESHA_YEAR. Your Registered Id is : ANW$id.\nYour temporary auto generated password is : $randPass\nYou can change the password by visiting $resetURL.\nIn case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to $ANWESHA_REG_EMAIL. ";
        }else{
            $message = "Hi $name,<br>Thank you for registering for $ANWESHA_YEAR. Your Registered Id is : <b>ANW$id</b>.<br>You can login using the password that you set during registration.<br>You can change the password by clicking <a href='$resetURL'>Reset Password.</a><br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>.";
            $messagePlain = "Hi $name,\nThank you for registering for $ANWESHA_YEAR. Your Registered Id is : ANW$id.\nYou can login using the password that you set during registration.\nYou can change the password by visiting $resetURL.\nIn case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to $ANWESHA_REG_EMAIL.";
        }

        $subject = "Account Confirmed, $ANWESHA_YEAR";

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

        $mail->setFrom($ANWESHA_REG_EMAIL, 'Anwesha Web Team');
        $mail->addAddress($emailId, $name);     // Add a recipient
        $mail->addReplyTo($ANWESHA_REG_EMAIL, 'Web Team');
        $mail->isHTML(false);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $messagePlain;
        $nodemailerBody = [
            "authID" => $NodeMailerAuthToken,
            "emailTo"=> $emailId,
            "emailSub"=>$subject,
            "bodyhtml"=>$message,
            "bodyplain"=>$messagePlain,
            "purp"=>"confpswd",
            "title"=>"Account Confirmed",
            "url"=>"https://anwesha.info",
            "btnname"=>"Visit Website"
        ];
        self::HTTPPost("https://anwesha2018.herokuapp.com/text", $nodemailerBody);
        // $mail->send();
        
    }
    public static function verifyMobile($id,$mobile,$accessToken,$conn){
        $sql = "SELECT * FROM People NATURAL JOIN LoginTable WHERE pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $error = "No such User - Invalid Link #".$id;
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }else{
            $row = mysqli_fetch_assoc($result);
            if($mobile!=$row['mobile']){
                $error = "Invalid Mobile No.";
                $arr = array();
                $arr[] = -1;
                $arr[] = $error;
                return $arr;
            }
            $vemail = self::verifyEmail($id,$row['csrfToken'],$accessToken,$conn);
            if($vemail[0]==1){
                $sql = "UPDATE LoginTable SET totalLogin = totalLogin + 1, lastLogin = NOW() WHERE pId = $id";
                $result = mysqli_query($conn,$sql);
                session_start();
                $_SESSION['userID'] = $id;
                $_SESSION['user_name'] =  $row['name'];
                return $vemail;
            }else{
                $error = "Problem in verifying";
                $arr = array();
                $arr[] = -1;
                $arr[] = $error;
                return $arr;
            }
        }
    }
    /**
     * Verfies the user registraion
     * @param int $id      Anwesha Id for registered user
     * @param string $token     Confirmation Token
     */
    public function verifyEmail($id,$token,$FBaccToken = null,$conn){
        $sql = "SELECT * FROM People NATURAL JOIN LoginTable WHERE pId = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $error = "No such User - Invalid Link #".$id;
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $row = mysqli_fetch_assoc($result);
        if($row['type']==0 && $row['confirm']==1){
            $error = "Anwesha ID already Confirmed! ANW".$id;
            $arr = array();
            $arr[] = 2;
            $arr[] = $error;
            return $arr;
        }
        if(empty($token) || strcmp($token,$row['csrfToken'])!=0){
            $error = "Invalid Link, Link Expired or May be already Confirmed! #".$id;
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }

        $confirmationType = $row['type'];
        if(!($confirmationType == 1 || $confirmationType == 2)) {
            $error = "Unexpected Error!, Verifing Confirmation Type. Please contact Registration Team. #".$id;
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
            $error = "Some Internal Error Occured - Please try again. #".alog(mysqli_error($conn));
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        if(isset($FBaccToken))
        $sqlUpdate = "UPDATE LoginTable SET csrfToken = '', type = 0, FBaccToken = '$FBaccToken' WHERE pId = $id";
        else
        $sqlUpdate = "UPDATE LoginTable SET csrfToken = '', type = 0 WHERE pId = $id";
        $result = mysqli_query($conn, $sqlUpdate);
        if(!$result){
            $error = "Some Internal Error Occured - Please try again. #".alog(mysqli_error($conn));
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
                $error = "Some Internal Error Occured - Please try again. #".alog(mysqli_error($conn));
                $arr = array();
                $arr[] = -1;
                $arr[] = $error;
                return $arr;
            }
        } else {
            $randPass = null;
        }

        People::passEmail($email,$name,$randPass,$id,$conn);
        $arr[]=$randPass;                                                                  //vinay edit
        return $arr;


    }

    /**
     * Change the password reset token and set Password
     * @param int $id      Anwesha Id for registered user
     * @param string $token     Confirmation Token
     * @param string $pass   New Password
     */
    public function changePasswordResetToken($id,$token,$pass,$conn){
        $sql = "SELECT csrfToken FROM LoginTable WHERE pId = '$id'";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysqli_num_rows($result)!=1){
            $error = "No such User - Invalid Link #$id";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $row = mysqli_fetch_assoc($result);
        if(empty($token) || strcmp($token,$row['csrfToken'])!=0){
            $error = "Invalid Link or Link Expired #id";
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        

        $sqlUpdate = "UPDATE LoginTable SET password = sha('$pass'), privateKey = sha('$pass'),csrfToken = '' where pId = '$id'";
        $result = mysqli_query($conn, $sqlUpdate);
        if(!$result){
            $error = "Some Internal Error Occured - Please try again. #".alog(mysqli_error($conn));
            $arr = array();
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
    
        $arr = array();
        $arr[] = 1;
        $arr[] = "Password changed successfully.";
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
        $message = "Hi $name,<br>You have been registered for event<b> $eveName.</b> Thank You! <br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>. You can also visit our website <i>$ANWESHA_URL</i> for more information.<br><br>Registration Desk<br>$ANWESHA_YEAR";
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
        
        $mail->setFrom($ANWESHA_YEAR, 'Anwesha Web');
        $mail->addAddress($emailId, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($ANWESHA_REG_EMAIL, 'Web');
        // $mail->addCC('guptaaditya.13@gmail.com');
        // $mail->addBCC($ANWESHA_YEAR);

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $altBody = "Hi $name,\nYou have been registered for event $eveName. Thank You!\nIn case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to $ANWESHA_REG_EMAIL. You can also visit our website http://2017.anwesha.info/ for more information.\nRegistration Desk\nAnwesha 2k17";
        $mail->AltBody = $altBody;
        $nodemailerBody = [
            "authID" => $NodeMailerAuthToken,
            "emailTo"=> $emailId,
            "emailSub"=>$subject,
            "bodyhtml"=>$message,
            "bodyplain"=>$altBody,
            "purp"=>"evereg",
            "title"=>"Event Registered",
            "url"=>"http://anwesha.info",
            "btnname"=>"Visit Website"

        ];
        self::HTTPPost("https://anwesha2018.herokuapp.com/text", $nodemailerBody);
        // $mail->send();

    }

    /**
     * Registers an user to an event of size 1
     * @param  int $userID  anwesha id of the user
     * @param  int $eventID event id of the event
     * @param  mysqli $conn    connection variable
     * @return array          associative array, index "status" is boolean, index "msg" carries corresponding message
     */
    public function registerEventUserSingle($userID, $eventID, $conn){
        $sql = "INSERT INTO Registration VALUES ($eventID,$userID,null,0)";
        $result = mysqli_query($conn,$sql);
        if($result){
            self::sendEventRegistrationEmail($userID,$eventID,$conn);
            return array("status"=>true, "msg" => "You have been registered!");
        } else {
            return array("status"=>false, "msg"=> "Registration failed, already registered! #".alog(mysqli_error($conn)));
        }
    }

    /**
     * Sends notification to all users enrolled in one event
     * @param  int $userID  anwesha id of the user
     * @param  int $eventID event id of the event
     * @param  mysqli $conn    connection variable
     * @return array          associative array, index "status" is boolean, index "msg" carries corresponding message
     */
    public function eventNotifyRegUsers($eventID, $title, $message, $registrar, $conn){
        $sql = "SELECT p.name,p.pId,p.mobile,p.email FROM People p, Registration r WHERE (r.eveId = $eventID AND r.pId = p.pId)";
        $result = mysqli_query($conn,$sql);
        if($result){
            $users = [];
            while($row = mysqli_fetch_assoc($result)){
                // $users[] = [
                //     "pId"=>$row["pId"],
                //     "name"=>$row["name"],
                //     "email"=>$row["email"],
                //     "mobile"=>$row["mobile"]
                // ];
                $users[] = $row["email"];
                
            }
            $sql = "SELECT * FROM Events WHERE (eveId = $eventID)";
            $result = mysqli_query($conn,$sql);
            $event = [];
            if($result){
                $event = mysqli_fetch_assoc($result);

            }
            $admin = People::getUser($registrar,$conn);
            $ValidOrg = Events::isValidOrg($registrar, $eventID, $conn);
            if($ValidOrg[0]==-1){
                return [
                    "status"=>-1,
                    "http"=>ValidOrg[1],
                    "message"=>ValidOrg[2]
                ];
            }
            if($admin[0]==-1){
                return [
                    "status"=>-1,
                    "http"=>400,
                    "message"=>$admin[1]
                ];
            }
            // require('defines.php');
            // require('resources/PHPMailer/PHPMailerAutoload.php');
            // require('emailCredential.php');

            // $mail = new PHPMailer;

            // // 0 = off (for production use)
            // // 1 = client messages
            // // 2 = client and server messages
            // // 3 = verbose debug output
            // $mail->SMTPDebug = 0;

            // $mail->isSMTP();                                      // Set mailer to use SMTP
            // $mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
            // $mail->SMTPAuth = MAIL_SMTP_AUTH;                               // Enable SMTP authentication
            // $mail->Username = MAIL_USERNAME;                 // SMTP username
            // $mail->Password = MAIL_PASSWORD;                           // SMTP password
            // $mail->SMTPSecure = MAIL_SMTP_SECURE;                            // Enable TLS encryption, `ssl` also accepted
            // $mail->Port = MAIL_PORT;                                    // TCP port to connect to

            // $mail->setFrom($ANWESHA_REG_EMAIL, 'Anwesha Web Team');
            // $mail->addAddress($emailId);
            // $mail->addReplyTo($ANWESHA_REG_EMAIL, 'Web Team');
            // $mail->isHTML(true);                                  // Set email format to HTML
            // foreach($users as $user){
            //     $mail->AddBCC($user);
            // }
            // $mail->Subject = $title;
            // $mail->Body    = $content;
            // $mail->AltBody = $content;
            
            //AWS SES Limit of 50 recepients
            $offset = 0;
            $netC = count($users);
            $rem = [];
            do{
                $rem = array_slice($users,$offset,49);
                $offset += 49;
                  
                $nodemailerBody = [
                    "authID" => $NodeMailerAuthToken,
                    "emailTo"=> $admin[1]["email"],
                    "bcc"=> json_encode($rem),
                    "emailSub"=>$event['eveName']."Event Update : ".$title,
                    "bodyhtml"=>$message,
                    "bodyplain"=>$message,
                    "purp"=>"evereg",
                    "title"=> $event['eveName']."Event Update : ".$title,
                    "url"=>"https://anwesha.info/event/".$event['code']."/".$event["eveId"],
                    "btnname"=> "View Event"

                ];
                self::HTTPPost("http://localhost:3000/text", $nodemailerBody);

            }while(count($rem)>49);
          
            // $mail->send();
            return array("status"=>true, "msg" => "Message sent to $netC users. !");
        } else {
            return array("status"=>false, "msg"=> "Function failed, already registered! #".alog(mysqli_error($conn)));
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
            return array("status"=>false, "msg"=> "Could not get a valid GroupID #".alog("BT\t".mysqli_error($conn)));
        }

        $row = mysqli_fetch_assoc($result);
        $grpId = $row['grpId'];

        $sqlDeletePid="DELETE FROM Grpids WHERE grpId=$grpId";
        $result = mysqli_query($conn,$sqlDeletePid);
        if(!$result){
            //SHOULD NOT HAPPEN - IF YOU ARE HERE - YOUR'E IN TROUBLE
            //WTF is even happpening ??
            return array("status"=>false, "msg"=> "An Internal Error Occured... Please try later #".alog("BT\t".mysqli_error($conn)));
        }


        //Update GroupRegistration Table
        $idstr="";
        for ($i=0; $i < $size ; $i++) { 
            $idstr=$idstr . $userIDs[$i] . " ";
        }
        $sqlInsert = "INSERT INTO GroupRegistration(grpId,eveId,pIds,grpName) VALUES ('$grpId','$eventID','$idstr','$groupName')";

        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            return array("status"=>false, "msg"=> "An Internal Error Occured While Registering... Please try later #".alog(mysqli_error($conn)));

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
            return array("status"=>false, "msg"=> "An Internal Error Occured while registering... Please try later #".alog(mysqli_error($conn)));
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
            return array("status"=>false, "msg"=> "Ther was some error while arranging for accomodation. Please try again later. #".alog(mysqli_error($conn)));
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
    mysqli_set_charset($conn,"utf8");
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

    public static function isSuperUser($pId,$conn){
        $pId = mysqli_real_escape_string($conn,$pId);
        $ownerQ = "owner1 = $pId || owner2 = $pId || owner3 = $pId || owner4 = $pId || owner5 = $pId || owner6 = $pId || owner7 = $pId || owner8 = $pId || owner9 = $pId || owner10 = $pId";
        $sql = "SELECT count(eveId) as owner FROM Events E1 WHERE eveId = 0 AND ($ownerQ)";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result || mysqli_num_rows($result)==0){
            $error = "Internal Error #".alog(mysqli_error($conn));            
            return false;
        }
        $row = mysqli_fetch_assoc($result);
        if($row['owner']==0){
            return false;
        }else if($row['owner']==1){
            return true;
        }
    }
        
    public static function getEventDetails($eveId,$conn){
        $arr = array();
        $eveId = mysqli_real_escape_string($conn,$eveId);
        $sql = "SELECT *  FROM Events WHERE eveId = $eveId";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result || mysqli_num_rows($result)==0){
            $error = "Internal Error #".alog(mysqli_error($conn));            
            return [-1,[]];
        }
        $row = mysqli_fetch_assoc($result);
            $arr = $row;
        return [1,$arr];
        
    }

    public static function isValidOrg($pId,$eveID,$conn){
        $eveID = mysqli_real_escape_string($conn,$eveID);
        $ownerQ = "owner1 = $pId || owner2 = $pId || owner3 = $pId || owner4 = $pId || owner5 = $pId || owner6 = $pId || owner7 = $pId || owner8 = $pId || owner9 = $pId || owner10 = $pId";
        $sql = "SELECT count(code) as owner FROM Events E1 
            WHERE 
                eveId = $eveID AND (
                    ". $ownerQ ." || (
                        SELECT count(*) from Events where eveId = E1.code AND (".$ownerQ.") 
                    ) 
                )";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result || mysqli_num_rows($result)==0){
            $error = " Internal Error #".alog(mysqli_error($conn). $sql );            
            $arr[]=-1;
            $arr[]=500;
            $arr[]=$error;
            return $arr;
        }
        $superUser = self::isSuperUser($pId,$conn);
        while($row = mysqli_fetch_assoc($result)){

            if($row['owner']==0 && !$superUser){
                $arr[] = -1;
                $arr[] = 500;
                $arr[] = "Not valid user for event";
                return $arr;
            }elseif($row['owner']==1 || $superUser){
                $arr[] = 1;
                $arr[] = 200;
                $arr[] = "Eve Owner";
                return $arr;
            }
        }
        
    }

    public static function regUser($orgID,$eveID,$pId,$conn){
        $orgID = mysqli_real_escape_string($conn,$orgID);
        $eveID = mysqli_real_escape_string($conn,$eveID);
        $valid = self::isValidOrg($pId,$eveID,$conn);
        if(!$valid){
            return $valid;
        }
        $sqlInsert = "INSERT INTO Registration(eveId,pId,val) VALUES ($eveID,$pId,1)";
        $dup ="";
        $result = mysqli_query($conn,$sqlInsert);
        if(!$result){
            $Err = 'Error in registering team. #'.alog(mysqli_error($conn));
            $arr = array();
            $arr[] = -1;
            $arr[] = 400;
            if(strpos(mysqli_error($conn),"Duplicate entry")!==false){
               $Err = "User already registered for the event";
               $arr[1] = 409;
            }
            
            $arr[] = $Err;
            return $arr;
        } else {
            $arr[] = 1;
            $arr[] = 200;
            $arr[] = "User successfully registered for event.";
            return $arr;
        }
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

        $sql = "SELECT People.name as name, People.college, People.sex, People.mobile, People.email, People.dob, People.confirm, People.city, People.feePaid, People.confirm, People.time AS regTime, LoginTable.totalLogin, LoginTable.lastLogin, LoginTable.privateKey AS 'key' FROM People INNER JOIN LoginTable ON People.pId = LoginTable.pId AND People.pId = $userID AND LoginTable.password = '$password' AND People.confirm > 0";

        $result = mysqli_query($conn,$sql);
        if(!$result OR mysqli_num_rows($result) != 1){
            return array("status" => 403, "msg" => "Invalid credentials");
        } else {
            $row = mysqli_fetch_assoc($result);
            $row["status"] = 200;
            $row["msg"] = "Login Successful";
            $sql = "UPDATE LoginTable SET totalLogin = totalLogin + 1, lastLogin = NOW() WHERE pId = $userID";
            $result = mysqli_query($conn,$sql);
            session_start();
            $_SESSION['userID'] = $userID;
            $_SESSION['user_name'] =  $row['name'];
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

    public function forgetPassword($eId,$conn){
        $sql = "SELECT P.pId as pId,name,email,type FROM People P JOIN LoginTable LT on LT.pId=P.pId WHERE email = '$eId'";
        $result = mysqli_query($conn,$sql);
        if(!$result OR mysqli_num_rows($result) != 1 ){
            $Err = 'Email Not Registered';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        } 
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $em = $row['email'];
        $type = $row['type'];
        $userId = $row['pId'];
        if ($type!=0) {
            $Err = 'Please verify your email-id first.';
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        
        $token = sha1(base64_encode((openssl_random_pseudo_bytes(15))));
        $sqlUpdate = "UPDATE LoginTable set csrfToken='$token' where pId='$userId';";

        $result = mysqli_query($conn,$sqlUpdate);
        if(!$result){
            $Err = 'Unexpected Error. Please contact Registration Desk# '.alog(mysqli_error($conn));
            $arr = array();
            $arr[]=-1;
            $arr[]=$Err;
            return $arr;
        }
        
        require('defines.php');
        $baseURL = $ANWESHA_URL;
        $url = $baseURL . "resetpassword/$userId/$token/";
        
        $emailContent = "Hi $name,</br>We received a request to Reset to Anwesha Password. To reset your password Please click <a href='$url '>here</a>.</br></br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to $ANWESHA_REG_EMAIL.";
        People::EmailWithText($em,"Anwesha Password Reset",$emailContent,$url);
        $arr = array();
        $arr[]=1;
        $arr[]="Please check for new email on $em";
        return $arr;
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
