<?php

namespace App\Exports;

use App\Models\NoteObjectiveQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportNoteObjectiveQuestions implements FromCollection, WithMapping, WithHeadings
{
    private $result;
    private $counter;

    public function __construct($result=[])
    {
        $this->counter          = 1;
        $this->result           = $result;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return NoteObjectiveQuestion::with('note')->get();
        return $this->result;
    }

    public function map($noteObjectiveQuestion) : array {
        return [
            $this->counter++,
            @$noteObjectiveQuestion->note->program->name,
            @$noteObjectiveQuestion->note->grade->name,
            @$noteObjectiveQuestion->note->subject->name,
            @$noteObjectiveQuestion->note->unit->name,
            @$noteObjectiveQuestion->note->lesson->name,
            @$noteObjectiveQuestion->note->title,
            strip_tags($noteObjectiveQuestion->question),
            strip_tags($noteObjectiveQuestion->correct_answer),
            strip_tags($noteObjectiveQuestion->option_1),
            strip_tags($noteObjectiveQuestion->option_2),
            strip_tags($noteObjectiveQuestion->option_3),
            strip_tags($noteObjectiveQuestion->option_4),
            strip_tags($noteObjectiveQuestion->option_5),
            strip_tags($noteObjectiveQuestion->explanation),
            $noteObjectiveQuestion->status,
            $noteObjectiveQuestion->difficulty_level,
            Carbon::parse($noteObjectiveQuestion->created_at)->toFormattedDateString()
        ] ;
 
 
    }
 
    public function headings() : array {
        return [
           '#',
           'Program',
           'Class',
           'Subject',
           'Unit',
           'Lesson',
           'Note',
           'Question',
           'Correct Answer',
           'Option1',
           'Option2',
           'Option3',
           'Option4',
           'Option5',
           'Explanation',
           'Status',
           'Difficulty Level',
           'Created At'
        ] ;
    }
}
