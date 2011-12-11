<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

interface IChangeLog_IDataProcessor
{
	/**
	 * Get the pettern
	 * @return string
	 */
	public function getPattern();

	/**
	 * @return IChangeLog_IData
	 */
	public function process(IChangeLog_ILine $line, $commit, $match, $matches);
}

# EOF
