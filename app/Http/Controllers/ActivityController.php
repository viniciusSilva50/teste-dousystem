<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityPost;
use Illuminate\Http\Request;
use App\Repository\StatusRepository;

class ActivityController extends Controller{

    public function create(){
        $statusRepository = new StatusRepository();
        return view('pages.admin.activity.create')
            ->with(['status' => $statusRepository->list()]);
    }

    public function save(ActivityPost $request){
        var_dump($request->input());
        die();

        $validator = $request->validated();
        return view('pages.admin.activity.list');
    }

    public function list(){

        return view('pages.admin.activity.list');
    }

}
