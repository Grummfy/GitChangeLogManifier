#!/usr/bin/php
<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

/**
 * Export git log to a changelog file as txt, html and fsbcode format
 */

//
// Configuration
//
$lastRevision = '2.0.2';
$repositoryPath = '/media/data/my_programmation/serveur/projects/fsb/project/src/git/Fire-Soft-Board-2';

//
//
//
require_once __DIR__ . '/lib/GitChangeLogManifier/Autoloader.php';

echo \GitChangeLogManifier\ChangeLog_Maker::make($repositoryPath, $lastRevision);
echo '--------------------', "\n\n\n";
$datas = array(
		new \GitChangeLogManifier\ChangeLog_Datas_Github_Github(),
//		new \GitChangeLogManifier\ChangeLog_Datas_FSB_FSB()
);

echo \GitChangeLogManifier\ChangeLog_Maker::make($repositoryPath, $lastRevision, $datas);

# EOF
