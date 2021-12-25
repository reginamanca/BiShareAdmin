<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beli extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('Auth/SignIn');
        }

        $this->load->model('beli_model');
        $this->load->model('produk_model');
        $this->load->model('toko_model');
        $this->load->model('kategori_model');
        $this->load->helper('new_helper');
    }
 

    public function Index($userId = null)
    {
        $data = LoadDataAwal('Daftar Beli Saya');

        if ($this->session->userdata('status') != 'admin') {
            $userId = $this->session->userdata('tokoid');
        }
        if (!isset($userId) || $userId == '') {
            $userId = $this->session->userdata('tokoid');
            $data['beli'] = $this->beli_model->GetListByUser($userId);
        }
        $data['beli'] = $this->beli_model->GetListByUser($userId);
        $this->load->view('header', $data);
        $this->load->view('BeliList', $data);
        $this->load->view('footer', $data);
    }
    public function BeliList($status = 'approve')
    {
        $data = LoadDataAwal('Daftar Beli');

        $beli = $this->beli_model->getlist();
        $data['belistatus'] = $status;
        $hasil = [];
        for ($x = 0; $x < count($beli); $x++) {
            if ($beli[$x]['status'] == $status) {
                array_push($hasil, $beli[$x]);
            }
        }
        $data['beli'] = $hasil;
        $this->load->view('header', $data);
        $this->load->view('BeliListAdmin', $data);
        $this->load->view('footer', $data);
    }
    public function BeliForm(string $key = null, $tokoid = null)
    {
        $data = LoadDataAwal('Buy Form');
       
        if ($this->session->userdata('status') ) {
            $tokoid = $this->session->userdata('tokoid');
        }
        if (!isset($belidate) || $tokoid == '') {
            $tokoid = $this->session->userdata('tokoid');
        }
        $data['beli'] = $this->beli_model->GetEmpty();
        if ($key != null && $key!= 'null') {
            $data['beli'] = $this->beli_model->get($key);

        } else {
            $toko = $this->toko_model->Get($tokoid);

            $data['beli']['tokoid'] = $beli['tokoid'];
            $data['beli']['tokoname'] = $beli['tokoname'];
            $data['beli']['status'] = 'pending';
        }

        $this->load->view('header', $data);
        $this->load->view('BeliForm', $data);
        $this->load->view('footer', $data);
    }

    public function Save(string $key = null, string $tokoid = null)
    {
        $data = LoadDataAwal('Buy Form');
        $belidate = $this->input->post('belidate');
        $username = $this->input->post('username');
        $namalengkap = $this->input->post('namalengkap');
        $alamat = $this->input->post('alamat');
        $catatan = $this->input->post('catatan');
        $hargaproduk = $this->input->post('hargaproduk');
        $hargaongkir = $this->input->post('hargaongkir');
        $hargaadmin = $this->input->post('hargaadmin');
        $totalharga = $this->input->post('totalharga');
        $metodepengiriman = $this->input->post('metodepengiriman');
        $metodepembayaran = $this->input->post('metodepembayaran');
        $pembayarannama = $this->input->post('pembayarannama');
        $pembayaranbank = $this->input->post('pembayaranbank');
        $pembayarannorek = $this->input->post('pembayarannorek');
        $pembayarantanggal = $this->input->post('pembayarantanggal');
        $status = $this->input->post('status');
        $komenpenjual = $this->input->post('komenpenjual');

        $beli = $this->beli_model->get($key);
        $beli['belidate'] = $belidate; 
        $beli['username'] = $username; 
        $beli['namalengkap'] = $namalengkap; 
        $beli['alamat'] = $alamat; 
        $beli['catatan'] = $catatan; 
        $beli['hargaproduk'] = $hargaproduk; 
        $beli['hargaongkir'] = $hargaongkir; 
        $beli['hargaadmin'] = $hargaadmin; 
        $beli['totalharga'] = $totalharga; 
        $beli['metodepengiriman'] = $metodepengiriman; 
        $beli['metodepembayaran'] = $metodepembayaran; 
        $beli['pembayarannama'] = $pembayarannama; 
        $beli['pembayaranbank'] = $pembayaranbank; 
        $beli['pembayarannorek'] = $pembayarannorek; 
        $beli['pembayarantanggal'] = $pembayarantanggal; 
        $beli['status'] = $status; 
        $beli['komenpenjual'] = $komenpenjual; 

        $beli = $this->beli_model->insert($beli, $key);
        // $toko['tokoname'] = $tokoname;
        // $toko['tokodesc'] = $tokodesc;
        // $toko['status'] = $status;

        // if ($status == 'reject') {
        //     $toko['status'] = 'pending';
        // }

        // $toko['kontak'] = $kontak;
        // $toko['alamat'] = $alamat;
        // $this->toko_model->insert($toko, $toko['tokoid']);

        redirect("Beli/BeliForm/" . $key . "/" . $tokoid);
        return;
    }

    public function Delete()
    {
        $data = LoadDataAwal('Beli Form');
        $belicode = $this->input->post('belicode');
        //cek data
        echo $belicode;
        if (!isset($belicode) || $belicode == '') {
            return ReturnJsonSimple(false, 'Gagal', 'produk Kosong');
        }

        //pastikan jika ada
        $beli = $this->beli_model->get($belicode);
        if (!isset($belicode)) {
            return ReturnJsonSimple(false, 'Gagal', 'produk Kosong');
        }
        // hapus

        $this->beli_model->SoftDelete($belicode);
        // $this->load->model('rekomendasi_model');
        // $rekomendasi = $this->rekomendasi_model->GetListByUser($belicode);
        // foreach ($rekomendasi as $value) {
        //     if ($value['belicode'] == $beli['belicode'] && $value['dlt'] == false)  {
        //         $value['username'] .= '-Deleted';                         
        //         $value['dlt'] = true;                         
        //         $this->rekomendasi_model->insert($value,$value['rekomendasiid']);
        //     }
        // }
        

        return ReturnJsonSimple(true, 'Sukses', 'produk dihapus');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        if ($this->session->userdata('status') == 'admin') {
            $data['beli'] = $this->beli_model->tampil_data();
        } else {
            $tokoid = $this->session->userdata('tokoid');
            echo $tokoid;
            $data['beli'] = $this->beli_model->tampil_databyToko($tokoid);
        }
       
        $this->load->view('BeliPDF', $data);

        $paper_size = 'A3';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);


        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_beliform.pdf", array('Attachment' =>0));
        
    }
    public function invoice(string $belidate = null)
    {
        $this->load->library('dompdf_gen');

        $data['invoice'] = $this->beli_model->tampil_dataInvoice($belidate);
       
        $this->load->view('Invoice', $data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);


        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_beliform.pdf", array('Attachment' =>0));
        
    }
    public function excel (){

        $data['beli'] = $this->beli_model->tampil_data();

        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel12007.php');

        $object = new PHPExcel();

        $object->getPoperties()->setCreator("Bishare Marketplace");
        $object->getPoperties()->setLastModifiedBy("Bishare Marketplace");
        $object->getPoperties()->setTitle("Beli List");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'CODE');
        $object->getActiveSheet()->setCellValue('C1', 'USERNAME');
        $object->getActiveSheet()->setCellValue('D1', 'HARGA BARANG');

        $baris = 2;
        $no = 1;

        foreach ($data['beli'] as $beli) {
            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('A'.$baris, $beli->belidate);
            $object->getActiveSheet()->setCellValue('A'.$baris, $beli->username);
            $object->getActiveSheet()->setCellValue('A'.$baris, $beli->totalharga);

            $baris++;
        }

        $filename="Data_Pembelian".'xlsx';

        $object->getActiveSheet()->setTitle("Data Pembelian");

        header('Content-Type: applicarion/
            vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel12007');
        $writer->save('php;//output');

        exit;


        

    }

    
}
