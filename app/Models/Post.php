<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }


        // new Method
    protected function title(): Attribute    {     
        return Attribute::make(          
           // Accessor: 
         get: fn ($value) => strtoupper($value),       
              // Mutator: 
         set: fn ($value) => ucfirst($value)      
       );   
      }

}
