#!/usr/bin/php
<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
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

$datas = array(
		new \GitChangeLogManifier\ChangeLog_Datas_Github_Github(),
		new \GitChangeLogManifier\ChangeLog_Datas_FSB_FSB()
);

// create changelog
$changelog = \GitChangeLogManifier\ChangeLog_Maker::make($repositoryPath, $lastRevision, $datas);
// render, because is rendable
echo $changelog->render();
echo '--------------------', "\n\n\n";
// use a default render
echo \GitChangeLogManifier\Render_Render::renderChangelog($changelog);
echo '--------------------', "\n\n\n";
// render with a specific one!
echo \GitChangeLogManifier\Render_Render::renderChangelog($changelog, '\GitChangeLogManifier\Render_BBCode');

# EOF
