<?php

namespace Wame\EditorFormControl\DI;

use Nette\DI\CompilerExtension;
use Nette\PhpGenerator\ClassType;


class EditorFormExtension extends CompilerExtension
{
	public function afterCompile(ClassType $class)
	{
		parent::afterCompile($class);
        
		$initialize = $class->methods['initialize'];
		$initialize->addBody('\Wame\EditorFormControl\Controls\EditorFormControl::register(?);', ['addEditor']);
	}

}