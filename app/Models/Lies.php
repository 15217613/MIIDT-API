<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lies extends Model {
    use HasFactory;

    protected $table = 'lies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'study_plan_id',
        'name',
        'acronym',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'study_plan_id' => 'integer',
    ];

    public function study_plan(): BelongsTo {
        return $this->belongsTo(StudyPlan::class);
    }
}
