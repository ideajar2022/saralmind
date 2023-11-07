<?php

namespace App\Imports;

use App\Models\NNCLiscenseQuestion;
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

class ImportNNCObjectiveQuestions implements ToCollection, WithStartRow, WithCalculatedFormulas
{
    private $categoryId;

    public function __construct($categoryId=[])
    {
        $this->categoryId           = $categoryId;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required',
            '*.1' => 'required',
        ])->validate();
    

        foreach ($rows as $key=> $row) {
            NNCLiscenseQuestion::create([
                'category_id'               => $this->categoryId,
                'question'                  => $row[0],
                'correct_answer'            => $row[1],
                'option_1'                  => $row[2],
                'option_2'                  => $row[3],
                'option_3'                  => $row[4],
            ]);
        }
    }
}
