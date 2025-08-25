<?php

namespace App\Http\Controllers;

use App\Models\PaymentsModel;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /*
     * Show Home page.
     */
    public function index()
    {
        $total = PaymentsModel::where('status', 1)->sum('amount');
        if ($total == 0) {
            $total = 1;
        }
        $your_total = PaymentsModel::where('status', 1)->where('user_id', auth()->user()->id)->sum('amount');

        // Assign rank
        $totals = PaymentsModel::where('status', 1)->selectRaw('user_id, SUM(amount) as total_amount')->groupBy('user_id')->orderByDesc('total_amount')->get();
        $rank = 1;
        $userRank = null;
        foreach ($totals as $index => $item) {
            if ($item->user_id == auth()->user()->id) {
                $userRank = $rank;
                break;
            }
            $rank++;
        }


        // Step 1: Get current year and user
        $currentYear = Carbon::now()->year;
        $userId = auth()->user()->id;
        // Step 2: Fetch actual data from DB
        $results = PaymentsModel::where('status', 1)
            ->where('user_id', $userId)
            ->whereYear('pay_time', $currentYear)
            ->selectRaw('MONTH(pay_time) as month, SUM(amount) as total_amount')
            ->groupBy('month')
            ->pluck('total_amount', 'month'); // [month => total]
        // Step 3: Prepare 12 months with default 0
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create()->month($i)->format('M'); // Jan, Feb, etc.
            $monthlyData[] = [
                'y' => round((float) ($results[$i] ?? 0), 2),
                'label' => $monthName
            ];
        }




        $users_contribution = User::leftJoin('payments', function ($join) {
            $join->on('users.id', '=', 'payments.user_id')
                ->where('payments.status', 1);
        })
            ->select(
                'users.id as user_id',
                'users.name',
                DB::raw('COALESCE(SUM(payments.amount), 0.00) as total_amount')
            )
            ->groupBy('users.id', 'users.name') // Fix: group by all non-aggregates
            ->orderByDesc('total_amount')
            ->get();

        $users_amount_data = [];
        foreach ($users_contribution as $contribution) {
            $users_amount_data[] = [
                'y' => $contribution->total_amount,
                'label' => $contribution->name
            ];
        }

        $users_percent_data = [];
        foreach ($users_contribution as $contribution) {
            $users_percent_data[] = [
                'y' => ($contribution->total_amount / $total) * 100,
                'label' => $contribution->name
            ];
        }


        $data = [
            'total' => $total,
            'yours' => $your_total,
            'rank' => $userRank,
            'monthlydata' => json_encode($monthlyData, true),
            'users_amount' => json_encode($users_amount_data, true),
            'users_parcents' => json_encode($users_percent_data, true)
        ];

        return view('index', $data);
    }

    /*
     * Show Receipts page.
     */
    public function receipts()
    {
        if (auth()->user()->role == 'admin') {
            $payments = PaymentsModel::whereIn('status', [0, 2])->orderByDesc('id')->get();
        } else {
            $payments = PaymentsModel::where('user_id', auth()->user()->id)->whereIn('status', [0, 2])->orderByDesc('id')->get();
        }
        return view('receipts', ['payments' => $payments]);
    }

    /*
     * Show Pay page.
     */
    public function pay()
    {
        return view('pay');
    }

    /*
     * Show Payments page.
     */
    public function payments()
    {
        if (auth()->user()->role == 'admin') {
            $payments = PaymentsModel::orderByDesc('id')->get();
        } else {
            $payments = PaymentsModel::where('user_id', auth()->user()->id)->orderByDesc('id')->get();
        }
        return view('payments', ['payments' => $payments]);
    }

    /*
     * Show Profile page.
     */
    public function profile()
    {
        $user = auth()->user();
        return view('profile', ['user' => $user]);
    }

    /*
     * Show Settings page.
     */
    public function settings()
    {
        $user = User::find(auth()->user()->id);
        $theme = $user->theme;
        return view('settings', ["theme" => $theme]);
    }

    public function themechange(Request $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $user->theme = $request->theme;
            $user->update();

            return redirect()->back()->with('success', 'Theme Changed Successfully!');
        } catch (Exception $e) {
            Log::error('Theme Change Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Theme Change Failed!');
        }
    }

    public function dbupload(Request $request)
    {
        try {
            // input name="file"
            $file = $request->file('userimage');

            $user = User::find(auth()->user()->id);

            $user->image_mime = $file->getMimeType();
            $user->image = file_get_contents($file->getRealPath());
            $user->update();

            return redirect()->back()->with('success', 'Image updated Successfully!');
        } catch (Exception $e) {
            Log::error('DPupload Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Image update Failed!');
        }
    }

    public function updatebasicprofile(Request $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->update();

            return redirect()->back()->with('success', 'Basic updated Successfully!');
        } catch (Exception $e) {
            Log::error('Basic Update Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Basic update Failed!');
        }
    }

    public function changepassword(Request $request)
    {
        try {
            $user = User::find(auth()->id());
            if ($request->newpassword !== $request->confirmpassword) {
                return redirect()->back()->with('warning', 'New and confirm passwords do not match!');
            }
            if (!Hash::check($request->currentpassword, $user->password)) {
                return redirect()->back()->with('warning', 'Current password is incorrect!');
            }
            $user->password = Hash::make($request->newpassword);
            $user->update();
            return redirect()->back()->with('success', 'Password updated successfully!');
        } catch (Exception $e) {
            Log::error('Password Update Error: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Password update failed!');
        }
    }
}
