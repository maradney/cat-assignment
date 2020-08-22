<?php

namespace App\Exports;

use App\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GradesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Grade::with(['user', 'exam'])
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    /**
    * @var Grade $grade
    */
    public function map($grade): array
    {
        return [
            $grade->user->name,
            $grade->exam->name,
            $grade->grade,
            $grade->created_at->toDayDateTimeString(),
        ];
    }

    public function headings(): array
    {
        return [
            'User',
            'Exam',
            'Grade',
            'Exame taken on',
        ];
    }
}
