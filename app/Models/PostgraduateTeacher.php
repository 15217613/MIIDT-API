<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostgraduateTeacher extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'postgraduate_id',
        'teacher_status_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'teacher_id' => 'integer',
        'postgraduate_id' => 'integer',
        'teacher_status_id' => 'integer',
    ];

    public function teacherStatus(): BelongsTo {
        return $this->belongsTo(TeacherStatus::class);
    }
}
