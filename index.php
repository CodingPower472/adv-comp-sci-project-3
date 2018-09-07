
<?php

$host = 'tcp:luke-bousfield-database.database.windows.net, 1433';
$username = 'codingpower472@luke-bousfield-database';
$password = 'lukebousfieldcodingpower$&@sql-_-database472';
$db_name = 'master';

$connOps = array(
    "Database" => $db_name,
    "UID" => $username,
    "PWD" => $password
);

$conn = sqlsrv_connect($host, $connOps);

if ($conn == false) {
    die(print_r(sqlsrv_errors(), true));
}

$createTableSQL = "CREATE TABLE master.users
(
    [Id] INT NOT NULL AUTO_INCREMENT ,
    [Name] VARCHAR(200) NOT NULL ,
    [Email] VARCHAR(200) NOT NULL ,
    [Awesomeness] INT NOT NULL ,
    PRIMARY KEY (`Id`)
)
";

$createTable = sqlsrv_query($conn, $createTableSQL);
if ($createTable == false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Table created successfully.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Website</title>
</head>
<body>
    <h1 id="top-header">Welcome to my awesome website<?php if (array_key_exists("name", $_POST)) {
            echo ", " . htmlspecialchars($_POST["name"]);
        }  ?>
    </h1>
    <div id="img-container">
        <img src="img/photo.jpeg">
    </div>
    <audio autoplay>
        <source src="audio/intro.mp3" type="audio/mpeg">
    </audio>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Awesomeness</th>
        </thead>
        <tbody>
            <?php
            $entries = array(
                array(
                    name => "Luke",
                    email => "alphawaves@icloud.com",
                    awesomeness => 5.0
                )
                );
            foreach ($entries as $entry) {
                $name = $entry["name"];
                $email = $entry["email"];
                $awesomeness = $entry["awesomeness"];
                echo "<tr>";
                echo "<th>$name</th>";
                echo "<th>$email</th>";
                echo "<th>$awesomeness</th>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <form action="/" method="POST">
        <label>
            Name: 
            <input name="name">
        </label>
        <br>
        <label>
            Email:
            <input name="email">
        </label>
        <br>
        <label>
            Awesomeness:
            <input name="awesomeness" type="number">
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>