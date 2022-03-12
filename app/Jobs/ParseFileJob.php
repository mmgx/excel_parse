<?php

namespace App\Jobs;

use Illuminate\Support\{Facades\Cache, Collection, Facades\DB};
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{InteractsWithQueue, SerializesModels};
use App\Models\Row as Model;

class ParseFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Collection $collection;
    protected ?int $recordCount;

    /**
     * Create a new job instance.
     *
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
        $this->recordCount = Cache::get(Model::IMPORT_COUNT_CACHE_KEY);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $importData = $this->collection->toArray();
        DB::beginTransaction();
        try {
            DB::table('rows')->insert($importData);
            $this->recordCount += count($importData);
            Cache::put(Model::IMPORT_COUNT_CACHE_KEY, $this->recordCount);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
