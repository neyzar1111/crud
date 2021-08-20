<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Goodcard - track your collection of Pokémon cards</h1>
<form method="post">
    <label for="selectBook">Choose a book to change:</label>
    <select id="selectBook" name="selectBook">
        <?php foreach ($cards as $card) : ?>
            <option value="<?= $card['book_name'] ?>"><?= $card['book_name'] ?></option>
        <?php endforeach; ?>
    </select>
    <label for="bookName">Enter your version:</label>
    <input id='bookName' type="text" placeholder="enter your book" name="bookName">
    <button type="submit" name="submitChanges">Change</button>
</form>
<ul>



    <?php foreach ($cards as $card) : ?>
        <li><?= $card['book_name'] ?></li>
    <?php endforeach; ?>
</ul>





</body>
</html>