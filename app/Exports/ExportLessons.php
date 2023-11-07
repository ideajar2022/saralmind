<?php

namespace App\Exports;

use App\Models\Lesson;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportLessons implements FromCollection, WithMapping, WithHeadings
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

    public function map($lesson) : array {
        return [
            $this->counter++,
            @$lesson->program->name,
            @$lesson->grade->name,
            @$lesson->subject->name,
            @$lesson->unit->name,
            $lesson->name,
            $lesson->slug,
            strip_tags($lesson->description),
            $lesson->status,
            $lesson->product_type,
            Carbon::parse($lesson->created_at)->toFormattedDateString()
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
           'Slug',
           'Description',
           'Status',
           'Product Type',
           'Created At'
        ] ;
    }
}
