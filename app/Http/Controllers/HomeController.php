<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Grade;
use App\Http\Requests\TakeExamRequest;
use App\Events\ExamTaken;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['exams'] = Exam::with('questions')
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('home', $data);
    }

    /**
     * @OA\POST(
     *      path="/answers/{exam}",
     *      tags={"Exams"},
     *      summary="Submit exam asnswers.",
     *      description="Post user's answers to a specific exam.",
     *      @OA\Parameter(
     *          name="id",
     *          description="Exam id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *          required={"videoStarted", "videoFinished", "answers"},
     *              @OA\Property(property="videoStarted", type="boolean"),
     *              @OA\Property(property="videoFinished", type="boolean"),
     *              @OA\Property(property="answers", type="array", example="[ [ id: question id, answer: answer ] ]",
     *                  @OA\Items(
     *                      type="array",
     *                      @OA\Items(
     *                          type="string",
     *                          example={"question id","answer"},
     *                      ),
     *                  )
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success message"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthenticted"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function answers(TakeExamRequest $request, Exam $exam)
    {
        $user = auth()->user();
        $data = $request->all();

        $video_starting_grade = $data['videoStarted'] ? 5 : 0;
        $video_finishing_grade = $data['videoFinished'] ? 5 : 0;
        $answers_grades = 0;
        $questions = $exam->questions;
        foreach ($data['answers'] as $answer) {
            $question = $questions->where('id', $answer['id'])->first();
            if ($question) {
                $correct_answer = $question->answers[intval($question->answer)];
                if ($correct_answer === $answer['answer']) {
                    $answers_grades += 2;
                }
            }
        }
        $grade = $video_starting_grade + $video_finishing_grade + $answers_grades;
        Grade::create([
            'user_id' => $user->id,
            'exam_id' => $exam->id,
            'grade' => $grade,
        ]);

        broadcast(new ExamTaken($user, "$user->name scored $grade on `$exam->name` exam."))->toOthers();
        return response()->json([
            'message' => "Thanks for taking `$exam->name` exam. Your score is $grade",
        ]);
    }
}
