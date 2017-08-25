<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kaset_atm extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kaset_atm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kaset_atm = $this->Kaset_atm_model->get_all();

        $data = array(
            'kaset_atm_data' => $kaset_atm
        );

        $this->template->load('template','tbl_kaset_atm_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kaset_atm_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kaset_atm' => $row->id_kaset_atm,
		'unit_kerja' => $row->unit_kerja,
		'tid_atm' => $row->tid_atm,
		'merk_atm' => $row->merk_atm,
		'jumlah' => $row->jumlah,
		'status' => $row->status,
		'surat_pengantar' => $row->surat_pengantar,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','tbl_kaset_atm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kaset_atm'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kaset_atm/create_action'),
	    'id_kaset_atm' => set_value('id_kaset_atm'),
	    'unit_kerja' => set_value('unit_kerja'),
	    'tid_atm' => set_value('tid_atm'),
	    'merk_atm' => set_value('merk_atm'),
	    'jumlah' => set_value('jumlah'),
	    'status' => set_value('status'),
	    'surat_pengantar' => set_value('surat_pengantar'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','tbl_kaset_atm_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'tid_atm' => $this->input->post('tid_atm',TRUE),
		'merk_atm' => $this->input->post('merk_atm',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'status' => $this->input->post('status',TRUE),
		'surat_pengantar' => $this->input->post('surat_pengantar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Kaset_atm_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kaset_atm'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kaset_atm_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kaset_atm/update_action'),
		'id_kaset_atm' => set_value('id_kaset_atm', $row->id_kaset_atm),
		'unit_kerja' => set_value('unit_kerja', $row->unit_kerja),
		'tid_atm' => set_value('tid_atm', $row->tid_atm),
		'merk_atm' => set_value('merk_atm', $row->merk_atm),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'status' => set_value('status', $row->status),
		'surat_pengantar' => set_value('surat_pengantar', $row->surat_pengantar),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','tbl_kaset_atm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kaset_atm'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kaset_atm', TRUE));
        } else {
            $data = array(
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'tid_atm' => $this->input->post('tid_atm',TRUE),
		'merk_atm' => $this->input->post('merk_atm',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'status' => $this->input->post('status',TRUE),
		'surat_pengantar' => $this->input->post('surat_pengantar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Kaset_atm_model->update($this->input->post('id_kaset_atm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kaset_atm'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kaset_atm_model->get_by_id($id);

        if ($row) {
            $this->Kaset_atm_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kaset_atm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kaset_atm'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('unit_kerja', 'unit kerja', 'trim|required');
	$this->form_validation->set_rules('tid_atm', 'tid atm', 'trim|required');
	$this->form_validation->set_rules('merk_atm', 'merk atm', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('surat_pengantar', 'surat pengantar', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_kaset_atm', 'id_kaset_atm', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kaset_atm.xls";
        $judul = "tbl_kaset_atm";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Tid Atm");
	xlsWriteLabel($tablehead, $kolomhead++, "Merk Atm");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Surat Pengantar");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Kaset_atm_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit_kerja);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tid_atm);
	    xlsWriteNumber($tablebody, $kolombody++, $data->merk_atm);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->surat_pengantar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kaset_atm.doc");

        $data = array(
            'tbl_kaset_atm_data' => $this->Kaset_atm_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kaset_atm_doc',$data);
    }

}

/* End of file Kaset_atm.php */
/* Location: ./application/controllers/Kaset_atm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-16 02:44:12 */
/* http://harviacode.com */