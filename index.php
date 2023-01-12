<?php
// Initialise une session
session_start();

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données du formulaire
    $title = $_POST['title'];

    // Vérifie si les données ont été saisies
    if (!empty($title)) {
        // Ajoute la tâche au tableau des tâches
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = array();
        }
        $_SESSION['tasks'][] = $title;
    }
}

// Récupère les tâches à partir de la session
$truc = isset($_SESSION['tasks']) ? $_SESSION['tasks'] : array();
?>
<!DOCTYPE html>
<html>
<head>
<?php echo '<link rel="stylesheet" type="text/css" href="style.css">'; ?>
<link rel="stylesheet" type="text/css" href="style.css">
    <title>To Do List</title>
</head>
<body>
<header>
    <nav>
	<h1>To Do List</h1>
    </nav>
 </header>
    
	
    <form method="post" action=" ">
        <label for="title">A Faire:</label>
        <input type="text" id="title" name="title">
        <br>
        <input type="submit" value="Ajouter a la liste">
    </form>
    <h2>Tasks</h2>
    <ul>
        <?php
        // Affiche les tâches
        foreach ($truc as $truc) {
            echo '<li>' . $truc . '</li>';
        }
        ?>
    </ul>
</body>
</html>