<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_XML_Changelog implements IRender_IRender
{
	public function render($changeLog)
	{
		if (!($changeLog instanceof IChangeLog))
		{
			die('not a IChangelog :: ' . __CLASS__);
		}

		$document = new \DOMDocument('1.0', 'utf-8');
		$document->formatOutput = true;

		$changelogs = $document->createElementNS('http://www.w3.org/2000/xmlns/', 'changelogs');
		$document->appendChild($changelogs);

		foreach($this->_packNamespace() as $ns => $url)
		{
			$changelogs->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:' . $ns, $url);
		}

		$changelog = $document->createElement('changelog');
		$changelogs->appendChild($changelog);

		$name = $document->createAttribute('name');
		$name->appendChild($document->createTextNode('Changelog'));
		$changelog->appendChild($name);

		$lines = $document->createElement('lines');
		$changelog->appendChild($lines);

		$this->_renderLines($changeLog->getLines(), $document, $lines);

		return $document->saveXML();
	}

	protected function _packNamespace()
	{
		$namespaces = array();
		foreach(Render_DataKeys::getRenders() as $render)
		{
			foreach($render->getNamespaces() as $namespace)
			{
				$namespaces[ $namespace[ IRender_IXmlRender::NAMESPACE_NS ] ] = $namespace[ IRender_IXmlRender::NAMESPACE_URL ];
			}
		}
		return $namespaces;
	}

	protected function _renderLines(array $lines = null, \DOMDocument $document, \DOMElement $DOMlines)
	{
		$renderLine = new Render_XML_Line($document, $DOMlines);

		foreach ($lines as $line)
		{
			$DOMlines->appendChild($renderLine->render($line));
		}
	}

}

# EOF
