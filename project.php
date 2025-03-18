<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM projects");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM project_documents");
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
    <link rel="icon" type="image/x-icon" href="src\images\profile.jpg">

</head>
<body>

    <!-- Header -->

    <header class="header">
        <h1 class="logo">Paris Stassen</h1>
        <nav class="nav">
            <a href="index.php#about_me">Over mij</a>
            <a href="#">Portfolio</a>
        </nav>
    </header>



    <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?php echo htmlspecialchars($project['project_id']); ?></td>
                    <td><?php echo htmlspecialchars($project['title']); ?></td>
                    <td><?php echo htmlspecialchars($project['about']); ?></td>
                    <td><?php echo htmlspecialchars($project['image']); ?></td>
                </tr>
            <?php endforeach; ?>




    
    
    
</body>
</html>