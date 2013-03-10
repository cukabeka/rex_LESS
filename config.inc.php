<?php
/**
* Addon_Template
*
* @author http://rexdev.de
* @link   https://github.com/cukabeka
*
* @package redaxo4.3
* @version 0.2.1
*/

// ERROR_REPORTING
////////////////////////////////////////////////////////////////////////////////
/*ini_set('error_reporting', 'E_ALL');
ini_set('display_errors', 'On');*/


// ADDON IDENTIFIER AUS ORDNERNAMEN ABLEITEN
////////////////////////////////////////////////////////////////////////////////
$mypage = explode('/redaxo/include/addons/',str_replace(DIRECTORY_SEPARATOR, '/' ,__FILE__));
$mypage = explode('/',$mypage[1]);
$mypage = $mypage[0];
$myroot = $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/';


// ADDON REX COMMONS
////////////////////////////////////////////////////////////////////////////////
<<<<<<< HEAD
$REX['ADDON']['rxid'][$mypage] = 'rex_less';
=======
$REX['ADDON']['rxid'][$mypage] = 'rex_LESS';
>>>>>>> d65427a87cb5f24c9ad40c04e553a371effa3232
$REX['ADDON']['page'][$mypage] = $mypage;
$REX['ADDON']['name'][$mypage] = 'rexLESS';
$Revision = '';
$REX['ADDON'][$mypage]['VERSION'] = array
(
'VERSION'      => 0,
'MINORVERSION' => 3,
'SUBVERSION'   => 8,
);
$REX['ADDON']['version'][$mypage]     = implode('.', $REX['ADDON'][$mypage]['VERSION']);
$REX['ADDON']['author'][$mypage]      = 'rexdev.de';
$REX['ADDON']['supportpage'][$mypage] = 'forum.redaxo.de';
$REX['ADDON']['perm'][$mypage]        = $mypage.'[]';
$REX['PERM'][]                        = $mypage.'[]';

$REX['ADDON'][$mypage]['myroot'] = $myroot;
$REX['ADDON'][$mypage]['cache'] = $myroot."cache";

// STATIC ADDON SETTINGS
////////////////////////////////////////////////////////////////////////////////
$REX['ADDON'][$mypage]['rex_list_pagination'] = 20;
$REX['ADDON'][$mypage]['params_cast'] = array (
  'page'        => 'unset',
  'subpage'     => 'unset',
  'minorpage'   => 'unset',
  'func'        => 'unset',
  'submit'      => 'unset',
  'sendit'      => 'unset',
  'PHPSESSID'   => 'unset',
  );

// DYNAMISCHE SETTINGS
////////////////////////////////////////////////////////////////////////////////
// --- DYN
<<<<<<< HEAD
$REX["ADDON"]["rex_less"]["settings"] = array (
  'TEXTINPUT' => 
  array (
    1 => 'files',
  ),
  'SELECT' => 
  array (
    1 => 'classic',
  ),
  'MEDIA' => 
  array (
    1 => '',
  ),
  'MEDIALIST' => 
  array (
    1 => '',
  ),
=======
$REX["ADDON"][$mypage]["settings"] = array (
  'TEXTINPUT' =>
  array (
    1 => 'files', 
  ),
  'SELECT' =>
  array (
    1 => '1',
  ),
  'MEDIA' =>
  array (
    1 => '',
  ),
  'MEDIALIST' =>
  array (
    1 => '',
  )
>>>>>>> d65427a87cb5f24c9ad40c04e553a371effa3232
);
// --- /DYN


// AUTO INCLUDE FUNCTIONS & CLASSES
////////////////////////////////////////////////////////////////////////////////
{
  $pattern = $myroot.'classes/class.*.inc.php';
  $include_files = glob($pattern);

  if(is_array($include_files) && count($include_files) > 0){
     foreach ($include_files as $include)
     {
       require_once $include;
     }
  }

  $pattern = $myroot.'functions/function.*.inc.php';
  $include_files = glob($pattern);
  if(is_array($include_files) && count($include_files) > 0){
     foreach ($include_files as $include)
     {
       require_once $include;
     }
  }

}

// SUBPAGES
//////////////////////////////////////////////////////////////////////////////
$REX['ADDON'][$mypage]['SUBPAGES'] = array (
  //     subpage    ,label                         ,perm   ,params               ,attributes
  array (''         ,'Settings'               ,''     ,''                   ,''),
  array ('help'     ,'Help'                       ,''     ,''                   ,''),
);
