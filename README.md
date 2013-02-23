rex_LESS
========

LESSPHP for REDAXO 

About this Addon
================

This Addon includes the LESS Stylesheet Parser into REDAXO. It includes the lessPHP project (http://leafo.net/lessphp/) class. The Version Number of this addon corresponds with the lessPHP class version. 

How to use it
=============

This addon is a proof of concept. There might be errors, so take care! Follow these instruction and you shouldn't be harmed:

* Enter an existing folder in the "Folder" Settings field. 
* By default, the path to "files" is prefilled. If you enter "files" as a setting, you can easily upload LESS files via the Mediapool
* All files in the specified folder that have an extension of ".less" will be parsed as CSS files. They will be written in the same folder as the source file. 
* Caching is activated 

Examples
========

If you use the Mediapool and have "files" entered as folder, include the following line in your main HTML template, assuming that you uploaded "yourfile.less":

    <link href="<?php echo $REX['HTDOCS_PATH'] ?>files/yourfile.css" rel="stylesheet">

Accordingly, if you entered another location as folder, include the following line in your main HTML template, assuming that you entered "layout/css" in the addon settings section:

    <link href="<?php echo $REX['HTDOCS_PATH'] ?>layout/css/yourfile.css" rel="stylesheet">
