<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $months = [];
        $yearlyMonths = $this->calculateMonths();

        foreach($yearlyMonths as $month) {
            $months[Carbon::parse($month)->format('F')] = $this->calculateUsersForMonth($month);
        }

        return view('admin.index', compact('months'));
    }

    /**
     * @return array
     */
    protected function calculateMonths()
    {
        $months = [];
        $start = Carbon::now()->startOfYear();

        for ($i = 0; $i < 12; $i++) {
            if ($i != 0) {
                $months[] .= $start->addMonth(1);
            } else {
                $months[] .= $start;
            }
        }
        return $months;
    }

    /**
     * @param $month
     */
    protected function calculateUsersForMonth($month)
    {
        return $users = User::where('created_at', '>=', Carbon::parse($month)->startOfMonth())
                ->where('created_at', '<=', Carbon::parse($month)->endOfMonth())
                ->count();
    }
}
