<?php

namespace App\Exports;

use App\Models\NoteSubjectiveQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportNoteSubjectiveQuestions implements FromCollection, WithMapping, WithHeadings
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
            strip_tags($noteObjectiveQuestion->answer),
            $noteObjectiveQuestion->type,
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
           'Answer',
           'Type',
           'Status',
           'Difficulty Level',
           'Created At'
        ] ;
    }
}
