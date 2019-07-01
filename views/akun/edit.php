<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "Edit";

?>

<div class="row">
    <div class="col-md-12">
        <h1>Edit <?php echo $akun['name'] ?></h1>
        <hr/>
        <?php

        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [
                ['label' => 'Akun', 'url' => ['akun/index']],
                'Edit '.$akun['name'],
            ],
        ]);

        ?>
    </div>
</div>

<div>   
    <div class="col-md-12">
        <?php $form = ActiveForm::begin([
                'id' => 'akun-form',
                'options' => ['class' => 'form-horizontal']
            ])
        ?>

        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($forms, 'username')->textInput(['value'=>$akun->username])->hint('besar'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($forms, 'name')->textInput(['value'=>$akun->name])->hint(' huruf besar'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($forms, 'password')->input('password')->hint('Password Baru'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($forms, 'role')->TextArea(['value'=>$akun->role]); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>