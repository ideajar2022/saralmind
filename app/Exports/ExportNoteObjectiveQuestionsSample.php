<?php

namespace App\Exports;

use App\Models\NoteObjectiveQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportNoteObjectiveQuestionsSample implements FromCollection, WithMapping, WithHeadings
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
            'Correct Answer',
            'Option1',
            'Option2',
            'Option3',
            'Option4',
            'Option5',
            'Option6',
            'Option7',
            'Option8',
            'Option9',
            'Option10',
            'Explanation',
            'Marks',
            'Difficulty Level',
            'Status',
        ] ;
    }
}
