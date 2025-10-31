<?php

namespace App\Jobs;

use App\Services\Translator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

class TranslateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $fields, protected $languages, protected Model $model)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(Translator $translator): void
    {
        [$keys, $values] = Arr::divide($this->fields);

        $response = $translator->translate($values, $this->languages);

        foreach ($response as $i => $item) {
            $field = $keys[$i];
            $translations[$field] = collect($item['translations'])
                ->mapWithKeys(function ($translation) {
                    return [$translation['to'] => $translation['text']];
                })
                ->toArray();
        }
        foreach ($keys as $key) {
            $this->model->setTranslations($key, $translations[$key]);
        }
        $this->model->save();
    }
}
