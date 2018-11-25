<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['site_name', 'site_mail', 'site_phone', 'site_address', 'site_desc', 'site_tags', 'site_status', 'site_close', 'site_subaddress'];
}
