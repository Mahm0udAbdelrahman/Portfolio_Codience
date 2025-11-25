<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    public $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
