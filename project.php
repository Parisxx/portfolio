<?php
require 'db.php'; 

$project_id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;

if ($project_id <= 0) {
    exit("Invalid project ID.");
}

$stmt = $pdo->prepare("SELECT * FROM projects WHERE project_id = :project_id");
$stmt->execute(['project_id' => $project_id]);
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    exit("Project not found.");
}

$stmt = $pdo->prepare("SELECT * FROM project_documents WHERE project_id = :project_id");
$stmt->execute(['project_id' => $project_id]);
$project_documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="icon" type="image/x-icon" href="src\images\icon.png">

</head>
<body>

    <!-- Header -->

    <header class="header">
        <h1 class="logo">Paris Stassen</h1>
        <nav class="nav">
            <a href="index.php#about_me">Over mij</a>
            <a href="index.php#portfolio">Portfolio</a>
        </nav>
    </header>

    <!-- Project details -->





    <div class="project-details">
    <h2><?php echo htmlspecialchars($project['title']); ?></h2>
    <div class="content">
        <p><?php echo htmlspecialchars($project['about']); ?></p>
        <img src="src/images/<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
        <?php if (!empty($project['link'])): ?>
            <p><a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank"><?php echo htmlspecialchars($project['link']); ?></a></p>
        <?php endif; ?>
    </div>
</div>


        
        
        <h3>Documents</h3>
        <ul>
            <?php foreach ($project_documents as $document): ?>
                <li><a href="src/documents/<?php echo htmlspecialchars($document['documents']); ?>" target="_blank"><?php echo htmlspecialchars($document['documents']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    
</body>
</html>