<?php

// mandatory configs to secure cookies
ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    'lifetime' => 1800, //cookie expiry time (30 min)
    "domain" => "localhost",
    "path" => '/',
    "secure" => true,
    "httponly" => true
]);

// check cookie for lifetime and regenerate the cookie

session_start();

if (isset($_SESSION["providerId"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        loggedInRegenerateSession();
    } else {
        $interval = 60 * 30; //30 min
        // if interval exceeds 30 min, reset
        if (time() - $_SESSION["last_regeneration"] >= $interval && $_SESSION["last_regeneration"]) {
            loggedInRegenerateSession();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerateSession();
    } else {
        $interval = 60 * 30; //30 min
        // if interval exceeds 30 min, reset
        if (time() - $_SESSION["last_regeneration"] >= $interval && $_SESSION["last_regeneration"]) {
            regenerateSession();
        }
    }
}


function regenerateSession() // reset session after 30 min
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] =  time();
}

function loggedInRegenerateSession() // login session
{
    session_regenerate_id(true);
    $newSessionId = session_create_id();
    $concatSessionId = $newSessionId . "_" . $_SESSION["providerId"];
    session_id($concatSessionId);

    $_SESSION["last_regeneration"] =  time();
}
