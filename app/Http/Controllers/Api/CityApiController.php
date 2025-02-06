<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Traits\ImagesUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CityApiController extends Controller
{
    use ImagesUtility;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale=\request('locale');
        $cities = City::whereNotNull('name->'.$locale)->get();
        return  CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $validatedCityData = $request->validated();
        $storedImage = $this->storeImage($validatedCityData['image'], 'city');
        $validatedCityData['image'] = $storedImage;
        $createdCity=City::create($validatedCityData);
        return new CityResource($createdCity);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cityId)
    {
        return City::Find($cityId) ? new CityResource(City::Find($cityId)) :  response (['message' => 'City Not Found'], 404);
    }

    public function getCityForTranslation(string $cityId)
    {
        $city=City::find($cityId);
        if(!$city)
        {
            return response()->json('City Not Found',404);
        }
        return response()->json([
            'id'=>$city->id,
            'availableLocales'=>array_diff(['en','fr','sp','zh','pt'],$city->locales()),
            'locale'=>''
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $cityId)
    {
        $city=City::find($cityId);
        $locale=request('locale');
        $validatedCityData = $request->validated();
        if ($validatedCityData['image'] ?? false)
        {
            if ($city->image ?? false) {
                $relativePath = $this->getRelativePath($city->image);
                Storage::delete($relativePath);
            }
            $city->image = $this->storeImage($validatedCityData['image'], 'blog');
        } else
        {
            $city->image = $city['image']; //34an lma agy 23ml insert myb2a5 null lo mfi4 image asln
        }
        $this->setCityTranslation($city,$locale,$validatedCityData);
        $city->save();
        //        $city->update($validatedCityData);
        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return response()->noContent();
    }

    public function createCityTranslation(string $cityId)
    {
        $city=City::find($cityId);
        $cityValidatedData=\request()->all();
        if(!$city)
        {
            return response()->json('Attraction Not Found',404);
        }
        $this->setCityTranslation($city,$cityValidatedData['locale'],$cityValidatedData);
        $city->save();
        return new CityResource($city);
    }

    private function setCityTranslation(City $city , $locale , $cityValidatedData )
    {
        $city->setTranslation('name',$locale,$cityValidatedData['name']);
    }
}
