<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityPost;
use Illuminate\Http\Request;
use App\Repository\StatusRepository;
use App\Repository\ActivityRepository;

class ActivityController extends Controller{

    private $activityRepository;

    public function __construct(ActivityRepository $activityRepository){
        $this->activityRepository = new $activityRepository();
    }

    public function create(){
        $statusRepository = new StatusRepository();
        return view('pages.admin.activity.create')
            ->with(['status' => $statusRepository->list()]);
    }

    public function save(ActivityPost $request){
        $success = $this->activityRepository->saveActivity($request);
        if(!$success){
            return redirect()->back()->withInput($request->all())->withErrors(['error' => 'Erro ao salvar os dados!']);
        }
        return view('pages.admin.activity.list');
    }

    public function list(){

        return view('pages.admin.activity.list');
    }

}
