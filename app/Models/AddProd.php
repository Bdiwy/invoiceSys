<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddProd extends Model
{
    use HasFactory;
protected $table="add_prods";
    protected $guarded =[];

    public function section(){
        return $this->belongsTo('App\models\sections');   
        }
}
