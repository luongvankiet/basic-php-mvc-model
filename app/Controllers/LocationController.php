<?php

namespace App\Controllers;

use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::getInstance()->get();

        return $this->render('locations.list', [
            'locations' => $locations
        ]);
    }
}
