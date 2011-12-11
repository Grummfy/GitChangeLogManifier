<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_Factory
{
	public static function factoryChangelog($renderType = null)
	{
		$render = self::_factory('_Changelog', $renderType);
		return (empty($render)) ? new Render_Default_Changelog() : $render;
	}

	public static function factoryData($renderType = null)
	{
		$render = self::_factory('_Data', $renderType);
		return (empty($render)) ? new Render_Default_Data() : $render;
	}

	public static function factoryDataFromKey($key, $renderType = null)
	{
		$render = (Render_DataKeys::hasRenderKey($key)) ? Render_DataKeys::getRenderByKey($key) : null;
		$render = (empty($render)) ? self::_factory('_Data', $renderType) : $render;
		return (empty($render)) ? new Render_Default_Data() : $render;
	}

	protected static function _factory($postfix, $renderType = null)
	{
		$render = $renderType . $postfix;
		if (!empty($renderType) && class_exists($render))
		{
			return new $render();
		}
		return null;
	}
}

# EOF
