<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LearningUnitOffered extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'learning_unit_id',
        'classroom_id',
        'schedule_details',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'teacher_id' => 'integer',
        'learning_unit_id' => 'integer',
        'classroom_id' => 'integer',
        'schedule_details' => 'array', // JSON ↔️ Array
    ];
}
