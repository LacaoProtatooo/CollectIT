<?php

namespace App\Http\Controllers;

use DB;
use App\Charts\BarChart;
use App\Charts\LineChart;
use App\Charts\PieChart;

use App\Models\User;
use App\Models\Courier;
use App\Models\Order;
use App\Models\Collectible;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $bgcolor;
    public function __construct()
    {
        $this->bgcolor = collect([
            '#7158e2',
            '#3ae374',
            '#ff3838',
            "#FF851B",
            "#7FDBFF",
            "#B10DC9",
            "#FFDC00",
            "#001f3f",
            "#39CCCC",
            "#01FF70",
            "#85144b",
            "#F012BE",
            "#3D9970",
            "#111111",
            "#AAAAAA",
        ]);
    }
    public function index(){
        $admininfo = auth()->user();

        $users = User::all();
        $collectibles = Collectible::all();
        
        $usercount = User::count();
        $collectiblecount = Collectible::count();
        $availablecollectible = Collectible::where('status', 'available')->count();
        $soldcollectible = Collectible::where('status', 'sold')->count();
        $couriercount = Courier::count();

        // CHARTS ==============================================================================
        // PIE CHART
        $collectiblesales = Collectible::whereIn('status', ['sold', 'available'])->get();

        $saleschart = new PieChart();
        $dataset = $saleschart->labels(['Available', 'Sold']);
        $dataset = $saleschart->dataset(
            'Collectible Sales',
            'pie',
            [count($collectiblesales->where('status', 'available')), count($collectiblesales->where('status', 'sold'))]
        );
        $dataset = $dataset->backgroundColor(['#3ae374', '#ff3838']);
        $saleschart->options([
            'backgroundColor' => '#fff',
            'fill' => false,
            'responsive' => true,
            'legend' => ['display' => true],
            'tooltips' => ['enabled' => true],
            'aspectRatio' => 1,
            'scales' => [
                'yAxes' => [
                    [
                        'display' => true,
                    ],
                ],
                'xAxes' => [
                    [
                        'gridLines' => ['display' => false],
                        'display' => true,
                    ],
                ],
            ],
        ]);

        // BAR CHART
        $collectibleStocksData = Collectible::select('stock', DB::raw('count(*) as stock_count'))
        ->groupBy('stock')
        ->orderBy('stock', 'asc')
        ->get();

        $labels = $collectibleStocksData->pluck('stock')->toArray();
        $counts = $collectibleStocksData->pluck('stock_count')->toArray();

        $collectibleStocksChart = new BarChart();
        $collectibleStocksChart->labels($labels); 

        $backgroundColor = [];
        foreach ($counts as $count) {
        $backgroundColor[] = $this->bgcolor->shift();
        }

        $dataset = $collectibleStocksChart->dataset('Collectible Stocks', 'bar', $counts);
        $dataset->backgroundColor($backgroundColor);

        $collectibleStocksChart->options([
        'backgroundColor' => '#fff',
        'fill' => false,
        'responsive' => true,
        'legend' => ['display' => true],
        'tooltips' => ['enabled' => true],
        'aspectRatio' => 1,
        'scales' => [
            'yAxes' => [
                [
                    'display' => true,
                ],
            ],
            'xAxes' => [
                [
                    'gridLines' => ['display' => false],
                    'display' => true,
                ],
            ],
        ],
        ]);


        // MISSING: LINE CHART
        
        // END OF CHARTS ==============================================================================
        
        return view('admin.home', 
        compact('admininfo','users','collectibles',
        'usercount','collectiblecount','couriercount',
        'availablecollectible','soldcollectible',
        'saleschart','collectibleStocksChart'));
    }

    public function adminprofile()
    {
        $userinfo = Auth::user();
        return view('admin.adminprofile', compact('userinfo'));
    }

    // Collectible Details for sold
    public function details($id){
        $collectibleinfo = Collectible::find($id);
        $sellerinfo = User::where('id', $collectibleinfo->user_id)->first();

        $customerinfo = Order::leftJoin('carts', 'orders.user_id', '=', 'carts.user_id')
        ->leftJoin('users', 'carts.user_id', '=', 'users.id')
        ->select('orders.*', 'users.*', 'carts.*')
        ->first();

        //dd($customerinfo);

        return view('admin.collectibledetails', compact('customerinfo','sellerinfo','collectibleinfo')); 
    }


}
