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

    public function scopeFilter($query, $params)
    {
        //Contém
        if ( isset($params['nome']) && trim($params['nome'] !== '') ) {
            $query->where('nome', 'LIKE', '%'. trim($params['nome']) . '%');
        }
        //Diferente
        if ( isset($params['email']) && trim($params['email'] !== '') ) {
            $query->where('email', '<>', trim($params['email']));
        }
        //Igual
        if ( isset($params['genero']) && trim($params['genero'] !== '') ) {
            $query->where('genero', '=', trim($params['genero']));
        }
        // Inicia Com
        if ( isset($params['startWith']) && trim($params['startWith'] !== '') ) {
            $query->where('nome', 'LIKE', trim($params['startWith']) . '%');
        }
        // Termina Com
        if ( isset($params['endWith']) && trim($params['endWith'] !== '') ) {
            $query->where('nome', 'LIKE', '%' . trim($params['endWith']));
        }
        return $query;
    }
}
