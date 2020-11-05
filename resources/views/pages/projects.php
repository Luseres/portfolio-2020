<div class="section portfolio projects-page" id="section_portfolio">
    <h1 class="portfolio__title style__title">Projects</h1>
    <div class="portfolio__projects">
        <?php
        $projects = get_projects();
        foreach ($projects as $project) {
            ?>
            <a href="/project/<?= _e(format_permalink($project['name'])) ?>" class="style__nolink">
                <div class="portfolio__projects__project">
                    <img class="portfolio__projects__project__image" src="data:image/jpeg;base64,<?= _e($project['preview_image']) ?>" alt="<?= _e($project['name']) ?> Preview">
                    <div class="portfolio__projects__project__overlay">
                        <p class="portfolio__projects__project__overlay__tags"><?= _e($project['tags']) ?></p>
                        <p class="portfolio__projects__project__overlay__title"><?= _e($project['name']) ?></p>
                        <hr class="portfolio__projects__project__overlay__stripe">
                    </div>
                    <div class="portfolio__projects__project__info">
                        <p class="portfolio__projects__project__info__title"><?= _e($project['name']) ?></p>
                        <hr class="portfolio__projects__project__info__stripe">
                        <p class="portfolio__projects__project__info__click">Click to learn more</p>
                    </div>
                </div>
            </a>
            <?php
        }
        ?>
    </div>
</div>
<script src="/resources/js/project_overlay.js"></script>