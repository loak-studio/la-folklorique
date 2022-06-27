document.addEventListener("turbolinks:load", function() {
    const button = document.querySelector('[data-mobile-navigation-button]')
    const close = document.querySelector('[data-mobile-navigation-close]')
    const nav = document.querySelector('[data-mobile-navigation]')
    button.addEventListener('click',()=>{
        nav.classList.remove('-translate-x-[1000px]')
    })
    close.addEventListener('click',()=>{
        nav.classList.add('-translate-x-[1000px]')
    })
})