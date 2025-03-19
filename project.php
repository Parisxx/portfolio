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
        </div>

        <?php if (!empty($project['link'])): ?>
            <p class="link"><a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank"><?php echo htmlspecialchars($project['link']); ?></a></p>
        <?php endif; ?>
    </div>

        
        <!-- Documents -->

    <div class="document">
        <h2 class="title">Documentatie</h2>

        <div class="card-container">
            <?php foreach ($project_documents as $document): ?>
                <div class="card">
                    <a href="src/documents/<?php echo htmlspecialchars($document['documents']); ?>" target="_blank" class="card-link">
                        <h3 class="card-title"><?php echo htmlspecialchars($document['title']); ?></h3>
                        <p class="card-description"><?php echo htmlspecialchars($document['description']); ?></p>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>

                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

        <!-- Footer -->

        <footer class="footer">
        <div class="footer-section">
            <h3>Paris Stassen</h3>
            <p><a href="mailto:parisstassen@gmail.com">Parisstassen@gmail.com</a></p>
            <p>06 2485 1790</p>
        </div>
    
        <div class="footer-section">
            <h3>Pagina’s</h3>
            <p><a href="#about_me">Over mij</a></p>
            <p><a href="#portfolio">Portfolio</a></p>
        </div>
    
        <div class="footer-section social">
            <h3>Social media</h3>
            <div class="social-container">
                <div class="social-icons">
                    <a href="https://www.linkedin.com/in/paris-stassen-7067b7223/"><img src="src\images\linkedin.png" alt="LinkedIn"></a>
                    <a href="https://www.instagram.com/parisx217/"><img src="src\images\instagram.png" alt="Instagram"></a>
                    <a href="https://github.com/Parisxx?tab=overview&from=2025-02-01&to=2025-02-19"><img src="src\images\github.png" alt="GitHub"></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>