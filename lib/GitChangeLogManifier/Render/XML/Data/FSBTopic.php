<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_XML_Data_FSBTopic extends Render_XML_Data_Abstract
{
	CONST NAMESPACE_URL = 'http://www.fire-soft-board.com/';
	CONST NAMESPACE_NS = 'fsb';

	public function renderXML($data, \DOMDocument $document, \DOMElement $DOMdata)
	{
		if (!($data instanceof IChangeLog_IData))
		{
			die('not a IChangeLog_IData :: ' . __CLASS__);
		}

		$topic = $document->createElementNS(self::NAMESPACE_URL, self::NAMESPACE_NS . ':topic');
		// element because we can't be sure there is no other commits about this issue
		$id = $document->createElementNS(self::NAMESPACE_URL, self::NAMESPACE_NS . ':id');
		$id->appendChild($document->createTextNode($data->getId()));
		$topic->appendChild($id);

		$page = $document->createElementNS(self::NAMESPACE_URL, self::NAMESPACE_NS . ':page');
		$page->appendChild($document->createTextNode($data->getPage()));
		$topic->appendChild($page);

		$qualifier = $document->createElementNS(self::NAMESPACE_URL, self::NAMESPACE_NS . ':qualifier');
		$qualifier->appendChild($document->createTextNode($data->getQualifier()));
		$topic->appendChild($qualifier);

		$DOMdata->appendChild($topic);
	}

	public function getNamespaces()
	{
		return array( array(
					IRender_IXmlRender::NAMESPACE_NS => self::NAMESPACE_NS,
					IRender_IXmlRender::NAMESPACE_URL => self::NAMESPACE_URL,
			));
	}

}

# EOF
