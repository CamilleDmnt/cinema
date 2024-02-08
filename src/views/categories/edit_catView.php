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

    <div class="form-floating mb-4" >

        <h1>Ajouter une catégorie</h1>

            <form action="" method="post">
                <label for="category">Nom de la catégorie :</label>
                <input type="text" id="category" name="category" required>
                <button type="submit">Ajouter</button>
            </form>

    </div>


</div>