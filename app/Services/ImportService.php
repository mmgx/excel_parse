<?php declare(strict_types=1);

namespace App\Services;

use App\Imports\RowImport;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;

class ImportService
{
    public static function importFile(UploadedFile $file)
    {
        return Excel::import(new RowImport(), $file);
    }
}
