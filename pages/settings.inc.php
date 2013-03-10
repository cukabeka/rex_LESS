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

// ADDON PARAMETER AUS URL HOLEN
////////////////////////////////////////////////////////////////////////////////
$mypage    = rex_request('page'   , 'string');
$subpage   = rex_request('subpage', 'string');
$minorpage = rex_request('minorpage', 'string');
$func      = rex_request('func'   , 'string');

// FORMULAR PARAMETER SPEICHERN
////////////////////////////////////////////////////////////////////////////////
if($func=='savesettings')
{
  // MERGE REQUEST & ADDON SETTINGS
  $params_cast = $REX['ADDON'][$mypage]['params_cast'];
  $myCONF = array_merge($REX['ADDON'][$mypage]['settings'],a720_cast($_POST,$params_cast));

  // SAVE SETTINGS
  if(a720_saveConf($myCONF))
  {
    echo rex_info('Einstellungen wurden gespeichert.');
  }
  else
  {
    echo rex_warning('Beim speichern der Einstellungen ist ein Problem aufgetreten.');
  }
}

// ADDON SETTINGS AUS $REX IN EIGENE VAR REDUZIEREN
////////////////////////////////////////////////////////////////////////////////
$myREX = $REX['ADDON'][$mypage];

// SELECT BOX
////////////////////////////////////////////////////////////////////////////////
$id = 1;                                                      // ID dieser Select Box
$tmp = new rex_select();                                      // rex_select Objekt initialisieren
$tmp->setSize(1);                                             // 1 Zeilen = normale Selectbox
$tmp->setName('SELECT['.$id.']');
<<<<<<< HEAD
$tmp->addOption('none',FALSE);                                    // Beschreibung ['string'], Wert [int|'string']
$tmp->addOption('standard - lessphp’s original formatter','classic');
$tmp->addOption('minify - Compresses all the unrequired whitespace','compressed');
$tmp->addOption('lessjs - Same style used in LESS for JavaScript','lessjs');
=======
$tmp->addOption('nein',0);                                    // Beschreibung ['string'], Wert [int|'string']
$tmp->addOption('ja',1);
>>>>>>> d65427a87cb5f24c9ad40c04e553a371effa3232
$tmp->setSelected($myREX['settings']['SELECT'][$id]);         // gespeicherte Werte einsetzen
$select = $tmp->get();                                        // HTML in Variable speichern

// MULTISELECT BOX
////////////////////////////////////////////////////////////////////////////////
$id = 1;                                                      // ID dieser MultiSelect Box
$tmp = new rex_select();                                      // rex_select Objekt initialisieren
$tmp->setSize(4);                                             // angezeigte Zeilen, Rest wird gescrollt
$tmp->setMultiple(true);
$tmp->setName('MULTISELECT['.$id.'][]');                      // abschließendes [] wichtig!
$tmp->addOption('rot',0);                                     // Beschreibung ['string'], Wert [int|'string']
$tmp->addOption('grün',1);
$tmp->addOption('blau','blau');
if(isset($myREX['settings']['MULTISELECT'][$id]))             // evtl. keine Werte -> prüfen ob was gespeichert
{
  $tmp->setSelected($myREX['settings']['MULTISELECT'][$id]);  // gespeicherte Werte einsetzen
}
$multiselect = $tmp->get();                                   // HTML in Variable speichern

// CHECKBOX
////////////////////////////////////////////////////////////////////////////////
/* todo */

// RADIOBUTTON
////////////////////////////////////////////////////////////////////////////////
/* todo */

// MEDIA BUTTON
////////////////////////////////////////////////////////////////////////////////
$id = 1;                                                   // ID dieses Mediabuttons
$mp = 7;                                                   // ID der auzurufenden Medienpool Kategorie
$tmp = rex_input::factory('mediabutton');                  // Objekt initialisieren
$tmp->setButtonId($id);                                    // Button ID
$tmp->setCategoryId($mp);                                  // Medienpool Kategorie ID
$tmp->setValue($myREX['settings']['MEDIA'][$id]);          // gespeicherte Werte einsetzen
$tmp->setAttribute('name', 'MEDIA['.$id.']');
$MediaButton1 = $tmp->getHtml();

// MEDIALIST BUTTON
////////////////////////////////////////////////////////////////////////////////
$id = 1;                                                   // ID dieses MediaListbuttons
$mp = 4;                                                   // ID der auzurufenden Medienpool Kategorie
$tmp = rex_input::factory('medialistbutton');              // Objekt initialisieren
$tmp->setButtonId($id);                                    // Button ID
$tmp->setCategoryId($mp);                                  // Medienpool Kategorie ID
$tmp->setValue($myREX['settings']['MEDIALIST'][$id]);      // gespeicherte Werte einsetzen
$tmp->setAttribute('name', 'MEDIALIST['.$id.']');
$MediaList1 = $tmp->getHtml();


echo '
<div class="rex-addon-output" id="subpage-'.$subpage.'">
  <div class="rex-form">

  <form action="index.php" method="POST" id="settings">
    <input type="hidden" name="page" value="'.$mypage.'" />
    <input type="hidden" name="subpage" value="'.$subpage.'" />
    <input type="hidden" name="func" value="savesettings" />

        <fieldset class="rex-form-col-1">
          <legend>Define Source Path</legend>
          <div class="rex-form-wrapper">

            <div class="rex-form-row">
              <p class="rex-form-col-a rex-form-text">
                <label for="textinput1">Folder</label>
                <input id="textinput1" class="rex-form-text" type="text" name="TEXTINPUT[1]" value="'.stripslashes($myREX['settings']['TEXTINPUT'][1]).'" />
				<br>
				<br>
              </p>
				<div class="rex-addon-content">
					Folder in which "*.less"-files will be searched for; relative to REDAXO-basepath.
					<br>
					If you do not know what to do, enter "files" here and upload "*.less"-files via the Mediapool.
				</div>
            </div><!-- .rex-form-row -->

          </div><!-- .rex-form-wrapper -->
        </fieldset>

<<<<<<< HEAD
        <fieldset class="rex-form-col-1">
=======
        <fieldset class="rex-form-col-1"  style="display:none;">
>>>>>>> d65427a87cb5f24c9ad40c04e553a371effa3232
          <legend>Aktiv</legend>
          <div class="rex-form-wrapper">

            <div class="rex-form-row">
              <p class="rex-form-col-a rex-form-select">
<<<<<<< HEAD
                <label for="select">Minify CSS Output?</label>
=======
                <label for="select">Addon aktiv?</label>
>>>>>>> d65427a87cb5f24c9ad40c04e553a371effa3232
                '.$select.'
              </p>
            </div><!-- .rex-form-row -->

          </div><!-- .rex-form-wrapper -->
        </fieldset>

        <fieldset class="rex-form-col-1" style="display:none;">
          <legend>Medienpool Dateien</legend>
          <div class="rex-form-wrapper">

            <div class="rex-form-row" >
              <div class="rex-form-col-a">
<<<<<<< HEAD
              <label for="REX_MEDIA_1">LESS File from Mediapool</label>
=======
              <label for="REX_MEDIA_1">LESS-Datei aus Medienpool in CSS im Zielverzeichnis konvertieren</label>
>>>>>>> d65427a87cb5f24c9ad40c04e553a371effa3232
            '.$MediaButton1.'
              </div><!-- .rex-form-col-a -->
            </div><!-- .rex-form-row -->

          </div><!-- .rex-form-wrapper -->
        </fieldset>


            <div class="rex-form-row rex-form-element-v2">
              <p class="rex-form-submit">
                <input class="rex-form-submit" type="submit" id="submit" name="submit" value="Save settings" />
              </p>
            </div><!-- .rex-form-row -->



  </form>

  </div><!-- .rex-form -->
</div><!-- .rex-addon-output -->
';
