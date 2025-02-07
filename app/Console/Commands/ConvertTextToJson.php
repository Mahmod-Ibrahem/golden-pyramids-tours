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
            $blog->slug = json_encode([
                'en'=>$blog->slug
            ]);
            $blog->title = json_encode([
                'en'=>$blog->title
            ]);
            $blog->blog = json_encode([
                'en'=>$blog->blog
            ]);
            $blog->save();
        }

//        /*City*/
        $cities=City::all();
        foreach ($cities as $city)
        {
            $this->info($city->slug);
            $city->slug = json_encode([
                'en'=>$city->slug
            ]);
            $city->name = json_encode([
                'en'=>$city->name
            ]);
            $city->save();
        }
        $this->info('Done');
    }
}
