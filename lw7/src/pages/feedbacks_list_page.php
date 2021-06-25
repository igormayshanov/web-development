<?php
    function feedbackListPage(): void 
    {
        $email = validateForm(getPostParameter('email'), "email", "1", "/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,6}\z/i");
        $message = [];
        $file = '../data/' . $email . '.txt';
        if (file_exists($file) && !empty($email)) 
        {
            $message["answer"] = file_get_contents($file);
            $message["answer"] = explode(';',$message["answer"]); //Разбивает строку с помощью разделителя ';'
        } 
        else 
        {
            $message["error"] = "Нет данных";
        }  
        renderTemplate("feedbacks.tpl.php", $message);
    }