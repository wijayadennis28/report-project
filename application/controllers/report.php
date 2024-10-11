<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model');  // Load the model
        $this->load->helper('url');          // Load the URL helper
    }

    // Display the list of reports
    public function index() {
        // Dummy data (no edit/delete buttons for these)
        $dummy_data = [
            ['id' => 1001, 'title' => 'Dummy Report 1', 'description' => 'This is dummy report 1, no edit and delete functions available'],
            ['id' => 1002, 'title' => 'Dummy Report 2', 'description' => 'This is dummy report 2, no edit and delete functions available'],
            ['id' => 1003, 'title' => 'Dummy Report 3', 'description' => 'This is dummy report 3, no edit and delete functions available'],
        ];

        // Get real reports from the database
        $real_data = $this->Report_model->get_all_reports();

        // Combine both dummy data and real data
        $data['reports'] = array_merge($dummy_data, $real_data);

        // Load the views
        $this->load->view('header');
        $this->load->view('index', $data);
        $this->load->view('footer');
    }

    // Add a new report (real data)
    public function add() {
        if ($this->input->post()) {
            $new_report = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description')
            ];
            $this->Report_model->add_report($new_report);
            redirect('/');
        } else {
            $this->load->view('header');
            $this->load->view('add');
            $this->load->view('footer');
        }
    }

    // Edit a real report
    public function edit($id) {
        $data['report'] = $this->Report_model->get_report_by_id($id);

        if ($this->input->post()) {
            $updated_report = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description')
            ];
            $this->Report_model->update_report($id, $updated_report);
            redirect('/');
        } else {
            $this->load->view('header');
            $this->load->view('edit', $data);
            $this->load->view('footer');
        }
    }

    // Delete a real report
    public function delete($id) {
        $this->Report_model->delete_report($id);
        redirect('/');
    }
}
