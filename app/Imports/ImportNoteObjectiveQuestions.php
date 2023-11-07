<?php

namespace App\Imports;

use App\Models\NoteObjectiveQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportNoteObjectiveQuestions implements ToCollection, WithStartRow
{
    private $noteId;

    public function __construct($noteId=[])
    {
        $this->noteId           = $noteId;
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
            '*.1' => 'required|min:3',
            '*.2' => 'required',
            '*.3' => 'required',
            '*.4' => 'required',
            '*.14' => 'nullable|numeric|between:0,30',
            '*.15' => 'required|in:EASY,MEDIUM,HARD',
            '*.16' => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
        ])->validate();
           
        foreach ($rows as $key=> $row) {
            
            NoteObjectiveQuestion::create([
                'note_id'     => $this->noteId,
                'question'    => $row[1],
                'correct_answer'    => $row[2],
                'option_1'    => $row[3],
                'option_2'    => $row[4],
                'option_3'    => $row[5],
                'option_4'    => $row[6],
                'option_5'    => $row[7],
                'option_6'    => $row[8],
                'option_7'    => $row[9],
                'option_8'    => $row[10],
                'option_9'    => $row[11],
                'option_10'   => $row[12],
                'explanation' => $row[13],
                'marks'            => $row[14],
                'difficuty_level'  => $row[15],
                'status'           => $row[16],
            ]);
        }
    }
}
