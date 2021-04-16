<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id', 'name', 'description', 'final_date', 'hex'
    ];  

    public function tareas()
    {
    	return $this->hasMany(Task::class);
    }

    /*
    hasMany (Uno a Muchos) El modelo que tiene muchos registros vinculados
    belongsTo (Pertenece a) El modelo que debe vincularse a su "padre"
	hasOne (uno a uno)
    belongsToMany()
    */
}
