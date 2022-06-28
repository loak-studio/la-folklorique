import { inView, animate, spring } from "motion";
document.addEventListener("turbolinks:load", function() {
    inView('[data-animation-specification-root]', ({ target }) => {
        const bottle = target.querySelector('[data-animation-specification="bottle"]');
        const text = target.querySelector('[data-animation-specification="text"]');
        const image = target.querySelector('[data-animation-specification="image"]');
        animate(
            target,
            {
                opacity:[0,1],
            },
            {duration:.1 }
          )
        animate(
            bottle,
            {
                opacity:[0,1],
                y:[50,0],
            },
            {duration:1, easing: spring(),delay: 1 }
          )
          animate(
            image,
            {
                opacity:[0,1],
                x:[-300,0],
            },
            {duration:1, easing: spring() }
          )
          animate(
            text,
            {
                opacity:[0,1],
                x:[300,0],
            },
            {duration:1, easing: spring() }
          )
    });
})


