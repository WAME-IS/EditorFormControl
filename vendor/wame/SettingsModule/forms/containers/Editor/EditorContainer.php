<?php

namespace Wame\EditorFormControl\Vendor\Wame\SettingsModule\Forms\Containers;

use Nette\DI;
use Wame\DynamicObject\Registers\Types\IBaseContainer;
use Wame\EditorFormControl\Registers\EditorRegister;
use Wame\SettingsModule\Vendor\Wame\AdminModule\Forms\Containers\SettingsContainer;

interface IEditorContainerFactory extends IBaseContainer
{
    /** @return EditorContainer */
    public function create();
}

class EditorContainer extends SettingsContainer
{
    /** @var EditorRegister */
    private $editorRegister;


    public function __construct(DI\Container $container, EditorRegister $editorRegister)
    {
        parent::__construct($container);

        $this->editorRegister = $editorRegister;
    }


    /** {@inheritdoc} */
    public function configure()
    {
        $items = $this->getEditorTypePairs();

        $this->addSelect($this->getSettingsName(), $this->getSettingsTitle(), $items)
            ->setPrompt(_('- Select editor -'))
            ->setOption('description', _('Pick editor type'));
    }

    /** {@inheritdoc} */
    protected function getSettingsType()
    {
        return 'general';
    }

    /** {@inheritdoc} */
    protected function getSettingsName()
    {
        return 'editor';
    }

    /** {@inheritdoc} */
    protected function getSettingsTitle()
    {
        return _('Editor');
    }


    /**
     * Get editor type pairs
     *
     * @return array
     */
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