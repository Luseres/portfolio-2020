let projectOverlays = document.querySelectorAll('.portfolio__projects__project__info');
for (let i = 0; i < projectOverlays.length; i++) {
    const element = projectOverlays[i];

    element.addEventListener("mouseover", function(e) {
        const parent = e.target.closest(".portfolio__projects__project");
        console.log(parent.querySelector(".portfolio__projects__project__info"));
        parent.querySelector(".portfolio__projects__project__overlay").style.opacity = 0;
        parent.querySelector(".portfolio__projects__project__info").style.opacity = 1;
        parent.querySelector(".portfolio__projects__project__image").style.opacity = .7;
    });
        element.addEventListener("mouseout", function(e) {
        const parent = e.target.closest(".portfolio__projects__project");
        parent.querySelector(".portfolio__projects__project__overlay").style.opacity = 1;
        parent.querySelector(".portfolio__projects__project__info").style.opacity = 0;
        parent.querySelector(".portfolio__projects__project__image").style.opacity = .3;
    });
}