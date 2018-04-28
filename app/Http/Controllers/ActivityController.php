<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\StatusRepository;

class ActivityController extends Controller{

    public function create(){
        $statusRepository = new StatusRepository();
        return view('pages.admin.activity.create')->with(['status' => $statusRepository->list()]);;
    }

    public function list(){

        return view('pages.admin.activity.list');
    }

}
