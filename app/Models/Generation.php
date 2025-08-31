<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Generation extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'postgraduate_id',
        'study_plan_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'postgraduate_id' => 'integer',
        'study_plan_id' => 'integer',
    ];

    public function Postgraduate(): BelongsTo {
        return $this->belongsTo(Postgraduate::class);
    }

    public function StudyPlan(): BelongsTo {
        return $this->belongsTo(StudyPlan::class);
    }
}
