<?php

namespace Wame\EditorFormControl\Vendor\Wame\SettingsModule\Forms;

use Wame\SettingsModule\Forms\BaseSettingsFormContainer;
use Wame\SettingsModule\Repositories\SettingsRepository;
use Wame\EditorFormControl\Registers\EditorRegister;

interface IEditorFormContainerFactory
{
	/** @return EditorFormContainer */
	public function create();
}


class EditorFormContainer extends BaseSettingsFormContainer
{
    /** @var EditorRegister */
    private $editorRegister;
    
    
    public function __construct(
        SettingsRepository $settingsRepository, 
        EditorRegister $editorRegister
    ) {
        parent::__construct($settingsRepository);
        $this->editorRegister = $editorRegister;
    }
    
    
	public function getInputName()
	{
		return 'editor';
	}


	public function getValue($form)
	{
		return $form->getHttpData($form::DATA_TEXT, $this->getInputName());
	}


    protected function configure() 
	{
		$form = $this->getForm();
        
        $items = $this->getEditorTypePairs();
        
		$form->addSelect('editor', _('Editor'), $items)
                ->setPrompt(_('- Select editor -'))
				->setOption('description', _('Pick editor type'));
    }

    
    private function getEditorTypePairs()
    {
        $items = $this->editorRegister->getAll();
        
        $pairs = [];
        
        foreach($items as $item) {
            $pairs[] = $item->getName();
        }
        
        return $pairs;
    }
    
}