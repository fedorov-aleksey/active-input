<?php
namespace fav\activeField;

use Yii;
use yii\bootstrap\Html;

class ActiveCustomInput extends ActiveField
{
    public $inputContent;

    protected function getInput()
    {
        return $this->inputContent;
    }
}
