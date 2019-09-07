<?php

    if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_FILES['file']['name'])){
        $x = 0;
        $threshold = count($_FILES['file']['name']);
        for($x = 0; $x < $threshold; $x++){
            $filename = $_FILES['file']['name'][$x];
            if(strpos($filename,'.php') == true) // If file is a php
            {
                continue;
            }
            else{
                $dir='uploads/'.$filename;
                if(file_exists($dir) == true) // To check if the file exist
                {
                    $filename = uniqid().$filename; //if file exist..we rename so that it cannot replace existing file.
                };
                move_uploaded_file($_FILES['file']['tmp_name'][$x],'uploads/'.$filename) or die("Problem Uploading File");

            };
        };
        
    };

?>
