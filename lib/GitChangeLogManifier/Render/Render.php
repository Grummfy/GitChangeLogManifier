<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_Render
{
	public static function renderChangelog(IChangeLog $changelog, $renderType = null)
	{
		if (empty($renderType) && $changelog instanceof IRender_IRendable)
		{
			return $changelog->render();
		}
		else
		{
			return Render_Factory::factoryChangelog($renderType)->render($changelog);
		}
	}
}

# EOF
