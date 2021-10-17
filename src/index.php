<?php
require_once '../vendor/autoload.php';

use Monolog\Logger;
use Twig\Environment;
use App\Manager\UserManager;
use Twig\Loader\FilesystemLoader;
use Monolog\Handler\StreamHandler;


$logger = new Logger('main');

$logger->pushHandler(new StreamHandler(__DIR__ . '/../log/app.log', Logger::DEBUG));

$loader = new \Twig\Loader\FilesystemLoader('../templates');

$twig = new \Twig\Environment($loader, [
'cache' => '../cache',
]);

require_once("conf.php");

try {
    $db = new PDO($dsn, $dbname, $dbpass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse

    $manager = new UserManager($db);

    $logger->info('Connexion réussi');

    echo $twig->render('index.html.twig',
        [
            'msg_danger' => '',
            'msg_success' => '',
            'title' => 'Liste des utilisateurs',
            'users' => $manager->getAll(),
        ]
    );
}
catch (PDOException $e) {
    print('<br/>Erreur de connexion ' . $e->getMessage());
}