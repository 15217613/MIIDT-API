<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paper extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resource_id',
        'student_id',
        'name',
        'publication_year',
        'doi',
        'isbn',
        'issn',
        'pages',
        'url',
        'reference',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'resource_id' => 'integer',
        'student_id' => 'integer',
    ];

    public function Resource(): BelongsTo {
        return $this->belongsTo(Resource::class);
    }

    public function Student(): BelongsTo {
        return $this->belongsTo(Student::class);
    }
}
