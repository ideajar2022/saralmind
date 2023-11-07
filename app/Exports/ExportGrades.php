<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportGrades implements FromCollection, WithMapping, WithHeadings
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

    public function map($row) : array {
        return [
            $this->counter++,
            @$row->studyPeriodParent->name,
            @$row->studyPeriodChild->name,
            $row->name,
            $row->slug,
            $row->code,
            strip_tags($row->description),
            $row->status,
            $row->product_type,
            Carbon::parse($row->created_at)->toFormattedDateString()
        ] ;
 
 
    }
 
    public function headings() : array {
        return [
           '#',
           'Study Period Parent',
           'Study Period Child',
           'Class',
           'Slug',
           'Code',
           'Description',
           'Status',
           'Product Type',
           'Created At'
        ] ;
    }
}
