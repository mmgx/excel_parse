<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Services\ImportService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use App\Models\Row as Model;

class FileController extends Controller
{
    public function showForm(): View
    {
        return view('welcome');
    }

    public function upload(FileUploadRequest $r): RedirectResponse
    {
        Model::truncate();
        Cache::put(Model::IMPORT_COUNT_CACHE_KEY, 0);

        $file = $r->file('file');
        $rows = ImportService::importFile($file);

        return back()
            ->with('success', 'Файл импортирован');
    }
}
