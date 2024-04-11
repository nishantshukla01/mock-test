<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class config_paytm extends Model
{
    public static function MerchentKey()
    {
        define('PAYTM_MERCHANT_KEY', 'XXXXXXXXXXXXXXX');
    }
}
