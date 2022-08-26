<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'date','amount' ,'status','received_by', 'payment_mode'];

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
