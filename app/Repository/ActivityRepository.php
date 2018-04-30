<?php
namespace App\Repository;

use App\Models\Status;
use Illuminate\Support\Facades\DB;

class ActivityRepository{

    public function list(){
        return DB::table('status')->orderBy('id', 'asc')->get();
    }

    public static function notCompletedStatusStatic($statusId){
        return DB::table('status')
            ->whereRaw("LOWER(name) != 'concluido'")
            ->where('id', $statusId)
            ->orderBy('id', 'asc')
            ->exists();
    }

}