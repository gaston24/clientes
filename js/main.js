const bsas = document.querySelector('#checkBsas');
const rosario = document.querySelector('#checkRosario');
const mardel = document.querySelector('#checkMardel');
const todos = document.querySelector('#checkTodos');

todos.addEventListener('change', function(){
    document.querySelectorAll('#sucursales').forEach(x=>{
        if(todos.checked){
            x.checked = true
        }else{
            x.checked = false
        }
    })
})

bsas.addEventListener('change', function(){
    document.querySelectorAll('#sucursales').forEach(x=>{
        let region = x.getAttribute('region');
        if(bsas.checked){
            if(region == 'AMBA'){
                x.checked = true
            }
        }else{
            x.checked = false
        }
    })
})

rosario.addEventListener('change', function(){
    document.querySelectorAll('#sucursales').forEach(x=>{
        let region = x.getAttribute('region');
        if(rosario.checked){
            if(region == 'ROSARIO'){
                x.checked = true
            }
        }else{
            x.checked = false
        }
    })
})

mardel.addEventListener('change', function(){
    document.querySelectorAll('#sucursales').forEach(x=>{
        let region = x.getAttribute('region');
        if(mardel.checked){
            if(region == 'MARDEL'){
                x.checked = true
            }
        }else{
            x.checked = false
        }
    })
})
