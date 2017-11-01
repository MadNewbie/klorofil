var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    ajax("GET","/species_type/retrieve",null,injectSpeciesTypes,null);
},100);

function startAdd(event){
    var name = document.getElementById('name').value;
    var species_type_id = document.getElementById('drp_species_type').selectedOptions[0].value;
    var datas = {'name':name,'species_type_id':species_type_id};
    ajax("POST","/disease_type/create",datas,newDiseaseTypeCreated,[event]);
}

function newDiseaseTypeCreated(params,success,responseObj){
    if(success){
        showNotif('Suksess','success',responseObj.message);
    }
}

function injectSpeciesTypes(params,success,responseObj){
    var drp_species_type = document.getElementById("drp_species_type");
    var species_type = responseObj.species_type;
    $(drp_species_type).append($('<option>',{
        text: 'Jenis Spesies',
        hidden:''
    }));
    if(success){
        for(i=0;i<species_type.length;i++){
            $(drp_species_type).append($('<option>',{
                text: species_type[i].species_type_name,
                value: species_type[i].id
            }));
        }
    }
}