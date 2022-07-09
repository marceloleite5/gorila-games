const submit = document.getElementById('submit');
submit.disabled = true

function validation(){
    const indicador = document.getElementById('indicador');
    const email = document.getElementById('email').value;
    const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/


    if(email.match(pattern)){
        indicador.classList.add('bi-check-circle-fill')
        indicador.classList.remove('bi-x-circle-fill')
        indicador.style.color = "green"
        submit.disabled = false
        submit.style.cursor = "pointer"
        submit.style.color = "white"
        submit.style.background = "#e46333"
    }
    else{
        indicador.classList.remove('bi-check-circle-fill')
        indicador.classList.add('bi-x-circle-fill')
        indicador.style.color = "red"
        submit.disabled = true
        submit.style.color = "red"
    }
    if(email === ''){
        indicador.classList.remove('bi-check-circle-fill')
        indicador.classList.remove('bi-x-circle-fill')
    }

}

const scroll_top = document.querySelector('.scroll');

window.addEventListener('scroll', ()=>{
    scroll_top.classList.toggle('active', window.scrollY > 1000)
})
