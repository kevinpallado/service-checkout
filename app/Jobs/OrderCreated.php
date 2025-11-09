<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class OrderCreated implements ShouldQueue
{
    use Queueable;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
}
