<!DOCTYPE html>
<!--[if lt IE 9]> 
<html xml:lang="<?= _e($config['site']['lang']) ?>" lang="<?= _e($config['site']['lang']) ?>" xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie9" lang="<?= _e($config['site']['lang']) ?>">
   <![endif]--><!--[if lt IE 10]> 
   <html xml:lang="<?= _e($config['site']['lang']) ?>" lang="<?= _e($config['site']['lang']) ?>" xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie10" lang="<?= _e($config['site']['lang']) ?>">
      <![endif]--><!--[if (gte IE 9)]><!-->
      <html xml:lang="<?= _e($config['site']['lang']) ?>" lang="<?= _e($config['site']['lang']) ?>" xmlns:fb="http://ogp.me/ns/fb#" lang="<?= _e($config['site']['lang']) ?>">
         <!--<![endif]-->

<head>
    <title><?= _e($config['author']['name']) ?> • <?= _e(ucwords(str_replace("-", " ", $page))) ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?= _e($config['site']['description']) ?>" />
    <meta name="keywords" content="<?= _e(implode (", ", $config['site']['keywords'])) ?>" />
    <meta name="author" content="<?= _e($config['author']['name']) ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="<?= _e($config['site']['color']) ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel="canonical" href="https://<?= $_SERVER['HTTP_HOST'] ?>" />
    <link rel='manifest' href='/manifest.json' />
    <meta name="copyright" content="<?= _e($config['author']['name']) ?>" />
    <meta name="language" content="<?= _e($config['site']['lang']) ?>" />
    <meta name="reply-to" content="<?= _e($config['contact']['email']) ?>" />
    <meta name="web_author" content="<?= _e($config['author']['name']) ?>" />

    <meta property="og:locale" content="<?= _e($config['site']['lang_code']) ?>" />
    <meta property="og:title" content="<?= _e($config['author']['name']) ?> • <?= _e(ucwords(str_replace("-", " ", $page))) ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="/public/images/other/primary_img.jpg" />
    <meta property="og:url" content="<?= _e($config['site']['live_url']) ?>" />
    <meta property="og:description" content="<?= _e($config['site']['live_url']) ?>" />
    <meta property="og:site_name" content="<?= _e($config['author']['name']) ?> • <?= _e(ucwords(str_replace("-", " ", $page))) ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:image" content="/public/images/other/primary_img.jpg" />
    <meta name="twitter:title" content="<?= _e($config['author']['name']) ?> • <?= _e(ucwords(str_replace("-", " ", $page))) ?>" />
    <meta name="twitter:description" content="<?= _e($config['site']['live_url']) ?>" />
    <meta name="twitter:site" content="<?= _e($config['site']['live_url']) ?>" />
    <link rel="stylesheet" href="/resources/sass/style.css" />

    <meta name='msapplication-TileColor' content='<?= _e($config['site']['color']) ?>' />
    <meta name="google" content="notranslate" />

    <link rel="apple-touch-icon" sizes="57x57" href="/public/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/public/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/public/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/public/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/public/images/icons/apple-icon-180x180.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/public/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/public/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/public/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/public/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/public/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/public/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/public/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="/public/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/public/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/public/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/images/icons/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="/public/images/icons/ms-icon-144x144.png" />
    <meta name="msapplication-square310x310logo" content="/public/images/icons/logo.svg" />
    <link rel="mask-icon" href="/public/images/icons/logo.svg" color="#292A2E">

    <?php
        if($name !== "project" && $name !== "404") {
    ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "<?= _e(ucwords(str_replace("-", " ", $page))) ?>",
            "publisher": {
                "@type": "Person",
                "name": "<?= _e($config['author']['name']) ?>"
            }
        }
    </script>
    <?php
        }
    ?>
    <script type="application/ld+json"> 
    { 
        "@context": "http://schema.org", 
        "@type": "Person", 
        "@id": "<?= _e($config['site']['live_url']) ?>", 
        "name": "<?= _e($config['author']['name']) ?>", 
        "email": "<?= _e($config['contact']['email']) ?>", 
        "description": "<?= _e($config['site']['description']) ?>", 
        "image": "<?= _e($config['site']['live_url']) ?>/public/images/other/primary_img.jpg", 
        "gender": "http://schema.org/Male", 
        "url": "<?= _e($config['site']['live_url']) ?>", 
        "knows": "<?= _e(implode (", ", $config['author']['knowledge'])) ?>", 
        "sameAs": [
            "https://instagram.com/joshua_vdpoll/", 
            "https://www.facebook.com/joshua.vanderpoll.5", 
            "https://www.facebook.com/Joshua-van-der-Poll-109904557120548/", 
            "https://www.linkedin.com/in/joshuavdpoll/", 
            "https://www.instagram.com/joshua_vdpoll/", 
            "https://twitter.com/Luseres_", 
            "https://www.youtube.com/channel/UCP05TkaljaRlHfhSzIUtGIw" 
        ] 
    } 
    </script>
</head>

<body>
    <div class="header">
        <div>
            <a href="/#section_intro"><img class="header__icon" src="/public/images/other/logo.svg" alt="Website favicon">
            <p class="header__title style__nolink"><?= _e($config['author']['name']) ?></p></a>
        </div>
        <div></div>
        <div class="header__navigation">
            <ul class="header__navigation__list">
                <li class="header__navigation__list__link"><a class="header__navigation__list__link__item" href="/#section_about">About</a></li>
                <li class="header__navigation__list__link"><a class="header__navigation__list__link__item" href="/#section_skills">Skills</a></li>
                <li class="header__navigation__list__link"><a class="header__navigation__list__link__item" href="/#section_portfolio">Portfolio</a></li>
                <li class="header__navigation__list__link"><a class="header__navigation__list__link__item style__button style__button--cta" href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>