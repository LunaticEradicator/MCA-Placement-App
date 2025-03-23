<?php
session_start();

if (!isset($_SESSION["last_regeneration"])) {
    $_SESSION["last_regeneration"] = time();
} elseif (time() - $_SESSION["last_regeneration"] > 1800) {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}
