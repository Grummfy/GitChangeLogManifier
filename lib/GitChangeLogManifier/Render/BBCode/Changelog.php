<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_BBCode_Changelog implements IRender_IRender
{
	/**
	 * @return IChangeLog_IRender
	 */
	public function render($changelog)
	{
		if ($changelog instanceof IChangeLog)
		{
			return '[b]Changelog[/b]: ' . $this->_renderLines($changelog->getLines());
		}

		die('not a IChangelog :: ' . __CLASS__);
	}

	protected function _renderLines(array $lines = null)
	{
		if (empty($lines))
		{
			return 'empty!';
		}

		$rendered = '[list]';
		foreach ($lines as $line)
		{
			$rendered .= '[*]' . $this->_renderLine($line) . "\n";
		}
		return $rendered . '[/list]';
	}

	protected function _renderLine(IChangeLog_ILine $line)
	{
		if ($line instanceof IRender_IRendable)
		{
			return $line->render();
		}
		else
		{
			return '' . $line;
		}
	}

}

# EOF
