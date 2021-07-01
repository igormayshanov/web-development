<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Отзывы</title>
    <meta charset="utf-8">
    <meta name="description" content="Feedbacks">
    <link rel="stylesheet" type="text/css" href="../../web/css/style.css" />
</head>

<body>
    <form class="form__body" method="post">
        <h2 class="form__title">
            Показать ответы
        </h2>
        <div class="form__column">
            <div class="form__item">
                <h3 class="form__subtitle form__subtitle_snowflake">
                    Введите email пользователя
                </h3>
                <input class="form__field" type="email" name="email" placeholder="" required />
            </div>
            <div class="form__button">
                <input class="form__button_submit button" type="submit" value="Отправить" />
            </div>
    </form>
    <div class="feedbacks-list">
        <?php if (isset($args["answer"])) : ?>
            <p class="feedbacks-list__row">Имя: <?php echo $args["answer"][0]; ?></p>
            <p class="feedbacks-list__row">Email: <?php echo $args["answer"][1]; ?></p>
            <p class="feedbacks-list__row">Страна: <?php echo $args["answer"][2]; ?></p>
            <p class="feedbacks-list__row">Пол: <?php echo $args["answer"][3]; ?></p>
            <p class="feedbacks-list__row">Сообщение: <?php echo $args["answer"][4]; ?></p>
        <?php endif; ?>
        <?php if (isset($args["error"])) : ?>
            <div class="feedbacks-list__row"><?php echo $args["error"]; ?></div>
        <?php endif; ?>
    </div>
</body>