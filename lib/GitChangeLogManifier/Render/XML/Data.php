<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_XML_Data implements IRender_IRender
{
	protected $_document;

	public function __construct(\DOMDocument $document)
	{
		$this->_document = $document;
	}

	public function render($data)
	{
		if (!($data instanceof IChangeLog_IData))
		{
			die('not a IChangeLog_IData :: ' . __CLASS__);
		}

		$DOMdata = $this->_document->createElement('data');
		// $DOMdata->appendChild($this->_document->createCDATASection('' . get_class($data)));
		$render = Render_Factory::factoryDataFromKey(get_class($data));
		if ($render instanceof IRender_IXmlRender)
		{
			$render->renderXml($data, $this->_document, $DOMdata);
		}
		else
		{
			$DOMdata->appendChild($this->_document->createCDATASection('' . $rendered));
		}

		return $DOMdata;
	}

}

# EOF
