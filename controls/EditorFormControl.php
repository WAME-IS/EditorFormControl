<?php

namespace Wame\EditorFormControl\Controls;

use Nette\Utils\Html;
use Nette\Forms\Controls\BaseControl;
use Nette\Forms\Container;
use Wame\LocationModule\Entities\AddressEntity;


class EditorFormControl extends \Nette\Forms\Controls\TextArea
{
	/** @var bool */
	private static $registered = false;

    /** @var string */
    private $labelName;

    /** @var AddressEntity */
    private $defaultValue;

    /** @var string */
    private $type;

    /** @var string */
    private $url;


	public function __construct($label) 
    {
		parent::__construct($label);

        $this->labelName = $label;
	}
    
	
//    /**
//     * Set default value
//     * 
//     * @param AddressEntity $value
//     * @return \Wame\AddressAutocompleteFormControl\Controls\AddressAutocompleteFormControl
//     * @throws Exception
//     */
//    public function setDefaultValue($value)
//    {
//        $this->defaultValue = $value;
//
//        if ($value instanceof AddressEntity) {
//            $value = $value->getId();
//        } else {
//            throw new Exception(_('Value addGeolocateAutocomplete must be instance of AddressEntity.'));
//        }
//        
//		$this->setValue($value);
//		
//		return $this;
//    }
//    
//    
//    /**
//     * Prepare input
//     * 
//     * @return \Nette\Utils\Html
//     */
//    public function getControl()
//	{
//		$control = parent::getControl();
//
//        $control->addAttributes([
//					'type' => 'textarea',
//					'name' => $this->getHtmlName()
//				])
//                ->setValue($this->getValue());
//        
//
//        return $control;
//	}

	
	public static function register($method = 'addEditor')
	{
		if (static::$registered) {
			throw new Nette\InvalidStateException(_('Editor form control already registered.'));
		}
		
		static::$registered = true;
		
		$class = function_exists('get_called_class') ? get_called_class() : __CLASS__;
		
		Container::extensionMethod(
			$method, function (Container $container, $name, $label = null) use ($class) 
            {
				$component[$name] = new $class($label);
				
				$container->addComponent($component[$name], $name);
                
				return $component[$name];
			}
		);
	}
	
}