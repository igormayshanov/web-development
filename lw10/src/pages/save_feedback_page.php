<?php

function saveFeedbackPage()

{
    $form = getForm();
    //debug($form);
    //debug($GLOBALS['errors']);
    if (empty($GLOBALS['errors'])) {
        saveToFile($form['fields']);
        $form = [];
        $form["send"] = "Ваше сообщение успешно отправлено";
    } else {
        $form["errors"] = $GLOBALS["errors"];
    }
    unset($form['fields']);
    header('Content-type: application/json');
    echo json_encode($form, JSON_UNESCAPED_UNICODE);
    //renderTemplate("main.tpl.php", $form);
}

function saveToFile($data)
{
    $file = '../data/' . $data['email'] . '.txt';
    $content = implode(';', $data);
    file_put_contents($file, $content);
}

function validateForm($value, $field_name, $required, $pattern)
{
    if ($required == "1" && empty($value)) {
        $GLOBALS['errors'][$field_name] .= 'Поле ' . $field_name . ' не заполнено';
        return;
    }
    $value = trim($value); //Удаляет пробелы (или другие символы) из начала и конца строки
    $value = stripslashes($value); //stripslashes
    $value = strip_tags($value); //Удаляет теги HTML и PHP из строки
    $value = htmlspecialchars($value); //Преобразует специальные символы в HTML-сущности
    if ($pattern != "0") {
        if (!empty($value) && !preg_match($pattern, $value, $matches)) {
            $GLOBALS['errors'][$field_name] .= 'Значение в поле ' . $field_name . ' не соответствует шаблону';
        }
    }
    return $value;
}

function getForm(): array
{
    $name = validateForm(getPostParameter('name'), "name", "1", "/^[ A-ZА-ЯЁ]+\z/iu");
    $email = validateForm(getPostParameter('email'), "email", "1", "/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,6}\z/i");
    $country = getPostParameter('country');
    $gender = getPostParameter('gender');
    $message = validateForm(getPostParameter('message'), "message", "1", "0");

    $form = [
        'fields' =>
        [
            'name' => $name,
            'email' => $email,
            'country' => $country,
            'gender' => $gender,
            'message' => $message,
        ],
        'send' => false,
    ];
    return $form;
}

function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}