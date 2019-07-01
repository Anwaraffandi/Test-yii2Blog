<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\DatePicker;
use yii\helpers\Url;

$this->title = "Tambah";

?>
<div class="row">
    <div class="col-md-12">
        <h1>Tambah</h1>
        <hr/>
        <?php
        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [['label' => 'Post', 'url' => ['post/index']],'Tambah Post',],]);
        ?>
    </div>
</div>

<div>   
    <div class="col-md-12">
        <?php $form = ActiveForm::begin([
                'id' => 'post-form',
                'options' => ['class' => 'form-horizontal']
            ])
        ?>

        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($forms, 'title')->hint('Harus Diisi'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($forms, 'content')->textarea(); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
                <?= Html::Button('Back', ['onclick' => "history.go(-1)", 'class' => 'btn btn-danger']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>