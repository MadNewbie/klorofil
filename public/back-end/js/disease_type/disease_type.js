var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    var btnAdd = document.getElementById('btnAdd');
    btnAdd.addEventListener('click',startAdd);
    ajax("GET","/admin/species_type/retrieve",null,injectSpeciesTypes,null);
},100);

function startAdd(event){
    var name = document.getElementById('name').value;
    var weight = isNaN(parseFloat(document.getElementById('weight').value))?"":parseFloat(document.getElementById('weight').value.toFixed(1));
    var species_type_id = (document.getElementById('drp_species_type').selectedOptions[0].value==='Jenis Spesies'?"":document.getElementById('drp_species_type').selectedOptions[0].value);
    var datas = {'name':name,'species_type_id':species_type_id,'weight':weight};
    ajax("POST","/admin/disease_type/create",datas,newDiseaseTypeCreated,[event]);
}

function newDiseaseTypeCreated(params,success,responseObj){
     if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message);
            var error = '';
            for (errors in responseObj.message){
                for(i=0;i<responseObj.message[errors].length;i++){
                    error += responseObj.message[errors][i]+'\n';
                }
            }
            showNotif('Error','error',error);
        }
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