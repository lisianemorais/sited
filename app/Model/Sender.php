<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{   
    protected $fillable = [
        'agency', 'account', 'document', 'name','banks_id', 'account_types_id',
    ];

    public function accountTypes()
    {
    	return $this->belongsTo(AccountType::class, 'account_types_id');
    }

    public function banks()
    {
    	return $this->belongsTo(Bank::class, 'banks_id');
    }
    
    public function teds()
    {
    	return $this->hasOne(Ted::class);
    }
}
