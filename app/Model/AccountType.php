<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
    ];

    public function receivers()
    {
    	return $this->hasMany(Receiver::class);
    }

    public function senders()
    {
    	return $this->hasMany(Sender::class);
    }
}
