<?php

function validate_input_text($textValue){
    if(!empty($textValue)){
        $trim_text = trim($textValue); //remove semua whitespace
        //remove illegal char
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return '';
}

function validate_input_email($emailValue){
    if(!empty($emailValue)){
        $trim_text = trim($emailValue); //remove semua whitespace
        //remove illegal char
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
        return $sanitize_str;
    }
    return '';
}

//profile Image
function upload_profile($path, $file){
    $targetDir = $path;
    $default = "avatar_fix.jpg";

    //get the filename
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;

    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if(!empty($filename)){
        //allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif');
        if(in_array($fileType, $allowType)){
            //upload file to server
            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

    //return default image
    return $path . $default;
}

//dapetin user info
function get_user_info($con, $userID){
    $query = "SELECT userName, email, profileImage FROM usertb WHERE userID=?";
    $q = mysqli_stmt_init($con);

    mysqli_stmt_prepare($q, $query);

    //bind the statement
    mysqli_stmt_bind_param($q, 'i', $userID);

    //execute sql statement
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result);

    //return empty($row)? false:$row;
    if(empty($row)){
        return false;
    }
    else{
        return $row;
    }
}