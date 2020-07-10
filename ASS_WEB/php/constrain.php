<?php 
    require_once('db.php');

    function isNone($text){
        if(trim($text) ==""){
            return true;
        }else{
            return false;
        }
    }

    function isNumber($text){
        if(is_numeric($text)){
            return $text;
        }else{
            return false;
        }
    }

    function checkText($lst_text){
        foreach($lst_text as $text){
            if(isNone($text)){
                return false;
            }
        }
        return true;
    }

    function checkNumber($lst_number){
        foreach($lst_number as $num){
            if(isNumber($num)== false){
                return false;
            }
        }
        return true;
    }

    function isValid($lst_text,$lst_number){
        if(checkText($lst_text)==false){
            return false;
        }

        if(checkNumber($lst_number) == false){
            return false;
        }

        return true;
    }
// check if pass 1 === pass 2
    function isValidPassword($pass_1,$pass_2){
        if($pass_1 === $pass_2){
            return true;
        }else{
            return false;
        }
    }

    function checkUserInput($name,$email,$pass_1,$pass_2){
        if(!checkText([$name,$email,$pass_1,$pass_2])){
            return [false,"Bạn chưa nhập đầy đủ thông tin"];
        }

        if(!isValidEmail($email)){
            return [false,"email không hợp lệ"];
        }

        if(!isUsedEmail($email)){
            return [false,"email đã được sử dụng"];
        }

        if(isValidPassword($pass_1,$pass_2) == false){
            return [false,"Bạn đã nhập 2 password khác nhau"];
        }

        return [true];

    }

    function isUsedEmail($email){
        global $conn;
        $queryByEmail = "select * from user where email = '$email'";
        $result = mysqli_query($conn, $queryByEmail);
        if (mysqli_num_rows($result) > 0){
            return false;
        }

        return true;
    }

    function isValidEmail($email){
        $regex = '/.+@.+\..+/';
        if(!preg_match($regex, $email)){
            return false;
        }
        return true;
    }
?>