<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';
    public $timestamps = false; //no reconoce la db si se borra
    protected $fillable = ['especie', 'cantidad', 'comida'];
    
}
