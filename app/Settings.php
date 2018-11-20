<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['site_name', 'site_logo', 'site_mail', 'site_phone', 'site_facebook', 'site_twitter', 'site_linkedin', 'site_git', 'site_desc', 'site_tags', 'site_status', 'site_close', 'site_copyright'];
}
