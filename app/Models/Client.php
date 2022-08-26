<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    use HasFactory, SoftDeletes;

    protected $fillable = ['first_name', 'last_name','address' ,'payment_method','installation_date', 'amount'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
