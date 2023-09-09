<?php

namespace App\Imports;

use App\Company;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CompanyImport implements ToModel, WithChunkReading, WithBatchInserts, ShouldQueue
{
    use SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Company([
            'company_name' => $row[1],
            'domain' => $row[2],
            'year_founded' => $row[3],
            'industry' => $row[4],
            'size_range' => $row[5],
            'locality' => $row[6],
            'country' => $row[6],
            'linkedin_url' => $row[9],
            'current_employee_estimate' => $row[9],
            'total_employee_estimate' => $row[10],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
