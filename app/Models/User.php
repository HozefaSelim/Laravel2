<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Scopes\ActiveScope;
use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'prefeneces' => 'array'
    ];
    


    // first method to make global scope 
        protected static function booted(){
            // static::addGlobalScope('active',function (Builder $builder){
            //     $builder->where('is_active',1);
            // });
          //  static::addGlobalScope(new ActiveScope);
        }
    // Accessory
    // public function getNameAttribute($value){
    //     //return strtoupper($value);
    //     return "MR" . '.'. $value; 
 
    // }
    // new Attribute
    public function getIdNameAttribute($value){
        
        return $this->id .'-'.$this->name;  
 
    }

     // Mutator
    //  public function setNameAttribute($value){
    //     $this->attributes['name'] = $value .'_user';
    // }


    // public function scopeActive($query){
    //     return $query->where('is_active',1);
    // }
    

    public function getDaysActiveAttribute(){
        return $this->created_at->diffInDays($this->updated_at);
    }
   
     

}
