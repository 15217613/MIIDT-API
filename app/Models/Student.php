<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'generation_id',
        'curp',
        'name',
        'gender',
        'email',
        'phone',
        'birthdate',
        'program_id',
        'origin_institution_id',
        'lies_id',
        'folio',
        'clur',
        'graduation_date',
        'status_id',
        'cve',
        'rfid',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'generation_id' => 'integer',
        'birthdate' => 'date',
        'program_id' => 'integer',
        'origin_institution_id' => 'integer',
        'lies_id' => 'integer',
        'pre_registration' => 'integer',
        'payment_status' => 'integer',
        'director_id' => 'integer',
        'codirector_id' => 'integer',
        'tutor_id' => 'integer',
        'graduation_date' => 'date',
        'status_id' => 'integer',
    ];

    public function generation(): BelongsTo {
        return $this->belongsTo(Generation::class);
    }

    public function program(): BelongsTo {
        return $this->belongsTo(Program::class);
    }

    public function originInstitution(): BelongsTo {
        return $this->belongsTo(OriginInstitution::class);
    }

    public function lies(): BelongsTo {
        return $this->belongsTo(Lies::class);
    }

    public function director(): BelongsTo {
        return $this->belongsTo(Teacher::class);
    }

    public function codirector(): BelongsTo {
        return $this->belongsTo(Teacher::class);
    }

    public function tutor(): BelongsTo {
        return $this->belongsTo(Teacher::class);
    }

    public function status(): BelongsTo {
        return $this->belongsTo(Status::class);
    }

    // Metodos
    // Obtiene todos los datos de los estudiantes por generacion
    public static function getByGenerations() {
        return self::get()->groupBy(['generation_id']);
    }

    // Obtiene todos los datos de los estudiantes por lies
    public static function getByLies() {
        return self::get()->groupBy(['lies_id']);
    }
}
