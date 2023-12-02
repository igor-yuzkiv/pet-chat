<?php

namespace App\Ship\Console\Commands;

use App\Containers\Conversation\Models\Conversation;
use App\Ship\Events\PublicEvent;
use Illuminate\Console\Command;

class IgorTestCommand extends Command
{
    protected $signature = 'igor:test';

    protected $description = 'Command description';

    public function handle(): void
    {
//          PublicEvent::broadcast()->toOthers();
    }
}
