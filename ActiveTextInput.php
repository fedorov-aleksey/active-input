<?php
namespace fav\activeField;

use Yii;
use yii\bootstrap\Html;

class ActiveTextInput extends ActiveField
{
    protected function getInput()
    {
        if (isset($this->inputOptions['class'])) {
            $this->inputOptions['class'] .= ' form-control';
        } else {
            $this->inputOptions['class'] = 'form-control';
        }
        return Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
    }
}
