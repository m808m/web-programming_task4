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
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $xml = simplexml_load_file("data.xml");
        $id  = $_POST['id'];
        foreach($xml->book as $book){
            if ($book['id']==$id){
                $book->name = $_POST['namebook'];
                $book->price = $_POST['pricebook'];
                $book->img = $_POST['imgbook'];
                $book->desc = $_POST['descbook'];
                break;
            }
        }

        $xml->saveXML("data.xml");
        header("Location: item.php?id=" . $_GET['id']);
     /*   echo "<script>
        alert('Данные успешно обновлены!');
        location.href = 'item.php?id=<?php echo $id ?>';
        </script>";
        */
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Изменение товара</title>
</head>
<body>
    <h2>Изменение товара</h2>
    <div class="new__form">
        <form action="" method="POST">
            url картинки <input type="text" size="35" name="imgbook" value="<?php echo $img?>">
            <br>
            название <input type="text" size="35" name="namebook"  value="<?php echo $name?>">
            <br>
            описание <textarea class="update__desc" type="text"  name="descbook"  > <?php echo $desc;?> </textarea>
            <br>
            цена <input type="number" min="0" name="pricebook"  value="<?php echo $price?>">
            <br>
            <button class="submit" type="submit" name="submit">Изменить</button>
            <input type="hidden" name="id" value="<?php echo $id?>">

            
            <a class="new" href="item.php?id=<?php echo $id?>">Назад</a>
        </form>
    </div>

</body>
</html>