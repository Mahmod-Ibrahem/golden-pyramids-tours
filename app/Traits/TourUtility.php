<?php

namespace App\Traits;

use App\Models\IpTable;
use App\Models\Review;
use App\Models\Tour;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait TourUtility
{

    public function storeIp($ip, $tour_id): void
    {
        $flag = IpTable::where('ip', $ip)->where('tour_id', $tour_id)->exists();
        if (!$flag) {
            IpTable::create([
                'ip' => $ip,
                'tour_id' => $tour_id
            ]);
            //Increase The Counter

            $tour=Tour::find($tour_id);
            $tour->visit_count=$tour->visit_count+1;
            $tour->save();
        }
    }

//     function storeImage($image, $directoryPath, $name_gen)
//    {
//        $manager = new ImageManager(new Driver());
//        try {
//            $img = $manager->read($image);
//            $img = $img->resize(864, 528);
//            $this->makeDirectory($directoryPath);
//            $img->toWebp()->save(storage_path('app/public/' . $directoryPath . $name_gen));
//            return asset('storage/' . $directoryPath . $name_gen);
//        } catch (Exception $e) {
//            return response()->json(['message' => 'Error processing image: ' . $e->getMessage()], 500);
//        }
//    }

//     function isDirectoryExists($directoryPath)
//    {
//        if (file_exists(storage_path('app/public/' . $directoryPath))) {
//            return true;
//        }
//        return false;
//    }
//
//     function makeDirectory($directoryPath)
//    {
//        if (!$this->isDirectoryExists($directoryPath)) {
//            mkdir(storage_path('app/public/' . $directoryPath), 0755, true);
//        }
//    }

     function getTourReviews($id)
    {
        return Review::where('tour_id','=',$id)->get();
    }


//    public function Counter($tourIds)
//    {
//        return IpTable::whereIn('tour_id', $tourIds)->groupBy('tour_id')->select('tour_id', DB::raw('count(tour_id) as count'))->get()->toArray();
//
//        /*Same AS SELECT tour_id, COUNT(*) AS count
//        FROM ip_table
//        WHERE tour_id IN (1, 2, 3)
//        GROUP BY tour_id; */
//    }
}
