<?php
namespace fav\activeField;

use Yii;
use yii\bootstrap\Html;

class ActivePasswordInput extends ActiveField
{
    protected function getInput()
    {
        return Html::activePasswordInput($this->model, $this->attribute, $this->inputOptions);
    }
}
