<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Phattarachai\LineNotify\Facade\Line;

class CandidateController extends Controller
{
    public function register(Request $request)
    {
        $sql = "INSERT INTO candidates (`name`, `tel`, `line_id`, `email`, `position`, `is_completed`) VALUES ('{$request->name}', '{$request->tel}', '{$request->line_id}', '{$request->email}', '{$request->position}', 'waiting contract')";
        $result = DB::insert($sql);
        if($result) {
            Line::send("\nสนใจสมัครงาน\nชื่อ: {$request->name}\nเบอร์: {$request->tel}\nLineID: {$request->line_id}\nEmail: {$request->email}\nตำแหน่ง: {$request->position}");
            return ['status'=>'success','message' => 'ส่งคำขอสมัครสำเร็จ'];
        }
        return ['status'=>'failed','message' => 'Register failed', 'sql' => $sql];
    }
    public function all()
    {
        $sql = "SELECT * FROM candidates";
        $candidates = DB::select($sql);
        return $candidates;
    }
    public function getCandidateById(Request $request)
    {
        $id = $request->id;
        $sql = "SELECT * FROM candidates WHERE `id` = '{$id}'";
        $candidate = DB::select($sql);
        return $candidate;
    }
    public function update(Request $request)
    {
        $sql = "UPDATE candidates SET `is_completed` = '{$request->is_completed}', `description` = '{$request->description}' WHERE `id` = '{$request->id}'";
        $result = DB::update($sql);
        return $result ? ['message' => 'Update success'] : ['message' => 'Update failed', 'sql' => $sql];
    }
}