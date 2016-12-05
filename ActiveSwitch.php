<?php
/**
 * Created by PhpStorm.
 * User: fav
 * Date: 05.12.16
 * Time: 14:13
 */

namespace fav\activeField;

use yii\bootstrap\Html;


class ActiveSwitch extends ActiveField
{
    public $switchOptions = ['class' => 'switch switch-info switch-inline'];
    public $bsComponentOptions = ['class' => 'bs-component'];
    public $template = "{label}\n{beginWrapper}\n{beginBsComponent}\n{beginSwitch}\n{input}\n{label}\n{hint}\n{error}\n{endSwitch}\n{endBsComponent}\n{endWrapper}";

    public function getBeginBsComponent()
    {
        return Html::beginTag('div', $this->bsComponentOptions);
    }

    public function getEndBsComponent()
    {
        return Html::endTag('div');
    }

    public function getBeginSwitch()
    {
        return Html::beginTag('div', $this->switchOptions);
    }

    public function getEndSwitch()
    {
        return Html::endTag('div');
    }

    public function run()
    {
        foreach (['switchOptions', 'bsComponentOptions'] as $item) {
            if (empty($this->{$item}) && isset($this->options[$item])) {
                $this->{$item} = $this->options[$item];
            }
        }

        $this->template = str_replace(
            ['{beginBsComponent}', '{beginSwitch}', '{endSwitch}', '{endBsComponent}'],
            [$this->getBeginBsComponent(), $this->getBeginSwitch(), $this->getEndBsComponent(), $this->getEndSwitch()],
            $this->template
        );
        return parent::run();
    }

    public function getInput()
    {
        if (isset($this->inputOptions['class'])) {
            $this->inputOptions['class'] .= ' form-control';
        } else {
            $this->inputOptions['class'] = 'form-control';
        }
        $this->inputOptions['label'] = null;
        return Html::activeCheckbox($this->model, $this->attribute, $this->inputOptions);
        return '';
    }
}