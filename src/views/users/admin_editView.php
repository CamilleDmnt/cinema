<?php get_header('editer un utilisateur','admin'); ?> 
<h1 class="mb-4">Editer un utilisateur</h1>

<form action="" method="post">
    <div class="mb-4">
        <?php $error = checkEmptyFields('email'); $emailValue = htmlentities(getValue('email') ?? '', ENT_QUOTES, 'UTF-8'); ?>
        <label for="email" class="form-label">Adresse email : *</label>
        <input type="email" name="email" id="email" value="<?= getValue('email');?>" class="form-control <?=$error['class']; ?>">
        <?= $error['message']?>
        <?= $errorsMessage['email']?>
    </div>

    <div class="mb-4">
    <?php $error = checkEmptyFields('pwd')?>
        <label for="pwd" class="form-label">Mot de Passe : *</label>
        <input type="password" name="pwd" id="pwd" class="form-control <?=$error['class']; ?>">
        <p class="form-text mb-0">
            Un minimum de 12 caractères.</br>
            Au moins une lettre majuscule.</br>
            Au moins une lettre minuscule.</br>
            Au moins un chiffre.</br>
            Au moins un caractère spécial.</br>
        </p>
        <?= $error['message']?>    
    </div>

    <div class="mb-4">
        <label for="pwd-confirm" class="form-label">Confirmation du mot de passe : *</label>
        <input type="password" name="pwdConfirm" id="pwd-confirm" class="form-control <?=$error['class']; ?>">
        <?= $error['message']?>
        <?= $errorsMessage['pwdConfirm']?>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Sauvegarder">
    </div>
</form>
<?php get_footer('admin'); ?>