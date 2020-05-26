<?php

require("/fun/python_php.php");

class Ksql{

    protected $query;
    protected $Result = [];
    protected $tabel;

    protected $INIT;
    public $db;

    public function __construct($host,$user_name,$password,$db){

        $this->db = $db;
        $this->INIT =  mysqli_connect($host,$user_name,$password,$db);
        

    }
    public function getMysql(){
        return $this->INIT;
    }

    public function setTabel($name){

        $this->tabel = $name;
    }
    public function getTable(){
        return $this->tabel;
    }
    public function sql($query){

        
        $this->Result = [];  
        // print_r($query);
        if ($result = mysqli_query($this->INIT, $query)) {

            while ($row = mysqli_fetch_row($result)) {
     
                array_push($this->Result,$row);
                
            }   
     
            mysqli_free_result($result);
        }
     
       
        return $this->Result;


    }
    public function sql_no_output($query){

        $this->Result = "";
        $this->Result = mysqli_query($this->INIT, $query);
        return $this->Result;
    }
    public function sql_to_json(){

        $temp[$this->tabel] = $this->Result;
        $temp = json_encode($temp);
        return $temp;
        //$fp = fopen("sql_to_json.json","w");
        //fwrite($fp,json_encode($temp));
        //fclose($fp);
        
    }
    public function  create_database($name){
    
        $query  =  "CREATE DATABASE IF NOT EXISTS {$name} DEFAULT CHARSET = utf8"; 
        self::sql($query);

    }
    public function  read($colom,$order = ""){
    
        if(len($order) >0){

            $query  =  "SELECT {$colom} FROM {$this->tabel} ORDER BY {$order} ";
            //return mysql_real_escape_string($query);
        
        }else{

            $query  =  "SELECT {$colom} FROM {$this->tabel}";
        }
        self::sql($query);
        return $this->Result;
    
    }
    public function descrbe(){

        self::sql("DESCRIBE {$this->tabel}");
        return $this->Result;
        
    }

}


class dt{

    protected $query;
    protected $Result = [];

    protected $tabel;
    protected $output;
    protected $output_type="tabel";

    protected $INIT;
    protected $SQL;








    public function __construct($host,$user_name,$password,$db){

        $this->INIT = new ksql($host,$user_name,$password,$db);
        $this->SQL = $this->INIT->getMysql();
        

    }
    public function setTabel($name){

        $this->tabel = $name;
        $this->INIT->setTabel($name);
    }
    protected function setoutput($name){

        $this->output = $name;
    
    }
    public function sql_to_json(){

        if ($this->output_type == "tabel") {
            
            $temp[$this->tabel] = $this->Result;


        }elseif($this->output_type == "name"){

            $temp[$this->output] = $this->Result;

        }else{

            $temp[$this->tabel] = $this->Result;

        }
        $temp = json_encode($temp);
        return $temp;


        //$fp = fopen("sql_to_json.json","w");
        //fwrite($fp,json_encode($temp));
        //fclose($fp);
        
    }
    public function get_sql_raw(){
        return $this->Result;
    }







     // for user's
    public function get_user_Data($data){

        self::setoutput("get_user_Data");
        $this->output_type = "name";

        $user_id = $data[0];

        $this->query = "select * from `{$this->tabel}` where user_id = '{$user_id}';";
        $this->Result = $this->INIT->sql($this->query);
        

    }
    public function get_user_name($data){

        self::setTabel("accounts");

        $user_id = $data[0];
        //print_r($data[1]);

        $this->query  = "select `name` from `accounts` where `user_id` = '{$user_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_name");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_name");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_email($data){

        self::setTabel("accounts");

        $user_id = $data[0];
        //print_r($data[1]);

        $this->query  = "select `email` from `accounts` where `user_id` = '{$user_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_email");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_email");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_phon_number($data){

        self::setTabel("accounts");

        $user_id = $data[0];
        //print_r($data[1]);

        $this->query  = "select `phon_number` from `accounts` where `user_id` = '{$user_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_phon_number");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_phon_number");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_us_name($data){

        self::setTabel("accounts");

        $user_id = $data[0];
        //print_r($data[1]);

        $this->query  = "select `us_name` from `accounts` where `user_id` = '{$user_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_us_name");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_us_name");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_bio($data){

        self::setTabel("accounts");

        $user_id = $data[0];
        //print_r($data[1]);

        $this->query  = "select `bio` from `accounts` where `user_id` = '{$user_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_bio");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_bio");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_porfile_pic($data){

        $user_id = $data[0];

        self::setTabel("accounts");

        $this->query  = "select `porfile_pic` from `accounts` where `user_id` = '{$user_id}';";
        $this->Result = $this->INIT->sql($this->query);

        self::setoutput("get_user_porfile_pic");
        $this->output_type = "name";


        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_porfile_pic");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_porfile_pic");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }

    }


    public function search_user($data){

        $user_id = $data[0];
        $need_user_name = $data[1];

        $need_user_name = self::sql_escape($need_user_name);


        //print_r($data);
        $this->query  = "select `user_id` from `accounts` where `name` regexp '{$need_user_name}' or `us_name` regexp '{$need_user_name}';";
        //echo $this->query;
        self::setoutput("search_user");
        $this->output_type = "name";

        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);

    }











    // follow
    public function get_user_following_id($data){

        self::setTabel("follow_ref");

        $user_id = $data[0];
        $this->query  = "select `following_id` from `follow_ref` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (len($this->Result) != 0) {
            if (isset($this->Result[0][0])) {
            
                self::setoutput("get_user_following_id");
                $this->output_type = "name";
    
                $this->Result = explode(",",$this->Result[0][0]);
    
            }else{
    
                self::setoutput("get_user_following_id");
                $this->output_type = "name";
                
                $this->Result = ["null"];
            }
        } else {
            $this->Result = ["null"];
        }
        

        //  print_r($this->Result);
    }
    public function get_user_following_len($data){

        self::setTabel("follow_ref");

        $user_id = $data[0];
        $this->query  = "select `following_len` from `follow_ref` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_following_id");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_following_id");
            $this->output_type = "name";
            
            $this->Result = "0";
        }
        //  print_r($this->Result);
    }
    public function user_cheak_if_following($data){

        $user_id = $data[0];
        $user_cheak = $data[1];

        self::setTabel("follow_ref");

        $this->query  = "select `following_id` from `follow_ref` where `user_id` = '{$user_id}';";
        $this->Result = $this->INIT->sql($this->query);

        if (isset($this->Result[0][0])) {
            
            $temp = (string) $this->Result[0][0];
            $temp = explode(",",$temp);
            if (in_array($user_cheak,$temp)) {
                
                self::setoutput("user_cheak_if_following");
                $this->output_type = "name";

                $this->Result = ["following"];
                //echo "following";
            }else{

                self::setoutput("user_cheak_if_following");
                $this->output_type = "name";

                $this->Result = ["not_following"];
                //echo "not following";
            }
            self::setoutput("user_cheak_if_following");
            $this->output_type = "name";


        }else{

            self::setoutput("user_cheak_if_following");
            $this->output_type = "name";
            
            $this->Result = ["not_following"];
        }

    }
    public function user_cheak_if_followers($data){

        $user_id = $data[0];
        $user_cheak = $data[1];

        self::setTabel("follow_ref");

        $this->query  = "select `followers_id` from `follow_ref` where `user_id` = '{$user_id}';";
        $this->Result = $this->INIT->sql($this->query);

        if (isset($this->Result[0][0])) {
            
            $temp = (string) $this->Result[0][0];
            $temp = explode(",",$temp);
            if (in_array($user_cheak,$temp)) {
                
                self::setoutput("user_cheak_if_followers");
                $this->output_type = "name";

                $this->Result = ["followers"];
                //echo "following";
            }else{

                self::setoutput("user_cheak_if_followers");
                $this->output_type = "name";

                $this->Result = ["not_followers"];
                //echo "not following";
            }
            self::setoutput("user_cheak_if_followers");
            $this->output_type = "name";


        }else{

            self::setoutput("user_cheak_if_followers");
            $this->output_type = "name";
            
            $this->Result = ["not_followers"];
        }

    }




    public function get_user_followers_id($data){

        self::setTabel("follow_ref");

        $user_id = $data[0];
        $this->query  = "select `followers_id` from `follow_ref` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (len($this->Result) != 0) {
            if (isset($this->Result[0][0])) {
            
                self::setoutput("get_user_followers_id");
                $this->output_type = "name";
    
                $this->Result = explode(",",$this->Result[0][0]);
    
            }else{
    
                self::setoutput("get_user_followers_id");
                $this->output_type = "name";
                
                $this->Result = ["null"];
            }
        } else {
            $this->Result = ["null"];
        }
        

        //  print_r($this->Result);
    }
    public function get_user_followers_len($data){

        self::setTabel("follow_ref");

        $user_id = $data[0];
        $this->query  = "select `followers_len` from `follow_ref` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_followers_len");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_followers_len");
            $this->output_type = "name";
            
            $this->Result = "0";
        }
        //  print_r($this->Result);
    }  



    public function add_user_following($data){

        $user_id = $data[0];
        $to = $data[1];

        self::setTabel("follow_ref");

        if(!(self::cheak_name_if_exists("follow_ref",$user_id,"user_id"))){

            echo "make new following <br>";
            $this->query  = "INSERT INTO `follow_ref`(`user_id`,`following_id`, `following_len`, `followers_len`) VALUES  ('{$user_id}','{$to}','0','0');";
            echo $this->query;
            echo "<br>";
            $this->Result = $this->INIT->sql_no_output($this->query);
            self::incremet_following($user_id);

        }else{

            echo "OLD following updata <br>";
            $this->query  ="select `following_id` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);
            //print_r($this->Result);
            
            $temp = $this->Result[0][0];
            $temp = $temp .",". $to;

            $this->query  ="update `{$this->tabel}` set `following_id` = '{$temp}' where `user_id` = '{$user_id}';";
            echo $this->query;
            echo "<br>";
            $this->Result = $this->INIT->sql_no_output($this->query);

            self::incremet_following($user_id);
        }
        


    }

    public function remove_user_following($data){

        $user_id = $data[0];
        $to = $data[1];

        self::setTabel("follow_ref");
        
        echo "remove_user_following <br>";

        self::user_cheak_if_following([$user_id,$to]);
        

        if (self::get_sql_raw()[0] == "following") {

            echo "following <br>";
            $this->Result = ["TRUE"];
            
            $this->query  ="select `following_id` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);

            $temp = $this->Result[0][0];
            $temp_a = explode(",",$temp);

            $len = len($temp);
            $temp = array_search($to,$temp_a);

            $f = array_slice($temp_a,0,$temp);
            $s = array_slice($temp_a,$temp+1,$len-1);
            $temp_a = array_merge($f,$s);

            $temp = implode(",",$temp_a);

            $this->query  = "update `{$this->tabel}` set `following_id` = '{$temp}' where `user_id` = '{$user_id}';";
            //echo $this->query;
            echo "<br>";

            $this->Result = $this->INIT->sql_no_output($this->query);

            self::deincremet_following($data);
            self::remove_user_followers($data);
 

        }elseif(self::get_sql_raw()[0] == "not_following"){
            
            echo " no following";
            $this->Result = ["FALSE"];
        }



    }

    protected function incremet_following($user_id){

        echo "incremet_following <br>";
        self::setTabel("follow_ref");
        $this->query  = "select `user_id`,`following_len` from `{$this->tabel}` where `user_id` = '{$user_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        // echo "<br>";
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length + 1 );
        // echo "<br>";
        // echo $members_length;
        // echo "<br>";
        $this->query  = "update `{$this->tabel}` set `following_len` = '{$members_length}' where `user_id` = '{$user_id}';";
        $this->INIT->sql_no_output($this->query);
    }

    protected function deincremet_following($data){

        $user_id = $data[0];
        $to = $data[1];


        echo "deincremet_following";
        self::setTabel("follow_ref");
        $this->query  = "select `user_id`,`following_len` from `{$this->tabel}` where `user_id` = '{$user_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length - 1 );

        
        $this->query  = "update `{$this->tabel}` set `following_len` = '{$members_length}' where `user_id` = '{$user_id}';";
        //echo $this->query;
        $this->INIT->sql_no_output($this->query);
        



    }


    public function add_user_followers($data){

        $user_id = $data[0];
        $to = $data[1];

        self::setTabel("follow_ref");

        if(!(self::cheak_name_if_exists("follow_ref",$to,"user_id"))){

            echo "make new followers <br>";
            $this->query  = "INSERT INTO `follow_ref`(`user_id`,`followers_id`, `followers_len`,`following_len`) VALUES  ('{$to}','{$user_id}','0','0');";
            echo $this->query;
            echo "<br>";
            $this->Result = $this->INIT->sql_no_output($this->query);

            self::incremet_followers($to);
            self::add_user_following($data);

        }else{

            echo "OLD followers updata <br>";

            $this->query  ="select `followers_id` from {$this->tabel} where `user_id` = '{$to}';";
            $this->Result = $this->INIT->sql($this->query);
            //print_r($this->Result);
            
            $temp = $this->Result[0][0];
            $temp = $temp .",". $user_id;

            $this->query  ="update `{$this->tabel}` set `followers_id` = '{$temp}' where `user_id` = '{$to}';";
            echo $this->query;
            echo "<br>";
            $this->Result = $this->INIT->sql_no_output($this->query);

            self::add_user_following($data);
            self::incremet_followers($to);
        }
        


    }

    public function remove_user_followers($data){

        $user_id = $data[0];
        $to = $data[1];

        self::setTabel("follow_ref");
        
        echo "remove_user_followers <br>";

        self::user_cheak_if_followers([$to,$user_id]);
        

        if (self::get_sql_raw()[0] == "followers") {

            echo "<br> followers <br>";
            $this->Result = ["TRUE"];
            
            $this->query  ="select `followers_id` from {$this->tabel} where `user_id` = '{$to}';";
            $this->Result = $this->INIT->sql($this->query);

            $temp = $this->Result[0][0];
            $temp_a = explode(",",$temp);

            $len = len($temp);
            $temp = array_search($user_id,$temp_a);

            $f = array_slice($temp_a,0,$temp);
            $s = array_slice($temp_a,$temp+1,$len-1);
            $temp_a = array_merge($f,$s);

            $temp = implode(",",$temp_a);

            $this->query  = "update `{$this->tabel}` set `followers_id` = '{$temp}' where `user_id` = '{$to}';";
           // echo $this->query;
            //echo "<br>";

            $this->Result = $this->INIT->sql_no_output($this->query);

            self::deincremet_followers($data);
            //self::remove_user_followers($data);
 

        }elseif(self::get_sql_raw()[0] == "not_followers"){
            
            echo " no followers";
            $this->Result = ["FALSE"];
        }



    }

    protected function incremet_followers($user_id){

        self::setTabel("follow_ref");
        $this->query  = "select `user_id`,`followers_len` from `{$this->tabel}` where `user_id` = '{$user_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        // echo "<br>";
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length + 1 );
        // echo "<br>";
        // echo $members_length;
        // echo "<br>";
        $this->query  = "update `{$this->tabel}` set `followers_len` = '{$members_length}' where `user_id` = '{$user_id}';";
        $this->INIT->sql_no_output($this->query);
    }

    protected function deincremet_followers($data){

        $user_id = $data[0];
        $to = $data[1];


        echo "deincremet_followers";
        self::setTabel("follow_ref");
        $this->query  = "select `user_id`,`followers_len` from `{$this->tabel}` where `user_id` = '{$to}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);

        $members_length = $this->Result[0][1];
        //echo $members_length;
        $members_length = (string) ( (integer) $members_length - 1 );
        //echo $members_length;

        $this->query  = "update `{$this->tabel}` set `followers_len` = '{$members_length}' where `user_id` = '{$to}';";
        //echo $this->query;
        $this->INIT->sql_no_output($this->query);
        



    }

















    protected function get_p($us){

        $temp  = "select `password` from `accounts` where `user_id` = '{$us}';";
        $temp = $this->INIT->sql($temp);

        if (isset($temp[0][0])) {


            return $temp[0][0];

        }else{

            
            return ["null"];
        }
    }
    protected function chage_name($name,$ui){


        $temp ="update `accounts` set `name` = '{$name}' where `user_id` = '{$ui}';";
        //echo  $temp;
        $temp = $this->INIT->sql_no_output($temp);
    }
    protected function chage_us_name($name,$ui){


        $temp ="update `accounts` set `us_name` = '{$name}' where `user_id` = '{$ui}';";
        //echo  $temp;
        $temp = $this->INIT->sql_no_output($temp);
    }
    protected function chage_phon_number($name,$ui){


        $temp ="update `accounts` set `phon_number` = '{$name}' where `user_id` = '{$ui}';";
        //echo  $temp;
        $temp = $this->INIT->sql_no_output($temp);
    }
    protected function chage_email($name,$ui){


        $temp ="update `accounts` set `email` = '{$name}' where `user_id` = '{$ui}';";
        //echo  $temp;
        $temp = $this->INIT->sql_no_output($temp);
    }
    protected function chage_bio($name,$ui){


        $temp ="update `accounts` set `bio` = '{$name}' where `user_id` = '{$ui}';";
        //echo  $temp;
        $temp = $this->INIT->sql_no_output($temp);
    }

    public function edit_user($data){


        self::setTabel("accounts");

        $user_new_name = $data[0];
        $user_new_us_name = $data[1];
        $user_new_email = $data[2];
        $user_new_phon_number = $data[3];
        $bio = $data[4];

        $user_old_password = $data[5];
        $user_new_password = $data[6];
        

        $user_id = $data[7];
        
        $user_new_name = self::sql_escape($user_new_name);
        $user_new_us_name = self::sql_escape($user_new_us_name);
        $user_new_email = self::sql_escape($user_new_email);
        $user_new_phon_number = self::sql_escape($user_new_phon_number);
        $bio = self::sql_escape($bio);

        $error = "";
        
        if ($user_new_name != NULL){

            self::chage_name($user_new_name,$user_id);
        }
        if ($user_new_us_name != NULL){
            if (self::cheak_name_if_exists("accounts",$user_new_us_name,"us_name","user_id") == $user_id or (self::cheak_name_if_exists("accounts",$user_new_us_name,"us_name","user_id") == "no") ) {
            
                self::chage_us_name($user_new_us_name,$user_id);
            }else{

                $error = $error.","."repet_us_name";
                // echo "repet_us_name";

            }
        }
        if ($user_new_email != NULL){
            if (self::cheak_name_if_exists("accounts",$user_new_email,"email","user_id") == $user_id or (self::cheak_name_if_exists("accounts",$user_new_email,"email","user_id") == "no") ) {
            
                self::chage_email($user_new_email,$user_id);
            }else{


                $error = $error.","."repet_email";
                // echo "repet_email";

            }
        }
        if ($user_new_phon_number != NULL){
            if (self::cheak_name_if_exists("accounts",$user_new_phon_number,"phon_number","user_id") == $user_id or (self::cheak_name_if_exists("accounts",$user_new_phon_number,"phon_number","user_id") == "no") ) {
            
                self::chage_phon_number($user_new_phon_number,$user_id);
            }else{


                $error = $error.","."repet_phon_number";
                // echo "repet_phon_number";

            }
        }

        if($bio != NULL){

            self::chage_bio($bio,$user_id);
        }
        if($user_old_password != NULL and $user_new_password != NULL){

            if (password_verify($user_old_password,self::get_p($user_id))) {

                echo self::get_p($user_id);

                $user_new_password = password_hash($user_new_password,PASSWORD_BCRYPT);
                $temp ="update `accounts` set `password` = '{$user_new_password}' where `user_id` = '{$user_id}';";
                $temp = $this->INIT->sql_no_output($temp);
            }else{

                $error = $error.","."old";
                echo "old";

            }
        }

    
        self::setoutput("error");
        $this->output_type = "name";
        $this->Result = $error;

    }







    // for group's
    public function make_group($data){


        $group_name = $data[0];
        $bio = $data[1];
        $porfile_pic = $data[2];
        $user_id = $data[3];

        $group_name = self::sql_escape($group_name);
        $bio = self::sql_escape($bio);


        $group_id = password_hash($group_name,PASSWORD_BCRYPT);

        
        if (!(self::compare_id_if_exists("group_ref",$group_name,"group_name",$group_id,"group_id"))) {

            $group_admins = [$user_id];
            $group_admins = implode(",",$group_admins);
    
            $members_length = "0";
    
            self::setTabel("group_ref");
            $this->query ="insert into `{$this->tabel}`(`group_id`,`group_name`,`group_admins`,`members_length`,`bio`,`porfile_pic`) values('{$group_id}','{$group_name}','{$group_admins}','{$members_length}','{$bio}','{$porfile_pic}');";
            $this->Result = $this->INIT->sql_no_output($this->query);

            self::setoutput("make_group");
            $this->output_type = "name";

            $this->Result = ["ok"];

            self::add_user_to_group([$user_id,$group_id]);

        }else {
            
            self::setoutput("make_group");
            $this->output_type = "name";

            $this->Result = ["repaet"];
        }
    

    }
    public function add_user_to_group($data){

        $user_id = $data[0];
        $group_id = $data[1];
        self::setTabel("user_interaction");

        if ( !(self::cheak_id_if_exists($this->tabel,$user_id,"user_id")) ) {
            
            $this->query  = "insert into `{$this->tabel}` (`user_id`) values ('{$user_id}');";
            $this->INIT->sql_no_output($this->query);
            // if
            $this->query  ="select `Groups_ids` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);

            //print_r( $this->Result);
            $temp = implode(",",$this->Result[0]);
            if (len($temp) == 0) {
                $temp = $group_id;
            }else{
                $temp = $temp.",".$group_id;
            }
            
            $this->query  ="update `{$this->tabel}` set `Groups_ids` = '{$temp}' where `user_id` = '{$user_id}';";
            //echo  $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);
            //print_r( $this->Result);
            self::incremet_members_group($group_id);
            

        }else{

            $this->query  ="select `Groups_ids` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);

            //print_r($this->Result);
            $temp = implode(",",$this->Result[0]);

            if (len($temp) == 0) {
                $temp = $group_id;
            }else{
                $temp = $temp.",".$group_id;
            }


            
            $this->query  ="update `{$this->tabel}` set `Groups_ids` = '{$temp}' where `user_id` = '{$user_id}';";
            //echo  $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);
            //print_r( $this->Result);
            self::incremet_members_group($group_id);
        }
        
        
        
       
    }
    public function incremet_members_group($group_id){

        self::setTabel("group_ref");
        $this->query  = "select `group_id`,`members_length` from `{$this->tabel}` where `group_id` = '{$group_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        // echo "<br>";
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length + 1 );
        // echo "<br>";
        // echo $members_length;
        // echo "<br>";
        $this->query  = "update `{$this->tabel}` set `members_length` = '{$members_length}' where `group_id` = '{$group_id}';";
        $this->INIT->sql_no_output($this->query);
    }


    public function get_user_groups_id($data){

        self::setTabel("user_interaction");

        $user_id = $data[0];
        $this->query  = "select `user_id`,`Groups_ids` from `user_interaction` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0][1])) {
            
            self::setoutput("get_user_groups_id");
            $this->output_type = "name";

            $this->Result = $this->Result[0][1];

        }else{

            self::setoutput("get_user_groups_id");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_groups_name($data){


        self::setTabel("user_interaction");

        $user_id = $data[0];
        $group_id = $data[1];

        //print_r($data[1]);
        

        $this->query  = "select `group_name` from `group_ref` where `group_id` = '{$group_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_groups_name");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_groups_name");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_groups_bio($data){

        self::setTabel("group_ref");

        $user_id = $data[0];
        $groups_id = $data[1];
        //print_r($data[1]);

        $this->query  = "select `bio` from `group_ref` where `group_id` = '{$groups_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_groups_bio");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_groups_bio");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_groups_porfile_pic($group_id){


        self::setTabel("group_ref");

        $this->query  = "select `porfile_pic` from `group_ref` where `group_id` = '{$group_id}';";
        $this->Result = $this->INIT->sql($this->query);

        self::setoutput("get_user_groups_porfile_pic");
        $this->output_type = "name";

        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_groups_porfile_pic");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_groups_porfile_pic");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }


    }
    public function get_groups_members_len($group_id){

        self::setTabel("group_ref");

        $this->query  = "select `members_length` from `group_ref` where `group_id` = '{$group_id}';";
        $this->Result = $this->INIT->sql($this->query);

        self::setoutput("get_groups_members_len");
        $this->output_type = "name";

        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_groups_members_len");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_groups_members_len");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
    }
    public function group_cheak_if_admin($data){

        $user_id = $data[0];
        $group_id = $data[1];

        self::setTabel("group_ref");

        $this->query  = "select `group_admins` from `group_ref` where `group_id` = '{$group_id}';";
        $this->Result = $this->INIT->sql($this->query);

        if (isset($this->Result[0][0])) {
            
            self::setoutput("group_cheak_if_admin");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];
            $temp = explode(",",$this->Result);
            $temp = array_search($user_id,$temp);
            if (is_numeric($temp)) {
               
                //echo "true";
                $this->Result = ["TRUE"];
            }else{

                //echo "flase";
                $this->Result = ["FLASE"];
            }
            

        }else{

            self::setoutput("group_cheak_if_admin");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }

    }


    public function remove_user_from_group($data){

        $user_id = $data[0];
        $main_user_id = $data[1];
        $group_id = $data[2];

        
        self::setTabel("user_interaction");

        self::setoutput("remove_user_from_group");
        $this->output_type = "name";

        
        if ($user_id == "null") {


            $user_id = $main_user_id;

            self::get_user_groups_id([$user_id]);

            $temp = $this->Result;
            
            if (is_array($temp)) {
                
                self::setoutput("remove_user_from_group");
                $this->output_type = "name";
                $this->Result = ["null"];
            }else{
    
                $temp_a = explode(",",$temp);
        
                $len = len($temp);
                $temp = array_search($group_id,$temp_a);
        
                if (is_numeric($temp)) {
                       
                    //echo "true";
                    $this->Result = ["TRUE"];
        
                    $f = array_slice($temp_a,0,$temp);
                    $s = array_slice($temp_a,$temp+1,$len-1);
                    $temp_a = array_merge($f,$s);
        
                    $temp = implode(",",$temp_a);
                    $this->query  = "update `{$this->tabel}` set `Groups_ids` = '{$temp}' where `user_id` = '{$user_id}';";
                   
                    // echo "this->query <br>";
                    // echo  $this->query;
                    // echo "<br>";
    
                    $this->Result = $this->INIT->sql_no_output($this->query);
                    self::deincremet_members_group([$user_id,$group_id]);
                    
                    
                }else{
        
                    //echo "flase";
                    $this->Result = ["FLASE"];
                }
    
            }
 
        }else{

            self::group_cheak_if_admin([$main_user_id,$group_id]);
            if ($this->Result[0] != "TRUE") {

                $this->Result = ["not_admin"];

            }else{

                self::get_user_groups_id([$user_id]);

                $temp = $this->Result;
                
                if (is_array($temp)) {
                    
                    self::setoutput("remove_user_from_group");
                    $this->output_type = "name";
                    $this->Result = ["null"];
                }else{
        
                    $temp_a = explode(",",$temp);
            
                    $len = len($temp);
                    $temp = array_search($group_id,$temp_a);
            
                    if (is_numeric($temp)) {
                        
                        //echo "true";
                        $this->Result = ["TRUE"];
            
                        $f = array_slice($temp_a,0,$temp);
                        $s = array_slice($temp_a,$temp+1,$len-1);
                        $temp_a = array_merge($f,$s);
            
                        $temp = implode(",",$temp_a);
                        $this->query  = "update `{$this->tabel}` set `Groups_ids` = '{$temp}' where `user_id` = '{$user_id}';";
                    
                        // echo "this->query <br>";
                        // echo  $this->query;
                        // echo "<br>";
        
                        $this->Result = $this->INIT->sql_no_output($this->query);
                        self::deincremet_members_group([$user_id,$group_id]);
                        
                        
                    }else{
            
                        //echo "flase";
                        $this->Result = ["FLASE"];
                    }
        
                }
        
            }

        }








        //print_r($this->Result);
 
    }
    public function deincremet_members_group($data){

        $user_id = $data[0];
        $group_id = $data[1];


        self::setTabel("group_ref");
        $this->query  = "select `group_id`,`members_length` from `{$this->tabel}` where `group_id` = '{$group_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length - 1 );
        if ($members_length == "0") {
            //echo "delet";
            //echo "<br>";
            self::remove_group([$user_id,$group_id]);
        }else {
            
            $this->query  = "update `{$this->tabel}` set `members_length` = '{$members_length}' where `group_id` = '{$group_id}';";
            //echo $this->query;
            $this->INIT->sql_no_output($this->query);
        }



    }
    public function remove_group($data){

        $user_id = $data[0];
        $group_id = $data[1];

        self::setTabel("group_ref");

        // echo "<br> remove_group";
        self::group_cheak_if_admin([$user_id,$group_id]);
        $temp = $this->Result;
        if($temp[0] == TRUE){
         

            self::get_user_groups_porfile_pic($group_id);
            $t = self::get_sql_raw();
            $t = str_replace("../DropTalk/","../",$t);
            $del = $t;
            
            $old_dir = explode("/",$del);
            array_pop($old_dir);
            $old_dir = implode("/",$old_dir);
            // echo "<br> del ".$old_dir;
            @unlink($del);
            rmdir($old_dir);
            

            $this->query  = "DELETE FROM `{$this->tabel}` WHERE `group_id` = '{$group_id}';";
            // echo "<br> del q";
            echo $this->query;
            $this->INIT->sql_no_output($this->query);

            self::setoutput("remove_groups");
            $this->output_type = "name";

            $this->Result = ['done'];
        }else {
            
            self::setoutput("remove_groups");
            $this->output_type = "name";

            $this->Result = ['not_admin'];
        }

        

    }


    public function edit_group($data){


        self::setTabel("group_ref");
       // echo $this->tabel;

        $group_name = $data[0];
        //$group_name = mysqi_real_escap_string($group_name);
        
        $bio = $data[1];
        //$porfile_pic = $data[2];
        $user_id = $data[2];
        $group_id = $data[3];


        $group_name = self::sql_escape($group_name);
        $bio = self::sql_escape($bio);
        

     

        if (!(self::cheak_name_if_exists("group_ref",$group_name,"group_name"))) {

            self::setTabel("group_ref");

                // renameing......
            self::get_user_groups_porfile_pic($group_id);
            $t = self::get_sql_raw();
            $t = str_replace("../DropTalk/","../",$t);
            $del = $t;

            $file_name = explode("/",$t);
            $file_name = $file_name[len($file_name)-1];
            //echo $file_name;

            $targetDir = "../uploads/users/groups/{$group_name}/";

            if (is_dir($targetDir) ==FALSE) {
            
                mkdir($targetDir,0,TRUE);
            }
            $tas = rename($t,"../uploads/users/groups/{$group_name}/{$file_name}");

            $targetDi = "../uploads/users/groups/{$group_name}/{$file_name}";
            $t = str_replace("../","../DropTalk/",$targetDi);

            //deleteing........

            $old_dir = explode("/",$del);
            array_pop($old_dir);
            $old_dir = implode("/",$old_dir);
            rmdir($old_dir);

        

            $this->query ="update `{$this->tabel}` set `group_name` = '{$group_name}',`bio` = '{$bio}', `porfile_pic` = '{$t}' where `group_id` = '{$group_id}';";
            //echo $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);

        }else {
            
            $this->Result = ["repaet"];
        }
    

    }

    public function search_group($data){

        $user_id = $data[0];
        $need_group_name = $data[1];

        $need_group_name = self::sql_escape($need_group_name);


        //print_r($data);
        $this->query  = "select `group_id` from `group_ref` where `group_name` regexp '{$need_group_name}';";
        //echo $this->query;
        self::setoutput("search_group");
        $this->output_type = "name";

        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);

    }

    public function cheak_user_partOF_group($data){

        $user_id = $data[0];
        $group_id = $data[1];


        self::get_user_groups_id([$user_id]);
        $temp = $this->Result;
        if (isset($temp[0])) {
            if ($temp[0] != 'null') {
                $temp = explode(",",$temp);
                $temp = in_array($group_id,$temp);
                if ($temp == 1) {
                    $this->Result = "in";
                }else{
                    $this->Result = "out";
                }
            }else{
                $this->Result = "out";
            }
        }else{
            $this->Result = "out";
        }

    }
    public function list_all_group_members($data){

        $group_id = $data[0];

        $this->query  = "select `user_id` from `user_interaction` where `Groups_ids` like '%{$group_id}%';";
        //echo "<br> <br>";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
    }










    // for channels's
    public function make_channels($data){

        self::setTabel("channels_ref");
       // echo $this->tabel;

        $channels_name = $data[0];
        //$channels_name = mysqi_real_escap_string($channels_name);
        
        $bio = $data[1];
        $porfile_pic = $data[2];
        $user_id = $data[3];

        
        $channels_name = self::sql_escape($channels_name);
        $bio = self::sql_escape($bio);


        $channels_id = password_hash($channels_name,PASSWORD_BCRYPT);

        
        if (!(self::compare_id_if_exists("channels_ref",$channels_name,"channels_name",$channels_id,"channels_id"))) {

            $channels_admins = [$user_id];
            $channels_admins = implode(",",$channels_admins);
    
            $members_length = "0";
    
            self::setTabel("channels_ref");
            $this->query ="insert into `{$this->tabel}`(`channels_id`,`channels_name`,`channels_admins`,`members_length`,`bio`,`porfile_pic`) values('{$channels_id}','{$channels_name}','{$channels_admins}','{$members_length}','{$bio}','{$porfile_pic}');";
            echo $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);

            self::add_user_to_channels([$user_id,$channels_id]);

        }else {
            
            $this->Result = ["repaet"];
        }
    

    }
    public function add_user_to_channels($data){

        $user_id = $data[0];
        $channels_id = $data[1];

       // echo "add_user_to_channels <br>";

        self::setTabel("user_interaction");

        if ( !(self::cheak_id_if_exists($this->tabel,$user_id,"user_id")) ) {
            
            $this->query  = "insert into `{$this->tabel}` (`user_id`) values ('{$user_id}');";
            $this->INIT->sql_no_output($this->query);
            // if
            $this->query  ="select `Channles_ids` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);

            //print_r( $this->Result);
            $temp = implode(",",$this->Result[0]);
            if (len($temp) == 0) {
                $temp = $channels_id;
            }else{
                $temp = $temp.",".$channels_id;
            }
            
            $this->query  ="update `{$this->tabel}` set `Channles_ids` = '{$temp}' where `user_id` = '{$user_id}';";
            //echo  $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);
            //print_r( $this->Result);
            self::incremet_members_channels($channels_id);

        }else{

            $this->query  ="select `Channles_ids` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);

            // echo "Channles_ids add_user_to_channels  <br>";
            // print_r($this->Result);
            // echo "table <br>";
            // echo $this->tabel;
            
            $temp = implode(",",$this->Result[0]);

            if (len($temp) == 0) {
                $temp = $channels_id;
            }else{
                $temp = $temp.",".$channels_id;
            }


            
            $this->query  ="update `{$this->tabel}` set `Channles_ids` = '{$temp}' where `user_id` = '{$user_id}';";
            //echo  $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);
            //print_r( $this->Result);
            self::incremet_members_channels($channels_id);
        }
        
        
        
       
    }
    public function incremet_members_channels($channels_id){

        self::setTabel("channels_ref");
        $this->query  = "select `channels_id`,`members_length` from `{$this->tabel}` where `channels_id` = '{$channels_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        // echo "<br>";
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length + 1 );
        // echo "<br>";
        // echo $members_length;
        // echo "<br>";
        $this->query  = "update `{$this->tabel}` set `members_length` = '{$members_length}' where `channels_id` = '{$channels_id}';";
        $this->INIT->sql_no_output($this->query);
    }


    public function get_user_channels_id($data){

        self::setTabel("user_interaction");

        $user_id = $data[0];
        $this->query  = "select `user_id`,`Channles_ids` from `user_interaction` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0][1])) {
            
            self::setoutput("get_user_channels_id");
            $this->output_type = "name";

            $this->Result = $this->Result[0][1];

        }else{

            self::setoutput("get_user_channels_id");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_channels_name($data){

        self::setTabel("channels_ref");

        $user_id = $data[0];
        $channels_id = $data[1];
        //print_r($data[1]);

        $this->query  = "select `channels_name` from `channels_ref` where `channels_id` = '{$channels_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_channels_name");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_channels_name");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_channels_bio($data){

        self::setTabel("channels_ref");

        $user_id = $data[0];
        $channels_id = $data[1];
        //print_r($data[1]);

        $this->query  = "select `bio` from `channels_ref` where `channels_id` = '{$channels_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_channels_bio");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_channels_bio");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_channels_porfile_pic($channel_id){


        self::setTabel("channels_ref");

        $this->query  = "select `porfile_pic` from `channels_ref` where `channels_id` = '{$channel_id}';";
        $this->Result = $this->INIT->sql($this->query);

        self::setoutput("get_user_channels_porfile_pic");
        $this->output_type = "name";


        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_channels_porfile_pic");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_channels_porfile_pic");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }

    }
    public function get_channels_members_len($channels_id){

        self::setTabel("channels_ref");

        $this->query  = "select `members_length` from `channels_ref` where `channels_id` = '{$channels_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);

        self::setoutput("get_channels_members_len");
        $this->output_type = "name";

        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_channels_members_len");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_channels_members_len");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
    }


    public function channel_cheak_if_admin($data){

        $user_id = $data[0];
        $channel_id = $data[1];

        self::setTabel("channels_ref");

        $this->query  = "select `channels_admins` from `channels_ref` where `channels_id` = '{$channel_id}';";
        $this->Result = $this->INIT->sql($this->query);

        if (isset($this->Result[0][0])) {
            
            self::setoutput("channel_cheak_if_admin");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];
            $temp = explode(",",$this->Result);
            $temp = in_array($user_id,$temp);
            if ($temp == 1) {
               
                //echo "true";
                $this->Result = ["TRUE"];
            }else{

                //echo "flase";
                $this->Result = ["FLASE"];
            }
            

        }else{

            self::setoutput("group_cheak_if_admin");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }

    }


    public function remove_user_from_channels($data){

        $user_id = $data[0];
        $main_user_id = $data[1];
        $channels_id = $data[2];



        self::setoutput("remove_user_from_channels");
        $this->output_type = "name";

        if ($user_id == "null") {

            $user_id = $main_user_id;

            
            self::setTabel("user_interaction");


    
            self::get_user_channels_id([$user_id]);
    
            $temp = $this->Result;
            
            if (is_array($temp)) {
                
                self::setoutput("remove_user_from_channels");
                $this->output_type = "name";
                $this->Result = ["null"];
            }else{
    
                $temp_a = explode(",",$temp);
        
                $len = len($temp);
                $temp = array_search($channels_id,$temp_a);
        
                if (is_numeric($temp)) {
                       
                    //echo "true";
                    $this->Result = ["TRUE"];
        
                    $f = array_slice($temp_a,0,$temp);
                    $s = array_slice($temp_a,$temp+1,$len-1);
                    $temp_a = array_merge($f,$s);
        
                    $temp = implode(",",$temp_a);
                    $this->query  = "update `{$this->tabel}` set `Channles_ids` = '{$temp}' where `user_id` = '{$user_id}';";
                    echo  $this->query;
                    $this->Result = $this->INIT->sql_no_output($this->query);
                    self::deincremet_members_channels([$user_id,$channels_id]);
                    
                    
                }else{
        
                    //echo "flase";
                    $this->Result = ["FLASE"];
                }
    
            }

        }

        self::channel_cheak_if_admin([$main_user_id,$channels_id]);
        if ($this->Result[0] != "TRUE") {
            $this->Result = ["not_admin"];
        }else{

            self::setTabel("user_interaction");


    
            self::get_user_channels_id([$user_id]);
    
            $temp = $this->Result;
            
            if (is_array($temp)) {
                
                self::setoutput("remove_user_from_channels");
                $this->output_type = "name";
                $this->Result = ["null"];
            }else{
    
                $temp_a = explode(",",$temp);
        
                $len = len($temp);
                $temp = array_search($channels_id,$temp_a);
        
                if (is_numeric($temp)) {
                       
                    //echo "true";
                    $this->Result = ["TRUE"];
        
                    $f = array_slice($temp_a,0,$temp);
                    $s = array_slice($temp_a,$temp+1,$len-1);
                    $temp_a = array_merge($f,$s);
        
                    $temp = implode(",",$temp_a);
                    $this->query  = "update `{$this->tabel}` set `Channles_ids` = '{$temp}' where `user_id` = '{$user_id}';";
                    echo  $this->query;
                    $this->Result = $this->INIT->sql_no_output($this->query);
                    self::deincremet_members_channels([$user_id,$channels_id]);
                    
                    
                }else{
        
                    //echo "flase";
                    $this->Result = ["FLASE"];
                }
    
            }
        }







        //print_r($this->Result);
 
    }
    public function deincremet_members_channels($data){

        $user_id = $data[0];
        $channels_id = $data[1];

        self::setTabel("channels_ref");
        $this->query  = "select `channels_id`,`members_length` from `{$this->tabel}` where `channels_id` = '{$channels_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        // echo "<br>";
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length - 1 );
        if ($members_length == "0") {
            //echo "delet";
            //echo "<br>";
            self::remove_channels([$user_id,$channels_id]);
        }else {
            
            $this->query  = "update `{$this->tabel}` set `members_length` = '{$members_length}' where `channels_id` = '{$channels_id}';";
            //echo $this->query;
            $this->INIT->sql_no_output($this->query);
        }
        // echo "<br>";
        // echo $members_length;
        // echo "<br>";


    }
    public function remove_channels($data){

        $user_id = $data[0];
        $channels_id = $data[1];

        self::setTabel("channels_ref");

        //echo "<br> channel_cheak_if_admin";
        self::channel_cheak_if_admin([$user_id,$channels_id]);
        $temp = $this->Result;
        if($temp[0] == TRUE){
         

            self::get_user_channels_porfile_pic($channels_id);
            $t = self::get_sql_raw();
            $t = str_replace("../DropTalk/","../",$t);
            $del = $t;

            $old_dir = explode("/",$del);
            array_pop($old_dir);
            $old_dir = implode("/",$old_dir);
            @unlink($del);
            rmdir($old_dir);

            $this->query  = "DELETE FROM `{$this->tabel}` WHERE `channels_id` = '{$channels_id}';";
            //echo "<br> <br>";
            //echo $this->query;
            $this->INIT->sql_no_output($this->query);

            self::setoutput("remove_channels");
            $this->output_type = "name";

            $this->Result = ['done'];
        }else {
            
            self::setoutput("remove_channels");
            $this->output_type = "name";

            $this->Result = ['not_admin'];
        }

        

    }


    public function edit_channels($data){

        self::setTabel("channels_ref");
       // echo $this->tabel;

        $channels_name = $data[0];
        //$channels_name = mysqi_real_escap_string($channels_name);
        
        $bio = $data[1];
        //$porfile_pic = $data[2];
        $user_id = $data[2];
        $channels_id = $data[3];

        $channels_name = self::sql_escape($channels_name);
        $bio = self::sql_escape($bio);

     

        if (!(self::cheak_name_if_exists("channels_ref",$channels_name,"channels_name"))) {

            self::setTabel("channels_ref");

                // renameing......
            self::get_user_channels_porfile_pic($channels_id);
            $t = self::get_sql_raw();
            $t = str_replace("../DropTalk/","../",$t);
            $del = $t;

            $file_name = explode("/",$t);
            $file_name = $file_name[len($file_name)-1];
            //echo $file_name;

            $targetDir = "../uploads/users/channel/{$channels_name}/";

            if (is_dir($targetDir) ==FALSE) {
            
                mkdir($targetDir,0,TRUE);
            }
            $tas = rename($t,"../uploads/users/channel/{$channels_name}/{$file_name}");

            $targetDi = "../uploads/users/channel/{$channels_name}/{$file_name}";
            $t = str_replace("../","../DropTalk/",$targetDi);

            //deleteing........

            $old_dir = explode("/",$del);
            array_pop($old_dir);
            $old_dir = implode("/",$old_dir);
            rmdir($old_dir);

        

            $this->query ="update `{$this->tabel}` set `channels_name` = '{$channels_name}',`bio` = '{$bio}', `porfile_pic` = '{$t}' where `channels_id` = '{$channels_id}';";
            //echo $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);

        }else {
            
            $this->Result = ["repaet"];
        }
    

    }


    public function search_channels($data){

        $user_id = $data[0];
        $need_channels_name = $data[1];

        $need_channels_name = self::sql_escape($need_channels_name);


        //print_r($data);
        $this->query  = "select `channels_id` from `channels_ref` where `channels_name` regexp '{$need_channels_name}';";
        //echo $this->query;
        self::setoutput("search_channels");
        $this->output_type = "name";

        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);

    }


    public function cheak_user_partOF_channel($data){

        $user_id = $data[0];
        $channel_id = $data[1];


        self::get_user_channels_id([$user_id]);
        $temp = $this->Result;
        //print_r($temp);
        if (isset($temp[0])) {
            if ($temp[0] != 'null') {
                $temp = explode(",",$temp);
                $temp = in_array($channel_id,$temp);
                if ($temp == 1) {
                    $this->Result = "in";
                }else{
                    $this->Result = "out";
                }
            }else{
                $this->Result = "out";
            }
        }else{
            $this->Result = "out";
        }


    }
    public function list_all_channel_members($data){

        $channel_id = $data[0];

        $this->query  = "select `user_id` from `user_interaction` where `Channles_ids` like '%{$channel_id}%';";
        //echo "<br> <br>";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
    }

    







    // for communitie's
    public function make_communitie($data){

        self::setTabel("communities_ref");
       // echo $this->tabel;

        $communitie_name = $data[0];
        $bio = $data[1];
        $porfile_pic = $data[2];
        $user_id = $data[3];

        
        $communitie_name = self::sql_escape($communitie_name);
        $bio = self::sql_escape($bio);

        $communitie_id = password_hash($communitie_name,PASSWORD_BCRYPT);

        
        if (!(self::compare_id_if_exists("communities_ref",$communitie_name,"communitie_name",$communitie_id,"communitie_id"))) {

            $communitie_admins = [$user_id];
            $communitie_admins = implode(",",$communitie_admins);
    
            $members_length = "0";
    
            self::setTabel("communities_ref");
            $this->query ="insert into `{$this->tabel}`(`communitie_id`,`communitie_name`,`communitie_admins`,`members_length`,`bio`,`porfile_pic`) values('{$communitie_id}','{$communitie_name}','{$communitie_admins}','{$members_length}','{$bio}','{$porfile_pic}');";
            $this->Result = $this->INIT->sql_no_output($this->query);

            self::add_user_to_communitie($user_id,$communitie_id);

        }else {
            
            $this->Result = ["repaet"];
        }
    

    }
    public function add_user_to_communitie($user_id,$communitie_id){

        //echo "add_user_to_channels <br>";

        self::setTabel("user_interaction");

        if ( !(self::cheak_id_if_exists($this->tabel,$user_id,"user_id")) ) {
            
            $this->query  = "insert into `{$this->tabel}` (`user_id`) values ('{$user_id}');";
            $this->INIT->sql_no_output($this->query);
            // if
            $this->query  ="select `Communities_ids` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);

            //print_r( $this->Result);
            $temp = implode(",",$this->Result[0]);
            if (len($temp) == 0) {
                $temp = $communitie_id;
            }else{
                $temp = $temp.",".$communitie_id;
            }
            
            $this->query  ="update `{$this->tabel}` set `Communities_ids` = '{$temp}' where `user_id` = '{$user_id}';";
            //echo  $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);
            //print_r( $this->Result);
            

        }else{

            $this->query  ="select `Communities_ids` from {$this->tabel} where `user_id` = '{$user_id}';";
            $this->Result = $this->INIT->sql($this->query);

            // echo "Communities_ids add_user_to_channels  <br>";
            // print_r($this->Result);
            // echo "table <br>";
            // echo $this->tabel;
            
            $temp = implode(",",$this->Result[0]);

            if (len($temp) == 0) {
                $temp = $communitie_id;
            }else{
                $temp = $temp.",".$communitie_id;
            }


            
            $this->query  ="update `{$this->tabel}` set `Communities_ids` = '{$temp}' where `user_id` = '{$user_id}';";
            //echo  $this->query;
            $this->Result = $this->INIT->sql_no_output($this->query);
            //print_r( $this->Result);
            self::incremet_members_communitie($communitie_id);
        }
        
        
        
       
    }
    public function incremet_members_communitie($communitie_id){

        self::setTabel("communities_ref");
        $this->query  = "select `communitie_id`,`members_length` from `{$this->tabel}` where `communitie_id` = '{$communitie_id}';";
        $this->Result = $this->INIT->sql($this->query);

        // print_r($this->Result);
        // echo "<br>";
        $members_length = $this->Result[0][1];
        $members_length = (string) ( (integer) $members_length + 1 );
        // echo "<br>";
        // echo $members_length;
        // echo "<br>";
        $this->query  = "update `{$this->tabel}` set `members_length` = '{$members_length}' where `communitie_id` = '{$communitie_id}';";
        $this->INIT->sql_no_output($this->query);
    }

    public function get_user_communitie_id($data){

        self::setTabel("user_interaction");

        $user_id = $data[0];
        $this->query  = "select `user_id`,`Communities_ids` from `user_interaction` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0][1])) {
            
            self::setoutput("get_user_communitie_id");
            $this->output_type = "name";

            $this->Result = $this->Result[0][1];

        }else{

            self::setoutput("get_user_communitie_id");
            $this->output_type = "name";

            $this->Result = ["null"];
        }
        
        //  print_r($this->Result);
    }
    public function get_user_communitie_name($data){

        self::setTabel("user_interaction");

        $user_id = $data[0];
        $communitie_id = $data[1];
        //print_r($data[1]);

        $this->query  = "select `communitie_name` from `communities_ref` where `communitie_id` = '{$communitie_id}';";
        //echo $this->query;
        $this->Result = $this->INIT->sql($this->query);
        //print_r($this->Result);
        if (isset($this->Result[0][0])) {
            
            self::setoutput("get_user_communitie_name");
            $this->output_type = "name";

            $this->Result = $this->Result[0][0];

        }else{

            self::setoutput("get_user_communitie_name");
            $this->output_type = "name";

            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }







    //chat
    public function get_user_chat_id($data){

        self::setTabel("user_interaction");

        $user_id = $data[0];

        $this->query  = "select `user_id`,`Chats_ids` from `user_interaction` where `user_id` = '{$user_id }';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0][1])) {
            
            self::setoutput("get_user_chat_id");
            $this->output_type = "name";

            $this->Result = $this->Result[0][1];

        }else{

            self::setoutput("get_user_chat_id");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_user_id_chat($data){

        self::setTabel("chat_ref");

        $chats_id = $data[0];

        $this->query  = "select `user_id` from `chat_ref` where `chat_id` = '{$chats_id}';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0])) {
            
            self::setoutput("get_user_id_chat");
            $this->output_type = "name";

            $this->Result = $this->Result[0];

        }else{

            self::setoutput("get_user_id_chat");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function get_sec_user_id_chat($data){

        self::setTabel("chat_ref");

        $chats_id = $data[0];

        $this->query  = "select `sec_user_id` from `chat_ref` where `chat_id` = '{$chats_id}';";
        $this->Result = $this->INIT->sql($this->query);
        if (isset($this->Result[0])) {
            
            self::setoutput("get_sec_user_id_chat");
            $this->output_type = "name";

            $this->Result = $this->Result[0];

        }else{

            self::setoutput("get_sec_user_id_chat");
            $this->output_type = "name";
            
            $this->Result = ["null"];
        }
        //  print_r($this->Result);
    }
    public function choose_dispaly_chat($data){

        $user_id = $data[0];
        $chats_id = $data[1];

        self::get_user_id_chat([$chats_id]);
        $get_user_id_chat = self::get_sql_raw()[0];

        self::get_sec_user_id_chat([$chats_id]);
        $get_sec_user_id_chat = self::get_sql_raw()[0];

        self::setoutput("choose_dispaly_chat");
        $this->output_type = "name";

        if ($get_user_id_chat == $user_id) {
            $this->Result = $get_sec_user_id_chat;
        }elseif($get_sec_user_id_chat == $user_id){
            $this->Result = $get_user_id_chat;
        }

    }





    //commen function's for group,channels,communitie
    public function compare_id_if_exists($table,$name,$name_name,$id,$id_name){

        $temp = "select {$id_name},{$name_name} from {$table} where {$name_name}= '{$name}';";
        $temp =  $this->INIT->sql($temp);
        if (isset($temp[0][0])) {
            
            if (password_verify($name,$temp[0][0])) {

                return TRUE;
            }else {
                return FALSE;
            }
        }else{

            return FALSE;
        }

        
        

    }
    public function cheak_id_if_exists($table,$id,$id_name){

        $temp = "select {$id_name} from {$table} where {$id_name}= '{$id}';";
        $temp =  $this->INIT->sql($temp);
        //print_r($temp[0][0]);
        if ( isset($temp[0][0])) {

            return TRUE;

        }else {
            return FALSE;
        }
        
    }
    public function cheak_name_if_exists($table,$name,$name_name,$id = NULL){

        if ($id == NULL) {
            
            $temp = "select `{$name_name}` from `{$table}` where `{$name_name}` = '{$name}';";
            //echo $temp;
            $this->Result =  $this->INIT->sql($temp);
            //print_r(len($this->Result));
            if (len($this->Result) != 0) {
                if ( isset($this->Result[0][0])) {
    
                    self::setoutput("cheak_name_if_exists");
                    $this->output_type = "name";
        
                    $this->Result = [TRUE];
        
                    return TRUE;
        
                }else {
        
                    self::setoutput("cheak_name_if_exists");
                    $this->output_type = "name";
        
                    $this->Result = [FALSE];
        
                    return FALSE;
                }
            }else{
                self::setoutput("cheak_name_if_exists");
                $this->output_type = "name";
    
                $this->Result = [FALSE];
    
                return FALSE;
            }

            
        } else {
            
            $temp = "select `{$id}` from {$table} where {$name_name}= '{$name}';";
            $this->Result =  $this->INIT->sql($temp);
            //print_r($temp[0][0]);
            if ( isset($this->Result[0][0])) {
    
                self::setoutput("cheak_name_if_exists");
                $this->output_type = "name";
    
                return $this->Result[0][0];
                $this->Result = [TRUE];
    
            }else {
    
                self::setoutput("cheak_name_if_exists");
                $this->output_type = "name";
    
                $this->Result = [FALSE];
    
                return "no";
            }
            
        }
        

    }
    public function sql_escape($text){

        self::setoutput("search_user");
        $this->output_type = "name";

        $this->Result = mysqli_real_escape_string($this->SQL,$text);
        return $this->Result;
    }

    

}


class k_api{

    public function __construct(){
       
        if (isset($_POST)) {
            if (isset($_POST["type"])) {
                if($_POST["type"] == "api"){
                
                    // if($_POST["totcen"] != "qawsed123"){
        
                    //     echo "totcen error";
                    //     die();
                    // }
                    // else{
        
                        $main = new dt("localhost","pain","pain","droptalk_tast_1");
                        $main->setTabel($_POST['tabel']);
                        //print_r( ( implode(",",$_POST['arrg']) ));
                       // $main->$_POST['function']( implode(",",$_POST['arrg']) );
                        $main->$_POST['function']($_POST['arrg']);
                        echo $main->sql_to_json();
                    // }
                    }
            }

        }

    }
}

new k_api();



?>