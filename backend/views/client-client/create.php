<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClientClient */

$this->title = 'Добавить клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'phone' => $phone,
    ]) ?>

</div>
