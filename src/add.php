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

if (isset($_POST['email']) && !empty($_POST['email'])) {
    try{
        
        $db = new PDO($dsn, $dbname, $dbpass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //Si toutes les colonnes sont fausse
        $manager = new UserManager($db);
        $user = new User(["email" => $_POST['email'], "password" => $_POST['password']]);
        
        if ($manager->add($user)) {
            $logger->info('utilisateur ajouté');
            print("Utilisateur créé<br/>");
        } else {
            print("Utilisateur NON créé<br/>");
        }        
        
        header('Location: index.php');
    }
    catch (PDOException $e) {
        print('<br/>Erreur de connexion : ' . $e->getMessage());
    }
        
    }
    echo $twig->render('add.html.twig',
    [
        'msg_danger' => '',
        'msg_success' => '',
        'title' => 'Ajouter un utilisateur',
    ]
);