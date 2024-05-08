<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progress extends Model
{
    use HasFactory;
    protected $table = 'tbl_progress';
    protected $fillable = [
        'student_id',
        'lesson_id',
        'score',
        'percent'
    ];
    public $timestamps = false;
    public function lesson(){
        return $this->belongsTo(lsesson::class,'lesson_id','lessonId');
    }
    public function user(){
        return $this->belongsTo(Student::class,'student_id','STUDENT_ID');
    }
}
