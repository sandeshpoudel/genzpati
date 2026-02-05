@extends('layouts.public')

@section('title', 'Daily Exam Questions - TU Service Commission Assistant Lecturer Preparation')

@section('content')
<div class="container mx-auto px-4 py-10">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
            Daily Exam Questions
        </h1>
        <p class="text-gray-600">TU Service Commission - Assistant Lecturer (BCA & BIT)</p>
        <p class="text-sm text-gray-500">Date: {{ \Carbon\Carbon::parse($dailyQuestions['date'])->format('F d, Y') }}</p>
    </div>

    <!-- GK/IQ Questions Section -->
    <div class="mb-10 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-blue-600 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
            General Knowledge & IQ Questions
        </h2>
        <div class="space-y-4">
            @foreach($dailyQuestions['gk_iq_questions'] as $index => $question)
                <div class="border-l-4 border-blue-500 pl-4 py-2">
                    <p class="font-semibold text-gray-800">Q{{ $index + 1 }}. {{ $question->question }}</p>
                    <button onclick="toggleAnswer('gk-{{ $question->id }}')" class="mt-2 text-sm text-blue-600 hover:text-blue-800">
                        Show Answer
                    </button>
                    <div id="gk-{{ $question->id }}" class="hidden mt-2 p-3 bg-green-50 rounded">
                        <p class="text-green-800"><strong>Answer:</strong> {{ $question->answer }}</p>
                        @if($question->explanation)
                            <p class="text-gray-600 mt-1"><strong>Explanation:</strong> {{ $question->explanation }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- MCQ Questions Section -->
    <div class="mb-10 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-purple-600 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Multiple Choice Questions (Communication, Teaching, Research Aptitude)
        </h2>
        <div class="space-y-6">
            @foreach($dailyQuestions['mcq_questions'] as $index => $question)
                <div class="border-l-4 border-purple-500 pl-4 py-2">
                    <p class="font-semibold text-gray-800 mb-2">Q{{ $index + 1 }}. {{ $question->question }}</p>
                    @if($question->category)
                        <span class="inline-block px-2 py-1 text-xs bg-purple-100 text-purple-800 rounded mb-2">
                            {{ ucwords(str_replace('_', ' ', $question->category)) }}
                        </span>
                    @endif
                    @if($question->options)
                        <div class="ml-4 space-y-1">
                            @foreach($question->options as $key => $option)
                                <div class="text-gray-700">{{ $key }}. {{ $option }}</div>
                            @endforeach
                        </div>
                    @endif
                    <button onclick="toggleAnswer('mcq-{{ $question->id }}')" class="mt-2 text-sm text-purple-600 hover:text-purple-800">
                        Show Answer
                    </button>
                    <div id="mcq-{{ $question->id }}" class="hidden mt-2 p-3 bg-green-50 rounded">
                        <p class="text-green-800"><strong>Answer:</strong> {{ $question->answer }}</p>
                        @if($question->explanation)
                            <p class="text-gray-600 mt-1"><strong>Explanation:</strong> {{ $question->explanation }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Group A Question Section -->
    @if($dailyQuestions['group_a_question'])
    <div class="mb-10 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-green-600 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            Group A Question (Paper I - Communication/Teaching/Research)
        </h2>
        <div class="border-l-4 border-green-500 pl-4 py-2">
            <p class="font-semibold text-gray-800 mb-2">{{ $dailyQuestions['group_a_question']->question }}</p>
            <button onclick="toggleAnswer('group-a-{{ $dailyQuestions['group_a_question']->id }}')" class="mt-2 text-sm text-green-600 hover:text-green-800">
                Show Answer
            </button>
            <div id="group-a-{{ $dailyQuestions['group_a_question']->id }}" class="hidden mt-2 p-3 bg-green-50 rounded">
                <p class="text-green-800 whitespace-pre-line"><strong>Answer:</strong> {{ $dailyQuestions['group_a_question']->answer }}</p>
                @if($dailyQuestions['group_a_question']->explanation)
                    <p class="text-gray-600 mt-2"><strong>Explanation:</strong> {{ $dailyQuestions['group_a_question']->explanation }}</p>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Group B Question Section -->
    @if($dailyQuestions['group_b_question'])
    <div class="mb-10 bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-orange-600 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Group B Question (BCA/BIT Subject - सूचना प्रविधि र कम्पयूटर एप्लिकेसन)
        </h2>
        <div class="border-l-4 border-orange-500 pl-4 py-2">
            <p class="font-semibold text-gray-800 mb-2">{{ $dailyQuestions['group_b_question']->question }}</p>
            @if($dailyQuestions['group_b_question']->category)
                <span class="inline-block px-2 py-1 text-xs bg-orange-100 text-orange-800 rounded mb-2">
                    {{ ucwords(str_replace('_', ' ', $dailyQuestions['group_b_question']->category)) }}
                </span>
            @endif
            <button onclick="toggleAnswer('group-b-{{ $dailyQuestions['group_b_question']->id }}')" class="mt-2 text-sm text-orange-600 hover:text-orange-800">
                Show Answer
            </button>
            <div id="group-b-{{ $dailyQuestions['group_b_question']->id }}" class="hidden mt-2 p-3 bg-orange-50 rounded">
                <p class="text-orange-800 whitespace-pre-line"><strong>Answer:</strong> {{ $dailyQuestions['group_b_question']->answer }}</p>
                @if($dailyQuestions['group_b_question']->explanation)
                    <p class="text-gray-600 mt-2"><strong>Explanation:</strong> {{ $dailyQuestions['group_b_question']->explanation }}</p>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Footer Info -->
    <div class="mt-8 p-4 bg-blue-50 rounded-lg">
        <h3 class="font-bold text-blue-800 mb-2">About This Daily Practice:</h3>
        <ul class="text-sm text-gray-700 space-y-1">
            <li>• <strong>Paper I:</strong> 50 MCQs on Communication Aptitude, Teaching Aptitude, Research, etc.</li>
            <li>• <strong>Group B:</strong> 50 MCQs subject-related + 10 questions (5 from subject + 5 from recent trends, syllabus comparison, research-oriented)</li>
            <li>• <strong>Subject:</strong> BCA and BIT (सूचना प्रविधि र कम्पयूटर एप्लिकेसन)</li>
            <li>• Questions are exam-oriented and designed for TU Service Commission Assistant Lecturer preparation</li>
        </ul>
    </div>
</div>

<script>
    function toggleAnswer(id) {
        const element = document.getElementById(id);
        element.classList.toggle('hidden');
    }
</script>
@endsection
