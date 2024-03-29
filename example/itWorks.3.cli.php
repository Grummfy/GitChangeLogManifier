#!/usr/bin/php
<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

/*
 * Supose you have a folder containing a clone of git://github.com/FSB/Fire-Soft-Board-2.git in $repositoryPath
 * 
 * Here is the sample use in fsb dev tools (at start) to produce the changelog file of FSB
 */

//
// Configuration
//
$lastRevision = '2.0.2';
$repositoryPath = '/media/data/my_programmation/serveur/projects/fsb/project/src/git/Fire-Soft-Board-2';

//
//
//
require_once __DIR__ . '/../lib/GitChangeLogManifier/Autoloader.php';

$datas = array(
		new \GitChangeLogManifier\ChangeLog_Datas_Github_Github(),
		new \GitChangeLogManifier\ChangeLog_Datas_FSB_FSB()
);

// create changelog
$changelog = \GitChangeLogManifier\ChangeLog_Maker::make($repositoryPath, $lastRevision, $datas);

\GitChangeLogManifier\Render_DataKeys::addRenderByKey('GitChangeLogManifier\ChangeLog_Datas_Github_Issue', new \GitChangeLogManifier\Render_XML_Data_GithubIssue());
\GitChangeLogManifier\Render_DataKeys::addRenderByKey('GitChangeLogManifier\ChangeLog_Datas_FSB_Topic', new \GitChangeLogManifier\Render_XML_Data_FSBTopic());

$xmlRender = new \GitChangeLogManifier\Render_XML_Changelog();

$DOMDocument = new \DOMDocument('1.0', 'utf-8');
$DOMDocument->formatOutput = true;
$DOMDocument->preserveWhiteSpace = false;

$xslt = $DOMDocument->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="../utils/xsl/changelog.xsl"');
$DOMDocument->appendChild($xslt);

$xmlRender->renderAsXmlDocument($changelog, $DOMDocument);

echo $DOMDocument->saveXML();

# EOF
