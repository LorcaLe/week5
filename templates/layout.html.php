<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="jokes.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header><h1>Internet Joke Database</h1></header>
        <nav>
            <ul>
                <a href="index.php">Home</a>
                <a href="jokes.php">Jokes List</a>
                <a href="addjoke.php">Add a Joke</a>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; Internet Joke Database</footer>
    </body>
</html>