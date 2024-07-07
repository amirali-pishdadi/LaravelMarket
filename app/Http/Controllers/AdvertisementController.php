<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Ads.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "url"       => "url|string|required",
            "ads_image" => "required|mimes:jpg,png|max:10240",
        ]);

        $currentUser = Auth::user();

        if (Auth::check() && $currentUser->is_admin) {
            // Handle file upload for profile picture
            $uploadedFile = $request->file("ads_image");
            $fileName = time() . "." . $uploadedFile->getClientOriginalName();
            $uploadedFile->move(public_path("uploads/ads/"), $fileName);

            Advertisement::create([
                "ads_image" => $fileName,
                "link"      => $formFields["url"],
            ]);

            return response()->json([
                'message' => 'ads added succsesfully',
            ], 200);
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $advertisements = Advertisement::all();

        return view("Ads.show", ["ads" => $advertisements]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        return view("Ads.edit", ["ads" => $advertisement]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            "url"       => "url|string|required",
            "ads_image" => "required|mimes:jpg,png|max:10240",
        ]);

        
        $ads = Advertisement::findOrFail($id);

        if ($ads) {
            $oldPicturePath = public_path("uploads/ads/");


            if (File::exists($oldPicturePath)) {
                File::delete($oldPicturePath);

                // Handle file upload for profile picture
                $uploadedFile = $request->file("ads_image");
                $fileName = time() . "." . $uploadedFile->getClientOriginalName();
                $uploadedFile->move(public_path("uploads/ads/"), $fileName);

                $ads->link = $formFields["url"];
                $ads->ads_image = $fileName;
                $ads->save();

                return response()->json([
                    'message' => 'ads edited succsesfully',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'ads picture not found',
                ], 404);
            }

        } else {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ads = Advertisement::findOrFail($id);
        if ($ads) {
            $ads->delete();
            return response()->json([
                'message' => 'deleted',
            ], 201);
        } else {
            return response()->json([
                'message' => 'error',
            ], 404);

        }
    }
}
