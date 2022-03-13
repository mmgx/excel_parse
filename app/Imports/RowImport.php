<?php declare(strict_types=1);

namespace App\Imports;

use App\Jobs\ParseFileJob;
use Illuminate\Support\{Arr, Collection, Facades\Cache};
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\{SkipsOnFailure,
    ToCollection,
    WithChunkReading,
    WithHeadingRow,
    WithValidation};
use App\Models\Row as Model;

class RowImport implements ToCollection, WithHeadingRow,WithValidation, SkipsOnFailure, WithChunkReading
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        $rows = $rows->map(function ($item) {
            $item['date'] = $this->transformDate($item['date']);
            return Arr::only($item->toArray(), ['name', 'date']);
        });

        ParseFileJob::dispatch($rows);
        Cache::put(Model::IMPORT_COUNT_CACHE_KEY, Cache::get(Model::IMPORT_COUNT_CACHE_KEY) + $rows->count());
    }

    public function transformDate($value, $format = 'd.m.Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format('Y-m-d');
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value)->format('Y-m-d');
        }
    }

    public function rules(): array
    {
        return[
            'name'=>'required',
            'date'=>'required',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function onFailure(Failure ...$failures)
    {
        //
    }
}
