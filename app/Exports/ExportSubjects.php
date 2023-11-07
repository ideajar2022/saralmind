<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportSubjects implements FromCollection, WithMapping, WithHeadings
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

    public function map($subject) : array {
        return [
            $this->counter++,
            @$subject->program->name,
            @$subject->grade->name,
            $subject->name,
            $subject->slug,
            $subject->code,
            strip_tags($subject->description),
            $subject->status,
            $subject->product_type,
            Carbon::parse($subject->created_at)->toFormattedDateString()
        ] ;
 
 
    }
 
    public function headings() : array {
        return [
           '#',
           'Program',
           'Grade',
           'Subject',
           'Slug',
           'Code',
           'Description',
           'Status',
           'Product Type',
           'Created At'
        ] ;
    }
}
