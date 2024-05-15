<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'email', 'dui'];

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
}
