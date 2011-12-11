<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

abstract class Render_XML_Data_Abstract implements IRender_IXmlRender
{
	public function render($data)
	{
		throw new \RuntimeException('not the good way!');
	}
}

# EOF
