<?php

namespace App\Imports;

use App\Models\NoteSubjectiveQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSubjectiveQuestions implements ToModel, WithHeadingRow
{
    private $noqs;
    public function __construct(){
        $this->noqs = NoteSubjectiveQuestion::all();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $noq = $this->noqs->where('id',$row['id'])->first();
        return new NoteSubjectiveQuestion([
            'note_id' => $row['note_id'],
            'question' => $row['question'],
            'answer' => $row['answer'],
            'marks' => $row['marks'],
            'created_by' => $row['created_by'],
            'type' => $row['type'],
            'status' => $row['status'],
            'difficulty_level' => $row['difficulty_level'],
            'deleted_at' => $row['deleted_at'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        ]);
    }
}
