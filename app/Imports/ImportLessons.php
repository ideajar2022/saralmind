<?php

namespace App\Imports;

use App\Models\Lesson;
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

class ImportLessons implements ToCollection, WithStartRow, WithCalculatedFormulas
{
    private $programId; 
    private $facultyId; 
    private $gradeId;
    private $subjectId;

    public function __construct($programId=[], $facultyId=[], $gradeId=[], $subjectId=[])
    {
        $this->programId           = $programId;
        $this->facultyId           = $facultyId;
        $this->gradeId             = $gradeId;
        $this->subjectId           = $subjectId;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }


    public function collection(Collection $rows)
    {
        // Validator::make($rows->toArray(), [
        //     '*.0' => 'required',
        //     '*.1' => 'required',
        // ])->validate();

        $created_by = auth()->user()->id;
        foreach ($rows as $key=> $row) {
            Lesson::create([
                // 'program_id'        => $this->programId,
                // 'faculty_id'        => $this->facultyId,
                // 'grade_id'          => $this->gradeId,
                // 'subject_id'        => $this->subjectId,

                'program_id'        => $row[0],
                'faculty_id'        => $row[1],
                'grade_id'          => $row[2],
                'subject_id'        => $row[3],
                'name'              => $row[4],
                'slug'              => $row[5],


                // 'name'              => $row[0],
                // 'slug'              => $row[1],


                'image'             => null,
                'description'       => null,
                'order'             => 0,
                'status'            => 'UNAPPROVED',
                'product_type'      => 'PREMIUM',
                'created_by'        => $created_by,
                'meta_title'        => null,
                'meta_description'  => null,
                'meta_keyword'      => null,

            ]);
        }
    }
}
