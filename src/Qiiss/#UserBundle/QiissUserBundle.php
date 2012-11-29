<?php

namespace Qiiss\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class QiissUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
