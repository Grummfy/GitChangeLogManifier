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
	public static function factoryChangelog($renderType = null)
	{
		$render = $renderType . '_Changelog';
		if (!empty($renderType) && class_exists($render))
		{
			return new $render();
		}
		return new Render_Default_Changelog();
	}

	public static function renderChangelog(IChangeLog $changelog, $renderType = null)
	{
		if (empty($renderType) && $changelog instanceof IRender_IRendable)
		{
			return $changelog->render();
		}
		else
		{
			return self::factoryChangelog($renderType)->render($changelog);
		}
	}

}

# EOF
