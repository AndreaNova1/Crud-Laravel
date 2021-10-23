<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
    class Usuario extends Model
    {
        protected $table='usuarios';
        public $timestamps=false;
        protected $fillable=[
            'id', 'nombre', 'email', 'rol_id'
        ];
    
        protected $primaryKey='id';
    }
    
=======
class Usuario extends Model
{
    //
}
>>>>>>> d915bd8031cbe345386443f6b0dace4a732d5304
