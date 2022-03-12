<?php declare(strict_types=1);

namespace App\Events\Row;

use App\Models\Row as Model;
use Illuminate\Broadcasting\{Channel, InteractsWithSockets};
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class RowCreatedEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public array $params;

    public function __construct(Model $model)
    {
        $this->params = [
            'name' => $model->name,
            'date' => $model->date,
        ];
    }

    public function broadcastOn()
    {
        return new Channel('call-new-row-channel');
    }

    public function broadcastAs()
    {
        return 'call-new-row-event';
    }
}
