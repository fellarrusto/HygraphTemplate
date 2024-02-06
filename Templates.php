<?php

function getProjectTemplate($title, $img, $content) {
    ob_start(); // Avvia l'output buffering
    ?>
    <style>
        .project-card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 300px;
            border-radius: 5px;
            display: inline-block;
            margin: 10px;
        }

        .project-card img {
            width: 100%;
            border-radius: 5px 5px 0 0;
        }

        .project-card-container {
            padding: 2px 16px;
        }

        .project-card-title {
            font-size: 18px;
            margin: 10px 0;
        }

        .project-card-content {
            color: #333;
        }
    </style>

    <div class="project-card">
        <?php if ($img): ?>
            <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($title) ?>">
        <?php endif; ?>
        <div class="project-card-container">
            <h2 class="project-card-title"><?= htmlspecialchars($title) ?></h2>
            <p class="project-card-content"><?= nl2br(htmlspecialchars($content)) ?></p>
        </div>
    </div>
    <?php
    return ob_get_clean(); // Restituisce l'output e termina l'output buffering
}