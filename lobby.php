<?php

require_once "pageParts/Session.Authorized.Init.php"; 
require_once "Classes/Profile.php";
require_once "Classes/DataProviders/SessionDataProvider.php";
require_once "Classes/PageParts/Menu.php";
require_once "Classes/PageParts/LobbyGamesContainer.php";
require_once "Classes/Lobby.php";
require_once "Classes/DataBase.php";

use Classes\DataProviders\SessionDataProvider;
use Classes\PageParts\lobbyGamesContainer;
use Classes\PageParts\Menu;
use Classes\Profile;
use Classes\Lobby;
use Classes\DataBase;

$sessionDataProvider = new SessionDataProvider();
$profile = new Profile($sessionDataProvider);

$database = new DataBase();
$lobby = new Lobby($profile, $database);
$lobby->InitGames();

$menu = new Menu($profile);
$lobbyGamesContainer = new lobbyGamesContainer($profile, $database);
?>
<html>
    <head>
        <title>Poker lobby</title>
        <?php 
        $menu -> EchoHeader();
        $lobby -> EchoHeader();
        $lobbyGamesContainer -> EchoHeader();
        ?>
    </head>
    <body>
        <?php 
        $menu -> EchoMenu();
        $lobbyGamesContainer -> EchoContainer();
        ?>
       
</html>