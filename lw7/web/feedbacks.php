<?php
require_once("../src/common.inc.php");  
(strtolower(getRequestMethod()) ===  'post') ? feedbackListPage() : renderTemplate('feedbacks.tpl.php');
