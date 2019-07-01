<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "Edit";

?>

<div class="row">
    <div class="col-md-12">
        <h1>Edit <?php echo $post['title'] ?></h1>
        <hr/>
        <?php

        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [
                ['label' => 'Post', 'url' => ['post/index']],
                'Edit '.$post['title'],
            ],
        ]);

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
            <?= $form->field($forms, 'title')->textInput(['value'=>$post->title])->hint('besar'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($forms, 'content')->textarea(['value'=>$post->content]); ?>
            </div
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>