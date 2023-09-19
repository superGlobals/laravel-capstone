<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'subject_id',
        'section_id'
    ];

    public static function checkIfTeacherClassExists($user_id, $course_id, $subject_id, $section_id)
    {
        return self::where('user_id', $user_id)
            ->where('course_id', $course_id)
            ->where('subject_id', $subject_id)
            ->where('section_id', $section_id)
            ->exists();
    }



    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function courseYearSection()
    {
        return $this->course->name . '-' . $this->course->year . $this->section->name;
    }
}
