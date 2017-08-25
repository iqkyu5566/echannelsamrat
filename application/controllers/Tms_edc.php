<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tms_edc extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tms_edc_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tms_edc = $this->Tms_edc_model->get_all();

        $data = array(
            'tms_edc_data' => $tms_edc
        );

        $this->template->load('template','tbl_tms_edc_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tms_edc_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tms' => $row->id_tms,
		'sn_edc_lama' => $row->sn_edc_lama,
		'sn_edc_baru' => $row->sn_edc_baru,
		'merk_lama' => $row->merk_lama,
		'merk_baru' => $row->merk_baru,
		'spk_edc_lama' => $row->spk_edc_lama,
		'spk_edc_baru' => $row->spk_edc_baru,
		'no_simcard_lama' => $row->no_simcard_lama,
		'no_simcard_baru' => $row->no_simcard_baru,
		'sn_simcard_lama' => $row->sn_simcard_lama,
		'sn_simcard_baru' => $row->sn_simcard_baru,
		'sn_clr_lama' => $row->sn_clr_lama,
		'sn_clr_baru' => $row->sn_clr_baru,
		'sam_brizzi_lama' => $row->sam_brizzi_lama,
		'sam_brizzi_baru' => $row->sam_brizzi_baru,
		'tid_lama' => $row->tid_lama,
		'tid_baru' => $row->tid_baru,
		'mid_lama' => $row->mid_lama,
		'mid_baru' => $row->mid_baru,
		'nama_agen_lama' => $row->nama_agen_lama,
		'nama_agen_baru' => $row->nama_agen_baru,
		'alamat_agen_lama' => $row->alamat_agen_lama,
		'alamat_agen_baru' => $row->alamat_agen_baru,
		'cabang_lama' => $row->cabang_lama,
		'cabang_baru' => $row->cabang_baru,
		'branch_lama' => $row->branch_lama,
		'branch_baru' => $row->branch_baru,
		'kode_uker_lama' => $row->kode_uker_lama,
		'kode_uker_baru' => $row->kode_uker_baru,
		'norek_lama' => $row->norek_lama,
		'norek_baru' => $row->norek_baru,
		'jenis_edc_lama' => $row->jenis_edc_lama,
		'jenis_edc_baru' => $row->jenis_edc_baru,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','tbl_tms_edc_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tms_edc'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tms_edc/create_action'),
	    'id_tms' => set_value('id_tms'),
	    'sn_edc_lama' => set_value('sn_edc_lama'),
	    'sn_edc_baru' => set_value('sn_edc_baru'),
	    'merk_lama' => set_value('merk_lama'),
	    'merk_baru' => set_value('merk_baru'),
	    'spk_edc_lama' => set_value('spk_edc_lama'),
	    'spk_edc_baru' => set_value('spk_edc_baru'),
	    'no_simcard_lama' => set_value('no_simcard_lama'),
	    'no_simcard_baru' => set_value('no_simcard_baru'),
	    'sn_simcard_lama' => set_value('sn_simcard_lama'),
	    'sn_simcard_baru' => set_value('sn_simcard_baru'),
	    'sn_clr_lama' => set_value('sn_clr_lama'),
	    'sn_clr_baru' => set_value('sn_clr_baru'),
	    'sam_brizzi_lama' => set_value('sam_brizzi_lama'),
	    'sam_brizzi_baru' => set_value('sam_brizzi_baru'),
	    'tid_lama' => set_value('tid_lama'),
	    'tid_baru' => set_value('tid_baru'),
	    'mid_lama' => set_value('mid_lama'),
	    'mid_baru' => set_value('mid_baru'),
	    'nama_agen_lama' => set_value('nama_agen_lama'),
	    'nama_agen_baru' => set_value('nama_agen_baru'),
	    'alamat_agen_lama' => set_value('alamat_agen_lama'),
	    'alamat_agen_baru' => set_value('alamat_agen_baru'),
	    'cabang_lama' => set_value('cabang_lama'),
	    'cabang_baru' => set_value('cabang_baru'),
	    'branch_lama' => set_value('branch_lama'),
	    'branch_baru' => set_value('branch_baru'),
	    'kode_uker_lama' => set_value('kode_uker_lama'),
	    'kode_uker_baru' => set_value('kode_uker_baru'),
	    'norek_lama' => set_value('norek_lama'),
	    'norek_baru' => set_value('norek_baru'),
	    'jenis_edc_lama' => set_value('jenis_edc_lama'),
	    'jenis_edc_baru' => set_value('jenis_edc_baru'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','tbl_tms_edc_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sn_edc_lama' => $this->input->post('sn_edc_lama',TRUE),
		'sn_edc_baru' => $this->input->post('sn_edc_baru',TRUE),
		'merk_lama' => $this->input->post('merk_lama',TRUE),
		'merk_baru' => $this->input->post('merk_baru',TRUE),
		'spk_edc_lama' => $this->input->post('spk_edc_lama',TRUE),
		'spk_edc_baru' => $this->input->post('spk_edc_baru',TRUE),
		'no_simcard_lama' => $this->input->post('no_simcard_lama',TRUE),
		'no_simcard_baru' => $this->input->post('no_simcard_baru',TRUE),
		'sn_simcard_lama' => $this->input->post('sn_simcard_lama',TRUE),
		'sn_simcard_baru' => $this->input->post('sn_simcard_baru',TRUE),
		'sn_clr_lama' => $this->input->post('sn_clr_lama',TRUE),
		'sn_clr_baru' => $this->input->post('sn_clr_baru',TRUE),
		'sam_brizzi_lama' => $this->input->post('sam_brizzi_lama',TRUE),
		'sam_brizzi_baru' => $this->input->post('sam_brizzi_baru',TRUE),
		'tid_lama' => $this->input->post('tid_lama',TRUE),
		'tid_baru' => $this->input->post('tid_baru',TRUE),
		'mid_lama' => $this->input->post('mid_lama',TRUE),
		'mid_baru' => $this->input->post('mid_baru',TRUE),
		'nama_agen_lama' => $this->input->post('nama_agen_lama',TRUE),
		'nama_agen_baru' => $this->input->post('nama_agen_baru',TRUE),
		'alamat_agen_lama' => $this->input->post('alamat_agen_lama',TRUE),
		'alamat_agen_baru' => $this->input->post('alamat_agen_baru',TRUE),
		'cabang_lama' => $this->input->post('cabang_lama',TRUE),
		'cabang_baru' => $this->input->post('cabang_baru',TRUE),
		'branch_lama' => $this->input->post('branch_lama',TRUE),
		'branch_baru' => $this->input->post('branch_baru',TRUE),
		'kode_uker_lama' => $this->input->post('kode_uker_lama',TRUE),
		'kode_uker_baru' => $this->input->post('kode_uker_baru',TRUE),
		'norek_lama' => $this->input->post('norek_lama',TRUE),
		'norek_baru' => $this->input->post('norek_baru',TRUE),
		'jenis_edc_lama' => $this->input->post('jenis_edc_lama',TRUE),
		'jenis_edc_baru' => $this->input->post('jenis_edc_baru',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Tms_edc_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tms_edc'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tms_edc_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tms_edc/update_action'),
		'id_tms' => set_value('id_tms', $row->id_tms),
		'sn_edc_lama' => set_value('sn_edc_lama', $row->sn_edc_lama),
		'sn_edc_baru' => set_value('sn_edc_baru', $row->sn_edc_baru),
		'merk_lama' => set_value('merk_lama', $row->merk_lama),
		'merk_baru' => set_value('merk_baru', $row->merk_baru),
		'spk_edc_lama' => set_value('spk_edc_lama', $row->spk_edc_lama),
		'spk_edc_baru' => set_value('spk_edc_baru', $row->spk_edc_baru),
		'no_simcard_lama' => set_value('no_simcard_lama', $row->no_simcard_lama),
		'no_simcard_baru' => set_value('no_simcard_baru', $row->no_simcard_baru),
		'sn_simcard_lama' => set_value('sn_simcard_lama', $row->sn_simcard_lama),
		'sn_simcard_baru' => set_value('sn_simcard_baru', $row->sn_simcard_baru),
		'sn_clr_lama' => set_value('sn_clr_lama', $row->sn_clr_lama),
		'sn_clr_baru' => set_value('sn_clr_baru', $row->sn_clr_baru),
		'sam_brizzi_lama' => set_value('sam_brizzi_lama', $row->sam_brizzi_lama),
		'sam_brizzi_baru' => set_value('sam_brizzi_baru', $row->sam_brizzi_baru),
		'tid_lama' => set_value('tid_lama', $row->tid_lama),
		'tid_baru' => set_value('tid_baru', $row->tid_baru),
		'mid_lama' => set_value('mid_lama', $row->mid_lama),
		'mid_baru' => set_value('mid_baru', $row->mid_baru),
		'nama_agen_lama' => set_value('nama_agen_lama', $row->nama_agen_lama),
		'nama_agen_baru' => set_value('nama_agen_baru', $row->nama_agen_baru),
		'alamat_agen_lama' => set_value('alamat_agen_lama', $row->alamat_agen_lama),
		'alamat_agen_baru' => set_value('alamat_agen_baru', $row->alamat_agen_baru),
		'cabang_lama' => set_value('cabang_lama', $row->cabang_lama),
		'cabang_baru' => set_value('cabang_baru', $row->cabang_baru),
		'branch_lama' => set_value('branch_lama', $row->branch_lama),
		'branch_baru' => set_value('branch_baru', $row->branch_baru),
		'kode_uker_lama' => set_value('kode_uker_lama', $row->kode_uker_lama),
		'kode_uker_baru' => set_value('kode_uker_baru', $row->kode_uker_baru),
		'norek_lama' => set_value('norek_lama', $row->norek_lama),
		'norek_baru' => set_value('norek_baru', $row->norek_baru),
		'jenis_edc_lama' => set_value('jenis_edc_lama', $row->jenis_edc_lama),
		'jenis_edc_baru' => set_value('jenis_edc_baru', $row->jenis_edc_baru),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','tbl_tms_edc_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tms_edc'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tms', TRUE));
        } else {
            $data = array(
		'sn_edc_lama' => $this->input->post('sn_edc_lama',TRUE),
		'sn_edc_baru' => $this->input->post('sn_edc_baru',TRUE),
		'merk_lama' => $this->input->post('merk_lama',TRUE),
		'merk_baru' => $this->input->post('merk_baru',TRUE),
		'spk_edc_lama' => $this->input->post('spk_edc_lama',TRUE),
		'spk_edc_baru' => $this->input->post('spk_edc_baru',TRUE),
		'no_simcard_lama' => $this->input->post('no_simcard_lama',TRUE),
		'no_simcard_baru' => $this->input->post('no_simcard_baru',TRUE),
		'sn_simcard_lama' => $this->input->post('sn_simcard_lama',TRUE),
		'sn_simcard_baru' => $this->input->post('sn_simcard_baru',TRUE),
		'sn_clr_lama' => $this->input->post('sn_clr_lama',TRUE),
		'sn_clr_baru' => $this->input->post('sn_clr_baru',TRUE),
		'sam_brizzi_lama' => $this->input->post('sam_brizzi_lama',TRUE),
		'sam_brizzi_baru' => $this->input->post('sam_brizzi_baru',TRUE),
		'tid_lama' => $this->input->post('tid_lama',TRUE),
		'tid_baru' => $this->input->post('tid_baru',TRUE),
		'mid_lama' => $this->input->post('mid_lama',TRUE),
		'mid_baru' => $this->input->post('mid_baru',TRUE),
		'nama_agen_lama' => $this->input->post('nama_agen_lama',TRUE),
		'nama_agen_baru' => $this->input->post('nama_agen_baru',TRUE),
		'alamat_agen_lama' => $this->input->post('alamat_agen_lama',TRUE),
		'alamat_agen_baru' => $this->input->post('alamat_agen_baru',TRUE),
		'cabang_lama' => $this->input->post('cabang_lama',TRUE),
		'cabang_baru' => $this->input->post('cabang_baru',TRUE),
		'branch_lama' => $this->input->post('branch_lama',TRUE),
		'branch_baru' => $this->input->post('branch_baru',TRUE),
		'kode_uker_lama' => $this->input->post('kode_uker_lama',TRUE),
		'kode_uker_baru' => $this->input->post('kode_uker_baru',TRUE),
		'norek_lama' => $this->input->post('norek_lama',TRUE),
		'norek_baru' => $this->input->post('norek_baru',TRUE),
		'jenis_edc_lama' => $this->input->post('jenis_edc_lama',TRUE),
		'jenis_edc_baru' => $this->input->post('jenis_edc_baru',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Tms_edc_model->update($this->input->post('id_tms', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tms_edc'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tms_edc_model->get_by_id($id);

        if ($row) {
            $this->Tms_edc_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tms_edc'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tms_edc'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sn_edc_lama', 'sn edc lama', 'trim|required');
	$this->form_validation->set_rules('sn_edc_baru', 'sn edc baru', 'trim|required');
	$this->form_validation->set_rules('tid_lama', 'tid lama', 'trim|required');
	$this->form_validation->set_rules('tid_baru', 'tid baru', 'trim|required');
	$this->form_validation->set_rules('nama_agen_lama', 'nama agen lama', 'trim|required');
	$this->form_validation->set_rules('nama_agen_baru', 'nama agen baru', 'trim|required');
	$this->form_validation->set_rules('kode_uker_lama', 'kode uker lama', 'trim|required');
	$this->form_validation->set_rules('jenis_edc_lama', 'jenis edc lama', 'trim|required');
	$this->form_validation->set_rules('jenis_edc_baru', 'jenis edc baru', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_tms', 'id_tms', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tms_edc.php */
/* Location: ./application/controllers/Tms_edc.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-31 04:02:17 */
/* http://harviacode.com */