<?php
// All functions for CRUD

/**
 * Add movie in database
 */
function addMovie():bool
{
    global $db;

    $data = [
        'title' => $_POST['title'],
		'slug' => renameFile($_POST['title']), 
        'duration' =>$_POST['duration'],
	    'release_date' =>$_POST['release_date'],
	    'director' =>$_POST['director'],
	    'casting' =>$_POST['casting'],
	    'synopsis' =>$_POST['synopsis'],
	    'notePress' =>$_POST['notePress'],
        'photo'=>$_FILES['photo']['name']
        // 'role_id'=> 1
	];

	// Récupérer les catégories sélectionnées
    $selectedCategories = isset($_POST['categories']) ? $_POST['categories'] : [];

    try {
        $sql = 'INSERT INTO movies (title,slug,duration,release_date,director,casting,synopsis,notePress,photo) 
        VALUES (:title,:slug,:duration,:release_date,:director,:casting,:synopsis,:notePress,:photo)';
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

/**
 * Retrieve movie details from the database based on the provided ID.
 *
 * @return array|null Returns an associative array representing the movie details if found,
 *                    or null if no movie with the specified ID is found.
 */
function getMovies(){
    global $db;

    try {
      $sql = 'SELECT * FROM movies WHERE id = :id';
      $query = $db->prepare($sql);
      $query->execute(['id' => $_GET['id']]);
      
      return $query->fetch();  
    } catch (PDOException $e){
        if($_ENV['DEBUG'] == 'true'){
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard');
        }
    }
    
}

/**	
 * Upload file
 * 
 * @param string $path to save file
 * @param string $field name of input type file 
 */
function uploadFile(string $path, string $field, array $exts = ['jpg', 'png', 'jpeg'], int $maxSize = 2097152): string
{
	// Check submit form with post method
	if (empty($_FILES)) :
		return '';
	endif;
	
	// Check exit directory if not create
	if (!is_dir($path) && !mkdir($path, 0755)) :
		return 'Impossible d\'importer votre fichier.';
	endif;

	// Check not empty input file
	if (empty($_FILES[$field]['name'])) :
		return 'Merci d\'uploader un fichier';
	endif;
	
	// Check exts
	$currentExt = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
	$currentExt = strtolower($currentExt);
	if (!in_array($currentExt, $exts)) :
		$exts = implode(', ', $exts);
		return 'Merci de charger un fichier avec l\'une de ces extensions : ' . $exts . '.';
	endif;

	// Check no error into current file
	if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) :
		return 'Merci de sélectionner un autre fichier.';
	endif;

	// Check max size current file
	if ($_FILES[$field]['size'] > $maxSize) :
		return 'Merci de charger un fichier ne dépassant pas cette taille : ' . formatBytes($maxSize);
	endif;

	// $path = '../image/posters';
	$filename = pathinfo($_FILES[$field]['name'], PATHINFO_FILENAME);
	$filename = renameFile($filename);
	$targetToSave = $path . '/' . $filename . '.' . $currentExt; // élement à modifier pour le chemin de l'image
	
	if(move_uploaded_file($_FILES[$field]['tmp_name'], $targetToSave)) :
		return 'Super !';
	endif;

	return '';
} 


function formatBytes($size, $precision = 2) {
	$base     = log($size, 1024);
	$suffixes = ['', 'Ko', 'Mo', 'Go', 'To'];

	return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}


function renameFile(string $name) {
	$name = trim($name);
	$name = strip_tags($name);
	$name = removeAccent($name);
    $name = preg_replace('/[\s-]+/', ' ', $name);  // Clean up multiple dashes and whitespaces
	$name = preg_replace('/[\s_]/', '-', $name); // Convert whitespaces and underscore to dash
	$name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
	$name = strtolower($name);
	$name = trim($name, '-');

	return $name;
}


function removeAccent($string) {
	$string = str_replace(
		['à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'], 
		['a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'], 
		$string
	);
	return $string;
}



