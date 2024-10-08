<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $user_id;
    public $comment;

    public $user_name;
    public $post_id;

    public $data;
    public $item;

    public function __construct($data)
    {
        $this->user_id = $data['user_id'];
        $this->comment = $data['comment'];
        $this->user_name = $data['user_name'];
        $this->post_id = $data['post_id'];
        $this->date = date('Y-m-d', strtotime(Carbon::now()));
        $this->time = date('H:i:s', strtotime(Carbon::now()));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
