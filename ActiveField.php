<?php

namespace fav\activeField;

use Yii;
use yii\base\Model;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;


abstract class ActiveField extends Widget
{

    public $tag = 'div';
    /**
     * @var Model
     */
    public $model;
    public $attribute;
    public $template = "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}";
    public $options;
    public $labelOptions = [];
    public $inputOptions = [];
    public $errorOptions = [];
    public $hintOptions = [];
    public $wrapOptions = [];

    protected function getLabel()
    {
        if (isset($this->labelOptions['class'])) {
            $this->labelOptions['class'] .= ' control-label';
        } else {
            $this->labelOptions['class'] = 'control-label';
        }
        return Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
    }

    abstract protected function getInput();

    protected function getHint()
    {
        return Html::activeHint($this->model, $this->attribute, $this->hintOptions);
    }

    protected function getError()
    {
        if (isset($this->errorOptions['class'])) {
            $this->errorOptions['class'] .= ' help-block help-block-error';
        } else {
            $this->errorOptions['class'] = 'help-block help-block-error';
        }
        return Html::error($this->model, $this->attribute, $this->errorOptions);
    }

    protected function getBeginWrapper()
    {
        return Html::beginTag($this->tag, $this->wrapOptions);
    }

    protected function getEndWrapper()
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
        foreach (['labelOptions', 'inputOptions', 'hintOptions', 'errorOptions', 'wrapOptions'] as $item) {
            if (empty($this->{$item}) && isset($this->options[$item])) {
                $this->{$item} = $this->options[$item];
            }
        }
        return Html::tag(
            $this->tag,
            str_replace(
                ['{label}', '{input}', '{hint}', '{error}', '{beginWrapper}', '{endWrapper}'],
                [$this->getLabel(), $this->getInput(), $this->getHint(), $this->getError(), $this->getBeginWrapper(), $this->getEndWrapper()],
                $this->template
            ),
            ['class' => strtolower('form-group field-' . $this->model->formName() . '-' . $this->attribute)]
        );
    }

    public function registerAssets()
    {
        $view = $this->getView();
        ActiveFieldAsset::register($view);
    }

    private function getJs()
    {
        return null;
    }
}
