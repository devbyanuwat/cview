<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CampaignRegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->data;
        $name = $data['name'];
        $tel = $data['tel'];
        $line_id = $data['line_id'];
        $email = $data['email'];
        $details = $data['details']??'-';
        $sql = "INSERT INTO campaign_registers (`name`, `tel`, `line_id`, `email`, `type`, `details`, `is_completed`) VALUES ('{$name}', '{$tel}', '{$line_id}', '{$email}', 'campaign-001', '{$details}', 'waiting contract')";
        $result = DB::insert($sql);
        return $result ? ['status' => 'success', 'message'=> 'ลงทะเบียนเพื่อรับข้อเสนอพิเศษสำเร็จ'] : ['status' => 'error', 'message'=> 'ลงทะเบียนเพื่อรับข้อเสนอพิเศษไม่สำเร็จ', 'sql' => $sql];
    }
    public function getCampaignRegistersById(Request $request)
    {
        $sql = "SELECT * FROM campaign_registers WHERE id = {$request->id}";
        $campaignRegisters = DB::select($sql);
        return $campaignRegisters;
    }
    public function all()
    {
        $sql = "SELECT * FROM campaign_registers";
        $campaignRegisters = DB::select($sql);
        return $campaignRegisters;
    }
    public function update(Request $request)
    {
        $sql = "UPDATE campaign_registers SET `is_completed` = '{$request->is_completed}', `remark` = '{$request->remark}' WHERE id = {$request->id}";
        DB::update($sql);
        return redirect()->back()->with('success', 'Your request has been updated successfully.');
    }
}