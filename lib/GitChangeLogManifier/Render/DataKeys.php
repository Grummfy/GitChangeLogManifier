<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_DataKeys
{
	protected static $_render = array();

	public static function addRenderByKey($key, $renderInstance)
	{
		self::$_render[ $key ] = $renderInstance;
	}

	public static function hasRenderKey($key)
	{
		return !empty(self::$_render[ $key ]);
	}

	public static function getRenderByKey($key)
	{
		return self::$_render[ $key ];
	}

	public static function getRenders()
	{
		return self::$_render;
	}
}

# EOF
