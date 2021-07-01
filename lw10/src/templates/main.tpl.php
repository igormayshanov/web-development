<!DOCTYPE html>
<html lang="ru">

<head>
  <title>Напиши мне</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <script src="js/main.js" defer></script>
  <link rel="stylesheet" type="text/css" href="../../web/css/style.css" />
</head>

<body>
  <form method="post" id="form" class="form__body" name="form" action="#">
    <h2 class="form__title">
      НАПИШИ МНЕ
    </h2>
    <div class="form__column">
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake">
          Ваше имя
        </h3>
        <input class="form__field _required" type="text" id="name" name="name" placeholder=" " value="<?php echo $args["fields"]["name"] ?? ""; ?>" />
        <span id="nameError" class="form__error"></span>
      </div>
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake">
          Ваш email
        </h3>
        <input class="form__field _required" type="email" id="email" name="email" placeholder="" value="<?php echo $args["fields"]["email"] ?? ""; ?>" />
        <span id="emailError" class="form__error"></span>
      </div>
      <div class="form__item">
        <h3 class="form__subtitle">
          Откуда вы?
        </h3>
        <select class="form__field form__country" name="country">
          <option class="form__country-item" value="Russia">Россия</option>
          <option class="form__country-item" value="USA">США</option>
        </select>
      </div>
      <div class="form__field form__field_gender">
        <h3 class="form__subtitle">
          Ваш пол
        </h3>
        <input class="form__gender-item" type="radio" id="genderMale" checked name="gender" value="male" />
        <label class="form__gender-item-text" for="genderMale">Мужской</label>
        <input class="form__gender-item" type="radio" id="genderFemale" name="gender" value="female" />
        <label class="form__gender-item-text" for="genderFemale">Женский</label>
      </div>
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake form__subtitle_message">
          Ваше сообщение
        </h3>
        <textarea class="form__field form__message _required" id="message" name="message"></textarea>
        <span id="messageError" class="form__error"></span>
      </div>
      <div class="form__submit">
        <div class="form__button">
          <input class="form__button_submit button" type="submit" value="Отправить" />
        </div>
        <div class="form__sendOk" id="sendOk">
          <img src="images/sendOk.png" alt="Ok" class="form__sendOk_img">
          <p class="form__sendOk_msg">Ваше сообщение успешно отправлено</p>
        </div>
      </div>

  </form>
</body>