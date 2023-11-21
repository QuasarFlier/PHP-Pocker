<?php
require_once "pageParts/Session.Authorized.Init.php";

require_once 'Classes/DataBase.php';
require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/Menu.php';
require_once 'Classes/DataProviders/SessionDataProvider.php';

use Classes\DataBase;
use Classes\Profile;
use Classes\PageParts\Menu;
use Classes\DataProviders\SessionDataProvider;

$sessionDataProvider = new SessionDataProvider();
$profile = new Profile($sessionDataProvider);

$database = new DataBase();

$menu = new Menu($profile);
?>

<html>
    <head>
        <?php $menu->EchoHeader(); ?>
    </head>
    <body>
        <?php 
        $menu->EchoMenu();
        var_dump($sessionDataProvider)
        ?>
    </body>
</html>
