<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Lineinspector;
use App\Models\Piece;
use App\Models\Pn;
use App\Models\PO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
session_start();

class LineinspectorController extends Controller
{



    public function login_page(){
        return view('lineinspector.login');
    }

    public function inspector_login(Request $request)
    {
        $nom = $request->nom;
        $matricule = $request->matricule;
        $result = DB::table('lineinspectors')
            ->where('nom', $nom)
            ->where('matricule', $matricule)
            ->first();
        if ($result) {
            Session::put('id', $result->id);
            Session::put('prenom', $result->prenom);
            Session::put('nom', $result->nom);
            return redirect()->to('/inspector/home');
        }

        $notification = array(
            'message' => '	Email ou mot de passe incorrect',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

    public function logout(){
        Session::flush();
        return Redirect()->to('inspector/login');
    }

    public function index(PO $po)
    {
        $this->checkAuth();

        $inspector = Lineinspector::find(Session::get('id'));
        return view('lineinspector.home', compact('inspector','po'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createaudit()
    {
        $this->checkAuth();
        $audit = new Audit();
        $inspector = Lineinspector::find(Session::get('id'));
        return view('lineinspector.addaudit', compact( 'inspector','audit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeaudit(Request $request)
    {
        $this->checkAuth();
//        $this->validate($request, [
//
//            'machine' => 'required',
//            'q1' => 'required',
//            'q2' => 'required'
//        ]);
        $machines= $request->input('machine');
        foreach ($machines as $machine) {
            $audit = new Audit();
            $q1 = $request->input($machine.'-q1');
            $q2 = $request->input($machine . '-q2');
            $audit->q1 = $q1;
            $audit->q2 =$q2;
            $audit->q3 = $request->input($machine.'-q3');
            $audit->q4 = $request->input($machine.'-q4');
            $audit->q5 = $request->input($machine.'-q5');
            $audit->q6 = $request->input($machine.'-q6');
            $audit->q7 = $request->input($machine.'-q7');
            $audit->q8 = $request->input($machine.'-q8');
            $audit->q9 = $request->input($machine.'-q9');
            $audit->q10 = $request->input($machine.'-q10');
            $audit->q11 = $request->input($machine.'-q11');
            $audit->machine = $machine;
            $audit->shift = $request->input('shift');
            $audit->score = $request->input($machine.'score');
            $audit->inspector_id = Session::get('id');
            $audit->save();
        }

        $inspector = Lineinspector::find(Session::get('id'));
        return view('lineinspector.home',compact('audit','inspector'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Lineinspector $lineinspector)
    {
        $this->checkAuth();
        $inspector = Lineinspector::find(Session::get('id'));
        $po = PO::paginate(10);
        return view('lineinspector.showpo',compact('po', 'inspector'));
    }


    public function showaudit(Lineinspector $lineinspector)
    {
        $this->checkAuth();
        $inspector = Lineinspector::find(Session::get('id'));
        $audit = Audit::Where('inspector_id',Session::get('id'))->paginate(10);
        return view('lineinspector.showaudits',compact('audit' ,'inspector'));
    }

    public function showspecificaudit($id)
    {
        $this->checkAuth();
        $inspector = Lineinspector::find(Session::get('id'));
        $audit = Audit::Where('id',$id)->get();

        return view('lineinspector.showspecificaudit',compact('audit','inspector'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showvalidation($id)
    {
        $this->checkAuth();
        $inspector = Lineinspector::find(Session::get('id'));
        $piece = Piece::Where('po_id',$id)->get();

        return view('lineinspector.showinspvalidation',compact('piece','inspector'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lineinspector $lineinspector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lineinspector $lineinspector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lineinspector $lineinspector)
    {
        //
    }


    public function createpo()
    {
        $this->checkAuth();
        $po = new PO();
        $inspector = Lineinspector::find(Session::get('id'));
        $pn= Pn::all();

        return view('lineinspector.addpo', compact( 'po','inspector','pn'));
    }


    public function search()
    {
        $this->checkAuth();
        $search = $_GET['query'];
        $inspector = Lineinspector::find(Session::get('id'));
        $po=PO::where('nom','LIKE','%'.$search.'%')->get();

        return view('lineinspector.search', compact( 'po','inspector'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepo(Request $request)
    {
        $this->validate($request, [

            'nom' => 'required|unique:p_o_s',
            'pn_id' => 'required',
            'revision' => 'required'
        ]);

        $this->checkAuth();
        $po = new PO();
        $po->nom = $request->input('nom');
        $po->pn_id = $request->input('pn_id');
        $po->revision = $request->input('revision');
        $po->inspector_id = Session::get('id');
        $po->save();
        $inspector = Lineinspector::find(Session::get('id'));
        return redirect('/inspector/po/'.$po->id.'/piece/add')
            ->with(compact('po', 'inspector'));    }




    // check piece
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createpiece(PO $po)
    {
        $this->checkAuth();
        //$po= PO::all();

        $piece = new Piece();
        $inspector = Lineinspector::find(Session::get('id'));

        return view('lineinspector.addpiece', compact( 'piece','inspector','po'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepiece(Request $request)
    {
        $this->checkAuth();

        $this->validate($request, [
            'validation_type' => 'required',
            'qip' => 'required|in:OK',
            'marquage_étiquettes' => 'required|in:OK',
            'Line' => 'required',
            'Visual_check' => 'required|in:OK',
            'image' => 'image|required|nullable|max:1999'
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


        $piece = new Piece();
        $option = $request->input('radio-options');
        $piece->time=$request->input('total-time');

        $piece->l1m = $request->input('l1m');

        $piece->l2m = $request->input('l2m');

        $piece->l3m = $request->input('l3m');

        $piece->l4m = $request->input('l4m');

        $piece->l5m = $request->input('l5m');

        $piece->l6m = $request->input('l6m');

        $piece->validation_type = $request->input('validation_type');
        $piece->po_id = $request->input('po_id');
        $piece->Line = $request->input('Line');
        $piece->Visual_check = $request->input('Visual_check');
        $piece->marquage_étiquettes = $request->input('marquage_étiquettes');
        $piece->qip = $request->input('qip');
        $piece->inspector_id = Session::get('id');
        $piece->image = $fileNameToStore;
        $piece->save();
        $inspector = Lineinspector::find(Session::get('id'));
        return view('lineinspector.home',compact('piece','inspector','option'));
    }

    public function checkAuth(){
        $inspector_id = Lineinspector::find(Session::get('id'));
        if($inspector_id){
            return;
        }else{
            return redirect()->to('/inspector/login')->send();

        }
    }
}



