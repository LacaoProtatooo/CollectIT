<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
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

        // LINE CHART
        $projectedUsers = User::selectRaw('DATE(created_at) as date, COUNT(*) as user_count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = $projectedUsers->pluck('date')->toArray();
        $counts = $projectedUsers->pluck('user_count')->toArray();

        $projectedUsersChart = new LineChart();
        $projectedUsersChart->labels($labels); 
        $dataset = $projectedUsersChart->dataset('Projected Users', 'line', $counts);

        $projectedUsersChart->options([
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

        // END OF CHARTS ==============================================================================
        
        return view('admin.home', 
        compact('admininfo','users','collectibles',
        'usercount','collectiblecount','couriercount',
        'availablecollectible','soldcollectible',
        'saleschart','collectibleStocksChart','projectedUsersChart'));
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

    // ==================== COLLECTIBLES CRUD ====================

    public function collectibles()
    {
        $collectibles = Collectible::withTrashed()->with('users')->get();
        return view('admin.collectibles', compact('collectibles'));
    }

    public function collectibleCreate()
    {
        return view('admin.collectibles.create');
    }

    public function collectibleStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'dimension' => 'required',
            'condition' => 'required',
            'stock' => 'required|integer',
            'manufacturer' => 'required',
            'category' => 'required',
            'release_date' => 'required|date',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        // Image Handler
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->move('storage', $filename);
                $imagePaths[] = 'storage/' . $filename;
            }
        }

        Collectible::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'dimension' => $request->dimension,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'manufacturer' => $request->manufacturer,
            'category' => $request->category,
            'status' => $request->status,
            'release_date' => $request->release_date,
            'image_path' => !empty($imagePaths) ? implode(',', $imagePaths) : null,
        ]);

        return redirect()->route('admin.collectibles.show')->with('success', 'Collectible created successfully!');
    }

    public function collectibleEdit($id)
    {
        $collectible = Collectible::findOrFail($id);
        return view('admin.collectibles.edit', compact('collectible'));
    }

    public function collectibleUpdate(Request $request, $id)
    {
        $collectible = Collectible::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'dimension' => 'required',
            'condition' => 'required',
            'stock' => 'required|integer',
            'manufacturer' => 'required',
            'category' => 'required',
            'release_date' => 'required|date',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'dimension' => $request->dimension,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'manufacturer' => $request->manufacturer,
            'category' => $request->category,
            'status' => $request->status,
            'release_date' => $request->release_date,
        ];

        // Image Handler - only update if new images are uploaded
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->move('storage', $filename);
                $imagePaths[] = 'storage/' . $filename;
            }
            $data['image_path'] = implode(',', $imagePaths);
        }

        $collectible->update($data);

        return redirect()->route('admin.collectibles.show')->with('success', 'Collectible updated successfully!');
    }

    public function collectibleDelete($id)
    {
        $collectible = Collectible::findOrFail($id);
        $collectible->delete();

        return redirect()->route('admin.collectibles.show')->with('success', 'Collectible deleted successfully!');
    }

    public function collectibleRestore($id)
    {
        $collectible = Collectible::withTrashed()->findOrFail($id);
        $collectible->restore();

        return redirect()->route('admin.collectibles.show')->with('success', 'Collectible restored successfully!');
    }
}
