<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers'; // Nama tabel di database
    protected $fillable = ['username', 'name', 'email', 'phone', 'address'];
}