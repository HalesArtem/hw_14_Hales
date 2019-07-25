<?php
require_once '../classes/DatabaseConnect.php';
require_once 'arrayPublications.php';

$pdo = new DatabaseConnect();

try {
    $sql = '
    CREATE TABLE publications (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        `headline` VARCHAR(255),
        `introductoryText` VARCHAR(255),
        `allText` TEXT,
        `type` VARCHAR(255)
    )
';

    $pdo->connection->exec($sql);

    foreach ($publications as $publication){
        $sql = '
    INSERT INTO publications SET 
        `headline`=:headline,
        `introductoryText`=:introductoryText,
        `allText`=:allText,
        `type`=:type
';
        $query = $pdo->connection->prepare($sql);

        $query->bindValue(':headline', $publication['headline']);
        $query->bindValue(':introductoryText', $publication['introductoryText']);
        $query->bindValue(':allText', $publication['allText']);
        $query->bindValue(':type', $publication['type']);

        $query->execute();
    }

} catch (PDOException $e) {
    echo 'problem with migrate';
}
echo 'migrate complete';