<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class ChangeLog_Maker
{
	protected $_datas = array();

	public static function make($repositoryPath, $lastRevision, $datas = null)
	{
		$clm = new self();
		if (!empty($datas) && is_array($datas))
		{
			$clm->setDatas($datas);
		}

		return $clm->process($repositoryPath, $lastRevision);
	}

	public function process($repositoryPath, $lastRevision)
	{
		$output = $this->_extractLog($repositoryPath, $lastRevision);
		$changelog = $this->_buildChangeLog();

		foreach ($output as $commit)
		{
			$commit = trim($commit);
			if ($commit == '')
			{
				continue;
			}

			// mmmh ?!?

			$line = $this->_buildChangeLogLine();
			$line->setMessage($commit);
			$this->_extractDatas($commit, $line);

			$changelog->add($line);
		}

		return $changelog;
	}

	public function setDatas(array $datas)
	{
		$this->_datas = $datas;
	}

	protected function _buildChangeLog()
	{
		return new ChangeLog();
	}

	protected function _buildChangeLogLine()
	{
		return new ChangeLog_Line();
	}

	protected function _extractDatas($commit, IChangeLog_ILine $line)
	{
		array_walk($this->_datas, function(&$dataProcessor) use ($commit, $line)
		{
			$match = preg_match_all('@' . $dataProcessor->getPattern() . '@', $commit, $matches, PREG_SET_ORDER);
			$dataProcessor->process($line, $commit, $match, $matches);
		});
	}

	protected function _extractLog($repositoryPath, $lastRevision)
	{
		// skip author, skip blanc, skip commit, skip date but keep line return
		$cli = 'cd ' . $repositoryPath . '; git --no-pager log --no-merges ';
		$cli .= $lastRevision . '.. | sed -e \'/^commit.*$/d\' | sed -e \'/^Author: .*$/d\'';
		$cli .= ' |sed -e \'/^Date:.*$/d\' |sed -e \'s/^ *//g\'';
		//$cli .= ' |sed -e \'/^Date:.*$/d\' |uniq |sed -e \'s/^ *//g\'';

		exec($cli, $output, $retval);
		if ($retval != 0)
		{
			die('Error on ' . $cli);
		}

		// create array of commit message
		$output = implode("\n", $output);
		$output = explode("\n\n\n", $output);

		return $output;
	}

}

# EOF
