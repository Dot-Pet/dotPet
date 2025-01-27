<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\AdoptionStatus;
use App\Models\Animal;

class Adoption extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'adoption_id';

    protected $table = 'adoption';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'animal_id',
        'user_id',
        'status_id',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($adoption) {
            $adoption->{$adoption->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function status(){
        return $this->hasOne(AdoptionStatus::class, 'status_id', 'status_id');
    }

    public function animal(){
        return $this->hasOne(Animal::class, 'animal_id', 'animal_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
