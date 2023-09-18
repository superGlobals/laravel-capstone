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
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value)
        );
    }



    public function customYear()
    {
        switch ($this->year) {
            case 1:
                return '1st Year';
            case 2:
                return '2nd Year';
            case 3:
                return '3rd Year';
            case 4:
                return '4th Year';
            default:
                return $this->year;
        }
    }

    public function courseYearSection()
    {
        return $this->name . '-' . $this->year;
    }

    public static function checkIfCourseExists($name, $year, $id = null)
    {
        $query = self::where('name', $name)
            ->where('year', $year);

        if ($id !== null) {
            $query->where('id', '!=', $id);
        }

        return $query->exists();
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('year', 'like', "%{$value}%");
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
