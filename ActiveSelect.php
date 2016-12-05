<?php
namespace fav\activeField;

use Yii;
use yii\bootstrap\Html;

class ActiveSelect extends ActiveField
{
    public $items;

    protected function getInput()
    {
        if (isset($this->inputOptions['class'])) {
            $this->inputOptions['class'] .= ' form-control';
        } else {
            $this->inputOptions['class'] = 'form-control';
        }
        return Html::activeDropDownList($this->model, $this->attribute, $this->items,$this->inputOptions);
    }
}
