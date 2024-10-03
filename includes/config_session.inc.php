<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
    ]);

session_start();

    if (isset($_SESSION["user_id"])) {
        if (!isset($_SESSION["last_regeneration"])) {
            session_regenerate_id_loggedin();
        } else {
            $interval = 60 * 30;
            if (time() - $_SESSION["last_regeneration"] >= $interval) {
                session_regenerate_id_loggedin();
            }
        } 
    } else {
       if (!isset($_SESSION["last_regeneration"])) {
        session_regenerate_id();
        } else {
            $interval = 60 * 30;
            if (time() - $_SESSION["last_regeneration"] >= $interval) {
                session_regenerate_id();
            }
        }
    }
   

    // He used function here not repeat codes
    function regenerate_session_id_loggedin() 
    {
        session_regenerate_id(true);

        $userId = $_SESSION["user_id"];
        $newsessionId = session_create_id();
        $sessionId = $newsessionId . "_" .  $userId;
        session_id($sessionId);    

        $_SESSION["last_regeneration"] = time();
    }

    function regenerate_session_id() 
    {
        session_regenerate_id(true);
        $_SESSION["last_regeneration"] = time();
    }