<?php

/**
 * Copyright (C) 2011	Grummfy
 *
 * This program is free software: under GPLv3, see doc/LICENCE.txt
 * for more informations or go to http://www.gnu.org/licenses/
 */

namespace GitChangeLogManifier;

class Render_Default_Data implements IRender_IRender
{
	public function render($data)
	{
		if (!($data instanceof IChangeLog_IData))
		{
			die('not a IChangeLog_IData :: ' . __CLASS__);
		}

		if ($data instanceof IRender_IRendable)
		{
			return $data->render();
		}
		else
		{
			return '' . $data;
		}
	}
}

# EOF
