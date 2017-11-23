var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    var drp_species_type = document.getElementById('drp_species_type');
    drp_species_type.addEventListener('change',getDiseaseTypeData);
    clearInterval(docReady);
    ajax("GET","/species_type/retrieve",null,injectSpeciesTypes,null);
},100);

function startAdd(event){
    var name = document.getElementById('name').value;
    var weight = document.getElementById('weight').value;
    var disease_type_id = document.getElementById('drp_disease_type').selectedOptions[0].value;
    var datas = {'name':name,'weight':weight,'disease_type_id':disease_type_id};
    ajax("POST",'/disease/create',datas,newDiseaseCreated,[event]);
}

function newDiseaseCreated(params,success,responseObj){
    if(success){
        showNotif('Sukses','success',responseObj.message);
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

function getDiseaseTypeData(event){
    var species_type_id = document.getElementById('drp_species_type').selectedOptions[0].value;
    ajax('GET','/disease_type/retrieve/'+species_type_id,null,injectDiseaseType,null);
}

function injectDiseaseType(params,success,responseObj){
    var drp_disease_type = document.getElementById('drp_disease_type');
    var disease_type = responseObj.disease_type;
    drp_disease_type.disabled = false;
    drp_disease_type.innerHTML = "";
    $(drp_disease_type).append($('<option>',{
        text:'Jenis Penyakit',
        hidden:''
    }));
    if(success){
        for(i=0;i<disease_type.length;i++){
            $(drp_disease_type).append($('<option>',{
                text:disease_type[i].name,
                value:disease_type[i].id
            }));
        }
    }
}