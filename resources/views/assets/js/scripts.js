

async function changeValues(id,route,valueSelected){
    
    const data = await fetch(route,{
        method: 'POST',
        headers: {"Content-type": "application/json;charset=UTF-8"},
        body: JSON.stringify({limit:10})
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

    if(valueSelected){
        select.value = valueSelected;
    } 

}

async function inputSelect(id,route,input){

    const data = await fetch(route,{
        method: 'POST',
        headers: {"Content-type": "application/json;charset=UTF-8"},
        body: JSON.stringify({value: input.value,limit:10})
    });

    const response = await data.json();

    $('#busca_'+id).empty();

    if(response.status && response.data.length > 0){

        $('#busca_'+id).attr('class','dropdown-menu show col-12');
        for (const item of response.data) {
            $('#busca_'+id).append(`<li class="dropdown-item"> <div class="col-12 d-flex justify-content-between align-items-center pe-auto" onclick="searchValues('${id}',${item.id},'${item.name}')">   <a href="#" class="pe-auto">${item.name}</a>   </div>     </li>`); 
        }

    }else{

        $('#busca_'+id).attr('class','dropdown-menu show col-12');
        $('#busca_'+id).append('<li class="dropdown-item"> <div class="col-12 d-flex justify-content-between align-items-center pe-auto"> Nenhum registro encontrado...</div></li>');
        
    }
    
}

function searchValues(input,id,name){

    console.log('cod_'+input);
   
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

function emptyHidden(input){
  
    let hidden = document.getElementById('cod_'+input.id);
    hidden.value = '';
    
}

