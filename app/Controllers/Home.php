<?php

namespace App\Controllers;
// namespace App\ThirdParty;

use App\Models\Home_model;
use App\Models\Db2_model;

use function PHPSTORM_META\map;
// require "vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
// use App\ThirdParty\phpSerial;



class Home extends BaseController
{
   
    public function __construct() {
        // require_once APPPATH . "/ThirdParty/php_serial.class.php";
    }

    public function index()
    {
        return view('login');
    }

    public function home()
    {
        return view('login');
    }

    public function login()
    {
        
        $dataLogin = array(
            "username" => $this->request->getPost('username'),
            "password"=> md5($this->request->getPost('password'))
        );
        $model = new Home_model();
        $cekLogin = $model->getSelect('master_user', $dataLogin); 
        if(count($cekLogin)>0){
            foreach($cekLogin as $cl){
                $username = $cl['username'];
                $nama = $cl['nama'];
                $iduser = $cl['id'];
            }
            $session_arr = array(
                "username" => $username,
                "nama" => $nama,
                "iduser" => $iduser
            );
            session()->set($session_arr);
            echo "<script> 
            window.location='".base_url()."/apps'
            </script>";
        }else{
            echo "<script> 
            alert('Username atau password salah !')
            window.location='".base_url()."'
            </script>";
        }

    }

    public function logout()
    {
        $session = session(); 
        $session->destroy();
        echo "<script> window.location= '".base_url()."' </script>";
    }

    public function apps()
    {
        if(null !== session()->get('username')){
            $model = new Home_model();
            $iduser = session()->get('iduser');
            $data['menu'] = $model->getMenu($iduser);
            echo view("home", $data); 
        }else{
            echo "<script> 
            window.location='".base_url()."'
            </script>";
        }
        
    }

    public function dashboard()
    {
        $arr = array(
            "menu" => "/dashboard"
        );
        session()->set($arr);

        echo view("dashboard");
    }

    public function wc_program()
    {
        $arr = array(
            "menu" => "/wc_program"
        );
        session()->set($arr);

        echo view("wc-program");
    }

    public function serialData()
    {
        $model = new Home_model();

        // $value = $this->request->getPost('data');
        // $arr0 = explode("\r\n", $value);
        // $count0 = count($arr0);
        // $getMin10 = $count0 - 2 ;
        // $pars = $arr0[$getMin10];
        
        // $arr1 = explode(",", $pars);
        // $count1 = count($arr1);
        // $getMin11 = $count1 - 1;
        // $data['call'] = str_replace("+", "", $arr1[$getMin11]);
       
        $value = $this->request->getPost('value');
        $data['rd'] = json_decode($value);
        $i = 0;
        foreach($data['rd'] as $rd){
            $arr[$i] = $rd;
            $i++; 
        };
        $data['tipe'] = $arr[0];
        
        $kode_kontraktor = $arr[5];
        $where1 = array( 'kode_vendor' => $kode_kontraktor );
        $kon_delivery = $arr[6];
        $where2 = array( 'kode_vendor' => $kon_delivery );
        $rowKon = $model->getSelectRow("master_vendor", $where1);
        $rowKonDev = $model->getSelectRow("master_vendor", $where2);
        $data['nama_kontraktor'] = $rowKon->nama_vendor;
        $data['nama_kon_delivery'] = $rowKonDev->nama_vendor;

        $no_transaksi = $arr[1];
        $arrTrans = explode("/", $no_transaksi);
        $tglStr = $arrTrans[2];
        $day = substr($tglStr, 0, 2);
        $month = substr($tglStr, 2, 2);
        $year = "20".substr($tglStr, 4, 2);
        $hour = substr($tglStr, 6, 2);
        $minute = substr($tglStr, 8, 2);
        $second = substr($tglStr, 10, 2);
        // $data['tgl_muat'] = $year."-".$month."-".$day ;
        $data['tgl_muat'] = $day."/".$month."/".$year ;
        $data['jam_muat'] = $hour.":".$minute.":".$second; 
        


        // $tipe = $data['rd'][0];

        // dd($readData);

        echo json_encode($data);

    }

    public function saveTruckIn()
    {

        $dateNow = date("Y-m-d H:i:s");
        $noTrans = str_replace("/","", $this->request->getPost('no_transaksi'));
       
        $data = [
            
            "no_transaksi" => $this->request->getPost('no_transaksi'),
            "tipe" => $this->request->getPost('tipe_tiket'),
            "no_tiket_mobil" => $this->request->getPost('no_tiket'),
            // "no_wo" => $this->request->getPost('no_wo'),
            "kode_petak" => $this->request->getPost('no_petak'),
            "ancak" => $this->request->getPost('ancak'),
            "jenis_tebu" => $this->request->getPost('jenis_tebu'),
            "kode_kontraktor" => $this->request->getPost('kode_kontraktor'),
            "loading_vehicle_number" => $this->request->getPost('no_alat1'),
            "loading_vehicle_operator" => $this->request->getPost('op_alat1'),
            "kode_barge" => $this->request->getPost('no_barge'),
            "kode_tugboat" => $this->request->getPost('no_tug_boat'),
            "tugboat_captain" => $this->request->getPost('nahkoda'),
            "tujuan_tugboat" => $this->request->getPost('rute'),
            "kode_truck" => $this->request->getPost('no_truck'),
            "supir" => $this->request->getPost('driver'),
            "weight_in" => $this->request->getPost('berat_in'),
            "weight_in_time" => $dateNow,
            "retase" => $this->request->getPost('retase'),
            "kontraktor_delivery" => $this->request->getPost('kode_kon_delivery'),
            "no_polisi" => $this->request->getPost('no_polisi'),
            "tujuan" => $this->request->getPost('tujuan'),
            "no_alat2" => $this->request->getPost('no_alat2'),
            "op_alat2" => $this->request->getPost('op_alat2'),
            "createby" => $this->request->getPost('createby'),
        ];
        // $model = new Home_model();
        // $insert = $model->dataInsert('tbl_weight_scale_temp', $data);
        // if($insert){
        //     $return = array( 'status' => "success", "msg" => "Data weight in berhasil di proses !" );
        // }else{
        //     $return = array( 'status' => "error", "msg" => "Simpan data weight in gagal , mohon segera menghubungi administrator !");
        // }
        
        // $strArr = implode(",",$data);
        $dataQR = array(
            //0
            '0' => $this->request->getPost('tipe_tiket'),
            //1
            '1' => $this->request->getPost('no_transaksi'),
            //2
            '2' => $this->request->getPost('no_tiket'),
            //3
            '3' => $this->request->getPost('no_barge'),
            //4
            '4' => $this->request->getPost('no_petak'),
            //5
            '5' => $this->request->getPost('kode_kontraktor'),
            //6
            '6' => $this->request->getPost('kode_kon_delivery'),
            //7
            '7' => $this->request->getPost('no_barge'),
            //8
            '8' => $this->request->getPost('no_truck'),
            //9
            '9' => $this->request->getPost('driver'),
            //10
            '10' => $this->request->getPost('no_polisi'),
            //11
            '11' => $this->request->getPost('ancak'),
            //12
            '12' => $this->request->getPost('retase'),
            //13
            '13' => $this->request->getPost('rute'),
            //14
            '14' => $this->request->getPost('tujuan'),
            //15
            '15' => $this->request->getPost('kepala_regu'),
            //16
            '16' => $this->request->getPost('no_tug_boat'),
            //17
            '17' => $this->request->getPost('nahkoda'),
            //18
            '18' => $this->request->getPost('tgl_tebang'),
            //19
            '19' => $this->request->getPost('jenis_tebu'),
            //20
            '20' => $this->request->getPost('no_alat1'),
            //21
            '21' => $this->request->getPost('op_alat1'),
            //22
            '22' => $this->request->getPost('no_alat2'),
            //23
            '23' => $this->request->getPost('op_alat2'),
            //24
            '24' => $this->request->getPost('createby'),
            //25 timbang in 
            '25' => $this->request->getPost('berat_in')

        );

        $strArr = json_encode($dataQR);
        $qr= QrCode::create($strArr);
        $writer = new PngWriter();
        $result = $writer->write($qr);
        $result->saveToFile( ROOTPATH."/assets/qr/$noTrans.png");
        header("Content-Type: " . $result->getMimeType());
   
        echo json_decode(json_encode($strArr));
    }



}
