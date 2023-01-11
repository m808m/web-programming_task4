<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $xml = simplexml_load_file("data.xml");
        $id  = $_GET['id'];

        foreach($xml->book as $book){
            if ($book['id']==$id){
                $name = $book->name;
                $img = $book->img;
                $price = $book->price;
                $desc = $book->desc;
                break;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>О товаре</title>
</head>
<body>
        <div class="item">
            <img class="item__image" src="<?php echo $img ?>" alt="">
            <div class="item__name"><?php echo $name ?></div>
            <div class="item__price">Цена <?php echo $price ?></div>
            <div class="item__dec"><?php echo $desc ?></div>
            <a class="item_but" href="update.php?id=<?php echo $book["id"]?>">Изменить</a>
            <a class="item_but" href="delete.php?id=<?php echo $book["id"]?>">Удалить</a>
        </div>

        <a class="new back" href="index.php">Список всех товаров</a>
</body>
</html>