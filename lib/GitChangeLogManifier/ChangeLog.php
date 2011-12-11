<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class ChangeLog implements IChangeLog
{
	protected $_lines;

	public function __construct()
	{
		$this->_lines = array();
	}

	public function add(IChangeLog_ILine $line)
	{
		$this->_lines[] = $line;
	}

	public function getLines()
	{
		return $this->_lines;
	}

	public function __toString()
	{
		return 'Changelog: ' . implode("\n", $this->_lines);
	}

}

# EOF
