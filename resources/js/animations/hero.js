import { inView, animate, spring } from "motion";
window.addEventListener("load", function () {
    const hero = this.document.querySelector("#hero");
    const itemsRight = hero.querySelectorAll(".leafRight");
    const itemsLeft = hero.querySelectorAll(".leafLeft");
    itemsRight.forEach((item, index) => {
        animate(
            item,
            {
                rotate: [-30, 0 + index * 20],
            },
            { duration: 1 }
        );
    });
    itemsLeft.forEach((item, index) => {
        animate(
            item,
            {
                rotate: [30, 5 - index * 20],
            },
            { duration: 1 }
        );
    });
});
