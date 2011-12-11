<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

abstract class ChangeLog_Datas_AbstractProcessor implements IChangeLog_IDataProcessor
{
	protected function _getLineKey()
	{
		return ChangeLog_Line::DEFAULT_KEY;
	}

	/**
	 * @return string eg '\GitChangeLogManifier\ChangeLog_Datas_Github_Issue::factory'
	 */
	abstract protected function _getDataFactory();

	public function process(IChangeLog_ILine $line, $commit, $match, $matches)
	{
		if ($match !== false && !empty($matches))
		{
			foreach ($matches as $data)
			{
				if (empty($data))
				{
					continue;
				}

				$factory = $this->_getDataFactory();
				$line->addData(call_user_func($factory, ($data)), $this->_getLineKey());
			}
		}
	}
}

# EOF
