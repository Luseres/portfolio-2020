<div class="footer">
    <div class="footer__menu" id="mobilemenu">
        <div class="footer__menu__top"> 
            <a href="/#section_intro"><img class="footer__menu__top__icon" src="/public/images/other/logo.svg" alt="Website icon"></a>
            <p class="footer__menu__top__title"><?= _e($config['author']['name']) ?></p>
        </div>
        <ul class="footer__menu__list">
                <li class="footer__menu__list__link__item"><a class="footer__menu__list__link" href="/#section_intro">Home</a></li>
                <li class="footer__menu__list__link__item"><a class="footer__menu__list__link" href="/#section_about">About</a></li>
                <li class="footer__menu__list__link__item"><a class="footer__menu__list__link" href="/#section_skills">Skills</a></li>
                <li class="footer__menu__list__link__item"><a class="footer__menu__list__link" href="/#section_portfolio">Portfolio</a></li>
        </ul>
    </div>
    <div class="footer__header">
        <ul class="footer__header__list">
            <li class="footer__header__list__link"><a class="footer__header__list__link__item style__button style__button--cta" href="/contact">Contact</a></li>
            <li class="footer__header__list__link footer__header__list__link--hideonsmall"><a class="footer__header__list__link__item footer__header__list__link__item--hideonsmall" href="/#section_about">About</a></li>
            <li class="footer__header__list__link footer__header__list__link--hideonsmall"><a class="footer__header__list__link__item footer__header__list__link__item--hideonsmall" href="/#section_skills">Skills</a></li>
            <li class="footer__header__list__link footer__header__list__link--hideonsmall"><a class="footer__header__list__link__item footer__header__list__link__item--hideonsmall" href="/#section_portfolio">Portfolio</a></li>
            <li id="hamburgermenu" class="footer__header__list__link__item footer__header__list__link__item--hideonbig"><img src="/public/images/other/dropdown.svg" alt="Dropdown menu"></li>
        </ul>
    </div>
</div>
<script>
    
    const hamburger_menu = document.getElementById('hamburgermenu');
    const mobile_menu = document.getElementById('mobilemenu');
    const mobile_menu_links = document.getElementById('mobilemenu').querySelectorAll("a");
    let menu_open = false;

    hamburger_menu.addEventListener("click", function() {
        if(menu_open) {
            mobile_menu.style.transform = "translateY(100vh)"
            setTimeout(() => {  mobile_menu.style.display = "none"; }, 410);
            menu_open = false;
        } else {
            mobile_menu.style.display = "block"
            setTimeout(() => {  mobile_menu.style.transform = "translateY(0)"; }, 410);
            menu_open = true;
        }
    })

    for (let i = 0; i < mobile_menu_links.length; i++) {
        const menu_link = mobile_menu_links[i];
        menu_link.addEventListener("click", function() {
            mobile_menu.style.transform = "translateY(100vh)"
            setTimeout(() => {  mobile_menu.style.display = "none"; }, 410);
            menu_open = false;
        })
    }


</script>
</body>

</html>