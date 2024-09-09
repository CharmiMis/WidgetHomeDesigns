<?php

namespace App\Http\Controllers;

use App\Models\WidgetUserData;
use Illuminate\Http\Request;

class WidgetController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showWidget(Request $request) {

        $userId = $request->query('id');

        if ($userId) {
            // Find the widget data using the 'user_id'
            $widgetData = WidgetUserData::where('user_id', $userId)->firstOrFail();
            // Return the view with the widget data
            return view('widget.widget-management', ['widgetData' => $widgetData]);
        } else {
            // Id not provided
            return abort(400, 'Bad Request: id parameter is required');
        }
    }

    public function showWidgetData($id,Request $request)
    {
        $widgetData = WidgetUserData::where('user_id', $id)->firstOrFail();
        
        if (!$widgetData) {
            abort(404, 'Widgetddd not found');
        }
        $widgetHtml = view('widget.widget-management', ['widgetData' => $widgetData])->render();
        return response($widgetHtml, 200)->header('Content-Type', 'text/html');
        // Render the Blade view to a string
        // $widgetHtml = view('widget.widget-feature-data', ['widgetData' => $widgetData])->render();

        // return response()->json(['html' => $widgetHtml]);
    }

    public function showFeature($feature)
    {
        // Validate that the feature exists
        $validFeatures = ['redesign', 'fill_spaces']; // List all valid features

        if (!in_array($feature, $validFeatures)) {
            abort(404); // Feature not found
        }

        // Pass the feature to the view
        return view('widget.widget-' . $feature, ['feature' => $feature]);
    }
}
