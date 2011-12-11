<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class ChangeLog_Datas_FSB_Topic implements IChangeLog_IData
{
	protected $_id = 0;
	protected $_page = 0;
	protected $_qualifier = '';

	public function getId()
	{
		return $this->_id;
	}

	public function getPage()
	{
		return $this->_page;
	}

	public function getQualifier()
	{
		return $this->_qualifier;
	}

	public static function factory($data)
	{
		if (empty($data))
		{
			return null;
		}
		$topic = new self();

		if (!empty($data[1]))
		{
			$topic->_qualifier = $data[1];
		}

		if (!empty($data[2]))
		{
			$topic->_id = $data[2];
		}

		if (!empty($data[3]))
		{
			$topic->_page = $data[3];
		}

		return $topic;
	}

	public function __toString()
	{
		return $this->getQualifier() . '#' . $this->getId();
	}
}

# EOF
