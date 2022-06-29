document.addEventListener('fireProductAdded', event => {
    document.querySelector('#success').classList.remove('opacity-0')
    setTimeout(()=>{
        document.querySelector('#success').classList.add('opacity-0')
    }, 5000)
})


