<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Residence extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'institution',
        'area',
        'start_date',
        'end_date',
        'country_id',
        'stay_request',
        'acceptance_letter',
        'work_schedule',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'country_id' => 'integer',
    ];

    public function student(): BelongsTo {
        return $this->belongsTo(Student::class);
    }

    public function country(): BelongsTo {
        return $this->belongsTo(Country::class);
    }
}
