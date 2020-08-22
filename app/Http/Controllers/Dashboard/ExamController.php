<?php

namespace App\Http\Controllers\Dashboard;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamCreateRequest;
use App\Http\Requests\ExamEditRequest;
use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;

class ExamController extends Controller
{
    protected $base_view_path = 'dashboard.exams.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = request()->get('page', 1);
        $data['counter_offset'] = ($index * 20) - 20;

        $data['resources'] = Exam::paginate(20);

        return view($this->base_view_path . 'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->base_view_path . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamCreateRequest $request)
    {
        $now = Carbon::now();
        $data = $request->all();

        $data['video'] = $data['video']->store('/', ['disk' => 'public_uploads']);
        $data['video_thumbnail'] = $data['video_thumbnail']->store('/', ['disk' => 'public_uploads']);

        $exam = Exam::create($data);
        $questions_data = array_map(function ($questions) use ($exam, $now) {
            return [
                'exam_id' => $exam->id,
                'question' => $questions['question'],
                'answer' => $questions['answer'],
                'answers' => json_encode($questions['answers']),
                'created_at' => $now->toDateTimeString(),
            ];
        }, $data['question']);
        Question::insert($questions_data);

        return redirect()->route('exams.index')->with('message', [
            'type' => 'success',
            'message' => 'Exam created successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $data['resource'] = $exam;
        return view($this->base_view_path . 'show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $data['resource'] = $exam;
        $data['questions'] = $exam->questions()->get()->toArray();
        return view($this->base_view_path . 'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamEditRequest $request, Exam $exam)
    {
        $now = Carbon::now();
        $data = $request->all();

        if ($request->get('video')) {
            $data['video'] = $data['video']->store('/', ['disk' => 'public_uploads']);
        } elseif (array_key_exists('video', $data)) {
            unset($data['video']);
        }
        if ($request->get('video_thumbnail')) {
            $data['video_thumbnail'] = $data['video_thumbnail']->store('/', ['disk' => 'public_uploads']);
        } elseif (array_key_exists('video_thumbnail', $data)) {
            unset($data['video_thumbnail']);
        }

        $exam->update($data);
        $questions_data = array_map(function ($questions) use ($exam, $now) {
            return [
                'exam_id' => $exam->id,
                'question' => $questions['question'],
                'answer' => $questions['answer'],
                'answers' => json_encode($questions['answers']),
                'created_at' => $now->toDateTimeString(),
            ];
        }, $data['question']);
        $exam->questions()->delete();
        Question::insert($questions_data);

        return redirect()->route('exams.index')->with('message', [
            'type' => 'success',
            'message' => 'Exam updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        Storage::disk('public_uploads')->delete($exam->video, $exam->video_thumbnail);
        $exam->questions()->delete(); // Just in case
        $exam->delete();
        return redirect()->route('exams.index')->with('message', [
            'type' => 'success',
            'message' => 'Exam deleted successfully.',
        ]);
    }
}
