<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\DailyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DailyQuestionController extends Controller
{
    /**
     * Display today's daily questions
     */
    public function index()
    {
        $dailyQuestions = $this->getTodaysQuestions();
        
        return view('daily-questions.index', compact('dailyQuestions'));
    }

    /**
     * Get or generate today's questions
     */
    private function getTodaysQuestions()
    {
        $today = Carbon::today()->toDateString();
        
        // Try to get existing record
        $dailyQuestion = DailyQuestion::where('date', $today)->first();

        if (!$dailyQuestion) {
            // Generate new daily questions
            $dailyQuestion = $this->generateDailyQuestions($today);
        }

        // Get the actual question objects
        $questions = Question::whereIn('id', $dailyQuestion->question_ids)->get();
        
        return [
            'date' => $dailyQuestion->date,
            'gk_iq_questions' => $questions->where('type', 'gk_iq')->take(5),
            'mcq_questions' => $questions->where('type', 'mcq')->take(5),
            'group_a_question' => $questions->where('type', 'group_a')->first(),
            'group_b_question' => $questions->where('type', 'group_b')->first(),
        ];
    }

    /**
     * Generate new daily questions set
     */
    private function generateDailyQuestions($date)
    {
        return DB::transaction(function () use ($date) {
            // Double-check if record was created by another request
            $existing = DailyQuestion::where('date', $date)->lockForUpdate()->first();
            
            if ($existing) {
                return $existing;
            }
            
            // Get random questions
            $gkIqIds = Question::gkIq()->inRandomOrder()->limit(5)->pluck('id')->toArray();
            $mcqIds = Question::mcq()->inRandomOrder()->limit(5)->pluck('id')->toArray();
            $groupAId = Question::groupA()->inRandomOrder()->limit(1)->pluck('id')->toArray();
            $groupBId = Question::groupB()->inRandomOrder()->limit(1)->pluck('id')->toArray();
            
            // Combine all question IDs
            $questionIds = array_merge($gkIqIds, $mcqIds, $groupAId, $groupBId);
            
            // Create new record
            return DailyQuestion::create([
                'date' => $date,
                'question_ids' => $questionIds,
            ]);
        });
    }

    /**
     * Show a specific question with answer
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('daily-questions.show', compact('question'));
    }
}
