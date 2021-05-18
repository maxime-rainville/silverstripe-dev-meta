<?php

namespace MaximeRainville\SilverstripeDevMeta;

use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DB;

class InfrastructureList extends ArrayList
{

    public function __construct()
    {
        parent::__construct($this->rawdata());
    }


    public function rawdata()
    {
        $conx = DB::get_conn();
        $datadriver = preg_replace(
            '/([^\\\]+\\\)+([^\\\]+)Database/',
            '$2',
            get_class($conx));

        return [
            [
                'Title' => _t(__CLASS__.'.PHP_VERSION', "PHP Version"),
                'Value' => phpversion()
            ],
            [
                'Title' => _t(__CLASS__.'.DATABASE', "Database"),
                'Value' => _t(
                    __CLASS__ . '.DB_VERSION_DB_DRIVER',
                    '{version} (driver: {driver})',
                    [
                        'version' => $conx->getVersion(),
                        'driver' => $datadriver
                    ]
                )
            ],
            [
                'Title' => _t(__CLASS__.'.BASE_PATH', "Base path"),
                'Value' => BASE_PATH
            ],
            [
                'Title' => _t(__CLASS__.'.SERVER', "Server"),
                'Value' => isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : ''
            ],

        ];
    }

}
