<?php
namespace Escuela;
use Illuminate\Database\Eloquent\Model;
class DetalleAsignacion extends Model
{
    protected $table = 'detallle_asignacion';
    
        protected $primaryKey = 'id_detalleasignacion';
    
        public $timestamps = false;
    
        protected $fillable = [
            'iddetallegrado',
            'aniodetalleasignacion',
            'coordinador'
        ];
    
        protected $guarded = [
        ];
}
