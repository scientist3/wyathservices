<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Carbon\Carbon;

if (!function_exists('dd')) {

  function dd($data = null, $cont = true)
  {
    echo "<pre class='offset-3 mt-5'>";
    print_r($data);
    echo "</pre>";
    if (!$cont) {
      die();
    }
  }
}

if (!function_exists('td')) {

  function td($start, $end, $key = null)
  {
    $start = \Carbon\Carbon::parse($start, "Asia/Kolkata");
    $end = \Carbon\Carbon::parse($end, "Asia/Kolkata");
    // echo "<br>";
    // echo "ST: " . $start . "<br>";
    // echo "ED: " . $end . "<br>";
    if ($key == null) {
      echo $end->diffForHumans($start);
    } else {
      echo str_replace(['before', 'after'], '', $end->diffForHumans($start, null, true)) . ' ' . $key;
    }
  }
}

if (!function_exists('tdr')) {

  function tdr($start, $end, $key = null)
  {
    $start = \Carbon\Carbon::parse($start, "Asia/Kolkata");
    $end = \Carbon\Carbon::parse($end, "Asia/Kolkata");
    // echo "<br>";
    // echo "ST: " . $start . "<br>";
    // echo "ED: " . $end . "<br>";
    if ($key == null) {
      return $end->diffForHumans($start);
    } else {
      return str_replace(['before', 'after'], '', $end->diffForHumans($start, null, true)) . ' ' . $key;
    }
  }
}

if (!function_exists('tdn')) {

  function tdn($date, $key = null)
  {
    echo "INPUT:" . $date . "<br>";

    $start = \Carbon\Carbon::parse($date, "Asia/Kolkata")->toDateTimeString();
    $end = \Carbon\Carbon::now("Asia/Kolkata")->toDateTimeString();
    echo "START:" . $start . "<br>";
    echo "END:" . $end . "<br>";
    if ($key == null) {
      echo $end->diffForHumans($start);
    } else {
      echo $end->diffForHumans($start, true) . ' ' . $key;
    }
  }
}


if (!function_exists('ppf')) {

  function ppf($date)
  {
    $now  = \Carbon\Carbon::now("Asia/Kolkata")->toDayDateTimeString();
    $date = \Carbon\Carbon::parse($date);

    echo "Now:" . $now . "<br>";
    echo "Date:" . $date . "<br>";

    if ($now->lt($date)) { // Check Past
      return -1;
    } else if ($date->eq($now)) { //Check Past
      return 0;
    } else if ($date->gt($now)) { // Check Future
      return 1;
    } else {
      return null;
    }
  }
}


if (!function_exists('between')) {

  function between($date, $start, $end)
  {
    $result = \Carbon\Carbon::parse($date)->between($start, $end);

    if ($result) {
      return 1;
    } else {
      return 0;
    }
  }
}

if (!function_exists('isBetween')) {

  function isBetween($date, $start, $end)
  {
    return Carbon::parse($date, "Asia/Kolkata")->between($start, $end) ? true : false;
  }
}

if (!function_exists('rekeyObject')) {
  function rekeyObject($key, $objects)
  {
    $list = [];

    if (!empty($objects)) {
      foreach ($objects as $object) {
        $list[$object->$key] = $object;
      }
    }
    return $list;
  }
}

if (!function_exists('time_elapsed_string')) {

  function time_elapsed_string($datetime, $full = false)
  {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
    );
    foreach ($string as $k => &$v) {
      if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
        unset($string[$k]);
      }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
  }
}

if (!function_exists('generate_breadcrumb')) {

  function generate_breadcrumb($path = "/")
  {
    $url = explode('/', $path);
    $newurl = $url[0];
    $c = 0;
    foreach ($url as $value) {
      if ($c == 0) {
        $c++;
        continue;
      }

      if (count($url) - 1 == $c) {
        echo '<li class="breadcrumb-item active ">' . ucfirst($value) . '</li>';
      } else {
        echo '<li class="breadcrumb-item "><a href="' . base_url($newurl . '/' . $value) . ' ">' . ucfirst($value) . '</a></li>';
        $newurl = $newurl . "/" . $value;
      }
      $c++;
    }
  }
}


if (!function_exists('show')) {
  function show($strMixVar)
  {
    foreach (func_get_args() as $strMixVar) {
      echo '<pre style="background-color:white; color:rgb(32,56,18); padding:5px; border:1px solid black; border-radius:4px;">' . htmlentities(print_r($strMixVar, true)) . '</pre>';
    }
    exit;
  }
}

if (!function_exists('ddisplay')) {
  function ddisplay($strMixVar)
  {
    foreach (func_get_args() as $strMixVar) {
      echo '<pre style="background-color:white; color:rgb(32,56,18); padding:50px 5px 5px 250px; border:1px solid black; border-radius:4px;">' . htmlentities(print_r($strMixVar, true)) . '</pre>';
    }
  }
}

// Object Related funtions

if (!function_exists('valStr')) {
  function valStr($strString, $intLen = 1)
  {
    $strString = (false == is_array($strString)) ? trim((string)$strString) : NULL;

    return (true == isset($strString[0]) && $intLen <= strlen($strString)) ? true : false;
  }
}

if (!function_exists('valId')) {
  function valId($strMixVar)
  {
    if (true == valStr($strMixVar)) {
      $strMixVar = trim($strMixVar);
    }

    return (0 == (int) $strMixVar || false == is_numeric($strMixVar) ? false : true);
  }
}


if (!function_exists('valArr')) {
  function valArr($arrmixValues, $intCount = 1, $boolCheckForEquality = false)
  {
    $boolIsValid = (true == is_array($arrmixValues)  && $intCount <= count($arrmixValues)) ? true : false;
    if (true == $boolCheckForEquality && true == $boolIsValid) {
      $boolIsValid = ($intCount == count($arrmixValues)) ? true : false;
    }
    return $boolIsValid;
  }
}

if (!function_exists('rekeyArray')) {
  function rekeyArray($strKeyFieldName, $arrmixUnkeyedData, $boolMakeKeyLowerCase = false, $boolHasMultipleArraysWithSameKey = false, $boolExcludeNulls = false)
  {
    if (false == valArr($arrmixUnkeyedData)) {
      return $arrmixUnkeyedData;
    }

    $arrmixRekeyedData = [];

    if ('index' != $strKeyFieldName) {
      foreach ($arrmixUnkeyedData as $arrmixUnkeyedData) {
        $arrmixUnkeyedData = json_decode(json_encode($arrmixUnkeyedData), true);
        if (true == $boolExcludeNulls && true == is_null($arrmixUnkeyedData[$strKeyFieldName])) {
          continue;
        }
        if (true == $boolHasMultipleArraysWithSameKey) {
          $strKey                       = (true == $boolMakeKeyLowerCase) ? strtolower(trim($arrmixUnkeyedData[$strKeyFieldName])) : trim($arrmixUnkeyedData[$strKeyFieldName]);
          $arrmixRekeyedData[$strKey][] = (object)$arrmixUnkeyedData;
        } else {

          if (false == isset($arrmixUnkeyedData[$strKeyFieldName])) {
            $strKey = '';
          } else {
            $strKey = (true == $boolMakeKeyLowerCase) ? strtolower(trim($arrmixUnkeyedData[$strKeyFieldName])) : trim($arrmixUnkeyedData[$strKeyFieldName]);
          }

          $arrmixRekeyedData[$strKey] = (object)$arrmixUnkeyedData;
        }
      }
    } else {

      foreach ($arrmixUnkeyedData as $arrmixUnkeyedData) {
        $arrmixRekeyedData[] = $arrmixUnkeyedData;
      }
    }

    return $arrmixRekeyedData;
  }
}


if (!function_exists('rekeyObjects')) {
  function rekeyObjects($strKeyFieldName, $arrobjUnkeyedData, $boolHasMultipleObjectsWithSameKey = false, $boolExcludeNulls = false)
  {

    if (false == valArr($arrobjUnkeyedData)) {
      return $arrobjUnkeyedData;
    }

    $arrobjRekeyedData = [];

    if ('index' != $strKeyFieldName) {
      $strGetFunction = 'get' . $strKeyFieldName;

      foreach ($arrobjUnkeyedData as $objUnkeyedData) {
        if (false == is_object($objUnkeyedData)) {
          trigger_error('Unkeyed data contains non-object (' . gettype($objUnkeyedData) . '). Cannot rekey objects.', E_USER_WARNING);

          return NULL;
        } elseif (false == method_exists($objUnkeyedData, $strGetFunction)) {
          trigger_error('Unkeyed data contains an object of class ' . get_class($objUnkeyedData) . '. ' . $strGetFunction . '() method does not exist for this class. Cannot rekey objects.', E_USER_WARNING);

          return NULL;
        }
        if (true == $boolExcludeNulls && true == is_null($objUnkeyedData->$strGetFunction())) {
          continue;
        }
        if (true == $boolHasMultipleObjectsWithSameKey) {
          $arrobjRekeyedData[$objUnkeyedData->$strGetFunction()][] = $objUnkeyedData;
        } else {
          $arrobjRekeyedData[$objUnkeyedData->$strGetFunction()] = $objUnkeyedData;
        }
      }
    } else {
      foreach ($arrobjUnkeyedData as $objUnkeyedData) {
        $arrobjRekeyedData[] = $objUnkeyedData;
      }
    }

    return $arrobjRekeyedData;
  }
}

if (!function_exists('_generateCaptcha')) {
  // this function will create captcha
  function _generateCaptcha($thiss)
  {
    $vals = array(
      'img_path' => './uploads/captcha_images/',
      'img_url' => base_url('uploads/captcha_images/'),
      'img_width' => '150',
      'img_height' => 30,
      'expiration' => 7200,
    );
    $vals = array(
      //'word'          => 'Random word',
      'img_path'      => './uploads/captcha_images/',
      'img_url'       => base_url('uploads/captcha_images/'),
      'font_path'     => './path/to/fonts/texb.ttf',
      'img_width'     => '150',
      'img_height'    => 30,
      'expiration'    => 7200,
      'word_length'   => 4,
      'font_size'     => '10',
      'img_id'        => 'Imageid',
      'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',

      // White background and border, black text and red grid
      'colors'        => array(
        'background' => array(255, 255, 255),
        'border' => array(255, 255, 255),
        'text' => array(0, 0, 0),
        'grid' => array(200, 140, 20)
      )
    );

    /* Generate the captcha */
    $data =  create_captcha($vals);
    // $data['fullfilepath'] =  base_url('uploads/captcha_images/') . $data['filename'];
    // $data['relativefilepath'] =  './uploads/captcha_images/' . $data['filename'];
    if ($thiss->session->has_userdata('captchafile')) {
      unlink($thiss->session->userdata('captchafile'));
    }
    $thiss->session->set_userdata('captchaWord', $data['word']);
    $thiss->session->set_userdata('captchafile', $vals['img_path'] . $data['filename']);
    return $data;
  }
}

if (!function_exists('generate_drop_down')) {
  // this function will create captcha
  function generate_drop_down($rawdata, $arrinput)
  {
    $options = '';
    if (valArr($rawdata)) {
      foreach ($rawdata as $dataKey => $dataValue) {
        if ($dataKey == '') {
          continue;
        }
        $selected = false;
        if (valArr($arrinput)) {
          $selected =  in_array($dataKey, $arrinput) ? true : false;
        }
        $options .= '<option ' . ($selected ?  "selected='selected'" : null) . ' data-ref="' . $dataKey . '" value="' . $dataKey . '"> ' . $dataValue . '</option>';
      }
    }
    return $options;
  }
}

if (!function_exists('generate_simple_drop_down')) {
  // this function will create captcha
  function generate_simple_drop_down($rawdata, $intinput)
  {
    $options = '';
    if (valArr($rawdata)) {
      foreach ($rawdata as $dataKey => $dataValue) {
        if ($dataKey == '') {
          continue;
        }
        $selected = false;
        // if (!empty($intinput)) {
        $selected =  ($dataKey == $intinput) ? true : false;
        // }
        $options .= '<option ' . ($selected ?  "selected='selected'" : null) . ' value="' . $dataKey . '"> ' . $dataValue . '</option>';
      }
    }
    return $options;
  }
}
