window.addEventListener("load", function () {
    const img = document.querySelectorAll('img[src="/assets/confetti.svg"]');
    if (img.length > 0) {
        window.addEventListener("scroll", (e) => {
            console.log(window.innerWidth);
            img.forEach((i) => {
                i.style.transform = `translateY(${
                    (-window.scrollY / window.innerHeight) *
                    (window.innerWidth > 768 ? 100 : 20)
                }px)`;
            });
        });
    }
});
