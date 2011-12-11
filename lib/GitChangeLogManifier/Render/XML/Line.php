<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_XML_Line implements IRender_IRender
{
	protected $_document;

	public function __construct(\DOMDocument $document)
	{
		$this->_document = $document;
	}

	public function render($line)
	{
		if (!($line instanceof IChangeLog_ILine))
		{
			die('not a IChangeLog_ILine :: ' . __CLASS__);
		}

		$DOMline = $this->_document->createElement('line');

		$message = $this->_document->createElement('message');
		$message->appendChild($this->_document->createCDATASection($line->getMessage()));
		$DOMline->appendChild($message);

		$datas = $this->_document->createElement('datas');
		$DOMline->appendChild($datas);
		$this->_renderDatas($line->getDatas(), $datas);

		return $DOMline;
	}

	protected function _renderDatas(array $datas = null, \DOMElement $DOMdatas)
	{
		$renderData = new Render_XML_Data($this->_document, $DOMdatas);

		foreach($datas as $key => $data)
		{
			$DOMdatas->appendChild($renderData->render($data));
		}
	}
}

# EOF
