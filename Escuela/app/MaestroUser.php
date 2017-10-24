<?php

namespace Escuela;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Escuela\User;


class MaestroUser extends Model
{
    protected $table = 'user_detalle';

    protected $primaryKey = 'id_detalleuser';

    public $timestamps = false;

    protected $fillable = [
    	'id',
    	'mdui'
    ];

    protected $guarded = [
    ];


    public function usuario($id)
    {
      $resul=User::find($id);
        if(isset($resul)){
         return $resul->name;
        }
        else
        {
          return "sin definir";
        }

    }
    public function maestro($id)
    {
       $resul=Maestro::find($id);
        if(isset($resul)){
         return $resul->name;
        }
        else
        {
          return "sin definir";
        }
    }

}
