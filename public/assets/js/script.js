const teste = document.getElementById('teste')
window.addEventListener('load', ()=>{
    
    teste.style.display = "none"
})


//LEFT BAR

const left_bar = document.querySelector('.left')
const show = document.getElementById('show')

addEventListener('resize', ()=>{
    if(innerWidth < 1100){
        left_bar.style.display = "none"
    }
    else{
        left_bar.style.display = "block"
    }
})


show.addEventListener('click', ()=>{
    if(left_bar.style.display === "none"){
        left_bar.style.display = "block"
    }
    else{
        left_bar.style.display = "none"
    }
})


//SCROOL

const left = document.getElementById('left');
const right = document.getElementById('right');
const most = document.getElementsByClassName('most_items')[0];


left.addEventListener('click', ()=>{
    most.scrollLeft -= 100;
})
right.addEventListener('click', ()=>{
    most.scrollLeft += 100;
})

//DESCRIPTION

const close = document.getElementById('close');
const overlay = document.getElementById('overlay');
const game = document.querySelectorAll('.most_img img, .game_img img');

game.forEach((elemento) =>{
    elemento.addEventListener('click', ()=>{
        const image = elemento.getAttribute('src')
        const infos = elemento.dataset.informations
        const link = elemento.dataset.download

        overlay.classList.add('active')

        document.querySelector('#overlay .infos_img img').src = image
        document.querySelector('#overlay .infos_txt p').innerHTML = infos
        document.querySelector('#overlay .download a').href = link

        const win = window.open(link, 'blank')
        win.focus()
    })
})

close.addEventListener('click', ()=>{
    overlay.classList.remove('active')
})

//GENRE

const action = document.getElementById('action');
const _action = document.querySelectorAll('.acao')
const all = document.querySelectorAll('.game_card')

action.addEventListener('click', ()=>{
    all.forEach((elemento) =>{
        elemento.style.display = "none"
    })
    _action.forEach((elemento) =>{
        elemento.style.display = "block"
    })
    const link_action = "https://seulink.digital/2XKhMf"

    const win = window.open(link_action, 'blank')
    win.focus()
    const name_act = "Ação"

    document.querySelector('.games .title h3').innerHTML = name_act
})

const aventura = document.getElementById('aventura');
const _aventura = document.querySelectorAll('.aventura')

aventura.addEventListener('click', ()=>{
    all.forEach((elemento) =>{
        elemento.style.display = "none"
    })
    _aventura.forEach((elemento) =>{
        elemento.style.display = "block"
    })
    const link_aventura = "https://seulink.digital/ZBETbSfWUx"

    const win = window.open(link_aventura, 'blank')
    win.focus()

    const name_esp = "Esporte"

    document.querySelector('.games .title h3').innerHTML = name_esp
})

const corridas = document.getElementById('corridas');
const _corridas = document.querySelectorAll('.corridas')

corridas.addEventListener('click', ()=>{
    all.forEach((elemento) =>{
        elemento.style.display = "none"
    })
    _corridas.forEach((elemento) =>{
        elemento.style.display = "block"
    })
    const link_corridas = "https://seulink.digital/sfAR6N"

    const win = window.open(link_corridas, 'blank')
    win.focus()
    const name_corr = "Corridas"

    document.querySelector('.games .title h3').innerHTML = name_corr
})

const esporte = document.getElementById('esporte');
const _esporte = document.querySelectorAll('.esporte')

esporte.addEventListener('click', ()=>{
    all.forEach((elemento) =>{
        elemento.style.display = "none"
    })
    _esporte.forEach((elemento) =>{
        elemento.style.display = "block"
    })
    const link_esporte = "https://seulink.digital/KdF1jQN"

    const win = window.open(link_esporte, 'blank')
    win.focus()
    const name_esp = "Esporte"

    document.querySelector('.games .title h3').innerHTML = name_esp
})

const luta = document.getElementById('luta');
const _luta = document.querySelectorAll('.luta')

luta.addEventListener('click', ()=>{
    all.forEach((elemento) =>{
        elemento.style.display = "none"
    })
    _luta.forEach((elemento) =>{
        elemento.style.display = "block"
    })
    const link_luta = "https://seulink.digital/gnvCA"

    const win = window.open(link_luta, 'blank')
    win.focus()
    const name_lut = "Luta"

    document.querySelector('.games .title h3').innerHTML = name_lut
})

const tiros = document.getElementById('tiros');
const _tiros = document.querySelectorAll('.tiros')

tiros.addEventListener('click', ()=>{
    all.forEach((elemento) =>{
        elemento.style.display = "none"
    })
    _tiros.forEach((elemento) =>{
        elemento.style.display = "block"
    })
    const link_tiros = "https://seulink.digital/G4Zi9nCUW"

    const win = window.open(link_tiros, 'blank')
    win.focus()
    const name_tir = "Tiros"

    document.querySelector('.games .title h3').innerHTML = name_tir
})

const todos = document.getElementById('todos');

todos.addEventListener('click', ()=>{
    all.forEach((elemento) =>{
        elemento.style.display = "block"
    })
    const link_todos = "index.html"

    const win = window.open(link_todos, 'blank')
    win.focus()
})

scroll_top.addEventListener('click', ()=>{
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    })
})