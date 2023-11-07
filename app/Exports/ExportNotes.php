<?php

namespace App\Exports;

use App\Models\Note;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportNotes implements FromCollection, WithMapping, WithHeadings
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

    public function map($note) : array {
        return [
            $this->counter++,
            @$note->program->name,
            @$note->grade->name,
            @$note->subject->name,
            @$note->unit->name,
            @$note->lesson->name,
            $note->title,
            $note->slug,
            $note->description,
            $note->summary,
            $note->things_to_remember,
            $note->status,
            $note->product_type,
            Carbon::parse($note->created_at)->toFormattedDateString()
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
           'Slug',
           'Description',
           'Summary',
           'Things to Remember',
           'Status',
           'Product Type',
           'Created At'
        ] ;
    }
}
