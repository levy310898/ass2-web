<?php 
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
?>