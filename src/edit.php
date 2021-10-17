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
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $manager = new UserManager($db);

    if ($_POST) {
        if (
            isset($_POST['id']) && !empty($_POST['id'])
            && isset($_POST['email']) && !empty($_POST['email'])
        ) {
            $id = strip_tags($_POST['id']);
            $email = strip_tags($_POST['email']);
            $role = strip_tags($_POST['roles']);

            $user = $manager->getOne($id);
            if (!$user) {
                print("Cet id n'existe pas");
                header('Location: index.php');
                exit();
            }
            $user->setEmail($email);
            $user->setRole($role);
            $manager->update($user);
            $logger->info('utilisateur modifié');
            header('Location: index.php');
        } else {
            print("La formulaire est incomplet");
            header('Location: index.php');
        }
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $id = strip_tags($_GET['id']);

        $user = $manager->getOne($id);

        if (!$user) {
            print("Cet id n'existe pas");
            header('Location: index.php');
            exit();
        }
    } else {
        print("URL invalide");
        header('Location: index.php');
        exit();
    }
} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}

echo $twig->render('edit.html.twig', [
    'title' => 'Modifier utilisateur',
    'user' => $manager->getOne($_GET['id']),

]);