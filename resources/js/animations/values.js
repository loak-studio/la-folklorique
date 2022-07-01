import { inView, animate, spring } from "motion";
window.addEventListener("load", function() {
    inView('[data-appear-values]', ({ target }) => {
        const items = target.querySelectorAll('[data-appear-values-item]');
        items.forEach((item, index)=>{
            animate(
                item,
                {
                  y:[100,0],
                },
                { easing: spring(), delay:0.2*index }
              )
        })
    });
})
