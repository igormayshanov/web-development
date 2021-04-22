<?php

?>


<!DOCTYPE html>
<html lang="ru">

<head>
  <title>About me</title>
  <meta charset="utf-8">
  <meta name="description" content="About me">
  <link rel="stylesheet" type="text/css" href="../../web/css/style.css" />
</head>

<body>
  <form class="form" method="POST" action="">
    <h2 class="form__title">
      НАПИШИ МНЕ
    </h2>
    <div class="form__column">
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake">
          Ваше имя
        </h3>
        <input class="form__field" type="text" name="first-name" placeholder=" " />
      </div>
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake">
          Ваш email
        </h3>
        <input class="form__field" type="email" name="email" placeholder="" />
      </div>
      <div class="form__item">
        <h3 class="form__subtitle">
          Откуда вы?
        </h3>
        <select class="form__field form__country">
          <option class="form__country-item" value="Russia">Россия</option>
          <option class="form__country-item" value="USA">США</option>
        </select>
      </div>
      <div class="form__field form__field_gender">
        <h3 class="form__subtitle">
          Ваш пол
        </h3>
        <input class="form__gender-item" type="radio" id="genderMale" name="gender" value="male" />
        <label class="form__gender-item-text" for="genderMale">Мужской</label>
        <input class="form__gender-item" type="radio" id="genderFemale" name="gender" value="female" />
        <label class="form__gender-item-text" for="genderFemale">Женский</label>
      </div>
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake form__subtitle_message">
          Ваше сообщение
        </h3>
        <textarea class="form__field form__message" name="Message" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="form__button">
        <input class="form__button_submit button" type="submit" value="Отправить" />
      </div>
  </form>
</body>