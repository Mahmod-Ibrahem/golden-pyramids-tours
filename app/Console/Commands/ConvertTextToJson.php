<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;

class ConvertTextToJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-text-to-json';

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
        $blogs = \App\Models\Blog::all();
        foreach ($blogs as $blog)
        {
            $blog->slug = [
                'en' => $blog->slug
            ];
            $blog->title = [
                'en' => $blog->title
            ];
            $blog->blog = [
                'en' => $blog->blog
            ];
            $blog->save();
        }

        /*City*/
        $cities=City::all();
        foreach ($cities as $city)
        {
            $city->slug = [
                'en' => $city->slug
            ];
            $city->name = [
                'en' => $city->name
            ];
            $city->save();
        }
        $this->info('Done');
    }
}
