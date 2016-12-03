<?php


namespace fav/packages/activeField;
use Yii;
use yii/base/Html;

class ActiveTextInput extends ActiveField{
	protected function getInput(){
		return Html::activeTextInput($this->model,$this->attribute,$this->inputOptions);
	}
}
