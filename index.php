<?php declare(strict_types=1);

// Connecting to a database cannot be easier
$db = new PDO("sqlite:".__DIR__."/database.sqlite");

// Syntax is VERY similar to Mysql or Postgres.
$db->exec("drop table if exists pets");
$db->exec("create table pets (name text not null, type text not null)");
$db->exec("insert into pets values ('Luna', 'Cat'), ('Ollie', 'Dog'), ('Bunky', 'Dog')");

$pets = $db->query("select * from pets");

// In the command line
if (php_sapi_name() === 'cli') {
    foreach ($pets as $pet) {
        $emoji = $pet['type'] == 'Dog' ? "🐕" : "🐈";
        echo $pet['name'] . ' is a ' . $emoji . ' ' . $pet['type'] . PHP_EOL;
    }
    exit;
}

// In the browser
?>
<html lang="en">
<body>
<main>
    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
        </tr>
        <?php foreach ($pets as $pet): ?>
        <tr>
            <td><?= $pet['name'] ?></td>
            <td><?= $pet['type'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
