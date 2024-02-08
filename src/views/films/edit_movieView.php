<?php get_header('editer_film', 'admin'); ?>

<style>
    html,
    body,
    .vertical-center {
        height: 100%;
    }

    .d-flex.align-items-center.py-4.bg-body-tertiary.vertical-center {
        height: 1000px;
    }

    .form-signin {
        max-width: 500px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input{
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input{
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>


<div class="d-flex align-items-center py-4 bg-body-tertiary vertical-center ">

    <div class ="w-200 m-auto d-flex flex-column align-items-center">
        <form method="post" class="form-signin " enctype="multipart/form-data" >

            <h1 class="h3 mb-3 fw-normal text-center">Ajouter un film</h1>

            <!-- title -->
            <div class="form-floating mb-4">        
                <?php $error = checkEmptyFields('title'); $titleValue = htmlentities(getValue('title') ?? '', ENT_QUOTES, 'UTF-8');?>
                <input type="text" name="title" class="form-control" id="floatingTitle" value="<?= getValue('title');?>" 
                    placeholder="Nom du film">
                <label for="floatingTitle">Film *</label>
                <?= $error['message'];?>
                <?= $errorsMessage['title'];?>
            </div>

            <!-- categories  -->
            <div class="form-floating mb-4" >
                <!-- <label for="floatingSelect"> Veuillez sélectionner vos catégories *</label> -->
                <?php $error = checkEmptyFields('categories'); ?>
                

                <?= $error['message']; ?>
                <?= $errorsMessage['categories']; ?>
            </div>

            <!-- duration -->
            <div class="form-floating mb-4">
                <?php $error = checkEmptyFields('duration');?>
                <input type="time" name="duration" class="form-control" id="floatingDuration">
                <label for="floatingDuration">Durée *</label>
                <?= $error['message'];?>
                <?= $errorsMessage['duration'];?>
            </div>

            <!-- release_date -->
            <div class="form-floating mb-4">
                <?php $error = checkEmptyFields('release_date');?>
                <input type="date" name="release_date" class="form-control" id="floatingDate">
                <label for="floatingDate">Date de sortie *</label>
                <?= $error['message'];?>
                <?= $errorsMessage['release_date'];?>
            </div>

            <!-- director -->
            <div class="form-floating mb-4">
                <?php $error = checkEmptyFields('director'); $titleValue = htmlentities(getValue('title') ?? '', ENT_QUOTES, 'UTF-8');?>  
                <input type="text" name="director" class="form-control" id="floatingDirector" value="<?= getValue('director');?>" 
                placeholder="Réalisateur">
                <label for="floatingDirector">Réalisateur *</label>
                <?= $error['message'];?>
                <?= $errorsMessage['director'];?>
            </div>

            <!-- casting -->
            <div class="form-floating mb-4">
                <?php $error = checkEmptyFields('casting'); $titleValue = htmlentities(getValue('title') ?? '', ENT_QUOTES, 'UTF-8');?>
                <input type="text" name="casting" class="form-control" id="floatingCasting" value="<?= getValue('casting');?>"
                placeholder="casting">
                <label for="floatingCasting">Casting *</label>
                <?= $error['message'];?>
                <?= $errorsMessage['casting'];?>
            </div>

            <!-- synopsis -->
            <div class="form-floating mb-4">
                <?php $error = checkEmptyFields('synopsis'); $titleValue = htmlentities(getValue('title') ?? '', ENT_QUOTES, 'UTF-8');?>
                <textarea name="synopsis" class="form-control" placeholder="Synopsis" id="floatingTextarea" value="<?= getValue('synopsis');?>" style="height: 100px"></textarea>
                <label for="floatingTextarea">Synopsis *</label>
                <?= $error['message'];?>
                <?= $errorsMessage['synopsis'];?>
            </div>

            <!-- notePress -->
            <div class="form-floating mb-4">
                <?php $error = checkEmptyFields('notePress'); $titleValue = htmlentities(getValue('title') ?? '', ENT_QUOTES, 'UTF-8');?>
                <input type="text" name="notePress" class="form-control" id="floatingNotePress" value="<?= getValue('notePress');?>" 
                placeholder="Note de la presse ">
                <label for="floatingNotePress">Note de la presse *</label>
                <?= $error['message'];?>
                <?= $errorsMessage['notePress'];?>
            </div> 

            <!-- poster -->
            <div class="container mt-4">
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="photo" id="image">
                        <label class="custom-file-label" for="image" data-browse="Parcourir">Télécharger une image</label>
                    </div>
            </div>

            <button <?= $router->generate('addMovie'); ?> class="btn btn-primary center w-50 py-2" type="submit">Ajouter</button>

            <?php if (!empty($_GET['id'])) : ?>
                <!-- Bouton Supprimer -->
                <button class="btn btn-danger w-100 mt-10 py-2 " type="submit" name="action" value="deleteMovie">Supprimer le film</button>
            <?php endif; ?>
        </form>

        
    </div>
    
</div>


<?php get_footer('admin'); ?>