<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "CRUD";

?>

<div class="row">
    <div class="col-md-12">
        <?php

        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [
                'Post',
            ],
        ]);
        ?>
        <hr/>
        <h1>Post</h1>
    </div>
</div>

<div>   
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>ISI</th>
                <th>Date</th>
                <th>Username</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $no =1;
                if (count($post) > 0) { ?>
                    <?php foreach ($post as $post): ?>
                        <tr>
                        	<td><?= $no ?></td>
                            <td><?= Html::encode("{$post['title']}") ?></td>
                            <td><?= Html::encode("{$post['content']}") ?></td>
                            <td><?= Html::encode("{$post['date']}") ?></td>
                            <td><?= Html::encode("{$post['username']}") ?></td>
                            <td style="width:15%;text-align:center;">
                                <a href="<?php echo Url::to(['post/delete', 'id'=>$post['idpost']]); ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                <a href="<?php echo Url::to(['post/detail', 'id'=>$post['idpost']]); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="<?php echo Url::to(['post/edit', 'id'=>$post['idpost']]); ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                            </td>
                          </tr>
                    <?php endforeach; ?>
                <?php } else { ?>
                <tr>
                    <td style="text-align:center;font-size:15px;padding:25px;" colspan="5">No data found...</td>
                </tr>
                <?php 
                $no++;
            } ?>

            </tbody>
          </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr/>
        <h1>Akun</h1>
    </div>
</div>

<div>   
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php 
                if (count($akun) > 0) { ?>
                    <?php 
                    $no =1;
                    foreach ($akun as $akun): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= Html::encode("{$akun['username']}") ?></td>
                            <td><?= Html::encode("{$akun['name']}") ?></td>
                            <td><?= Html::encode("{$akun['role']}") ?></td>
                            <td style="width:15%;text-align:center;">
                                <a href="<?php echo Url::to(['akun/delete', 'id'=>$akun['username']]); ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                <a href="<?php echo Url::to(['akun/detail', 'id'=>$akun['username']]); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="<?php echo Url::to(['akun/edit', 'id'=>$akun['username']]); ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                            </td>
                          </tr>
                    <?php 
                    $no++;
                endforeach; ?>
                <?php 
                } else { ?>
                <tr>
                    <td style="text-align:center;font-size:15px;padding:25px;" colspan="5">No data found...</td>
                </tr>
                <?php } ?>

            </tbody>
          </table>
    </div>
</div>