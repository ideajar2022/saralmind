<?php

namespace App\Exports;

use App\Models\NoteVideo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportNoteVideos implements FromCollection, WithMapping, WithHeadings
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

    public function map($noteVideo) : array {
        return [
            $this->counter++,
            @$noteVideo->note->program->name,
            @$noteVideo->note->grade->name,
            @$noteVideo->note->subject->name,
            @$noteVideo->note->unit->name,
            @$noteVideo->note->lesson->name,
            @$noteVideo->note->title,
            $noteVideo->url,
            $noteVideo->title,
            $noteVideo->description,
            $noteVideo->type,
            $noteVideo->status,
            Carbon::parse($noteVideo->created_at)->toFormattedDateString()
        ] ;
 
 
    }
 
    public function headings() : array {
        return [
           '#',
           'Program',
           'Grade',
           'Subject',
           'Unit',
           'Lesson',
           'Note',
           'URL',
           'Title',
           'Description',
           'Type',
           'Status',
           'Created At'
        ] ;
    }
}
