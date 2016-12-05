<?php

namespace fav\activeField;

use Yii;
use yii\base\Html;
use yii\bootstrap\Widget;


abstract class ActiveField extends Widget
{

    public $tag = 'div';
    public $model;
    public $attribute;
    public $template = "{label}\n{wrapperBegin}\n{input}\n{hint}\n{error}\n{wrapperEnd}";
    public $labelOptions = [];
    public $inputOptions = [];
    public $errorOptions = [];
    public $hintOptions = [];
    public $wrapOptions = [];

    protected function getLabel()
    {
        return Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
    }

    abstract protected function getInput();

    protected function getHint()
    {
        return Html::activeHint($this->model, $this->attribute, $this->hintOptions);
    }

    protected function getError()
    {
        return Html::error($this->model, $this->attribute, $this->errorOptions);
    }

    protected function getWrapperBegin()
    {
        return Html::beginTag($this->tag, $this->wrapOptions);
    }

    protected function getWrapperend()
    {
        return Html::endTag($this->tag);
    }

    public function init()
    {
        parent::init();
        $view = Yii::$app->getView();
        $this->registerAssets();
        $view->registerJs($this->getJs());
    }

    public function run()
    {
        return str_replace(
            ['{label}', '{input}', '{hint}', '{error}', '{wrapperBegin}', '{wrapperEnd}'],
            [$this->getLabel(), $this->getInput(), $this->getHint(), $this->getError(), $this->getWrapperBegin(), $this->getWrapperend()],
            $this->template
        );
    }

    public function registerAssets()
    {
        $view = $this->getView();
        activeFieldAsset::register($view);
    }

    private function getJs()
    {
        return null;
    }
}
