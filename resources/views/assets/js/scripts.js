function cahngeRouteDelete(id){
    document.getElementById('link_delete').href = '/categoria/delete/'+id;
    
}

async function changeValues(id,route,limit){
    
    const data = await fetch(route,{
        method: 'POST',
        headers: {"Content-type": "application/json;charset=UTF-8"},
        body: JSON.stringify({limit:limit})
    });

    const response = await data.json();

    let select = document.getElementById(id);

    select.innerHTML = '';

    if(response.status){
        select.options[select.options.length] = new Option('Selecione uma opção...', '');
        for (const item of response.data) {
            select.options[select.options.length] = new Option(item.name, item.id);
        }
    }else{
        select.options[select.options.length] = new Option('Nenhum registro encontrado...', '');
    }
    
}

async function inputSelect(id,route,load,input){

    console.log('entrou');

    let div = document.getElementById('div_'+id);

    div.innerHTML = `<ul class="dropdown-menu hide " style="top: 90%;z-index:99999; border:3px solid #1F8EF3; border-top:1px solid #ced4da;" id="busca_category"></ul>
    <input type="hidden" name="${id}" id="cod_category" value="${load}">`;

    const data = await fetch(route,{
        method: 'POST',
        headers: {"Content-type": "application/json;charset=UTF-8"},
        body: JSON.stringify({value: input.value,limit:10})
    });

    const response = await data.json();

    $('#busca_'+id).empty();

    console.log(response);

    if(response.status && response.data.length > 0){

        $('#busca_'+id).attr('class','dropdown-menu show col-12');
        for (const item of response.data) {
            $('#busca_'+id).append(`<li class="dropdown-item"> <div class="col-12 d-flex justify-content-between align-items-center pe-auto" onclick="searchValues('${id}',${item.id},'${item.name}')">   <a href="#" class="pe-auto">${item.name}</a>   </div>     </li>`); 
        }

    }else{
        $('#busca_'+id).attr('class','dropdown-menu show col-12');
        console.log('entrou else');
        $('#busca_'+id).append('<li class="dropdown-item"> <div class="col-12 d-flex justify-content-between align-items-center pe-auto"> Nenhum registro encontrado...</div></li>');
        
    }
    
}

function searchValues(input,id,name){

    let text = document.getElementById(input);  
    let hidden = document.getElementById('cod_'+input);
    let busca = document.getElementById('busca_'+input);

    text.value = name;
    hidden.value = id;
    busca.setAttribute("class","dropdown-menu hide col-12");

}


function emptySearch(input){
    if(input.value == ''){
    let busca = document.getElementById('busca_'+input.id);
    busca.setAttribute("class","dropdown-menu hide col-12");
    document.getElementById(input.id).value = '';
    }
}

