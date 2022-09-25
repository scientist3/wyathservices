<?php defined('BASEPATH') or exit('No direct script access allowed');
class BatchMappingModel extends CI_Model
{

  private $table = "batch_student_mapping_tbl";

  public function create($data = [])
  {
    return $this->db->insert($this->table, $data);
  }

  public function create_batch($data = [])
  {
    return $this->db->insert_batch($this->table, $data);
  }

  public function readStudentsByBatchId($b_id)
  {
    return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    ")
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->get()
      ->result();
  }

  public function readPassedStudentsByBatchId($b_id)
  {
    return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    certification_tbl.*,
    ")
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->where('c_training_status', 1)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
      ->get()
      ->result();
  }

  public function readPassedAndAssessmentCompletedStudentsByBatchId($b_id)
  {
    return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    certification_tbl.*,
    ")
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->where('c_training_status', 1)
      ->where('bsm_assessment_status', 1)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
      ->get()
      ->result();
  }

  public function readPassedAndAssessmentAndPlacementCompletedStudentsByBatchId($b_id)
  {
    return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    certification_tbl.cer_certified,
    placement_detail_tbl.*,
    ")
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->where('c_training_status', 1)
      ->where('bsm_assessment_status', 1)
      ->where('cer_certified', 1)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
      ->join('placement_detail_tbl', 'placement_detail_tbl.pd_id = ' . $this->table . '.	bsm_pd_id', "left")
      ->get()
      ->result();
  }

  public function update_batch($data)
  {
    return $this->db->update_batch($this->table, $data, 'bsm_id');
  }

  public function update($data)
  {
    return $this->db->where('bsm_id', $data['bsm_id'])->update($this->table, $data);
  }

  public function delete_batch($bsm_ids = [])
  {
    $this->db->where_in('bsm_id', $bsm_ids)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function checkIsAssessmentCompletedByBatchId($b_id = null)
  {
    $result = $this->db->select('bsm_assessment_status, bsm_assessment_percentage')
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->where('c_training_status', 1)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->get()
      ->result();

    $data['status'] = 1;
    $data['message'] = "It looks like assessment is already completed for all student.";
    if (valArr($result)) {
      foreach ($result as $assessement) {
        if (empty($assessement->bsm_assessment_status)) {
          $data['status'] = 0;
          $data['message'] = 'Please complete the assessment of all students.';
          break;
        }
      }
    } else {
      $data['status'] = 0;
      $data['message'] = 'Please complete the assessment of all students.';
    }
    return $data;
  }

  public function checkIsCertificationCompletedByBatchId($b_id = null)
  {
    $result = $this->db->select('bsm_assessment_status, bsm_cer_id')
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->where('c_training_status', 1)
      ->where('bsm_assessment_status', 1)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->get()
      ->result();

    $data['status'] = 1;
    $data['message'] = "It looks like certification is already completed for all student.";
    if (valArr($result)) {
      foreach ($result as $assessement) {
        if (empty($assessement->bsm_cer_id) || $assessement->bsm_cer_id == null) {
          $data['status'] = 0;
          $data['message'] = 'Please complete the certification of all students.';
          break;
        }
      }
    } else {
      $data['status'] = 0;
      $data['message'] = 'Please complete the certification of all students.';
    }
    return $data;
  }

  public function checkIsPlacementCompletedByBatchId($b_id = null)
  {
    $result = $this->db->select('bsm_assessment_status, bsm_cer_id, bsm_pd_id')
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->where('c_training_status', 1)
      ->where('bsm_assessment_status', 1)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->get()
      ->result();

    $data['status'] = 1;
    $data['message'] = "It looks like placement is already completed for all student.";
    if (valArr($result)) {
      foreach ($result as $assessement) {
        if (empty($assessement->bsm_pd_id) || $assessement->bsm_pd_id == null) {
          $data['status'] = 0;
          $data['message'] = 'Please complete the placement of all students.';
          break;
        }
      }
    } else {
      $data['status'] = 0;
      $data['message'] = 'Please complete the placement of all students.';
    }
    return $data;
  }
}
