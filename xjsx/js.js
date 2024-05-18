document.addEventListener('DOMContentLoaded', function(){
    const niper = document.querySelector('#cont-niper');

    setTimeout(function(){
        niper.style.display = 'none';
    }, 3000)
})

document.addEventListener('DOMContentLoaded', function(){
    const xjsx = document.querySelector('#xjsx');
    const js2 = document.querySelector('#js2');
    const err = document.querySelector('#err');

    xjsx.addEventListener('submit', e => {
        e.preventDefault();
        if(js2.value.trim().length === 0){
          err.innerHTML = "Este campo es obligatorio";
          return;

        }else if(js2.value.trim().length <= 4){
            err.innerHTML = "Campo invalido";
            return;

        }
        xjsx.submit();
    })
})