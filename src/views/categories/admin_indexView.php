<?php

get_header('Liste des Catégories', 'admin'); ?>

<h2>Liste des Catégories</h2>

<a href="" class="btn btn-success">Ajouter</a> rajouter la fonction pour ajouter des catégories

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Catégories</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) { ?>
            <tr>
               
                <td class="align-middle"><?= $category['category']; ?></td>
                <td class="text-center align-middle">
                    <a class="btn btn-warning mb-4" href="<?= $router->generate('editCat', ['id' =>  $category['id']]); ?>">Editer</a>
                    <a class="btn btn-danger mb-4" href="<?= $router->generate('deleteCat', ['id' =>  $category['id']]); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>