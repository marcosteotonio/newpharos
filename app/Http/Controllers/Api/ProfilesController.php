<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $profiles = Profile::with('user')
            ->when($request->dummy, function ($query, $dummy) {
                $dummy = json_decode($dummy)->value;
                $query->whereBetween('dummy', $dummy);
            })
            ->when($request->feet, function ($query, $feet) {
                $feet = json_decode($feet)->value;
                $query->whereBetween('feet', $feet);
            })
            ->when($request->age, function ($query, $age) {
                $age = json_decode($age)->value;

                // Get years
                $age = collect($age)->map(function ($age) {
                    return now()->subYears($age)->format('Y-m-d');
                })
                ->sort()
                ->toArray();

                $query->whereBetween('date_birth', $age);
            })
            ->when($request->weight, function ($query, $weight) {
                $weight = json_decode($weight)->value;
                $query->whereBetween('weight', $weight);
            })
            ->when($request->height, function ($query, $height) {
                $height = json_decode($height)->value;
                $query->whereBetween('height', $height);
            })
            ->when($request->gender, function ($query, $gender) {
                $query->whereIn('gender', $gender);
            })
            ->get();

        return $profiles;
    }
}
