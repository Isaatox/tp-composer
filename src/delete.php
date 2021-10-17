<?php

require_once '../vendor/autoload.php';

use Monolog\Logger;
use App\Entity\User;
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
    $user = $manager->getOne($_GET['id']);

    $logger->info('Supression de l\'utilisateur réussi.');

    if ($manager->delete($user)) {
        print("<div class='alert alert-success' role='alert'>
        <h4 class='alert-heading'>Utilisateur supprimé !</h4>
        <hr>
        <p class='mb-0'>Vous pouvez retourner à l'accueil du site web via ce lien : <a href='index.php' class='alert-link'><i class='fas fa-link'></i> index.php</a></p>
        </div>");
    } else {
        print("<div class='alert alert-danger' role='alert'>
        <h4 class='alert-heading'>Erreur!</h4>
        <p>L'utilisateur n'a pas été supprimé.</p>
        <hr>
        <p class='mb-0'>Vous pouvez retourner à l'accueil du site web via ce lien : <a href='index.php' class='alert-link'><i class='fas fa-link'></i> index.php</a></p>
        </div>");
    }  
}
catch (PDOException $e) {
    print('<br/>Erreur de connexion ' . $e->getMessage());
}

echo $twig->render('delete.html.twig',
[
    'msg_danger' => '',
    'msg_success' => '',
    'title' => 'Supression de l\'utilisateur',
]
);
