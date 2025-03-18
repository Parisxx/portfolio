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
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="icon" type="image/x-icon" href="src\images\icon.png">
</head>
<body>

    <!-- Hero section -->
    <div class="hero">
        <div class="hero_overlay">
            <h1 class="hero_title">Paris Stassen</h1>
            <nav class="hero_nav">
                <a href="#about_me">Over mij</a>
                <a href="#portfolio">Portfolio</a>
            </nav>
        </div>
    </div>

    <!-- About me -->
    <div class="about_me">
        <h2 id="about_me" class="title">Over mij</h2>
        <div class="about_content">
            <img src="src/images/profile.jpg" alt="Paris Stassen" class="profile_pic">
            <div class="about_text">
                <p><b>Hi, ik ben Paris!</b> Een softwareontwikkelaar met een creatieve blik op technologie en design.</p>

                <p>Mijn passie ligt bij het ontwikkelen van interactieve en gebruiksvriendelijke applicaties. 
                    Ik vind het geweldig om technologie en design samen te brengen met front-end development en UI/UX-design. 
                    Van strakke interfaces tot intuïtieve gebruikerservaringen – ik zorg ervoor dat software niet alleen 
                    goed werkt, maar ook prettig aanvoelt.</p>

                <p class="about_subtitle">Mijn groei</p>

                <p>Tijdens mijn opleiding was ik eerst geïnteresseerd in back-end development. Maar naarmate ik meer over mezelf en mijn werkstijl leerde, ontdekte ik dat mijn echte passie ligt in front-end en UI/UX-design. 
                    Ik besefte dat goede software niet alleen functioneel moet zijn, 
                    maar ook intuïtief en visueel aantrekkelijk.</p>

                <p>Tijdens mijn stage kreeg ik de kans om deze passie verder te ontwikkelen. 
                    Ik werkte met tools zoals <b>Vue.js, Figma en JavaScript</b>
                    om interfaces te ontwerpen en interactieve elementen te creëren. 
                    Dit gaf me niet alleen technische ervaring, 
                    maar ook een dieper inzicht in hoe gebruikers denken en navigeren.</p>

                <p>Door deze opleiding heb ik niet alleen mijn vaardigheden ontwikkeld, 
                    maar ook geleerd wat écht bij me past.</p>

                    <div>
                        <span>Benieuwd naar mijn werk? Neem een kijkje in mijn portfolio en laten we samenwerken!</span>
                        <a href="#portfolio">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow_icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg> 
                        </a>
                    </div>

            </div>
        </div>
    </div>

    <!-- Portfolio -->
    <div class="portfolio">
        <h2 id="portfolio" class="title">Portfolio</h2>
    
        <div class="slideshow-container">
            <?php foreach ($projects as $project): ?>
                <div class="slide">
                    <a href="project.php?id=<?php echo $project['project_id']; ?>">
                        <img src="src/images/<?php echo $project['front_image']; ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                        <div class="text"><?php echo htmlspecialchars($project['title']); ?></div>
                    </a>
                </div>
            <?php endforeach; ?>
    
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    
        <div class="dots-container">
            <?php for ($i = 0; $i < count($projects); $i++): ?>
                <span class="dot" onclick="currentSlide(<?php echo $i + 1; ?>)"></span>
            <?php endfor; ?>
        </div>
        <script src="script.js"></script>
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