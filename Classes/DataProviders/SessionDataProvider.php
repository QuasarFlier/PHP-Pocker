<?php 

namespace Classes\DataProviders;

require_once "BaseDataProvider.php";
require_once "Classes/Session.php";

use stdClass;
use Classes\Session;
use Exception;

class SessionDataProvider extends BaseDataProvider {
    public function __construct()
    {
        $data = new stdClass();

        try {
            $dataProviderData = Session::GetDataProvidersData();
            $data -> Nickname = $dataProviderData["NickName"];
            $data -> Balance = $dataProviderData["Balance"];
            $data -> IsAuthorized = $dataProviderData["IsAuthorized"];
            $data -> IsProviderDataExists = true;
        } catch (Exception $exception) {
            $data -> IsProviderDataExists = false;
        }

        $data -> Password = "Unknown";

        parent::__construct($data);
    }
}