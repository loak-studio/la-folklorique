window.addEventListener("load", function () {
    const button = document.querySelector("[data-mobile-navigation-button]");
    const close = document.querySelector("[data-mobile-navigation-close]");
    const nav = document.querySelector("[data-mobile-navigation]");
    const banner = document.querySelector("#banner");
    button.addEventListener("click", () => {
        nav.classList.remove("-translate-x-[2000px]");
        banner?.classList.add("hidden");
    });
    close.addEventListener("click", () => {
        nav.classList.add("-translate-x-[2000px]");
        banner?.classList.remove("hidden");
    });
});
