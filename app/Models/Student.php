<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;
    /**
     * The extracurriculars that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extracurriculars(): BelongsToMany
    {
        return $this->belongsToMany(
            Extracurricular::class,
            'student_extracurriculars',
            'student_id',
            'extracurricular_id'
        );
    }

    /**
     * Get the ClassRoom that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class(): BelongsTo
    {
        /**
         * Doesnt need to define foreign key name because
         * foreign key name is class_id (<<parent_table_name>>_id)
         */
        return $this->belongsTo(ClassRoom::class);
    }
}
