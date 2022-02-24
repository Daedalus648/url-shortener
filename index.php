<?php
    include "db.php";
    $db = new Database("localhost", "url_shortener", "root", "");
    $db = $db->connect();

    $statement = $db->query("SELECT * FROM url_shortener");
    $urls = $statement->fetchAll(PDO::FETCH_ASSOC);

    define("ROOT_PATH", realpath(__DIR__));
    include join(DIRECTORY_SEPARATOR, ["ROOT_PATH", 'r', 'index.php']);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./main.css" />
        <title>URL Shortener</title>
    </head>
    <body>
    <header>
        <h1>URL Shortener</h1>
    </header>
    <main>
        <section class="form">
            <form action="../url-shortener/add/index.php" method="post">
                <input type="text" name="regular_url" id="regular_url" placeholder="Website URL you want to transform." />
                <input type="submit" value="Shorten URL" />
                <input type="hidden" name="counter" value="<?php print $counter ?>" />
            </form>
        </section>
        <section class="url_shortener">
            <?php foreach ($urls as $url) : ?>
                <div class="url">
                    <div class="id">
                        <?= $url["id"]; ?>
                    </div>
                    <div class="short_url">
                        <a href="http://localhost/r?c=<?= $url['id']; ?>" target="_blank">
                        http://localhost/r?c=<?= $url['id']; ?>
                        </a>
                    </div>
                    <div class="regular_url">
                        <a href="<?= $url["regular_url"]; ?>" target="_blank"><?= $url["regular_url"]; ?></a>
                    </div>
                </div>
                <?php endforeach; ?>
        </section>
    </main>
    </body>
</html>