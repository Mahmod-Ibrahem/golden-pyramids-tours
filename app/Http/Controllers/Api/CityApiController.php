<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Jobs\TranslateJob;
use App\Models\City;
use App\Traits\ImagesUtility;
use Illuminate\Support\Facades\Storage;

class CityApiController extends Controller
{
    use ImagesUtility;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = \request('locale');
        $cities = City::whereNotNull('name->' . $locale)->get();
        return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $validatedCityData = $request->validated();
        $storedImage = $this->storeImage($validatedCityData['image'], 'city');
        $validatedCityData['image'] = $storedImage;
        $createdCity = City::create($validatedCityData);
        $this->translateCity($createdCity, ['fr', 'es', 'pt', 'zh'], $validatedCityData);
        return new CityResource($createdCity);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cityId)
    {
        return City::Find($cityId) ? new CityResource(City::Find($cityId)) : response(['message' => 'City Not Found'], 404);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $cityId)
    {
        $city = City::find($cityId);
        $validatedCityData = $request->validated();
        if ($validatedCityData['image'] ?? false) {
            if ($city->image ?? false) {
                $relativePath = $this->getRelativePath($city->image);
                Storage::delete($relativePath);
            }
            $city->image = $this->storeImage($validatedCityData['image'], 'blog');
        } else {
            $city->image = $city['image']; //34an lma agy 23ml insert myb2a5 null lo mfi4 image asln
        }
        $this->translateCity($city, ['en','fr', 'es', 'pt', 'zh'], $validatedCityData);
        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cityId)
    {
        $city = City::find($cityId);
        return $city ? $city->delete() : response()->json('City Not Found', 404);
    }

    private function translateCity(City $city, $locale, $cityValidatedData)
    {
        TranslateJob::dispatch([
            'name' => $cityValidatedData['name']
        ], $locale, $city);
    }
}
