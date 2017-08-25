<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mikrotik extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mikrotik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $mikrotik = $this->Mikrotik_model->get_all();

        $data = array(
            'mikrotik_data' => $mikrotik
        );

        $this->template->load('template','tbl_mikrotik_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mikrotik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mikrotik' => $row->id_mikrotik,
		'unit_kerja' => $row->unit_kerja,
		'kategori' => $row->kategori,
		'tid' => $row->tid,
		'deskripsi' => $row->deskripsi,
		'ip_lan' => $row->ip_lan,
		'ip_pool' => $row->ip_pool,
		'no_ccid' => $row->no_ccid,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','tbl_mikrotik_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mikrotik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mikrotik/create_action'),
	    'id_mikrotik' => set_value('id_mikrotik'),
	    'unit_kerja' => set_value('unit_kerja'),
	    'kategori' => set_value('kategori'),
	    'tid' => set_value('tid'),
	    'deskripsi' => set_value('deskripsi'),
	    'ip_lan' => set_value('ip_lan'),
	    'ip_pool' => set_value('ip_pool'),
	    'no_ccid' => set_value('no_ccid'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','tbl_mikrotik_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'tid' => $this->input->post('tid',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'ip_lan' => $this->input->post('ip_lan',TRUE),
		'ip_pool' => $this->input->post('ip_pool',TRUE),
		'no_ccid' => $this->input->post('no_ccid',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Mikrotik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mikrotik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mikrotik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mikrotik/update_action'),
		'id_mikrotik' => set_value('id_mikrotik', $row->id_mikrotik),
		'unit_kerja' => set_value('unit_kerja', $row->unit_kerja),
		'kategori' => set_value('kategori', $row->kategori),
		'tid' => set_value('tid', $row->tid),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'ip_lan' => set_value('ip_lan', $row->ip_lan),
		'ip_pool' => set_value('ip_pool', $row->ip_pool),
		'no_ccid' => set_value('no_ccid', $row->no_ccid),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','tbl_mikrotik_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mikrotik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mikrotik', TRUE));
        } else {
            $data = array(
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'tid' => $this->input->post('tid',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'ip_lan' => $this->input->post('ip_lan',TRUE),
		'ip_pool' => $this->input->post('ip_pool',TRUE),
		'no_ccid' => $this->input->post('no_ccid',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Mikrotik_model->update($this->input->post('id_mikrotik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mikrotik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mikrotik_model->get_by_id($id);

        if ($row) {
            $this->Mikrotik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mikrotik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mikrotik'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('unit_kerja', 'unit kerja', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('tid', 'tid', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('ip_lan', 'ip lan', 'trim|required');
	$this->form_validation->set_rules('ip_pool', 'ip pool', 'trim|required');
	$this->form_validation->set_rules('no_ccid', 'no ccid', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_mikrotik', 'id_mikrotik', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_mikrotik.xls";
        $judul = "tbl_mikrotik";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Tid");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Ip Lan");
	xlsWriteLabel($tablehead, $kolomhead++, "Ip Pool");
	xlsWriteLabel($tablehead, $kolomhead++, "No Ccid");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Mikrotik_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit_kerja);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kategori);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tid);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ip_lan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ip_pool);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_ccid);
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
        header("Content-Disposition: attachment;Filename=tbl_mikrotik.doc");

        $data = array(
            'tbl_mikrotik_data' => $this->Mikrotik_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_mikrotik_doc',$data);
    }

}

/* End of file Mikrotik.php */
/* Location: ./application/controllers/Mikrotik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-16 02:44:26 */
/* http://harviacode.com */