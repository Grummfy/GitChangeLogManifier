<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

interface IRender_IRender
{
	/**
	 * @return string
	 */
	public function render($somethingToRead);
}

# EOF
