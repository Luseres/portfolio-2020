<?php
    $found = false;
    $projects = get_projects();
    foreach ($projects as $e_project) {
        if(format_permalink($e_project['name']) == $project) {
            $project = $e_project;
            $found = true;
        }
    }
    if(!$found) {
        header("Location: /projects");
        exit();
    }
    $links = get_links($project['id']);
    $team = get_team($project['id']);
    $activities = get_activities($project['id']);
?>
<div class="section project" id="section_project">
    <div class="project__main">
        <h1 class="project__main__name"><?= _e($project['name']) ?></h1>
        <p class="project__main__description"><?= $project['description'] ?></p>
        <img class="project__main__image" src="data:image/jpeg;base64,<?= _e($project['preview_image']) ?>" alt="<?= _e($project['name']) ?> Preview">
    </div>
    <div class="project__sidebar">
        <p class="project__sidebar__title">The team:</p>
        <?php
            foreach ($team as $member) {
        ?>
        <a class="style__nolink" href="<?= _e($member['team_portfolio']) ?>" target="_blank">
            <div class="project__sidebar__member">
                <img src="data:image/jpeg;base64,<?= _e($member['team_image']) ?>" alt="Picture of <?= _e($member['team_member']) ?>" class="project__sidebar__member__image">
                <div>
                    <p class="project__sidebar__member__name"><?= _e($member['team_member']) ?></p>
                    <p class="project__sidebar__member__task"><?= _e($member['team_task']) ?></p>
                </div>
            </div>
        </a>
        <?php
            }
        ?>
        <p class="project__sidebar__title">Activities:</p>
        <p class="project__sidebar__activities">Front-end developer, UX Design, Back-end Development, Evole & Growth</p>
        <?php
            if(sizeof($links) > 0) {
                ?>
                <p class="project__sidebar__title">Links:</p>
                <?php
            }
            foreach ($links as $link) {
        ?>
        <a href="<?= _e($link['external_url']) ?>" rel="noreferrer" target="_blank" class="style__nolink project__sidebar__link"><?= _e($link['name']) ?> (External)</a>
        <?php
            }
        ?>
    </div>
</div>