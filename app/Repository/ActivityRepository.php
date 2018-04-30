<?php
namespace App\Repository;

use App\Http\Requests\ActivityPost;
use Illuminate\Support\Facades\DB;
use DateTime;

class ActivityRepository{


    public function getActivity($activityId){
        return (array) DB::table('activity as a')
            ->select([
                'id',
                'name',
                'description',
                'status_id as statusId',
                'situation as active',
                DB::raw("DATE_FORMAT(a.begin_date, '%d/%m/%Y') as begin_date"),
                DB::raw("DATE_FORMAT(a.end_date, '%d/%m/%Y') as end_date"),
            ])
            ->where('id', $activityId)
            ->first();
    }

    public function listActivitys(){
        return DB::table('activity as a')
            ->select([
                'a.id as id',
                'a.name',
                'a.status_id as statusId',
                DB::raw("CONCAT(SUBSTR(description, 1, 25), '...') as descriptionShort"),
                's.name as status',
                DB::raw("CASE a.situation WHEN 1 THEN 'Ativo' ELSE 'Desativado' END as situation"),
                DB::raw("DATE_FORMAT(a.begin_date, '%d/%m/%Y') as beginDate"),
                DB::raw("DATE_FORMAT(a.end_date, '%d/%m/%Y') as endDate"),
            ])
            ->join('status as s', 's.id', '=', 'a.status_id')
            ->groupBy('a.id')
            ->get();
    }

    public function saveActivity(ActivityPost $request){
        $beginDate = DateTime::createFromFormat('d/m/Y', $request->begin_date);
        $endDate = isset($request->end_date)? DateTime::createFromFormat('d/m/Y', $request->end_date) : null;

        $queryBuilder = DB::table('activity');
        $fields = [
            'status_id' => $request->status,
            'name' => $request->name,
            'description' => $request->description,
            'begin_date' => $beginDate,
            'end_date' => $endDate,
            'situation' => is_null($request->active)? 0 : 1,
        ];

        if(isset($request->id)){
            return $queryBuilder->where('id', $request->id)->update($fields);
        } else {
            return $queryBuilder->insert($fields);
        }
    }

    public function deleteActivity($activityId){
        return DB::table('activity')->where('id', '=', $activityId)->delete();
    }


}