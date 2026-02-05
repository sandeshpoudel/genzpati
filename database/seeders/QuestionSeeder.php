<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GK/IQ Questions
        $gkIqQuestions = [
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'What is the capital of Nepal?',
                'options' => null,
                'answer' => 'Kathmandu',
                'explanation' => 'Kathmandu is the capital and largest city of Nepal.',
                'difficulty' => 1,
            ],
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'Who is known as the father of computer science?',
                'options' => null,
                'answer' => 'Alan Turing',
                'explanation' => 'Alan Turing is widely considered to be the father of theoretical computer science and artificial intelligence.',
                'difficulty' => 2,
            ],
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'Complete the series: 2, 4, 8, 16, __?',
                'options' => null,
                'answer' => '32',
                'explanation' => 'Each number is double the previous number (2×2=4, 4×2=8, 8×2=16, 16×2=32).',
                'difficulty' => 2,
            ],
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'What is the time complexity of binary search?',
                'options' => null,
                'answer' => 'O(log n)',
                'explanation' => 'Binary search divides the search space in half at each step, resulting in logarithmic time complexity.',
                'difficulty' => 3,
            ],
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'Which programming paradigm does Java primarily support?',
                'options' => null,
                'answer' => 'Object-Oriented Programming (OOP)',
                'explanation' => 'Java is primarily an object-oriented programming language, though it also supports other paradigms.',
                'difficulty' => 2,
            ],
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'What does HTTP stand for?',
                'options' => null,
                'answer' => 'HyperText Transfer Protocol',
                'explanation' => 'HTTP is the foundation of data communication on the World Wide Web.',
                'difficulty' => 1,
            ],
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'If A=1, B=2, C=3, what is the sum of NEPAL?',
                'options' => null,
                'answer' => '48',
                'explanation' => 'N=14, E=5, P=16, A=1, L=12. Sum: 14+5+16+1+12=48',
                'difficulty' => 2,
            ],
            [
                'type' => 'gk_iq',
                'category' => 'general_knowledge',
                'question' => 'What is the smallest unit of data in a computer?',
                'options' => null,
                'answer' => 'Bit',
                'explanation' => 'A bit (binary digit) is the smallest unit of data, represented as either 0 or 1.',
                'difficulty' => 1,
            ],
        ];

        // MCQ Questions
        $mcqQuestions = [
            [
                'type' => 'mcq',
                'category' => 'communication_apt',
                'question' => 'Effective communication is characterized by:',
                'options' => [
                    'A' => 'Clear and concise message',
                    'B' => 'Ambiguous statements',
                    'C' => 'Complex vocabulary',
                    'D' => 'One-way transmission',
                ],
                'answer' => 'A',
                'explanation' => 'Effective communication requires clarity and conciseness to ensure the message is understood correctly.',
                'difficulty' => 2,
            ],
            [
                'type' => 'mcq',
                'category' => 'teaching_apt',
                'question' => 'Which of the following is the most important quality of a good teacher?',
                'options' => [
                    'A' => 'Subject knowledge',
                    'B' => 'Communication skills',
                    'C' => 'Ability to motivate students',
                    'D' => 'All of the above',
                ],
                'answer' => 'D',
                'explanation' => 'A good teacher needs a combination of subject knowledge, communication skills, and the ability to motivate students.',
                'difficulty' => 2,
            ],
            [
                'type' => 'mcq',
                'category' => 'research',
                'question' => 'What is the first step in the research process?',
                'options' => [
                    'A' => 'Data collection',
                    'B' => 'Problem identification',
                    'C' => 'Hypothesis formulation',
                    'D' => 'Literature review',
                ],
                'answer' => 'B',
                'explanation' => 'The research process begins with identifying and defining the research problem.',
                'difficulty' => 2,
            ],
            [
                'type' => 'mcq',
                'category' => 'communication_apt',
                'question' => 'Non-verbal communication includes:',
                'options' => [
                    'A' => 'Body language',
                    'B' => 'Facial expressions',
                    'C' => 'Gestures',
                    'D' => 'All of the above',
                ],
                'answer' => 'D',
                'explanation' => 'Non-verbal communication encompasses all forms of communication without words, including body language, facial expressions, and gestures.',
                'difficulty' => 1,
            ],
            [
                'type' => 'mcq',
                'category' => 'teaching_apt',
                'question' => 'Student-centered learning emphasizes:',
                'options' => [
                    'A' => 'Teacher as the sole authority',
                    'B' => 'Passive learning',
                    'C' => 'Active participation of students',
                    'D' => 'Rote memorization',
                ],
                'answer' => 'C',
                'explanation' => 'Student-centered learning focuses on active participation and engagement of students in the learning process.',
                'difficulty' => 2,
            ],
            [
                'type' => 'mcq',
                'category' => 'research',
                'question' => 'A hypothesis is:',
                'options' => [
                    'A' => 'A proven fact',
                    'B' => 'A tentative statement',
                    'C' => 'A research conclusion',
                    'D' => 'A data collection method',
                ],
                'answer' => 'B',
                'explanation' => 'A hypothesis is a tentative statement or educated guess that can be tested through research.',
                'difficulty' => 2,
            ],
            [
                'type' => 'mcq',
                'category' => 'communication_apt',
                'question' => 'Barriers to effective communication include:',
                'options' => [
                    'A' => 'Language differences',
                    'B' => 'Physical noise',
                    'C' => 'Psychological barriers',
                    'D' => 'All of the above',
                ],
                'answer' => 'D',
                'explanation' => 'Communication barriers can be linguistic, physical, or psychological in nature.',
                'difficulty' => 2,
            ],
            [
                'type' => 'mcq',
                'category' => 'teaching_apt',
                'question' => 'Bloom\'s Taxonomy is related to:',
                'options' => [
                    'A' => 'Learning objectives',
                    'B' => 'Student discipline',
                    'C' => 'Classroom management',
                    'D' => 'Grading system',
                ],
                'answer' => 'A',
                'explanation' => 'Bloom\'s Taxonomy is a framework for categorizing educational learning objectives.',
                'difficulty' => 2,
            ],
        ];

        // Group A Questions (Descriptive)
        $groupAQuestions = [
            [
                'type' => 'group_a',
                'category' => 'teaching_apt',
                'question' => 'Discuss the importance of effective communication in teaching and explain various communication strategies that can be employed in a classroom setting.',
                'options' => null,
                'answer' => 'Effective communication in teaching is crucial for:
1. Knowledge Transfer: Clear communication ensures students understand concepts properly.
2. Student Engagement: Good communication keeps students interested and motivated.
3. Building Relationships: Creates a positive learning environment.
4. Feedback: Enables constructive feedback and assessment.

Communication Strategies:
1. Clear and Simple Language: Use vocabulary appropriate to student level.
2. Visual Aids: Use diagrams, charts, and presentations.
3. Active Listening: Pay attention to student queries and concerns.
4. Body Language: Use appropriate gestures and maintain eye contact.
5. Interactive Sessions: Encourage questions and discussions.
6. Multiple Channels: Use verbal, written, and digital communication.
7. Feedback Loop: Regular assessment and feedback mechanisms.',
                'explanation' => 'This answer covers both theoretical importance and practical strategies for classroom communication.',
                'difficulty' => 3,
            ],
            [
                'type' => 'group_a',
                'category' => 'research',
                'question' => 'Explain the steps involved in conducting educational research. What are the ethical considerations that a researcher must keep in mind?',
                'options' => null,
                'answer' => 'Steps in Educational Research:
1. Identify Research Problem: Define the issue to be investigated.
2. Literature Review: Study existing research on the topic.
3. Formulate Hypothesis: Develop testable statements.
4. Research Design: Choose methodology (qualitative/quantitative).
5. Data Collection: Gather information through surveys, interviews, or experiments.
6. Data Analysis: Analyze collected data using appropriate tools.
7. Interpretation: Draw conclusions from the analysis.
8. Report Writing: Document findings in a structured manner.

Ethical Considerations:
1. Informed Consent: Participants must voluntarily agree to participate.
2. Confidentiality: Protect participant privacy and data.
3. No Harm: Ensure research doesn\'t cause physical or psychological harm.
4. Honesty: Report findings truthfully without fabrication.
5. Plagiarism: Give proper credit to others\' work.
6. Objectivity: Avoid bias in data collection and analysis.',
                'explanation' => 'Educational research follows systematic steps and must adhere to ethical principles to protect participants and ensure validity.',
                'difficulty' => 3,
            ],
        ];

        // Group B Questions (BCA/BIT Subject-specific)
        $groupBQuestions = [
            [
                'type' => 'group_b',
                'category' => 'bca_bit_subject',
                'question' => 'Explain the concept of Object-Oriented Programming (OOP) and discuss its four main principles with examples from Java or C++.',
                'options' => null,
                'answer' => 'Object-Oriented Programming (OOP) is a programming paradigm based on the concept of objects that contain data and code.

Four Main Principles:

1. Encapsulation:
- Bundling data and methods that operate on that data within a single unit (class).
- Example: A BankAccount class with private balance field and public deposit/withdraw methods.
- Benefits: Data hiding, security, modularity.

2. Inheritance:
- Mechanism where a new class derives properties from an existing class.
- Example: Student class inheriting from Person class.
- Benefits: Code reusability, hierarchical classification.

3. Polymorphism:
- Ability of objects to take multiple forms.
- Types: Compile-time (method overloading) and Runtime (method overriding).
- Example: Shape class with draw() method implemented differently in Circle, Rectangle subclasses.
- Benefits: Flexibility, extensibility.

4. Abstraction:
- Hiding complex implementation details and showing only essential features.
- Example: Abstract Vehicle class with abstract method start().
- Benefits: Reduces complexity, enhances maintainability.',
                'explanation' => 'OOP principles are fundamental to modern software development and are core topics in BCA/BIT curriculum.',
                'difficulty' => 3,
            ],
            [
                'type' => 'group_b',
                'category' => 'recent_trends',
                'question' => 'Discuss the recent trends in Artificial Intelligence and Machine Learning. How are these technologies being applied in Nepal\'s IT sector?',
                'options' => null,
                'answer' => 'Recent Trends in AI/ML:

1. Deep Learning:
- Neural networks with multiple layers
- Applications: Image recognition, NLP, autonomous vehicles

2. Natural Language Processing:
- ChatGPT, BERT, transformers
- Applications: Chatbots, translation, sentiment analysis

3. Computer Vision:
- Object detection, facial recognition
- Applications: Security, healthcare diagnostics

4. Edge AI:
- AI processing on local devices
- Applications: IoT, mobile apps

5. Explainable AI (XAI):
- Making AI decisions interpretable
- Important for trust and accountability

Applications in Nepal:

1. eSewa/Khalti: Fraud detection using ML
2. Healthcare: Disease prediction, telemedicine
3. Agriculture: Crop disease detection, yield prediction
4. Banking: Risk assessment, customer service chatbots
5. Education: Personalized learning systems
6. Startups: Various AI-powered solutions

Challenges:
- Limited infrastructure
- Lack of quality datasets
- Need for skilled professionals
- High computational costs

Opportunities:
- Growing IT sector
- Government digitalization initiatives
- Increasing startup ecosystem',
                'explanation' => 'This demonstrates knowledge of current technology trends and their local context, which is important for Assistant Lecturer positions.',
                'difficulty' => 4,
            ],
            [
                'type' => 'group_b',
                'category' => 'bca_bit_subject',
                'question' => 'What is a Database Management System (DBMS)? Explain the differences between SQL and NoSQL databases with suitable examples.',
                'options' => null,
                'answer' => 'Database Management System (DBMS):
A software system that enables users to create, maintain, and manipulate databases. It provides an interface between the database and users/applications.

Key Functions:
- Data storage and retrieval
- Data security and integrity
- Concurrent access control
- Backup and recovery

SQL Databases (Relational):

Characteristics:
- Structured data in tables (rows and columns)
- Predefined schema
- ACID properties (Atomicity, Consistency, Isolation, Durability)
- Uses SQL for querying

Examples: MySQL, PostgreSQL, Oracle, SQL Server

Best for:
- Complex queries and transactions
- Banking systems, ERP systems
- When data relationships are important

NoSQL Databases (Non-relational):

Characteristics:
- Flexible schema
- Distributed architecture
- Horizontal scalability
- Various data models (document, key-value, graph, column)

Examples: MongoDB, Cassandra, Redis, Neo4j

Types:
1. Document: MongoDB (JSON-like documents)
2. Key-Value: Redis (caching)
3. Column: Cassandra (wide column stores)
4. Graph: Neo4j (relationship-focused)

Best for:
- Big data applications
- Real-time web applications
- Unstructured or semi-structured data
- High-volume, high-velocity data

Comparison:
SQL: Structured, ACID, vertical scaling, complex queries
NoSQL: Flexible, eventual consistency, horizontal scaling, simple queries',
                'explanation' => 'Understanding both SQL and NoSQL is crucial for modern application development.',
                'difficulty' => 3,
            ],
        ];

        // Insert all questions
        foreach ($gkIqQuestions as $question) {
            Question::create($question);
        }

        foreach ($mcqQuestions as $question) {
            Question::create($question);
        }

        foreach ($groupAQuestions as $question) {
            Question::create($question);
        }

        foreach ($groupBQuestions as $question) {
            Question::create($question);
        }
    }
}
