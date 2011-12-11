<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_XML_Data_GithubIssue extends Render_XML_Data_Abstract
{
	CONST NAMESPACE_URL = 'https://github.com/Grummfy/GitChangeLogManifier/issue';
	CONST NAMESPACE_NS = 'gh';

	public function renderXML($data, \DOMDocument $document, \DOMElement $DOMdata)
	{
		if (!($data instanceof IChangeLog_IData))
		{
			die('not a IChangeLog_IData :: ' . __CLASS__);
		}

		$issue = $document->createElementNS(self::NAMESPACE_URL, self::NAMESPACE_NS . ':issue');
		$DOMdata->appendChild($issue);

		// element because we can't be sure there is no other commits about this issue
		$id = $document->createElementNS(self::NAMESPACE_URL, self::NAMESPACE_NS . ':id');
		$id->appendChild($document->createTextNode($data->getId()));
		$issue->appendChild($id);

		return array(
				self::NAMESPACE_URL,
				self::NAMESPACE_NS
		);
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
