<?php defined('BASEPATH') or exit('No direct script access allowed');

class Common_model extends CI_Model
{
	private $user_role_tbl = "user_role_tbl";
	public function get_user_roles()
	{
		$result = $this->db->select('ur_id,ur_name')
			->from($this->user_role_tbl)
			->where('ur_status', '1')
			->get()
			->result();

		$list[''] = ('select_user_role');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->ur_id] = ($value->ur_name);
			}
			return $list;
		} else {
			return false;
		}
	}

	public function district_list()
	{
		//''  => "Select District",
		$district_list = array(
			''			=> 'Select District',
			'Anantnag' 	=> 'Anantnag',
			'Bandipore' => 'Bandipore',
			'Baramulla' => 'Baramulla',
			'Budgam' 	=> 'Budgam',
			'Doda' 		=> 'Doda',
			'Ganderbal' => 'Ganderbal',
			'Jammu' 	=> 'Jammu',
			'Kargil' 	=> 'Kargil',
			'Kathua' 	=> 'Kathua',
			'Kishtwar' 	=> 'Kishtwar',
			'Kulgam' 	=> 'Kulgam',
			'Kupwara' 	=> 'Kupwara',
			'Leh' 		=> 'Leh',
			'Poonch' 	=> 'Poonch',
			'Pulwama' 	=> 'Pulwama',
			'Rajouri' 	=> 'Rajouri',
			'Ramban' 	=> 'Ramban',
			'Reasi' 	=> 'Reasi',
			'Samba' 	=> 'Samba',
			'Shopian' 	=> 'Shopian',
			'Srinagar' 	=> 'Srinagar',
			'Udhampur' 	=> 'Udhampur'
		);
		return $district_list;
	}

	/*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------     
    */
	public function randStrGen($mode = null, $len = null)
	{
		$result = "";
		if ($mode == 1) :
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		elseif ($mode == 2) :
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		elseif ($mode == 3) :
			$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		elseif ($mode == 4) :
			$chars = "0123456789";
		endif;

		$charArray = str_split($chars);
		for ($i = 0; $i < $len; $i++) {
			$randItem = array_rand($charArray);
			$result .= "" . $charArray[$randItem];
		}
		return $result;
	}
	/*
    |----------------------------------------------
    |         Ends of id genaretor
    |----------------------------------------------
  */

	public function treeViewArray($array, $parent_id = 0, $strCurrentKeyId, $strParentKeyId, $strSubCategoryKeyName = 'subs')
	{
		$temp_array = array();
		foreach ($array as $element) {
			if ($element[$strParentKeyId] == $parent_id) {
				$element[$strSubCategoryKeyName] = $this->treeViewArray($array, $element[$strCurrentKeyId], $strCurrentKeyId, $strParentKeyId, $strSubCategoryKeyName);
				$temp_array[] = $element;
			}
		}
		return $temp_array;
	}

	public function treeViewHtml($array, $parent_id = 0, $parents = array(), $strCurrentKeyId, $strParentKeyId, $strFieldName)
	{
		if ($parent_id == 0) {
			foreach ($array as $element) {
				if (($element[$strParentKeyId] != 0) && !in_array($element[$strParentKeyId], $parents)) {
					$parents[] = $element[$strParentKeyId];
				}
			}
		}
		$menu_html = '';
		foreach ($array as $element) {
			if ($element[$strParentKeyId] == $parent_id) {
				$menu_html .= '<li><a href="#">' . $element[$strFieldName] . '</a>';
				if (in_array($element[$strCurrentKeyId], $parents)) {
					$menu_html .= '<ul>';
					$menu_html .= $this->treeViewHtml($array, $element[$strCurrentKeyId], $parents, $strCurrentKeyId, $strParentKeyId, $strFieldName);
					$menu_html .= '</ul>';
				}
				$menu_html .= '</li>';
			}
		}
		$menu_html .= '';
		return $menu_html;
	}

	public function valArr($arrmixValues, $intCount = 1, $boolCheckForEquality = false)
	{
		$boolIsValid = (true == is_array($arrmixValues) && $intCount <= count($arrmixValues)) ? true : false;
		if (true == $boolCheckForEquality && true == $boolIsValid) {
			$boolIsValid = ($intCount == count($arrmixValues)) ? true : false;
		}

		return $boolIsValid;
	}

	public function show($strMixVar)
	{
		foreach (func_get_args() as $strMixVar) {
			echo '<pre style="background-color:white; color:rgb(32, 56, 18);padding:5px; border: 1px solid black; border-radius: 4px;">', htmlentities(print_r($strMixVar, true)), '</pre>';
		}
		exit;
	}
}
