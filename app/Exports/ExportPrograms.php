<?php

namespace App\Exports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportPrograms implements FromCollection, WithMapping, WithHeadings
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

    public function map($program) : array {
        return [
            $this->counter++,
            $program->name,
            $program->slug,
            $program->code,
            strip_tags($program->description),
            $program->status,
            $program->product_type,
            Carbon::parse($program->created_at)->toFormattedDateString()
        ] ;
 
 
    }
 
    public function headings() : array {
        return [
           '#',
           'Program',
           'Slug',
           'Code',
           'Description',
           'Status',
           'Product Type',
           'Created At'
        ] ;
    }
}
