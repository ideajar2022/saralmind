<?php

namespace App\Imports;

use App\Models\NoteSubjectiveQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportNoteSubjectiveQuestions implements ToCollection, WithStartRow
{
    private $noteId;

    public function __construct($noteId=[])
    {
        $this->noteId              = $noteId;
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
        Validator::make($rows->toArray(), [
            // '*.0' => 'required|min:3',
            '*.0' => 'required',
            
            // '*.2' => 'nullable|numeric|between:0,30',
            // '*.3' => 'required|in:VERYSHORT,SHORT,LONG,VERYLONG',
        ])->validate();

           
        foreach ($rows as $key=> $row) {
            
            NoteSubjectiveQuestion::create([
                'note_id'           => $this->noteId,
                'question'          => $row[0],
                'answer'            => $row[1],
                'marks'             => $row[2],
                'created_by'        => auth()->user()->id,
                'type'              => $row[3],
                'status'            => 'APPROVED',
                'difficulty_level'  => 'EASY',
                'updated_by'        => null,

            ]);
        }
    }
}
