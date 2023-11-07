<?php

namespace App\Imports;

use App\Models\Glossary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportGlossaries implements ToCollection, WithStartRow
{
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
            '*.1' => 'required|string|unique:glossaries,word',
            '*.2' => 'required|string',
            '*.3' => 'required|string',
            '*.4' => 'required|in:UNAPPROVED,APPROVED,DISAPPROVED',
         ])->validate();

        foreach ($rows as $key=> $row) {
        
            Glossary::create([
                'word'               => $row[1],
                'meaning_english'    => $row[2],
                'meaning_nepali'     => $row[3],
                'status'             => $row[4],
            ]);
        }
    }
}
