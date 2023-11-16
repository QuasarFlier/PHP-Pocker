<?php

require_once "pageParts/Session.Authorized.Init.php"; 
require_once "Classes/Profile.php";
require_once "Classes/DataProviders/SessionDataProvider.php";
require_once "Classes/PageParts/Menu.php";
require_once "Classes/PageParts/LobbyGamesContainer.php";

use Classes\DataProviders\SessionDataProvider;
use Classes\PageParts\lobbyGamesContainer;
use Classes\PageParts\Menu;
use Classes\Profile;

$sessionDataProvider = new SessionDataProvider();
$profile = new Profile($sessionDataProvider);
$menu = new Menu($profile);
$lobbyGamesContainer = new lobbyGamesContainer($profile);
?>
<html>
    <head>
        <title>Poker lobby</title>
        <?php 
        $menu -> EchoHeader();
        $lobbyGamesContainer -> EchoHeader();
        ?>
    </head>
    <body>
        <?php 
        $menu -> EchoMenu();
        $lobbyGamesContainer -> EchoContainer();
        ?>
       
</html>