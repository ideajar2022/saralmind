<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportUnits implements FromCollection, WithMapping, WithHeadings
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

    public function map($unit) : array {
        return [
            $this->counter++,
            @$unit->program->name,
            @$unit->grade->name,
            @$unit->subject->name,
            $unit->name,
            $unit->slug,
            strip_tags($unit->description),
            $unit->status,
            $unit->product_type,
            Carbon::parse($unit->created_at)->toFormattedDateString()
        ] ;
 
 
    }
 
    public function headings() : array {
        return [
           '#',
           'Program',
           'Grade',
           'Subject',
           'Unit',
           'Slug',
           'Description',
           'Status',
           'Product Type',
           'Created At'
        ] ;
    }
}
