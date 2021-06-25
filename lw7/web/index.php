<?php
require_once("../src/common.inc.php");
(strtolower(getRequestMethod()) ===  'post') ? saveFeedbackPage() : mainPage();