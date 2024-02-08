<?php

get_header('Liste des films', 'admin'); ?>

<h2>Liste des Films</h2>

<a href="<?= $router->generate('addMovie'); ?>" class="btn btn-success">Ajouter</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Films</th>
            <th scope="col">Durée</th>
            <th scope="col">Date de sortie</th>
            <th scope="col">Réalisateur</th>
            <th scope="col">Casting</th>
            <th scope="col">Synopsis</th>
            <th scope="col">Note de la Presse</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Photo</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($movies as $movie) { ?>
            <tr>
                <td class="align-middle"><?= $movie->title; ?></td>
                <td class="align-middle"><?= $movie->duration; ?></td>
                <td class="align-middle"><?= $movie->release_date; ?></td>
                <td class="align-middle"><?= $movie->director; ?></td>
                <td class="align-middle"><?= $movie->casting; ?></td>
                <td class="align-middle"><?= $movie->synopsis; ?></td>
                <td class="align-middle"><?= $movie->notePress; ?></td>
                <td class="align-middle"><?= $movie->category; ?></td>
                <td class="align-middle"><?= $movie->photo; ?></td>
                <td class="text-center align-middle">
                    <a class="btn btn-warning mb-4" href="<?= $router->generate('editMovie', ['id' =>  $movie->id]); ?>">Editer</a>
                    <a class="btn btn-danger mb-4" href="<?= $router->generate('deleteMovie', ['id' =>  $movie->id]); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>