import { inView, animate, spring } from "motion";
window.addEventListener("load", function() {
    const items = document.querySelectorAll('[data-animation-opacity]');
    items.forEach((item)=>{
        inView(item, ({ target }) => {
            animate(
                item,
                {
                  opacity:[0,1],
                },
                {duration:1,}
              )
        });
      
    })

})
