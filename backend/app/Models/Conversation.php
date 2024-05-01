<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_1',
        'user_id_2',
        'last_message_id'
    ];


    function participant_one(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_1');
    }

    function participant_two(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_2');
    }

}
