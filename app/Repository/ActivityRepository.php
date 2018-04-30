<?php
namespace App\Repository;

use App\Http\Requests\ActivityPost;
use Illuminate\Support\Facades\DB;
use DateTime;

class ActivityRepository{

    public function saveActivity(ActivityPost $request){
        $beginDate = DateTime::createFromFormat('d/m/Y', $request->begin_date);
        $endDate = isset($request->end_date)? DateTime::createFromFormat('d/m/Y', $request->end_date) : null;


        return DB::table('activity')->insert([
            'status_id' => $request->status,
            'name' => $request->name,
            'description' => $request->description,
            'begin_date' => $beginDate,
            'end_date' => $endDate,
            'situation' => is_null($request->active)? 0 : 1,
        ]);
    }

}