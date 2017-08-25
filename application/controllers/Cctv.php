<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cctv extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cctv_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $cctv = $this->Cctv_model->get_all();

        $data = array(
            'cctv_data' => $cctv
        );

        $this->template->load('template','tbl_cctv_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Cctv_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_cctv' => $row->id_cctv,
		'unit_kerja' => $row->unit_kerja,
		'sn' => $row->sn,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','tbl_cctv_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cctv'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cctv/create_action'),
	    'id_cctv' => set_value('id_cctv'),
	    'unit_kerja' => set_value('unit_kerja'),
	    'sn' => set_value('sn'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','tbl_cctv_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'sn' => $this->input->post('sn',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Cctv_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cctv'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cctv_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cctv/update_action'),
		'id_cctv' => set_value('id_cctv', $row->id_cctv),
		'unit_kerja' => set_value('unit_kerja', $row->unit_kerja),
		'sn' => set_value('sn', $row->sn),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','tbl_cctv_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cctv'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cctv', TRUE));
        } else {
            $data = array(
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'sn' => $this->input->post('sn',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Cctv_model->update($this->input->post('id_cctv', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cctv'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cctv_model->get_by_id($id);

        if ($row) {
            $this->Cctv_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cctv'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cctv'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('unit_kerja', 'unit kerja', 'trim|required');
	$this->form_validation->set_rules('sn', 'sn', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_cctv', 'id_cctv', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_cctv.xls";
        $judul = "tbl_cctv";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sn");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Cctv_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit_kerja);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sn);
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
        header("Content-Disposition: attachment;Filename=tbl_cctv.doc");

        $data = array(
            'tbl_cctv_data' => $this->Cctv_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_cctv_doc',$data);
    }

}

/* End of file Cctv.php */
/* Location: ./application/controllers/Cctv.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-16 03:18:39 */
/* http://harviacode.com */