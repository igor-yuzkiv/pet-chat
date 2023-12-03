<?php

namespace App\Ship\Console\Commands;

use App\Containers\Conversation\Models\Conversation;
use App\Containers\User\Models\User;
use Illuminate\Console\Command;

class IgorTestCommand extends Command
{
    protected $signature = 'igor:test';

    protected $description = 'Command description';

    public function handle(): void
    {
        $id = '8cb2b648-1027-3f29-8fbd-0d3a0d7a1a90';
        $user = 'eb3bddee-c430-37e9-92f2-7a2ea3605ad9';

//        dd(
//            User::find($user)->conversations->first->toArray()
//        );


        $c = Conversation::find($id)->members->toArray();
        dd($c);

    }
}
