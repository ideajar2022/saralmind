<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\V1\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteApiController extends BaseController
{
    private $note;

    public function __construct(Note $note)
    {
        $this->middleware('client');
        $this->note         = $note;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note        = $this->note->select(['id','title','description','summary','things_to_remember','status','program_id','grade_id','subject_id','lesson_id','unit_id'])->with(['program','grade','subject','unit','lesson']);

        if (request()->has('q')) {
            $title       = request('q');
            $note        = $note->where('title','LIKE',"%{$title}%");
        }

        $notes           = $note->whereStatus('APPROVED')->latest()->paginate(20)->appends([
            'q'                 => request('q'),
        ]);
        return $this->sendResponse($notes, 'Notes');
    }
}
