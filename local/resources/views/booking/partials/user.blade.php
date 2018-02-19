<?php if (!$user): ?>
    <?php $user = new \App\User(); ?>
<?php endif ?>

<img src="{{ Helper::personImage($user->image, 'gray') }}"/>