<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $this->setLayout('layouts.admin');
        $locations = Location::getInstance()->query()->latest()->get();
        return $this->render('admin.locations.list', [
            'locations' => $locations
        ]);
    }
}
