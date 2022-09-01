<?php defined('BASEPATH') or exit('No direct script access allowed');

class CommonModel extends CI_Model
{
  // private $table = "candidate_tbl";
  public function getEducation()
  {
    return $data['education'] = [
      // '' => 'Select Education',
      '1' => "10th",
      '2' => "12th",
      '3' => "10 baji taam "
    ];
  }

  public function getCategory()
  {
    $data = [
      // '' => 'Select Category',
      '1' => "General",
      '2' => "OBC",
      '3' => "SC",
      '4' => "ST"
    ];
    return $data;
  }

  public function getTypeOfAlternateId()
  {
    $data =
      [
        // '' => 'Select AlternateID',
        '1' => "PAN Card",
        '2' => "Voter ID Card",
        '3' => "Domicile Certificate",
        '4' => "ST/SC Certificate",
        '5' => "Permanent Residential Certificate (PRC)",
        '6' => "Driving License",
        '7' => "Ration Card",
        '8' => "Birth Certificate issued by govt.",
        '9' => "BPL Card",
        '10' => "National Population Register (NPR) Card",
        '11' => "Identity proof by Gazetted officers",
        '12' => "Passport",
        '13' => "Jail Identification Card / Number",
        '14' => "School leaving certificate / 10th certificate",
        '15' => "Letter of domicile from SDM / DM / Govt. Authority",
        '16' => "Other",

      ];
    return $data;
  }

  public function getIdType()
  {
    $data = [
      // '' => 'Select IDType',
      '1' => "Aadhar ID",
      '2' => "Alternate ID"
    ];
    return $data;
  }

  public function getReligion()
  {
    $data = [
      // '' => 'Select Religion',
      '1' => "Atheist",
      '2' => "Hindu",
      '3' => "Sikh",
      '4' => "Muslim",
      '5' => "Christian",
      '6' => "Buddhist",
      '7' => "Jews",
      '8' => "Other"
    ];
    return $data;
  }

  public function getMaritalStatus()
  {
    $data = [
      '' => 'Marital Status',
      '1' => "Single/Unmarried",
      '2' => "Married",
      '3' => "Widowed",
      '4' => "Divorced",
      '5' => "Separated"
    ];
    return $data;
  }

  public function getGender()
  {
    $data = [
      // '' => 'Select Gender',
      '1' => 'Male',
      '2' => 'Female',
      '3' => 'Transgender'
    ];
    return $data;
  }

  public function getSalutation()
  {
    $data = [
      '1' => "Mr",
      '2' => "Ms",
      '3' => "Mrs",
      '4' => "Mx"
    ];
    return $data;
  }

  public function getDisability()
  {
    $data = [
      // '' => "Select Disability ",
      '1' => "Locomotor Disability",
      '2' => "Leprosy Cured Person",
      '3' => "Dwarfism",
      '4' => "Acid Attack Victims",
      '5' => "Blindness/Visual Impairment",
      '6' => "Low-vision (Visual Impairment)",
      '7' => "Deaf",
      '8' => "Hard of Hearing",
      '9' => "Speech and Language Disability",
      '10' => "Intellectual Disability /Mental Retardation",
      '11' => "Autism Spectrum Disorder",
      '12' => "Specific Learning Disabilities",
      '13' => "Mental Behavior-Mental Illness",
      '14' => "Haemophilia",
      '15' => "Thalassemia",
      '16' => "Sickle Cell Disease",
      '17' => "Deaf Blindness",
      '18' => "Cerebral Palsy",
      '19' => "Multiple Sclerosis",
      '20' => "Muscular Dystrophy"
    ];
    return $data;
  }
  public function getYesNoList()
  {
    $data =
      [
        '1' => 'Yes',
        '0' => 'No'
      ];
    return $data;
  }

  public function getTrainingStatus()
  {
    $data =
      [
        '1' => 'Fresher',
        '2' => 'Experienced'
      ];
    return $data;
  }

  public function getEmploymentStatusList()
  {
    $data =
      [
        '1' => 'Employed through Partner',
        '2' => 'Upskilled',
        '3' => 'Opted for Higher Studies',
        '4' => 'Self Employed',
        '5' => 'Self Employed',
      ];
    return $data;
  }

  public function getHearAboutUsList()
  {
    $data =
      [
        '1' => 'Internet',
        '2' => 'Friends/Relatives',
        '3' => 'Kaushal Mela',
        '4' => 'Newsletter',
        '5' => 'Others',
      ];
    return $data;
  }

  public function getAssessmentStatusList()
  {
    $data =
      [
        '' => 'Select Status',
        '1' => 'Pass',
        '2' => 'Fail',
      ];
    return $data;
  }

  public function getTrainingStatusList()
  {
    $data = [
      '' => 'Select Training Status',
      '1' => 'Completed',
      '0' => 'Dropout',
    ];

    return $data;
  }
}
