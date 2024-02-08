<?php
/**
 * Add category in database
 */
function addCat():bool
{
    global $db;

    $data = [
        'category' => $_POST['category'],
        'role_id'=> 1
	];

    try {
        $sql = 'INSERT INTO categories (category) VALUES (:category)';
        $query = $db->prepare($sql);
        $query->execute ($data); 

		// Récupérer l'ID du film nouvellement inséré
		$movieId = $db->lastInsertId();

		// Insérer les catégories dans la table de jointure movie_categories
        foreach ($selectedCategories as $category) {
            $sqlCategory = 'INSERT INTO movie_categories (movie_id, category_id) VALUES (:movie_id, :category_id)';
            $queryCategory = $db->prepare($sqlCategory);
            $queryCategory->execute(['movie_id' => $movieId, 'category_id' => $category]);
		}

    } catch (PDOException $e) {
        dump($e->getMessage());
		throw $e; // Propagate the exception
    }
    return true;
}

/**
 * Update movie w/ same id
 */
function updateMovie()
{
    global $db;
    $data = [
        'title' => $_POST['title'], 
        'duration' =>$_POST['duration'],
	    'release_date' =>$_POST['release_date'],
	    'director' =>$_POST['director'],
	    'casting' =>$_POST['casting'],
	    'synopsis' =>$_POST['synopsis'],
	    'notePress' =>$_POST['notePress'],
        'categories'=>$_POST['categories'],
        'photo'=>$_FILES['photo']['name'],
        'id'=> $_GET['id'] //modifier les infos avec le même id
    ];
	

	try {
        $sql = 'UPDATE movies SET title = :title, duration = :duration, release_date = :release_date, director = :director,
                casting = :casting, synopsis = :synopsis, notePress = :notePress, categories = :categories, photo = :photo
                WHERE id = :id';

        $query = $db->prepare($sql);
        $query->execute($data);
    } catch (PDOException $e) {
        dump($e->getMessage());
        throw $e; // Propagate the exception
    }


}



/**
 * Delete movie with id
 */
function deleteMovie ()
{
    try {
        global $db;
        $sql = 'DELETE FROM movies WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' =>$_GET['id']]);
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}