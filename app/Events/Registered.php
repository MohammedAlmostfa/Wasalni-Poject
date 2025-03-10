<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Registered
{
    use Dispatchable, SerializesModels;

    public $data;
    public $key;

    /**
     * Create a new event instance.
     *
     * @param  array  $data
     * @param  string  $key
     * @return void
     */
    public function __construct($data, $key)
    {
        $this->data = $data;
        $this->key = $key;
    }
}
