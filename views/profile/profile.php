<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pb@human-device.com>
 * @since 0.1
 */

use yii\helpers\Html;
use bizley\podium\components\Helper;
use cebe\gravatar\Gravatar;

$this->title = Yii::t('podium/view', 'My Profile');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-sm-3">
        <?= $this->render('/elements/profile/_navbar', ['active' => 'profile']) ?>
    </div>
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-body">
<?php if (!empty($model->meta->gravatar)): ?>
                <?= Gravatar::widget([
                    'email'        => $model->getEmail(),
                    'defaultImage' => 'identicon',
                    'rating'       => 'r',
                    'options'      => [
                        'alt'   => Html::encode($model->getName()),
                        'class' => 'podium-avatar img-circle img-responsive pull-right',
                ]]); ?>
<?php elseif (!empty($model->meta->avatar)): ?>
                <img class="podium-avatar img-circle img-responsive pull-right" src="/avatars/<?= $model->meta->avatar ?>" alt="<?= Html::encode($model->getName()) ?>">
<?php else: ?>
                <img class="podium-avatar img-circle img-responsive pull-right" src="<?= Helper::defaultAvatar() ?>" alt="<?= Html::encode($model->getName()) ?>">
<?php endif; ?>
                <h2>
                    <?= Html::encode($model->getName()) ?> 
                    <small>
                        <?= Html::encode($model->getEmail()) ?> 
                        <?= Helper::roleLabel($model->getRole()) ?>
                    </small>
                </h2>
                <p><?= Yii::t('podium/view', 'Member since {DATE}', ['DATE' => Yii::$app->formatter->asDatetime($model->getCreatedAt(), 'long')]) ?> (<?= Yii::$app->formatter->asRelativeTime($model->getCreatedAt()) ?>)</p>
                <p>
                    <a href="" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> <?= Yii::t('podium/view', 'Show all threads started by me') ?></a> 
                    <a href="" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> <?= Yii::t('podium/view', 'Show all posts created by me') ?></a>
                </p>
            </div>
            <div class="panel-footer">
                <ul class="list-inline">
                    <li><?= Yii::t('podium/view', 'Threads') ?> <span class="badge">0</span></li>
                    <li><?= Yii::t('podium/view', 'Posts') ?> <span class="badge">0</span></li>
                </ul>
            </div>
        </div>
    </div>
</div><br>