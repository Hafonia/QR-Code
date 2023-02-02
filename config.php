<?php
define('DBUSER', 'root');
define('DBPASS', '');
define('DBHOST', 'localhost');
define('DBNAME', 'hotel');

try {
    $connection = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
} catch (PDOException $e) {
    exit("Error! (" . $e->getMessage() . ")");
}
    $sql = "CREATE TABLE members(
    room INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(room),
    first VARCHAR(255),
	last VARCHAR(255),
    date DATE) 
    ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_persian_ci";
	$connection->query($sql);
    $sql = "INSERT INTO members(first,last, date) VALUES('Hamed','Foroughinia', '2023-01-01')";
    $connection->query($sql);

?>