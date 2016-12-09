<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator xmlex\adminlte\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString($generator->elementName) ?>.' № '.$model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString($generator->name) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-info">
            <div class="box-body">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= "<?= " ?>Html::encode($this->title) ?></h3>
                </div>
                <p class="btn-group">
                    <?= "<?= " ?>Html::a(<?= $generator->generateString('Изменить') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-flat btn-primary']) ?>
                    <?= "<?= " ?>Html::a(<?= $generator->generateString('Удалить') ?>, ['delete', <?= $urlParams ?>], [
                        'class' => 'btn btn-flat btn-danger',
                        'data' => [
                            'confirm' => <?= $generator->generateString('Подтверждаете удаление?') ?>,
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?= "<?= " ?>DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                <?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "                        '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        echo "                        '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
