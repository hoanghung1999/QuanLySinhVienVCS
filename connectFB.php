<?php
    require_once 'vendor/autoload.php';
    if(!session_id()){
        session_start();
    }
    $facebook= new \Facebook\Facebook([
        'app_id'=>'1057874177987021',
        'app_secret'=>'66de472d96463bb5a4a4628dbe3714db',
        'default_graph_version'=>'v2.5',
    ]);
?>