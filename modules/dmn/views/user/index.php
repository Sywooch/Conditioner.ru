<?php

use yii\helpers\Html;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Здесь можно добавить нового пользователя, удалить существующего.
        Вы не можете узнать пароль существующего пользователя, так как он шифруется необратимо,
        однако вы можете назначить ему новый пароль!
    </p>
    
    <table class="table table-striped table-bordered">
        <thead>
            <th> Логин </th>
            <th> Email </th>
            <th> Роль </th>
            <th> Действия </th>
        </thead>
    <?php foreach ($all_users as $users):?>
    <?php if($users->role == 'admin'):?>
        <?php $role = 'Администратор'; ?>
    <?php else: ?>
        <?php $role = 'Пользователь'; ?>
    <?php endif; ?>
        
        <tr>
            <td><?=$users->username?></td>
            <td><?=$users->email?></td>
            <td><?=$role?></td>
            <td>
                <?= Html::a('Изменить', '/dmn/user/update/'.$users->id)?><br/>
            </td>
        </tr>
        
    <?php endforeach;?>
    
    </table>
    
</div>