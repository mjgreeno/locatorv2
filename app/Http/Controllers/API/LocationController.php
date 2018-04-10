<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Location;
use App\Http\Controllers\Controller;
use App\Http\Resources\Location as LocationResource;

class LocationController extends Controller
{
    /**
     * Display a listing of all of the locations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all of the locations
        $locations = Location::paginate(5);

        //Return collection of locations as a resource
        return LocationResource::collection($locations);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function nearest(Request $request)
    {

        //Lets get the request information
        $lat = $request->lat;
        $long = $request->long;

        //lets call our custom query
        $locationInfo = Location::nearestLocation($lat, $long);

        //per business requirements "The API will include the distance (in miles) between the input latitude/longitude and the selected closest pharmacy in the response packet"
        foreach ($locationInfo as $key => $info) {
            if($info->distance_in_miles) {
                $distance = $info->distance_in_miles;
                unset($info->distance_in_miles);
            }
        }

        if(empty($locationInfo)) {
            return response()->json(['response' => 'Data Not Found', 'location' => 'empty'])->setStatusCode(404);
        }

        return response()->json(['response' => 'success', 'location' => $locationInfo, 'Distance' => $distance, 'User Latitude' => $lat, 'User Longitude' => $long])->setStatusCode(200);
    }

}
