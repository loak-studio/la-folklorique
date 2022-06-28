window.addEventListener('launch-hero-animation', event => {
    const leafs = document.querySelectorAll('[data-leafs]')
    leafs.forEach(leaf=>{
        console.log(leaf.dataset.leafs)
        switch (leaf.dataset.leafs) {
            case '1l':
                leaf.classList.add('leafOneLeft')
                break;
            case '2l':
                leaf.classList.add('leafTwoLeft')
                break;
            case '3l':
                leaf.classList.add('leafThreeLeft')
                break;
            case '1r':
                leaf.classList.add('leafOneRight')
                break;
            case '2r':
                leaf.classList.add('leafTwoRight')
                break;
            case '3r':
                leaf.classList.add('leafThreeRight')
                break;
            default:
                break;
        }
    })
})


