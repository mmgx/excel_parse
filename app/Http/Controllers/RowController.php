<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Row as Model;

class RowController extends Controller
{
    public function getRowTable(): View
    {
        $rows = Model::orderBy('date')->paginate(50);

        return view('result', compact('rows'));
    }
}
