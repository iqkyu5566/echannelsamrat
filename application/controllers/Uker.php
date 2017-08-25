<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uker extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Uker_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $uker = $this->Uker_model->get_all();

        $data = array(
            'uker_data' => $uker
        );

        $this->template->load('template','tbl_uker_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Uker_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_uker' => $row->id_uker,
		'kode_branch' => $row->kode_branch,
		'nama_uker' => $row->nama_uker,
		'alamat_uker' => $row->alamat_uker,
	    );
            $this->template->load('template','tbl_uker_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('uker'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('uker/create_action'),
	    'id_uker' => set_value('id_uker'),
	    'kode_branch' => set_value('kode_branch'),
	    'nama_uker' => set_value('nama_uker'),
	    'alamat_uker' => set_value('alamat_uker'),
	);
        $this->template->load('template','tbl_uker_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_branch' => $this->input->post('kode_branch',TRUE),
		'nama_uker' => $this->input->post('nama_uker',TRUE),
		'alamat_uker' => $this->input->post('alamat_uker',TRUE),
	    );

            $this->Uker_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('uker'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Uker_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('uker/update_action'),
		'id_uker' => set_value('id_uker', $row->id_uker),
		'kode_branch' => set_value('kode_branch', $row->kode_branch),
		'nama_uker' => set_value('nama_uker', $row->nama_uker),
		'alamat_uker' => set_value('alamat_uker', $row->alamat_uker),
	    );
            $this->template->load('template','tbl_uker_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('uker'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_uker', TRUE));
        } else {
            $data = array(
		'kode_branch' => $this->input->post('kode_branch',TRUE),
		'nama_uker' => $this->input->post('nama_uker',TRUE),
		'alamat_uker' => $this->input->post('alamat_uker',TRUE),
	    );

            $this->Uker_model->update($this->input->post('id_uker', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('uker'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Uker_model->get_by_id($id);

        if ($row) {
            $this->Uker_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('uker'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('uker'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_branch', 'kode branch', 'trim|required');
	$this->form_validation->set_rules('nama_uker', 'nama uker', 'trim|required');
	$this->form_validation->set_rules('alamat_uker', 'alamat uker', 'trim|required');

	$this->form_validation->set_rules('id_uker', 'id_uker', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_uker.xls";
        $judul = "tbl_uker";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Branch");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Uker");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Uker");

	foreach ($this->Uker_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_branch);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_uker);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_uker);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_uker.doc");

        $data = array(
            'tbl_uker_data' => $this->Uker_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_uker_doc',$data);
    }

}

/* End of file Uker.php */
/* Location: ./application/controllers/Uker.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-20 03:57:06 */
/* http://harviacode.com */