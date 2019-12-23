<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    public function teds()
    {
    	return $this->hasOne(Ted::class);
    }
}

