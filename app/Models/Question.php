<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'category',
        'question',
        'options',
        'answer',
        'explanation',
        'difficulty',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Scope for GK/IQ questions
     */
    public function scopeGkIq($query)
    {
        return $query->where('type', 'gk_iq');
    }

    /**
     * Scope for MCQ questions
     */
    public function scopeMcq($query)
    {
        return $query->where('type', 'mcq');
    }

    /**
     * Scope for Group A questions
     */
    public function scopeGroupA($query)
    {
        return $query->where('type', 'group_a');
    }

    /**
     * Scope for Group B questions
     */
    public function scopeGroupB($query)
    {
        return $query->where('type', 'group_b');
    }

    /**
     * Scope by category
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
