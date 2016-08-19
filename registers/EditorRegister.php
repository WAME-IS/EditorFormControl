<?php

namespace Wame\EditorFormControl\Registers;

class EditorRegister extends \Wame\Core\Registers\BaseRegister
{
    public function __construct() {
        parent::__construct(Types\IEditorType::class);
    }
    
}
