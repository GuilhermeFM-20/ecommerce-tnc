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

function searchValues(id,route){

    var script = document.createElement('script');
    let select = document.getElementById(id);

    select.options[select.options.length] = new Option('', '');
    script.innerHTML = "$.ajax({url: '"+route+"',method: 'POST', dataType: 'json', success: function (data) { const newArray = data.data.map(item => { return { id: item.id, text: item.name,};});console.log(newArray);$('#"+id+"').select2({data: newArray,placeholder: 'Selecione uma opção...'});}});";
    
    document.body.appendChild(script);

}