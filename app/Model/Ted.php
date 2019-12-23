<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ted extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'amount', 'tax', 'date', 'sender_id', 'receiver_id','purpose_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    public function receivers()
    {
    	return $this->belongsTo(Receiver::class);
    }

    public function senders()
    {
    	return $this->belongsTo(Sender::class);
    }

    public function purpose()
    {
    	return $this->belongsTo(Purpose::class);
    }
}
