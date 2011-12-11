<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class ChangeLog_Line implements IChangeLog_ILine
{
	protected $_message = '';
	protected $_datas = array();

	const DEFAULT_KEY = '__default';

	public function setMessage($message)
	{
		$this->_message = trim($message);
	}

	public function getMessage()
	{
		return $this->_message;
	}

	public function addData(IChangeLog_IData $data, $key = null)
	{
		$this->_datas[((empty($key)) ? self::DEFAULT_KEY : $key)][] = $data;
	}

	public function getDatas()
	{
		return $this->_compactDatas();
	}

	public function __toString()
	{
		return str_replace("\n", '|', $this->getMessage()) . "\n\t" . implode("\n\t", $this->getDatas());
	}

	protected function _compactDatas()
	{
		$result = array();
		array_walk($this->_datas, function(&$datas) use (&$result)
		{
			$result = array_merge($result, $datas);
		});

		return $result;
	}

}

# EOF
