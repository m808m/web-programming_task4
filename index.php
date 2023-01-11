<?php
    $xml = simplexml_load_file("data.xml");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Главная страница</title>
</head>
<body>
    <h1>Книжный магазин</h1>

    <hr>

    <h2>Товары</h2>

    <div class="books">
        <?php foreach($xml->book as $book){ ?>

        <div class="book">
            <img src="<?php echo $book->img ?>" alt="">
            <div class="book__name"><?php echo $book->name ?></div>
            <div class="book__price">Цена <?php echo $book->price ?></div>
            <a href="item.php?id=<?php echo $book["id"]?>">Подробнее</a>
        </div>

        <?php } ?>
    </div>

    <a class="new" href="create.php">Добавить новый товар</a>
    
</body>
</html>