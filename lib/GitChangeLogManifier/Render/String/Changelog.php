<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_String_Changelog implements IRender_IRender
{
	public function render($changelog)
	{
		if ($changelog instanceof IChangeLog)
		{
			return 'Changelog: ' . implode("\n", $changelog->getLines());
		}
		else
		{
			return 'Changelog: ' . $changelog;
		}
	}

}

# EOF
