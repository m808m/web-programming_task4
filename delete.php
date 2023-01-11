<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET'){$id = $_GET['id'];}
    
    else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];

        $xml = simplexml_load_file("data.xml");
        // счетчик
        $i = 0;

        // перебираем книги
        foreach($xml->book as $book){
            if ($book['id'] == $id){
                // удаляем эл-т по счетчику i
                unset($xml->book[$i]);
                break;
            }

            $i++;
        }

        $xml->saveXML("data.xml");
        echo "<script>
        location.href = 'index.php';
        </script>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Удаление</title>
</head>
<body>
    <h2>Удалить товар?</h2>
    <form action="" method="POST">
        <button class="submit" type="submit" name="submit">Удалить</button>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <a class="new" href="item.php?id=<?php echo $id?>">Назад</a>
    </form>
</body>
</html>
