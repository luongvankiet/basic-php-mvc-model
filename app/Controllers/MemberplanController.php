<?php

namespace App\Controllers;

use App\Models\Memberplan;

class MemberplanController extends Controller
{
    public function index()
    {
        $memberplans = Memberplan::getInstance()->get();

        return $this->render('memberplans.list', [
            'memberplans' => $memberplans
        ]);
    }
}
