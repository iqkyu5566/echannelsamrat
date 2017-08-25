<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_edc extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_edc_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategori_edc/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategori_edc/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategori_edc/index.html';
            $config['first_url'] = base_url() . 'kategori_edc/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_edc_model->total_rows($q);
        $kategori_edc = $this->Kategori_edc_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_edc_data' => $kategori_edc,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kategori_edc_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kategori_edc_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori_edc' => $row->id_kategori_edc,
		'nama_edc' => $row->nama_edc,
	    );
            $this->template->load('template','tbl_kategori_edc_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_edc'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_edc/create_action'),
	    'id_kategori_edc' => set_value('id_kategori_edc'),
	    'nama_edc' => set_value('nama_edc'),
	);
        $this->template->load('template','tbl_kategori_edc_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_edc' => $this->input->post('nama_edc',TRUE),
	    );

            $this->Kategori_edc_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_edc'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_edc_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_edc/update_action'),
		'id_kategori_edc' => set_value('id_kategori_edc', $row->id_kategori_edc),
		'nama_edc' => set_value('nama_edc', $row->nama_edc),
	    );
            $this->template->load('template','tbl_kategori_edc_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_edc'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori_edc', TRUE));
        } else {
            $data = array(
		'nama_edc' => $this->input->post('nama_edc',TRUE),
	    );

            $this->Kategori_edc_model->update($this->input->post('id_kategori_edc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_edc'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_edc_model->get_by_id($id);

        if ($row) {
            $this->Kategori_edc_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_edc'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_edc'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_edc', 'nama edc', 'trim|required');

	$this->form_validation->set_rules('id_kategori_edc', 'id_kategori_edc', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori_edc.php */
/* Location: ./application/controllers/Kategori_edc.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-20 03:56:36 */
/* http://harviacode.com */