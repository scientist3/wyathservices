<?php defined('BASEPATH') or exit('No direct script access allowed');

class CandidateModel extends CI_Model
{
    // protected $allowedFields = ['name', 'email', 'address'];

    private $table = "candidate_tbl";


 public function read_by_id_as_obj($c_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('c_id', $c_id)
      ->get()
      ->row();
  }

    public function get_count()
    {
        return $this->db->count_all($this->table);
    }

public function studentdelete($student_id = null)
    {
      $this->db->where('c_id', $student_id)
        ->delete($this->table);
  
      if ($this->db->affected_rows() > 0) {
        return true;
      } else {
        return false;
      }
    }
  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }
    // public function read()
    // {
    //     // return $this->db->select("*")
    //     //     ->from($this->table)
    //     //     ->get()
    //     //     ->result();
    //     $query = $this->db->get('candidate_tbl');
    //     return $query;
    // }
    public function insert($data = [])
    {
        // return $this->db->insert($this->table, $data);
        // return $this->db->insert($this->table, $data);
        return $this->db->insert($table, $postDataUser);


    }

    public function GetEducation()
    {
        return $data['education'] = ["10th", "12th", "10 baji taam "];

        // return "Candidate Registration";
    }

    public function category()
    {
        # code...
        $data = ["General", "OBC", "SC", "ST"];
        return $data;
    }

    public function typeofalternateid()
    {
        # code...
        $data =
            [
            "PAN Card",
            "Voter ID Card",
            "Domicile Certificate",
            "ST/SC Certificate",
            "Permanent Residential Certificate (PRC)",
            "Driving License",
            "Ration Card",
            "Birth Certificate issued by govt.",
            "BPL Card",
            "National Population Register (NPR) Card",
            "Identity proof by Gazetted officers",
            "Passport",
            "Jail Identification Card / Number",
            "School leaving certificate / 10th certificate",
            "Letter of domicile from SDM / DM / Govt. Authority",
            "Other",

        ];
        return $data;
    }

    public function idtype()
    {
        # code...
        $data = ["Aadhar ID", "Alternate ID"];
        return $data;

    }
    public function religion()
    {
        # code...
        $data = ["Atheist", "Hindu", "Sikh", "Muslim", "Christian", "Buddhist", "Jews", "Other"];
        return $data;

    }
    public function maritalstatus()
    {
        # code...
        $data = ["Single/Unmarried", "Married", "Widowed", "Divorced", "Separated"];
        return $data;

    }
    public function gender()
    {
        # code...
        $data = ["Male", "Female", "Transgender"];
        return $data;

    }
    public function salutation()
    {
        $data = ["Mr", "Ms", "Mrs", "Mx"];
        return $data;

    }
    public function todisability()
    {
        $data = [
            "Locomotor Disability",
            "Leprosy Cured Person",
            "Dwarfism",
            "Acid Attack Victims",
            "Blindness/Visual Impairment",
            "Low-vision (Visual Impairment)",
            "Deaf",
            "Hard of Hearing",
            "Speech and Language Disability",
            "Intellectual Disability /Mental Retardation",
            "Autism Spectrum Disorder",
            "Specific Learning Disabilities",
            "Mental Behavior-Mental Illness",
            "Haemophilia",
            "Thalassemia",
            "Sickle Cell Disease",
            "Deaf Blindness",
            "Cerebral Palsy",
            "Multiple Sclerosis",
            "Muscular Dystrophy"];
        return $data;
    }

}
