<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'section'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value)
        );
    }

    protected function section(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value)
        );
    }

    public function customYear()
    {
        switch ($this->year) {
            case 1:
                return '1st year';
            case 2:
                return '2nd year';
            case 3:
                return '3rd year';
            case 4:
                return '4th year';
            default:
                return $this->year;
        }
    }

    public static function checkIfCourseExists($name, $year, $section, $id = null)
    {
        $query = self::where('name', $name)
            ->where('year', $year)
            ->where('section', $section);

        if ($id !== null) {
            $query->where('id', '!=', $id);
        }

        return $query->exists();
    }
}