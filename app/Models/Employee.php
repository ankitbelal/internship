<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\support\Number;
use Illuminate\Database\Eloquent\Casts\Attribute;



class Employee extends Model

{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'salary',
        'photo',
        'gender',
        'skills',
        
    ];

   protected function Name(): Attribute
   {
       return Attribute::make(
        get: fn($value) => ucwords($value),
        set: fn($value) => ucwords($value)
       );
   }
protected function Email(): Attribute
{
    return Attribute::make(
        get: fn($value) => strtolower($value),
        set: fn($value) => strtolower($value)
    );
}
protected function Phone(): Attribute
{
    return Attribute::make(
        // get: fn($value) => Number::format($value),
        // set: fn($value) => Number::format($value)
    );

}

protected function Salary(): Attribute
{
    return Attribute::make(
        get: fn($value) => Number::currency($value,'NPR'),
        // set: fn($value) => Number::format($value)
    );
}

protected function CreatedAt(): Attribute{
    return Attribute::make(
        get: fn($value) => date('d M Y',strtotime($value)),
        // set: fn($value) => Number::format($value)
    );
}
}
