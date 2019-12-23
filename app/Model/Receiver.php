<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agency', 'account', 'document', 'name','banks_id', 'account_types_id',
    ];

    public function accountTypes()
    {
    	return $this->belongsTo(AccountType::class);
    }

    public function banks()
    {
    	return $this->belongsTo(Bank::class);
    }

    public function teds()
    {
    	return $this->hasOne(Ted::class);
    }
}
