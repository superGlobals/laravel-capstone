<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'subject_code',
        'subject_title',
        'number_of_units'
    ];

    protected function subject_code(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value)
        );
    }

    protected function subject_title(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => ucwords($value)
        );
    }

    public function scopeSearch($query, $value)
    {
        $query->where('subject_code', 'like', "%{$value}%")
            ->orWhere('subject_title', 'like', "%{$value}%")
            ->orWhere('number_of_units', 'like', "%{$value}%");
    }
}
