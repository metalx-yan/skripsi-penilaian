<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use App\Current;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function current()
    {
        $query = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'buruk')->get();
        $query2 = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'cukup')->get();
        $query3 = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'baik')->get();
        $query4 = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'sangat baik')->get();
        $result = [];
        foreach ($query as $value) {
            $result[] = (double)$value->total;
        }
        $data = $result;

        $result2 = [];
        foreach ($query2 as $value2) {
            $result2[] = (double)$value2->total;
        }
        $data2 = $result2;

        $result3 = [];
        foreach ($query3 as $value3) {
            $result3[] = (double)$value3->total;
        }
        $data3 = $result3;

        $result4 = [];
        foreach ($query4 as $value4) {
            $result4[] = (double)$value4->total;
        }
        $data4 = $result4;

        return view('current', compact('data','data2', 'data3', 'data4'));
    }

    public function tambahuserdelete($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back();
    }
    public function tambahuserpost(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'role_id' => $request->role
        ]);

        return redirect()->back();
    }
    public function tambahuser(Request $request)
    {   
        $getUser = User::all();
        return view('tambahuser', compact('getUser'));
    }
    public function tentang()
    {
        return view('tentang');
    }

    public function home(Request $request)
    {

        $query = Assessment::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'buruk')->get();
        $query2 = Assessment::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'cukup')->get();
        $query3 = Assessment::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'baik')->get();
        $query4 = Assessment::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total , month(created_at) as month, grade')
        ->groupBy('month', 'grade')->where('grade', 'sangat baik')->get();
        $result = [];
        foreach ($query as $value) {
            $result[] = (double)$value->total;
        }
        $data = $result;

        $result2 = [];
        foreach ($query2 as $value2) {
            $result2[] = (double)$value2->total;
        }
        $data2 = $result2;

        $result3 = [];
        foreach ($query3 as $value3) {
            $result3[] = (double)$value3->total;
        }
        $data3 = $result3;

        $result4 = [];
        foreach ($query4 as $value4) {
            $result4[] = (double)$value4->total;
        }
        $data4 = $result4;

        // dd($query, implode(',',$result), $data, $result);
        return view('home', compact('data','data2', 'data3', 'data4'));
    }
    public function index(Request $request)
    {
        // $request->session()->forget('products');
        $request->session()->forget('penilaian');
        $penilaian = Assessment::all();
        return view('penilaian.index',compact('penilaian', $penilaian));
    }

    public function history()
    {
        $data = Assessment::all();

        return view('history', compact('data'));
    }

    public function deletehistory(Request $request, $id)
    {
        $data = Assessment::find($id);
        $del = $data->delete();

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        

    }

    public function create1(Request $request)
    {
        $penilaian = $request->session()->get('penilaian');
        // Alert::success('Success Title', 'Success Description');
        // dd($penilaian);
        return view('welcome',compact('penilaian', $penilaian));
    }   

    public function createStep2(Request $request)
    {
        $penilaian = $request->session()->get('penilaian');
        if (isset($penilaian) == false) {
            return redirect()->route('create1');
        } 
        
        // dd($penilaian);
        return view('pertanyaan',compact('penilaian', $penilaian));
    }

    public function createStep3(Request $request)
    {
        $penilaian = $request->session()->get('penilaian');
        if (isset($penilaian) == false) {
            return redirect()->route('create1');
        } 
        
        // dd($penilaian);
        return view('penilaian.index',compact('penilaian', $penilaian));
    }

    function storeCreate1(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric',
            'name' => 'required',
        ]);
            // dd($validatedData);
        if(empty($request->session()->get('penilaian'))){
            $penilaian = new Assessment();
            $penilaian->fill($validatedData);
            $request->session()->put('penilaian', $penilaian);
        }else{
            $penilaian = $request->session()->get('penilaian');
            $penilaian->fill($validatedData);
            $request->session()->put('penilaian', $penilaian);
        }
        // dd($penilaian, $validatedData);
        return redirect()->route('create2');
    }

    function storeCreate2(Request $request)
    {
        $penilaian = $request->session()->get('penilaian');
        $data = ($request->pertama + $request->kedua + array_sum($request->ketiga) + array_sum($request->keempat))/4;
        if($data >= 90){
            $grade = 'sangat baik';
        }else if($data >= 80){
            $grade = 'baik';
        }else if($data >= 70){
            $grade = 'cukup';
        }else if($data < 70){
            $grade = 'buruk';
        }
        // dd($request->all(), $data, $grade);
        
        $insert = new Assessment();
        $insert->nik = $penilaian->nik;
        $insert->name = $penilaian->name;
        $insert->soal1 = $request->pertama;
        $insert->soal2 = $request->kedua;
        $insert->soal3 = array_sum($request->ketiga);
        $insert->soal4 = array_sum($request->keempat);
        $insert->soal5 = $request->kelima;
        $insert->grade = $grade;
        $insert->save();

        $insert = new Current();
        $insert->nik = $penilaian->nik;
        $insert->name = $penilaian->name;
        $insert->soal1 = $request->pertama;
        $insert->soal2 = $request->kedua;
        $insert->soal3 = array_sum($request->ketiga);
        $insert->soal4 = array_sum($request->keempat);
        $insert->soal5 = $request->kelima;
        $insert->grade = $grade;
        $insert->save();

        $request->session()->forget('penilaian');
        // dd($penilaian->name, $request->all(), ($request->pertama + $request->kedua + array_sum($request->ketiga) + array_sum($request->keempat))/4);
        return redirect()->route('create1')->with('success', 'Berhasil menyelesaikan pertanyaan!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
