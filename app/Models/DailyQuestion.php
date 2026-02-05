<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'question_ids',
    ];

    protected $casts = [
        'question_ids' => 'array',
        'date' => 'date',
    ];

    /**
     * Get the questions for this daily set
     */
    public function questions()
    {
        return Question::whereIn('id', $this->question_ids)->get();
    }

    /**
     * Get today's questions
     */
    public static function today()
    {
        return self::whereDate('date', today())->first();
    }
}
