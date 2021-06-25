<!-- в случае неправильных данных должен рендериться шаблон main с информацией об ошибках, в случае правильных 
данных, данные должны сохраняться и должен рендериться шаблон main с 
информацией о том что данные сохранены  -->

<!DOCTYPE html>
<html lang="ru">

<head>
  <title>Напиши мне</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" type="text/css" href="../../web/css/style.css" />
</head>

<body>
  <form class="form" method="post">
    <h2 class="form__title">
      НАПИШИ МНЕ
    </h2>
    <div class="form__column">
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake">
          Ваше имя
        </h3>
        <?php if (isset($args["errors"]["name"])) : ?>
          <label class="form__errors"><?php echo $args["errors"]["name"]; ?></label>
        <?php endif; ?>
        <input class="form__field" type="text" name="name" placeholder=" " required value=" <?php echo $args["fields"]["name"] ?? ""; ?>" />
      </div>
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake">
          Ваш email
        </h3>
        <?php if (isset($args["errors"]["email"])) : ?>
          <label class="form__errors"><?php echo $args["errors"]["email"]; ?></label>
        <?php endif; ?>
        <input class="form__field" type="email" name="email" placeholder="" required value="<?php echo $args["fields"]["email"] ?? ""; ?>" />
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
        <input class="form__gender-item" type="radio" id="genderMale" name="gender" value="male" />
        <label class="form__gender-item-text" for="genderMale">Мужской</label>
        <input class="form__gender-item" type="radio" id="genderFemale" name="gender" value="female" />
        <label class="form__gender-item-text" for="genderFemale">Женский</label>
      </div>
      <div class="form__item">
        <h3 class="form__subtitle form__subtitle_snowflake form__subtitle_message">
          Ваше сообщение
        </h3>
        <?php if (isset($args["errors"]["message"])) : ?>
          <label class="form__errors"><?php echo $args["errors"]["message"]; ?></label>
        <?php endif; ?>
        <textarea class="form__field form__message" name="message" id="" cols="30" rows="10"><?php echo $args["fields"]["message"] ?? ""; ?></textarea>
      </div>
      <div class="form__button">
        <input class="form__button_submit button" type="submit" value="Отправить" />
        <?php if (isset($args["sent"])) : ?>
          <p class="form__feedback"><?php echo $args["sent"]; ?></p>
        <?php endif; ?>
      </div>
  </form>
</body>