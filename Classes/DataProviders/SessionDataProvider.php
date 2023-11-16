<?php 

namespace Classes\DataProviders;

require_once "BaseDataProvider.php";
require_once "Classes/Session.php";

use stdClass;
use Classes\Session;
use \Error;

class SessionDataProvider extends BaseDataProvider {
    public function __construct()
    {
        $data = new stdClass();
        $data -> Nickname = "unknown";
        $data -> IsAuthorized = false;
        $data -> Balance = 0;

        try {
            $dataProviderData = Session::GetDataProvidersData();
            $data -> Nickname = $dataProviderData["NickName"];
            $data -> Balance = $dataProviderData["Balance"];
            $data -> IsAuthorized = $dataProviderData["IsAuthorized"];
            $data -> IsProviderDataExists = true;
        } catch (Error $exception) {
            $data -> IsProviderDataExists = false;
        }

        $data -> Password = "Unknown";

        parent::__construct($data);
    }
}