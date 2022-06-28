document.addEventListener("turbolinks:load", function() {
    const observer = new IntersectionObserver(entries=> {
        entries.forEach(entry => {
            entry.target.classList.toggle('opacity-0', !entry.isIntersecting)
        })
    })    
    const item = document.querySelectorAll('[data-appear]')

    item.forEach(t=>{
        t.classList.add('opacity-0')
        t.classList.add('transition')
        t.classList.add('duration-1000')
        observer.observe(t)
    })

    const observerValues = new IntersectionObserver(entries=> {
        entries.forEach(entry => {
            entry.target.classList.toggle('translate-y-64', !entry.isIntersecting)
            entry.target.classList.toggle('opacity-0', !entry.isIntersecting)
        })
    })    

    const values = document.querySelector('[data-appear-values]')
    const valuesItems = values.querySelectorAll('[data-appear-values-item]')

    valuesItems.forEach((m,i)=>{

        m.classList.add('opacity-0')
        m.classList.add('translate-y-64')
        m.classList.add('transition')
        m.classList.add('duration-1000')
        if(i== 1){
            m.classList.add('delay-100')
        }
        if(i==2){
            
            m.classList.add('delay-200')
        }
        observerValues.observe(m)
    })
        
    
})

