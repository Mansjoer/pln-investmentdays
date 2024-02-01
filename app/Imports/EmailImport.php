<?php

namespace App\Imports;

use App\Models\Email;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class EmailImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Email::updateOrCreate([
                'email' => $row[5]
            ], [
                'token' => Str::random(15),
                'name' => $row[3],
                'company' => $row[1],
                'position' => $row[4],
                'email' => $row[5],
                'cc' => $row[6]
            ]);
        }
    }
}
