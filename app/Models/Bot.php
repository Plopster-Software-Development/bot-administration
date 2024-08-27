<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bot extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'tenant_id',
        'user_id',
        'name'
    ];

    /**
     * Relación muchos a uno con Tenant
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Relación muchos a uno con User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación uno a uno con BotCredentials
     */
    public function credentials()
    {
        return $this->hasOne(BotCredential::class);
    }

    /**
     * Eliminar las credenciales asociadas antes de eliminar el bot.
     */
    protected static function booted()
    {
        static::deleting(function ($bot) {
            // Verifica si el bot tiene credenciales asociadas
            if ($bot->credentials) {
                // Elimina las credenciales antes de eliminar el bot
                $bot->credentials->delete();
            }
        });
    }
}
