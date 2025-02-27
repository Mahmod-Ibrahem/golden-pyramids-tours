<?php

namespace App\Console\Commands;

use App\Models\Tour;
use App\Traits\Utility;
use Illuminate\Console\Command;

class RemoveAnchorTarget extends Command
{

    use Utility;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-anchor-target';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tours=Tour::all();
        foreach ($tours as $tour)
        {
            $tour->itenary_section = $this->removeAnchorTareget($tour->itenary_section);
            $tour->save();
        }

        $this->info('completed');
    }

}
