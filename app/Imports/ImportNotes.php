<?php

namespace App\Imports;

use App\Models\Note;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ImportNotes implements ToCollection, WithStartRow, WithCalculatedFormulas
{
    private $programId; 
    private $facultyId;
    private $gradeId;
    private $subjectId;
    private $lessonId;

    public function __construct($programId=[], $facultyId=[], $gradeId=[], $subjectId=[], $lessonId=[])
    {
        $this->programId           = $programId;
        $this->facultyId           = $facultyId;
        $this->gradeId             = $gradeId;
        $this->subjectId           = $subjectId;
        $this->lessonId            = $lessonId;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required',
            '*.1' => 'required',
        ])->validate();

        $created_by = auth()->user()->id;

        foreach ($rows as $key=> $row) {
            Note::create([
                // 'program_id'                => $this->programId,
                // 'faculty_id'                => $this->facultyId,
                // 'grade_id'                  => $this->gradeId,
                // 'subject_id'                => $this->subjectId,

                'program_id'                => $row[0],
                'faculty_id'                => $row[1],
                'grade_id'                  => $row[2],
                'subject_id'                => $row[3],
                'unit_id'                   => null,
                'lesson_id'                 => $row[4],

                'title'                     => $row[5],
                'slug'                      => $row[6],
                'description'               => $row[7],
                'summary'                   => $row[8],
                'things_to_remember'        => $row[9],
                'image'                     => null,
                'created_by'                => $created_by,
                'counter'                   => 0,
                'meta_title'                => null,
                'meta_description'          => null,
                'meta_keyword'              => null,
                'order'                     => 0,
                'status'                    => 'UNAPPROVED',
                'product_type'              => 'PREMIUM',
                'updated_by'                => '[]',
            ]);
        }
    }
}
