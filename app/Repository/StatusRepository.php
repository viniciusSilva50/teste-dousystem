<?php
namespace App\Repository;

use App\Models\Status;
use Illuminate\Support\Facades\DB;

class StatusRepository{

    public function list(){
        return DB::table('status')->orderBy('id', 'asc')->get();
    }

}