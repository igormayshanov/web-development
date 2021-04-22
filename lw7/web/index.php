<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__ . '/common.inc.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        saveFeedbackPage();
    }
    else
    {
        mainPage();
    }
?>