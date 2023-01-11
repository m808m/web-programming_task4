<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){         //isset($_POST['submit'])
        $imgbook = $_POST['imgbook'];
        $namebook = $_POST["namebook"];
        $pricebook = $_POST["pricebook"];
        $descbook = $_POST["descbook"];

        $xml = simplexml_load_file("data.xml");

        // последний эл-т
        $lastEl = $xml->book[$xml->count() - 1];
    
        // создаем корневой тег book
        $newbook = $xml->addChild('book', '');
        $newbook->addChild('name', $namebook);
        $newbook->addChild('price', $pricebook);
        $newbook->addChild('img', $imgbook);
        $newbook->addChild('desc', $descbook);
    
        // добавляем атрибут на один больше, чем у последнего
        $id = $lastEl['id']+1;
        $newbook->addAttribute('id', $id);
    
        $xml->saveXML("data.xml");
        header("Location: item.php?id=" . $id);
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Создание товара</title>
</head>
<body>
    <h2>Создание товара</h2>
    <div class="new__form">
        <form action="" method="POST">

            <input type="text" size="35" name="imgbook" placeholder="url картинки">
            <br>
            <input type="text" size="35" name="namebook" required placeholder="название">
            <br>
            <textarea class="update__desc" type="text"  name="descbook" placeholder="описание"></textarea>
            <br>
            <input type="number" min="0" name="pricebook" required placeholder="цена">
            <br>
            <button class="submit" type="submit" name="submit">Создать</button>

            <a class="new" href="index.php">Назад</a>
        </form>
    </div>
</body>
</html>