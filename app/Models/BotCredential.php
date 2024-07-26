<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class BotCredential extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'bot_id',
        'clientSecret',
        'twilioPhoneNumber',
        'twilioSID',
        'twilioTK',
    ];

    /**
     * Cifrar el clientSecret antes de guardar en la base de datos.
     */
    public function setClientSecretAttribute($value)
    {
        $this->attributes['clientSecret'] = Crypt::encryptString($value);
    }

    /**
     * Descifrar el clientSecret al obtenerlo de la base de datos.
     */
    public function getClientSecretAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    /**
     * Cifrar el twilioSID antes de guardar en la base de datos.
     */
    public function setTwilioSIDAttribute($value)
    {
        $this->attributes['twilioSID'] = Crypt::encryptString($value);
    }

    /**
     * Descifrar el twilioSID al obtenerlo de la base de datos.
     */
    public function getTwilioSIDAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    /**
     * Cifrar el twilioTK antes de guardar en la base de datos.
     */
    public function setTwilioTKAttribute($value)
    {
        $this->attributes['twilioTK'] = Crypt::encryptString($value);
    }

    /**
     * Descifrar el twilioTK al obtenerlo de la base de datos.
     */
    public function getTwilioTKAttribute($value)
    {
        return $this->decryptAttribute($value);
    }

    /**
     * Descifrar un atributo cifrado.
     *
     * @param  string  $value
     * @return string
     */
    protected function decryptAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    /**
     * Relación muchos a uno con Bot
     */
    public function bot()
    {
        return $this->belongsTo(Bot::class);
    }
}
