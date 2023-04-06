<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Lineinspector;
use App\Models\Piece;
use App\Models\PO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Exports\LineinspectorExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
session_start();

class AdminController extends Controller
{

    public function login_page(){
        return view('admin.login');
    }

    public function admin_login(Request $request)
    {
        $nom = $request->nom;
        $matricule = $request->matricule;
        $result = DB::table('admins')
            ->where('nom', $nom)
            ->where('matricule', $matricule)
            ->first();
        if ($result) {
            $notification = array(
                'message' => '	You are logged in',
                'alert-type' => 'error'
            );
            Session::put('id', $result->id);
            Session::put('prenom', $result->prenom);
            Session::put('nom', $result->nom);
            return redirect()->to('/admin/index')->with($notification);
        }

        $notification = array(
            'message' => '	Email ou mot de passe incorrect',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

    public function logout(){
        Session::flush();
        return Redirect()->to('admin/login');
    }
    /**
     * Display a listing of the resource.
     */


    public function home()
    {
        $this->checkAuth1();
        $admin = Admin::find(Session::get('id'));
        $inspector= Lineinspector::all();
        $validation= Piece::all();
        $po= PO::all();
        $po2=DB::select("
 SELECT p_o_s.*
    FROM p_o_s
    LEFT JOIN (
        SELECT po_id, COUNT(*) AS piece_count
        FROM pieces
        GROUP BY po_id
    ) AS pieces ON p_o_s.id = pieces.po_id
    WHERE ( pieces.piece_count IS NULL);
");


        return view('admin.index', compact('admin','inspector','validation','po','po2'));
    }

    /////////////////////////////////

    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $piece1 = PO::whereIn('id', function ($query) {
            $query->select('po_id')
                ->from('pieces')
                ->groupBy('po_id')
                ->havingRaw('COUNT(po_id) = 2');
        })
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $piece2 = PO::whereDoesntHave('piece')
            ->orWhereHas('piece', function ($query) {
                $query->havingRaw('COUNT(*) = 1');
            })
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
        $admin = Admin::find(Session::get('id'));
        $inspector= Lineinspector::all();
        $validation= Piece::all();
        $po= PO::all();



        return view('admin.home', compact('admin','inspector','validation','po','piece1','piece2'));
    }

    /////////////////////

    public function showallPo()
    {
        $this->checkAuth1();
        $admin = Admin::find(Session::get('id'));
        $po = PO::paginate(10);
        return view('admin.allpos',compact('po','admin'));
    }
    public function showallinspectors()
    {
        $this->checkAuth1();
        $admin = Admin::find(Session::get('id'));
        $inspector = Lineinspector::paginate(10);
//        $po = PO::where('inspector_id',$id);
        return view('admin.allinsp',compact('inspector','admin'));
    }


    public function showvalidationpo($id)
    {
        $this->checkAuth1();
        $admin = Admin::find(Session::get('id'));
        $piece = Piece::Where('po_id',$id)->get();

        return view('admin.showpovalidation',compact('piece','admin'));
    }

    public function showinspo($id)
    {
        $this->checkAuth1();
        $admin = Admin::find(Session::get('id'));
        $po = PO::Where('inspector_id',$id)->get();

        return view('admin.showinspo',compact('po','admin'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAuth1();
        $inspector = new Lineinspector();
        $admin = Admin::find(Session::get('id'));

        return view('admin.addinsp', compact( 'inspector','admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkAuth1();
        $inspector = new Lineinspector();
        $inspector->nom = $request->input('nom');
        $inspector->prenom = $request->input('prenom');
        $inspector->matricule = $request->input('matricule');
        $inspector->status = $request->input('status');
        $inspector->save();
        $admin = Admin::find(Session::get('id'));
        return view('admin.index',compact('admin','inspector'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->checkAuth1();
        $po=PO::find($id);
        $inspector=Lineinspector::all();
        $admin = Admin::find(Session::get('id'));
        return view('admin.po_edit',compact('admin','po','inspector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->checkAuth1();
        $po = PO::find($id);
        $inspector=Lineinspector::all();
        $po->nom = $request->input('nom');
        $po->Pn = $request->input('Pn');
        $po->revision = $request->input('revision');
        $po->inspector_id = $request->input('inspector_id');
        $po->save();
        $admin = Admin::find(Session::get('id'));
//        return view('admin.allpos',compact('po','admin','inspector'));
        return redirect()->to('/admin/pos') ->with(compact('po', 'admin','inspector')); ;

    }

    public function editpn($id)
    {
        $this->checkAuth1();
        $po=PO::all();
        $piece=Piece::find($id);
        $inspector=Lineinspector::all();
        $admin = Admin::find(Session::get('id'));
        return view('admin.piece_edit',compact('admin','po','inspector','piece'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatepn(Request $request, $id)
    {
        $this->checkAuth1();

        $this->validate($request, [

            'image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);



        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $admin = Admin::find(Session::get('id'));
        $piece = Piece::find($id);
        $inspector=Lineinspector::all();
        $option = $request->input('radio-options');
        $piece->time=$request->input('total-time');
        $piece->l1 = $request->input('l1');
        $piece->t1 = $request->input('t1');
        $piece->l1m = $request->input('l1m');
        $piece->l2 = $request->input('l2');
        $piece->t2 = $request->input('t2');
        $piece->l2m = $request->input('l2m');
        $piece->l3 = $request->input('l3');
        $piece->t3 = $request->input('t3');
        $piece->l3m = $request->input('l3m');
        $piece->l4 = $request->input('l4');
        $piece->t4 = $request->input('t4');
        $piece->l4m = $request->input('l4m');
        $piece->l5 = $request->input('l5');
        $piece->t5 = $request->input('t5');
        $piece->l6m = $request->input('l5m');
        $piece->l6 = $request->input('l6');
        $piece->t6 = $request->input('t6');
        $piece->l6m = $request->input('l6m');
        $piece->t1m = $request->input('t1m');
        $piece->t2m = $request->input('t2m');
        $piece->t3m = $request->input('t3m');
        $piece->t4m = $request->input('t4m');
        $piece->t5m = $request->input('t5m');
        $piece->t6m = $request->input('t6m');
        $piece->validation_type = $request->input('validation_type');
        $piece->po_id = $request->input('po_id');
        $piece->Line = $request->input('Line');
        $piece->Visual_check = $request->input('Visual_check');
        $piece->marquage_étiquettes = $request->input('marquage_étiquettes');
        $piece->inspector_id = $request->input('inspector_id');
        $piece->qip = $request->input('qip');
        $piece->image = $fileNameToStore;
        $piece->save();
//        return view('admin.allinsp',compact('piece','option','inspector','admin'));
        //return redirect()->to('/admin/inspectors');
        return redirect()->to('/admin/pos') ->with(compact('piece', 'inspector','admin','option')); ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $piece=Piece::find($id);
        $piece->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }

    public function destroypo($id)
    {
        $po=PO::find($id);
        $po->delete();
        return redirect()->to('/admin/pos');
    }
    public function destroyinsp($id)
    {
        $inspector=Lineinspector::find($id);
        $inspector->delete();
        return redirect()->to('/admin/inspectors');
    }
    public function showChart(Request $request)
    {

        $admin = Admin::find(Session::get('id'));
        $inspector = Lineinspector::all();

        // Get the start and end dates from the request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Set default start and end dates if they are not provided
        if (!$start_date) {
//            $start_date = date('Y-m-d', strtotime('-30 days'));
            $start_date = date('Y-m-d', strtotime('-7 days'));
        }
        if (!$end_date) {
            $end_date = date('Y-m-d');
        }

        $po = PO::select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as day"))
            ->whereBetween('created_at', [$start_date, $end_date])
            ->groupBy(DB::raw("day"))
            ->pluck('count', 'day');

        $labels = $po->keys();
        $data = $po->values();

        return view('admin.chart', compact('data', 'labels', 'admin','start_date', 'end_date','inspector'));

    }


    public function search()
    {
        $this->checkAuth1();
        $search = $_GET['query'];
        $admin = Admin::find(Session::get('id'));
        $po=PO::where('nom','LIKE','%'.$search.'%')->get();

        return view('admin.search', compact( 'po','admin'));
    }
    public function search2()
    {
        $this->checkAuth1();
        $search = $_GET['insp'];
        $admin = Admin::find(Session::get('id'));
        $inspector=Lineinspector::where('nom','LIKE','%'.$search.'%')->get();

        return view('admin.searchinsp', compact( 'inspector','admin'));
    }



//    public function showChart(Request $request)
//    {
//
//        $admin = Admin::find(Session::get('id'));
//        $piecesByInspector = Piece::select('inspector_id', DB::raw('count(*) as pieces_count'))
//            ->groupBy('inspector_id')
//            ->get();
//
//        return view('admin.chart', compact( 'piecesByInspector', 'admin',));
//    }


    public function showInspectorChart(Request $request)
    {
        $this->checkAuth1();
        $admin = Admin::find(Session::get('id'));
        $inspector = Lineinspector::all();

        // Get the start and end dates from the request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Set default start and end dates if they are not provided
        if (!$start_date) {
            $start_date = date('Y-m-d H:i:s', strtotime('-7 days'));
        }
        if (!$end_date) {
            $end_date = date('Y-m-d H:i:s');
        }

        // Get the selected inspector from the request
        $selected_inspector_id = $request->input('inspector');
        $selected_inspector = null;
        $po_query = PO::query();

        // If a inspector is selected, filter the query by the inspector
        if ($selected_inspector_id) {
            $selected_inspector = Lineinspector::find($selected_inspector_id);
            $po_query->where('inspector_id', $selected_inspector_id);
        }

        $po_query->whereBetween('created_at', [$start_date, $end_date]);
        $po_query->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as day"));
        $po_query->groupBy(DB::raw("day"));

        $po_counts = $po_query->pluck('count', 'day');

        $labels = $po_counts->keys();
        $data = $po_counts->values();

        return view('admin.inspector_chart', compact('data', 'labels', 'admin', 'start_date', 'end_date', 'inspector', 'selected_inspector'));
    }


    public function showInspectorVal(Request $request)
    {
        $this->checkAuth1();
        $admin = Admin::find(Session::get('id'));
        $inspector = Lineinspector::all();

        // Get the start and end dates from the request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Set default start and end dates if they are not provided
//        if (!$start_date) {
//            $start_date = date('Y-m-d', strtotime('-7 days'));
//        }
//        if (!$end_date) {
//            $end_date = date('Y-m-d');
//        }

        // Get the selected inspector from the request
        $selected_inspector_id = $request->input('inspector');
        $selected_inspector = null;
        $po_query = Piece::query();

        // If a inspector is selected, filter the query by the inspector
        if ($selected_inspector_id) {
            $selected_inspector = Lineinspector::find($selected_inspector_id);
            $po_query->where('inspector_id', $selected_inspector_id);
        }

        $po_query->whereBetween('created_at', [$start_date, $end_date]);
        $po_query->select(DB::raw("COUNT(*) as count"), DB::raw("DATE(created_at) as day"));
        $po_query->groupBy(DB::raw("day"));

        $po_counts = $po_query->pluck('count', 'day');

        $labels = $po_counts->keys();
        $data = $po_counts->values();

        return view('admin.inspector_chartval', compact('data', 'labels', 'admin', 'start_date', 'end_date', 'inspector', 'selected_inspector'));
    }



    public function exporttoexcel()
    {
        $this->checkAuth1();


        return Excel::download(new LineinspectorExport,'states.xlsx');
    }

    public function checkAuth1(){
        $admin_id = Admin::find(Session::get('id'));
        if($admin_id){
            return;
        }else{
            return redirect()->to('/admin/login')->send();

        }
    }
}
