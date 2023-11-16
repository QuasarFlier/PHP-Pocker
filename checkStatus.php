<?php 
require_once 'pageParts/Session.All.Init.php';

function EchoFunctionExists(string $functionName):void {
    echo function_exists($functionName) === true ? "Function exists" : "Function does not exist";
}
function EchoExtensionLoaded(string $extensionName):void {
    echo extension_loaded($extensionName) === true ? "Extension has been loaded" : "Extension hasn't been loaded";
}
function EchoClassExists(string $className):void {
    echo class_exists($className) === true ? "Class exists" : "Class does not exist";
}
?>
<http>
    <head>
        <title>Check site status</title>
    </head>
    <body>
        <h1>Database</h1>
        <h6>mysqli_init function exist: <?php EchoFunctionExists('mysqli_init'); ?></h6>
        <h6>mysqli extension loaded: <?php EchoExtensionLoaded('mysqli'); ?></h6>
        <h6>SqlLite3 class exist: <?php EchoClassExists("SQLite3"); ?></h6>
        <h6>pdo_sqlite extension loaded: <?php EchoExtensionLoaded("pdo_sqlite"); ?></h6>
        <h6>sqlite3 extension loaded: <?php EchoExtensionLoaded("sqlite3"); ?></h6>
        <hr>
        <h1>Environment</h1>
        <h6>Environment parameters: 
            <table>
                <?php 
                foreach ($_ENV as $envKey => $envValue) {
                    echo <<<ENV_VALUE
                        <tr>
                            <td>$envKey :</td>
                            <td>$envValue</td>
                        </tr>
                    ENV_VALUE;
                }
                ?>
            </table>
        </h6>
        <hr>
        <h1>PHP INFO</h1>
        <h6><?php var_dump(phpinfo()) ?></h6>
    </body>
</http>