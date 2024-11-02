<?php

namespace App\Exports;

use App\Models\LoginHistory;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoginHistoryExport implements FromCollection, WithHeadings {
    public function collection() {
        return LoginHistory::with('user')->get()->map(function ($history) {
            return [
                'name' => $history->user->name,
                'username' => $history->user->username,
                'email' => $history->user->email,
                'ip_address' => $history->ip_address,
                'user_agent' => $history->user_agent,
                'login_at' => Carbon::parse($history->login_at)->format('Y-m-d H:i:s')
            ];
        });
    }

    public function headings(): array {
        return [
            'Name',
            'Username',
            'Email',
            'IP Address',
            'User Agent',
            'Login Date & Time'
        ];
    }
}
