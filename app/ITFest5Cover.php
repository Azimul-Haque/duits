<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ITFest5Cover extends Authenticatable
{

    public $timestamps = false;    

    protected $table = 'it_fest_5_covers';

}