<?php

use App\Exam;
use App\Question;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        Exam::insert([
            [
                'name' => "[ThePruld] I'm into the abyss",
                'video' => 'abyss.mp4',
                'video_thumbnail' => 'solair.png',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'name' => 'Lucifer 4x01 Lucifer sings Creep',
                'video' => 'lucifer.mp4',
                'video_thumbnail' => 'creep.png',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'name' => "MIKE TYSON NEW EXPLOSIVE TRAINING VIDEO",
                'video' => "MIKETYSON.mp4",
                'video_thumbnail' => 'Tyson.png',
                'created_at' => $now->toDateTimeString(),
            ],
        ]);

        Question::insert([
            [
                'exam_id' => 1,
                'question' => 'Is this video funny ?',
                'answer' => '0',
                'answers' => json_encode([
                    'Yes',
                    'No',
                    'No',
                ]),
            ],
            [
                'exam_id' => 1,
                'question' => 'Did I over do it with this assignment ?',
                'answer' => '1',
                'answers' => json_encode([
                    'No',
                    'Yes',
                    'No',
                ]),
            ],
            [
                'exam_id' => 1,
                'question' => 'What are they speaking ?',
                'answer' => '2',
                'answers' => json_encode([
                    'English',
                    'Moon-people language',
                    'no hablo espanol',
                ]),
            ],
            [
                'exam_id' => 1,
                'question' => 'Where is solair ?',
                'answer' => '2',
                'answers' => json_encode([
                    'Anor Londo',
                    'Firelink shrine',
                    'The abyss',
                ]),
            ],
            [
                'exam_id' => 1,
                'question' => 'What is solair doing there ?',
                'answer' => '1',
                'answers' => json_encode([
                    'Searching for souls',
                    'Searching for his sun',
                    'Searching for a weapon',
                ]),
            ],
        ]);

        Question::insert([
            [
                'exam_id' => 2,
                'question' => 'Isn\'t this the best song of all time ?',
                'answer' => '0',
                'answers' => json_encode([
                    'Yes',
                    'No',
                    'No',
                ]),
            ],
            [
                'exam_id' => 2,
                'question' => 'What\'s the name of this song ?',
                'answer' => '1',
                'answers' => json_encode([
                    'The scientest',
                    'Creep',
                    'Time',
                ]),
            ],
            [
                'exam_id' => 2,
                'question' => 'Who\'s singing the song in this video ?',
                'answer' => '0',
                'answers' => json_encode([
                    'Tom Ellis',
                    'Tom Cruis',
                    'Tom from Tom & Jerry',
                ]),
            ],
            [
                'exam_id' => 2,
                'question' => 'Who\'s singing the original song ?',
                'answer' => '0',
                'answers' => json_encode([
                    'Radiohead',
                    'Coldplay',
                    'Muse',
                ]),
            ],
            [
                'exam_id' => 2,
                'question' => 'What\'s the name of the show in which this video was taken ?',
                'answer' => '2',
                'answers' => json_encode([
                    'Dexter',
                    'Friends',
                    'Lucifer',
                ]),
            ],
        ]);

        Question::insert([
            [
                'exam_id' => 3,
                'question' => 'Who\'s the man in this video ?',
                'answer' => '1',
                'answers' => json_encode([
                    'Tyson Fury',
                    'Mike Tyson',
                    'Floyd Mayweather',
                ]),
            ],
            [
                'exam_id' => 3,
                'question' => 'What\'s was his nickname ?',
                'answer' => '2',
                'answers' => json_encode([
                    'Marvelous',
                    'Money',
                    'Iron',
                ]),
            ],
            [
                'exam_id' => 3,
                'question' => 'What\'s was his divison ?',
                'answer' => '2',
                'answers' => json_encode([
                    'Feather weight',
                    'Middle weight',
                    'Heavey weight',
                ]),
            ],
            [
                'exam_id' => 3,
                'question' => 'How old is he now ?',
                'answer' => '2',
                'answers' => json_encode([
                    '+30 - 40',
                    '+40 - 50',
                    '+50 - 60',
                ]),
            ],
            [
                'exam_id' => 3,
                'question' => 'What type of boxer is he ?',
                'answer' => '1',
                'answers' => json_encode([
                    'Counter puncher',
                    'Knockout artist',
                    'Poker', // ran out of ideas
                ]),
            ],
        ]);
    }
}
