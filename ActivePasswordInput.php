<?php
namespace fav\activeField;

use Yii;
use yii\base\Html;

class ActivePasswordInput extends ActiveField
{
    protected function getInput()
    {
        return Html::activePasswordInput($this->model, $this->attribute, $this->inputOptions);
    }
}
