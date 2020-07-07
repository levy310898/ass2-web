<?php 

    function getImgLink($dir,$fileName,$fileTmpName,$fileError,$request){
        #this function will return a link , a default link if you don't put img or error mes
        #and the link return will in dir input
        // $file = $_POST['input_img'];
        // $fileName = $file['name'];
        if($fileName == ""){
            if($request == "add"){
                return [true,$dir."default.jpg"];
            }
            if($request == "update"){
                return [true,""];
            }
            
        }
        // $fileTmpName = $file['tmp_name'];
        // $fileError = $file['error'];

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        # type of file is allow
        $allowedFile = array('jpg','jepg','png');
        if(in_array($fileActualExt,$allowedFile)){
            if($fileError === 0){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = $dir.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                return [true,$fileDestination];
            }else{
                return [false,"there was a error"];
            }
        }else{
            return [false,"you cannot upload this file"];
        }
    }

?>