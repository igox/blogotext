<?php
# *** LICENSE ***
# This file is part of BlogoText.
# http://lehollandaisvolant.net/blogotext/
#
# 2006      Frederic Nassar.
# 2010-2013 Timo Van Neerden <ti-mo@myopera.com>
#
# BlogoText is free software, you can redistribute it under the terms of the
# Creative Commons Attribution-NonCommercial 2.0 France Licence
#
# Also, any distributors of non-official releases MUST warn the final user of it, by any visible way before the download.
# *** LICENSE ***

/*
	This file is called by the files. It is an underground working script,
	It is not intended to be called directly in your browser.
*/

$GLOBALS['BT_ROOT_PATH'] = '../';
require_once '../inc/inc.php';
error_reporting($GLOBALS['show_errors']);

operate_session();
$begin = microtime(TRUE);

$GLOBALS['liste_fichiers'] = open_file_db_fichiers($GLOBALS['fichier_liste_fichiers']);


if (isset($_POST['file_id']) and preg_match('#\d{14}#',($_POST['file_id'])) and isset($_POST['supprimer']) ) {
	foreach ($GLOBALS['liste_fichiers'] as $fich) {
		if ($fich['bt_id'] == $_POST['file_id']) {
			$fichier = $fich;
			break;
		}
	}
	if (!empty($fichier)) {
		$retour = bdd_fichier($fichier, 'supprimer-existant', '', $fichier['bt_id']);
		echo $retour;
		exit;
	}
}
echo 'failure';
exit;

