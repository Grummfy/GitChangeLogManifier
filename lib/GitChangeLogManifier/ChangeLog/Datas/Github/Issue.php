<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class ChangeLog_Datas_Github_Issue implements IChangeLog_IData
{
	protected $_id = 0;

	public function getId()
	{
		return $this->_id;
	}

	public static function factory($data)
	{
		if (empty($data))
		{
			return null;
		}

		$ticket = new self();

		if (!empty($data[2]))
		{
			$ticket->_id = $data[2];
		}

		return $ticket;
	}

	public function __toString()
	{
		return '#' . $this->getId();
	}
}

# EOF
