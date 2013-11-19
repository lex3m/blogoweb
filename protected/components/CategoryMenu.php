<?php
Yii::import('zii.widgets.CPortlet');

class CategoryMenu extends CPortlet
{
    public $title = 'Категории';

    public function getCategoryMenu()
    {
        return Category::getMenu(0,0);
    }

    protected function renderContent()
    {
        $this->render('categoryMenu');
    }
}