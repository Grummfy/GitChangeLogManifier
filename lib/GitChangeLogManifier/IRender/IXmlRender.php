<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

interface IRender_IXmlRender extends IRender_IRender
{
	const NAMESPACE_URL = 0;
	const NAMESPACE_NS = 1;

	public function renderXML($somethingToRead, \DOMDocument $document, \DOMElement $element);

	/**
	 * @return array(array(namespace_url, namespace))
	 */
	public function getNamespaces();
}

# EOF
