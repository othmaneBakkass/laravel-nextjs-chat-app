<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiver_id',
        'sender_id',
        'group_id',
        'message'
    ];

    function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    function attachments(): HasMany
    {
        return $this->hasMany(MessageAttachment::class);
    }

}
