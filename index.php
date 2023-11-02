<?php 
require_once 'Classes/Profile.php';
require_once 'Classes/PageParts/Menu.php';
require_once 'Classes/PageParts/LoginForm.php';
require_once 'Classes/PageParts/LoginStatus.php';
require_once 'Classes/PageParts/Credentials.php';
require_once 'Classes/DataProviders/FormDataProvider.php';
require_once 'Classes/Authenticator.php';
use Classes\DataProviders\FormDataProvider;
use Classes\Profile;
use Classes\PageParts\Menu;
use Classes\PageParts\LoginForm;
use Classes\PageParts\LoginStatus;
use Classes\PageParts\Credentials;
use Classes\Authenticator;

session_start();

$formDataProvider = new FormDataProvider();
$authenticator = new Authenticator($formDataProvider);
$authenticator -> AuthorizeUser();
$profile = new Profile($formDataProvider);
$menu = new Menu($profile);
$loginForm = new LoginForm($profile);
$loginStatus = new LoginStatus($profile);
$credentials = new Credentials($profile);
?>
<html lang="en">
<header>
    <?php 
    $menu -> EchoHeader();
    $loginForm -> EchoHeader();
    $loginStatus -> EchoHeader();
    $credentials -> EchoHeader();
    ?>
</header>
<body>

<?php 
    $menu -> EchoMenu();
    $credentials -> EchoCredentials();
    $loginForm -> EchoLoginForm();
    $loginStatus -> EchoLoginStatus();
    $loginStatus -> EchoReloginButton();
?>


</body>
</html>