<?php
// require('../connection.php');

class People{
    var $name,$pId,$college,$sex,$mobile,$email,$dob,$city,$feePaid,$confirm,$time;

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

    function IsNullOrEmptyString($val){
        return (!isset($val) || trim($val)==='');
    }

    public function getUser($id){
        $sql = " SELECT * FROM People WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if(!$result || mysql_num_rows($result)!=1){
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

    public function getEvents($id){

    }

    public function getGroups($id){

    }

    public function createUser($n,$col,$se,$mob,$em,$db,$cit,$conn){
        $error = validateData($n,$col,$se,$mob,$em,$db,$cit);
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
            if (!$result) {
                $Err = 'Problem in Getting A New ID';
                mysqli_close($conn);
            }
            $row = mysqli_fetch_array($result);
            $id = $row['ID'];

            $time = time() ;

            $sqlInsert = "INSERT INTO People(name,pId,college,sex,mobile,email,dob,city,feePaid,confirm,time) VALUES ($n, $id, $col, $se, $mob, $em, $dob, $cit, 0, 0,$time)";

            $result = mysqli_query($conn,$sqlInsert);
            if(!$result){
                $Err = 'Problem in Creating new registration - Maybe mobile number already in use.';
                mysqli_close($conn);
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                return $arr;
            }

            $sqlDeletePid="DELETE FROM Pids WHERE pId=$id";
            $result = mysqli_query($conn,$sqlDeletePid);
            if(!$result){
                $Err='An Internal Error Occured... Please try later';
                mysqli_close($conn);
                $arr = array();
                $arr[]=-1;
                $arr[]=$Err;
                return $arr;
            }
            return getUser($id);
    }
}

class Events{
    public function getMainEvents($conn){
        $sql = " SELECT * FROM Events WHERE code = 1";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result){
            $error = "No Top Level Events found";
            $arr[] = -1;
            $arr[] = $error;
            return $arr;
        }
        $arr[] = 1;
        $arr[] = mysqli_fetch_array($result);
        return $arr;
    }

    public function getAllEvents($conn)
    {
        $sql = "SELECT * FROM Events";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if(!$result){
            $error = "Error in retrieving database info";
            $arr = array();
            $arr[]=0;
            $arr[]=$error;
            return $arr;
        }
        $arr[] = 1;
        $arr[] = mysqli_fetch_array($result);
        return $arr;
    }
}

?>