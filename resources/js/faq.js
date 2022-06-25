document.addEventListener("turbolinks:load", function() {
    const questionsContainer = document.querySelectorAll('[data-question-container]')

    const initAccordion = (element)=>{
        const answer = element.querySelector('[data-answer]')
        const button = element.querySelector('[data-icon]')
        answer.style.maxHeight='1000px'
        answer.style.marginTop='15px'
        button.firstElementChild.classList.toggle('rotate-90')
    }

    if(questionsContainer.length > 0) {

        initAccordion(questionsContainer[0])
        questionsContainer.forEach(container=>{
            const question = container.querySelector('[data-question]')
            const answer = container.querySelector('[data-answer]')
            const button = container.querySelector('[data-icon]')
            question.addEventListener('click', ()=>{
                closeAllContainer()
                if(answer.style.maxHeight == '0px')
                {
                    answer.style.maxHeight='1000px'
                    answer.style.marginTop='15px'
                }
                else{
                    answer.style.maxHeight='0px'
                    answer.style.marginTop='0px'
                }

                button.firstElementChild.classList.toggle('rotate-90')
            })
        })
    }

    const closeAllContainer = ()=>{
        questionsContainer.forEach(container=>{
            const answer = container.querySelector('[data-answer]')
            const button = container.querySelector('[data-icon]')
            button.firstElementChild.classList.remove('rotate-90')
            answer.style.maxHeight = '0px'
            answer.style.marginTop='0px'
        })
    }


})

