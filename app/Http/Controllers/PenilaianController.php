<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use App\Current;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak_pdf()
    {
    	$penilaian = Assessment::all();
 
    	$pdf = PDF::loadview('penilaian_pdf',['penilaian'=>$penilaian]);
    	return $pdf->download('laporan-penilaian.pdf');
    }

    public function current()
    {
        
        $bulan = Current::selectRaw('
        title, tahap')
        ->groupBy('tahap','title')->orderBy('tahap', 'asc')->get();
        $kak = [];
        $tah = [];
        foreach ($bulan as $ka) {
            $kak[] = $ka->tahap;
            $tah[] = $ka->title;
        }
        // dd($kak);
        $date = '';
        $date1 = '';
        $date2 = '';
        $date3 = '';
        $data1 = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];
        $sangat = [];
        $baik = [];
        // $cukup = [];
        // $buruk = [];
        $sangat[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        CASE MONTH(created_at) WHEN 1 THEN "Januari"
                   WHEN 2 THEN "Febuari"
                   WHEN 3 THEN "Maret"
                   WHEN 4 THEN "April"
                   WHEN 5 THEN "Mei"
                   WHEN 6 THEN "Juni"
                   WHEN 7 THEN "Juli"
                   WHEN 8 THEN "Agustus"
                   WHEN 9 THEN "September"
                   WHEN 10 THEN "Oktober"
                   WHEN 11 THEN "November"
                   WHEN 12 THEN "Desember"
        END as month, tahap
        , grade')
         ->where('grade', 'sangat baik')->groupBy('month','grade','tahap')->orderBy('tahap', 'desc')->get();
        
         foreach ($sangat as $value) {
            $date = $value ;
        }
        foreach ($value as $val) {
           $data1[] = $val;
        }

         $baik[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        CASE MONTH(created_at) WHEN 1 THEN "Januari"
                   WHEN 2 THEN "Febuari"
                   WHEN 3 THEN "Maret"
                   WHEN 4 THEN "April"
                   WHEN 5 THEN "Mei"
                   WHEN 6 THEN "Juni"
                   WHEN 7 THEN "Juli"
                   WHEN 8 THEN "Agustus"
                   WHEN 9 THEN "September"
                   WHEN 10 THEN "Oktober"
                   WHEN 11 THEN "November"
                   WHEN 12 THEN "Desember"
        END as month, tahap
        , grade')
         ->where('grade', 'baik')->groupBy('month','grade','tahap')->orderBy('tahap', 'desc')->get();
        foreach ($baik as $value1) {
            $date1 = $value1;
        }
        foreach ($value1 as $val) {
                $data2[] = $val;
        }

        $cukup[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        CASE MONTH(created_at) WHEN 1 THEN "Januari"
                   WHEN 2 THEN "Febuari"
                   WHEN 3 THEN "Maret"
                   WHEN 4 THEN "April"
                   WHEN 5 THEN "Mei"
                   WHEN 6 THEN "Juni"
                   WHEN 7 THEN "Juli"
                   WHEN 8 THEN "Agustus"
                   WHEN 9 THEN "September"
                   WHEN 10 THEN "Oktober"
                   WHEN 11 THEN "November"
                   WHEN 12 THEN "Desember"
        END as month, tahap
        , grade')
         ->where('grade', 'cukup')->groupBy('month','grade','tahap')->orderBy('tahap', 'desc')->get();
        foreach ($cukup as $value2) {
            $date2 = $value2;
        }
        foreach ($value2 as $val) {
                $data3[] = $val;
        }

        $buruk[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        CASE MONTH(created_at) WHEN 1 THEN "Januari"
                   WHEN 2 THEN "Febuari"
                   WHEN 3 THEN "Maret"
                   WHEN 4 THEN "April"
                   WHEN 5 THEN "Mei"
                   WHEN 6 THEN "Juni"
                   WHEN 7 THEN "Juli"
                   WHEN 8 THEN "Agustus"
                   WHEN 9 THEN "September"
                   WHEN 10 THEN "Oktober"
                   WHEN 11 THEN "November"
                   WHEN 12 THEN "Desember"
        END as month, tahap
        , grade')
         ->where('grade', 'buruk')->groupBy('month','grade','tahap')->orderBy('tahap', 'desc')->get();
        foreach ($buruk as $value3) {
            $date3 = $value3;
        }
        foreach ($value3 as $val) {
                $data4[] = $val;
        }
        //  dd($data2);
        //  $jos = "{name : 'Baik' ,data : [100]},{name : 'Sangat Baik' ,data : [1000]}";

        // $sangat[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        // CASE MONTH(created_at) WHEN 1 THEN "Januari"
        //            WHEN 2 THEN "Febuari"
        //            WHEN 3 THEN "Maret"
        //            WHEN 4 THEN "April"
        //            WHEN 5 THEN "Mei"
        //            WHEN 6 THEN "Juni"
        //            WHEN 7 THEN "Juli"
        //            WHEN 8 THEN "Agustus"
        //            WHEN 9 THEN "September"
        //            WHEN 10 THEN "Oktober"
        //            WHEN 11 THEN "November"
        //            WHEN 12 THEN "Desember"
        // END as month
        // , grade')
        // ->where('grade', 'sangat baik')->groupBy('month','grade','tahap')->get();
        // $baik[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        //     CASE MONTH(created_at) WHEN 1 THEN "Januari"
        //                WHEN 2 THEN "Febuari"
        //                WHEN 3 THEN "Maret"
        //                WHEN 4 THEN "April"
        //                WHEN 5 THEN "Mei"
        //                WHEN 6 THEN "Juni"
        //                WHEN 7 THEN "Juli"
        //                WHEN 8 THEN "Agustus"
        //                WHEN 9 THEN "September"
        //                WHEN 10 THEN "Oktober"
        //                WHEN 11 THEN "November"
        //                WHEN 12 THEN "Desember"
        //     END as month
        //     , grade')
        //     ->where('grade', 'baik')->groupBy('tahap','month','grade')->get();
        //     $cukup[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        //     CASE MONTH(created_at) WHEN 1 THEN "Januari"
        //                WHEN 2 THEN "Febuari"
        //                WHEN 3 THEN "Maret"
        //                WHEN 4 THEN "April"
        //                WHEN 5 THEN "Mei"
        //                WHEN 6 THEN "Juni"
        //                WHEN 7 THEN "Juli"
        //                WHEN 8 THEN "Agustus"
        //                WHEN 9 THEN "September"
        //                WHEN 10 THEN "Oktober"
        //                WHEN 11 THEN "November"
        //                WHEN 12 THEN "Desember"
        //     END as month
        //     , grade')
        //     ->where('grade', 'cukup')->groupBy('tahap','month','grade')->get();
        //     $buruk[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
        //     CASE MONTH(created_at) WHEN 1 THEN "Januari"
        //                WHEN 2 THEN "Febuari"
        //                WHEN 3 THEN "Maret"
        //                WHEN 4 THEN "April"
        //                WHEN 5 THEN "Mei"
        //                WHEN 6 THEN "Juni"
        //                WHEN 7 THEN "Juli"
        //                WHEN 8 THEN "Agustus"
        //                WHEN 9 THEN "September"
        //                WHEN 10 THEN "Oktober"
        //                WHEN 11 THEN "November"
        //                WHEN 12 THEN "Desember"
        //     END as month
        //     , grade')
        //     ->where('grade', 'buruk')->groupBy('tahap','month','grade')->get();
        // foreach ($bulan as $value) {
        //     $date[] = $value->bulan;
            // $sangat[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
            // CASE MONTH(created_at) WHEN 1 THEN "Januari"
            //            WHEN 2 THEN "Febuari"
            //            WHEN 3 THEN "Maret"
            //            WHEN 4 THEN "April"
            //            WHEN 5 THEN "Mei"
            //            WHEN 6 THEN "Juni"
            //            WHEN 7 THEN "Juli"
            //            WHEN 8 THEN "Agustus"
            //            WHEN 9 THEN "September"
            //            WHEN 10 THEN "Oktober"
            //            WHEN 11 THEN "November"
            //            WHEN 12 THEN "Desember"
            // END as month
            // , grade')
            // ->where('grade', 'sangat baik')->groupBy('month','grade','tahap')->get();
            // $baik[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
            // CASE MONTH(created_at) WHEN 1 THEN "Januari"
            //            WHEN 2 THEN "Febuari"
            //            WHEN 3 THEN "Maret"
            //            WHEN 4 THEN "April"
            //            WHEN 5 THEN "Mei"
            //            WHEN 6 THEN "Juni"
            //            WHEN 7 THEN "Juli"
            //            WHEN 8 THEN "Agustus"
            //            WHEN 9 THEN "September"
            //            WHEN 10 THEN "Oktober"
            //            WHEN 11 THEN "November"
            //            WHEN 12 THEN "Desember"
            // END as month
            // , grade')
            // ->whereMonth('created_at', $value->month)->where('grade', 'baik')->groupBy('tahap','month','grade')->get();
            // $cukup[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
            // CASE MONTH(created_at) WHEN 1 THEN "Januari"
            //            WHEN 2 THEN "Febuari"
            //            WHEN 3 THEN "Maret"
            //            WHEN 4 THEN "April"
            //            WHEN 5 THEN "Mei"
            //            WHEN 6 THEN "Juni"
            //            WHEN 7 THEN "Juli"
            //            WHEN 8 THEN "Agustus"
            //            WHEN 9 THEN "September"
            //            WHEN 10 THEN "Oktober"
            //            WHEN 11 THEN "November"
            //            WHEN 12 THEN "Desember"
            // END as month
            // , grade')
            // ->whereMonth('created_at', $value->month)->where('grade', 'cukup')->groupBy('tahap','month','grade')->get();
            // $buruk[] = Current::selectRaw('sum(soal1) as soal1, sum(soal2) as soal2, sum(soal3) as soal3, sum(soal4) as soal4, sum(soal1 + soal2 + soal3 + soal4)/4 as total, 
            // CASE MONTH(created_at) WHEN 1 THEN "Januari"
            //            WHEN 2 THEN "Febuari"
            //            WHEN 3 THEN "Maret"
            //            WHEN 4 THEN "April"
            //            WHEN 5 THEN "Mei"
            //            WHEN 6 THEN "Juni"
            //            WHEN 7 THEN "Juli"
            //            WHEN 8 THEN "Agustus"
            //            WHEN 9 THEN "September"
            //            WHEN 10 THEN "Oktober"
            //            WHEN 11 THEN "November"
            //            WHEN 12 THEN "Desember"
            // END as month
            // , grade')
            // ->whereMonth('created_at', $value->month)->where('grade', 'buruk')->groupBy('tahap','month','grade')->get();
            
        // }
        return view('current', compact('data1','data2','bulan', 'data3','data4', 'sangat','baik','cukup','buruk','kak', 'jos', 'tah'));
    }

    public function currentdelete($id)
    {
        $find = Current::where('tahap', $id)->delete();
        
        // dd($find);
        return redirect()->back();
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
    public function edituser($id)
    {
        $edit = User::find($id);
        return view('edituser', compact('edit'));
    }
    public function updateuser(Request $request, $id)
    {
        $update = User::find($id);
        $update->name = $request->name;
        $update->username = $request->username;
        $update->role_id = $request->hakakses;
        $update->save();

        return redirect()->route('tambahuser');
        
    }
    public function tentang()
    {
        return view('tentang');
    }

    public function resetcurrent()
    {
        Assessment::truncate();
        return redirect()->back();
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
        if($data >= 81){
            $grade = 'sangat baik';
        }else if($data >= 61){
            $grade = 'baik';
        }else if($data >= 41){
            $grade = 'cukup';
        }else if($data < 41){
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

        // $insert = new Current();
        // $insert->nik = $penilaian->nik;
        // $insert->name = $penilaian->name;
        // $insert->soal1 = $request->pertama;
        // $insert->soal2 = $request->kedua;
        // $insert->soal3 = array_sum($request->ketiga);
        // $insert->soal4 = array_sum($request->keempat);
        // $insert->soal5 = $request->kelima;
        // $insert->grade = $grade;
        // $insert->save();

        $request->session()->forget('penilaian');
        // dd($penilaian->name, $request->all(), ($request->pertama + $request->kedua + array_sum($request->ketiga) + array_sum($request->keempat))/4);
        return redirect()->route('create1')->with('success', 'Berhasil menyelesaikan pertanyaan!');
    }

    public function historypost(Request $request)
    {
        $data = Assessment::all();
        $no = 1;
        $cek = Current::orderBy('tahap', 'desc')->first();
        $grade = ['sangat baik', 'baik', 'cukup', 'buruk'];
        $jes = [];
        $baikdiff = [];
        $baikint = [];
        foreach ($data as $aku) {
            if ($data[0]->grade != '' && $data[0]->tahap == null) {
                $jes[] = $aku->grade;
            }
        }
        // dd($cek == null || $cek == '');
        if ($cek == null || $cek == '') {
            foreach (array_diff($grade,$jes) as $diff) {
                Current::insert([
                    'nik' => '',
                    'name' => '',
                    'soal1' => 0,
                    'soal2' => 0,
                    'soal3' => 0,
                    'soal4' => 0,
                    'soal5' => 0,
                    'grade' => $diff,
                    'tahap' => $no,
                    'title' => $request->title,
                    'created_at' => $aku->created_at,
                    'updated_at' => $aku->updated_at
                ]);
            }
            foreach ($data as $aku) {
                Current::insert([
                    'nik' => $aku->nik,
                    'name' => $aku->name,
                    'soal1' => $aku->soal1,
                    'soal2' => $aku->soal2,
                    'soal3' => $aku->soal3,
                    'soal4' => $aku->soal4,
                    'soal5' => $aku->soal5,
                    'grade' => $aku->grade,
                    'tahap' => $no,
                    'title' => $request->title,
                    'created_at' => $aku->created_at,
                    'updated_at' => $aku->updated_at
                ]);
            }    
        } else {
            $cik = Current::orderBy('tahap', 'desc')->first()->toArray();
            foreach (array_diff($grade,$jes) as $diff) {
                Current::insert([
                    'nik' => '',
                    'name' => '',
                    'soal1' => 0,
                    'soal2' => 0,
                    'soal3' => 0,
                    'soal4' => 0,
                    'soal5' => 0,
                    'grade' => $diff,
                    'tahap' => $cik['tahap']+1,
                    'title' => $request->title,
                    'created_at' => $aku->created_at,
                    'updated_at' => $aku->updated_at
                ]);
            }
            foreach ($data as $aku) {
                Current::insert([
                    'nik' => $aku->nik,
                    'name' => $aku->name,
                    'soal1' => $aku->soal1,
                    'soal2' => $aku->soal2,
                    'soal3' => $aku->soal3,
                    'soal4' => $aku->soal4,
                    'soal5' => $aku->soal5,
                    'grade' => $aku->grade,
                    'tahap' => $cik['tahap']+1,
                    'title' => $request->title,
                    'created_at' => $aku->created_at,
                    'updated_at' => $aku->updated_at
                ]);
            }
        }
        
        
        // dd($baikdiff,$baikint);


        // } else {
        //     $cik = Current::orderBy('tahap', 'desc')->first()->toArray();
        //     foreach ($data as $aku) {
        //         Current::insert([
        //             'nik' => $aku->nik,
        //             'name' => $aku->name,
        //             'soal1' => $aku->soal1,
        //             'soal2' => $aku->soal2,
        //             'soal3' => $aku->soal3,
        //             'soal4' => $aku->soal4,
        //             'soal5' => $aku->soal5,
        //             'grade' => $aku->grade,
        //             'tahap' => $cik['tahap'] + 1,
        //             'created_at' => $aku->created_at,
        //             'updated_at' => $aku->updated_at
        //         ]);
        //     }
        // }
        // $jes = [];
        // foreach ($data as $dat) {
        //     $jes[] = $dat;
        // }
        // $no = 0;
        // $test1 = [];
        // foreach ($jes as $key) {
        //     $test1[] = $jes[$no++]['nik'];
        // }
        // $as = Current::whereIn('nik', $test1)->get()->toArray();
        // $jos = [];
        // $ang = 0;
        // foreach ($as as $sa) {
        //     $jos[] = $as[$ang++]['nik'];
        // }
        
        // if (array_intersect($test1,$jos) != null) {
        //     $ak = Assessment::whereIn('nik', array_intersect($test1,$jos))->get();
        //     foreach ($ak as $aku) {
        //         Current::whereIn('nik', array_intersect($test1,$jos))->update([
        //             'nik' => $aku->nik,
        //             'name' => $aku->name,
        //             'soal1' => $aku->soal1,
        //             'soal2' => $aku->soal2,
        //             'soal3' => $aku->soal3,
        //             'soal4' => $aku->soal4,
        //             'soal5' => $aku->soal5,
        //             'grade' => $aku->grade
        //         ]);
        //     }
        // }

        // if (array_diff($test1,$jos) != null) {
        //     $ka = Assessment::whereIn('nik', array_diff($test1,$jos))->get();
        //     foreach ($ka as $value) {
        //         $insert = new Current();
        //         $insert->nik = $value->nik;
        //         $insert->name = $value->name;
        //         $insert->soal1 = $value->soal1;
        //         $insert->soal2 = $value->soal2;
        //         $insert->soal3 = $value->soal3;
        //         $insert->soal4 = $value->soal4;
        //         $insert->soal5 = $value->soal5;
        //         $insert->grade = $value->grade;
        //         $insert->save();
        //     }
        // } 

        return redirect()->back();
    // dd(Carbon::parse($request->date)->month, $data);
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
