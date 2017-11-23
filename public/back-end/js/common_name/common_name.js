var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    ajax("GET","/species/retrieve",null,injectScientificName,null);
},100);

function startAdd(event){
    var common_name = document.getElementById('common_name').value;
    var species_id = document.getElementById('drp_scientific_name').selectedOptions[0].value;
    var datas = {'common_name':common_name, 'species_id':species_id}
    ajax("POST","/common_name/create",datas,newCommonNameCreated,event);
}

function newCommonNameCreated(params,success,responseObj){
    if(success){
        showNotif('Sukses','success',responseObj.message);
    }  
}

function injectScientificName(params,success,responseObj){
    var drp_scientific_name = document.getElementById('drp_scientific_name');
    var species = responseObj.species;
    $(drp_scientific_name).append($('<option>',{
        text:'Nama Ilmiah',
        hidden:''
    }));
    if(success){
        for(i=0;i<species.length;i++){
            $(drp_scientific_name).append($('<option>',{
                style: 'font-style: italic',
                text: species[i].scientific_name,
                value: species[i].id
            }));
        }
    }
}