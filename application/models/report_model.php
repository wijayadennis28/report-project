<?php
class Report_model extends CI_Model {

    public function get_all_reports() {
        // Fetch all records from the reports table
        return $this->db->get('reports')->result_array();
    }

    public function add_report($data) {
        // Insert new report into the reports table
        return $this->db->insert('reports', $data);
    }

    public function get_report_by_id($id) {
        // Fetch a specific report by ID
        return $this->db->get_where('reports', ['id' => $id])->row_array();
    }

    public function update_report($id, $data) {
        // Update a specific report by ID
        $this->db->where('id', $id);
        return $this->db->update('reports', $data);
    }

    public function delete_report($id) {
        // Delete a specific report by ID
        $this->db->where('id', $id);
        return $this->db->delete('reports');
    }
}
