<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

interface IChangeLog_ILine
{
	public function setMessage($message);

	public function getMessage();

	public function addData(IChangeLog_IData $data, $key = null);

	/**
	 * @return array(IChangeLog_IData)
	 */
	public function getDatas($compact = true);

	public function __toString();
}

# EOF
