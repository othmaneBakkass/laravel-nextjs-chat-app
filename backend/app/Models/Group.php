<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'owner_id',
        'last_message_id'
    ];

    function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'groups_users');
    }

    function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
