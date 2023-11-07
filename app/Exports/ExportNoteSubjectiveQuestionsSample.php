<?php

namespace App\Exports;

use App\Models\NoteSubjectiveQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportNoteSubjectiveQuestionsSample implements FromCollection, WithMapping, WithHeadings
{
    private $result;

    public function __construct($result=[])
    {
        $this->result           = $result;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->result;
    }

    public function map($row) : array {
        return [
            
        ] ;
 
 
    }
 
    public function headings() : array {
        return [
           '#',
           'Question',
           'Answer',
           'Marks',
           'Type',
           'Difficulty Level',
           'Status'
        ] ;
    }
}
