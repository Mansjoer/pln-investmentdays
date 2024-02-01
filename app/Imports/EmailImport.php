<?php

namespace App\Imports;

use App\Models\Email;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class EmailImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Email::createOrUpdate([
                'name' => $row[1],
                'company' => $row[2],
                'position' => $row[3],
                'email' => $row[4],
                'cc' => $row[5]
            ]);
        }
    }
}
