<?php

namespace MaximeRainville\SilverstripeDevMeta;

use SilverStripe\ORM\ArrayList;
use SilverStripe\Reports\Report;

class InfrastructureReport extends Report
{

    public function title()
    {
        return _t(__CLASS__.'.INFRASTRUCTURE_REPORT', "Infrastructure Report");
    }

    public function group()
    {
        return _t(__CLASS__.'.DEV_META_REPORTS', "Dev Meta Report");
    }

    public function sourceRecords($params = null)
    {
        return InfrastructureList::create();
    }

    public function columns()
    {
        return [
            "Title" => [
                "title" => "Title",
                "link" => false,
            ],
            "Value" => [
                "title" => "Value",
                "link" => false,
            ]
        ];
    }
}
