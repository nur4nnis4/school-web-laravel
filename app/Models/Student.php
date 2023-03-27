<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'gender', 'nis', 'class_id', 'image'];


    public function extracurriculars(): BelongsToMany
    {
        return $this->belongsToMany(
            Extracurricular::class,
            'student_extracurriculars',
            'student_id',
            'extracurricular_id'
        );
    }

    public function class(): BelongsTo
    {
        /**
         * Doesnt need to define foreign key name because
         * foreign key name is class_id (<<parent_table_name>>_id)
         */
        return $this->belongsTo(ClassRoom::class);
    }
}
