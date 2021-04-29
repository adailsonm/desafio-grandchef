<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class Pessoas extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'data_nascimento',
        'genero',
    ];

    protected $hidden = [
        'senha',
    ];

    public static function genero($genero = null)
    {
        $opGenero = [
            'male' => 'Masculino',
            'female' => 'Feminino'
        ];
    
        if (!$genero)
            return $opGenero;
        
        return $opGenero[$genero];
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    } 
}
