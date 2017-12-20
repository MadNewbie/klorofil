var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    var btnAdd = document.getElementById('btnAdd');
    var drp_species_type = document.getElementById('drp_species_type');
    var btnGroupOperation = document.getElementsByClassName('btnGroupOperation');
    drp_species_type.addEventListener('change',getDiseaseTypeData);
    btnAdd.addEventListener('click',startAdd);
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    clearInterval(docReady);
    getAndInjectData(null,"/admin/species_type/retrieve",null,injectSpeciesTypes);
},100);

function startAdd(event){
    var name = document.getElementById('name').value;
    var weight = isNaN(parseFloat(document.getElementById('weight').value))?"":parseFloat(document.getElementById('weight').value).toFixed(1);
    var disease_type_id = (document.getElementById('drp_disease_type').selectedOptions[0].value==='Jenis Penyakit'?"":document.getElementById('drp_disease_type').selectedOptions[0].value);
    var datas = {'name':name,'weight':weight,'disease_type_id':disease_type_id};
    postData(datas,'/admin/disease/create',[event]);
}

function injectSpeciesTypes(params,success,responseObj){
    var drp_species_type = document.getElementById("drp_species_type");
    var species_type = responseObj.species_type;
    if(success){
        $(drp_species_type).append($('<option>',{
            text: 'Jenis Spesies',
            hidden:''
        }));
        for(i=0;i<species_type.length;i++){
            $(drp_species_type).append($('<option>',{
                text: species_type[i].species_type_name,
                value: species_type[i].id
            }));
        }
        drp_species_type.addEventListener('click',getDiseaseTypeData());
    }
}

function getDiseaseTypeData(event){
    var species_type_id = document.getElementById('drp_species_type').selectedOptions[0].value;
    var drp_disease_type = document.getElementById('drp_disease_type');
    if(species_type_id==='Jenis Spesies'){
        drp_disease_type.disabled = true;
    }else{
        drp_disease_type.disabled = false;
        getAndInjectData(null,'/admin/disease_type/retrieve/'+species_type_id,null,injectDiseaseType);
    }
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
        drp_disease_type.addEventListener('click',onDiseaseTypeSelected);
    }
}

function onDiseaseTypeSelected(){
    var name = document.getElementById('name');
    var weight = document.getElementById('weight');
    name.disabled = false;
    weight.disabled = false;
}

function startEdit(event){
    changeIntoInput(event.target.parentElement.parentElement);
}

function changeIntoInput(event){
    $(event).siblings().each(function(){
        if($(this).index()===1){
            if($(this).find('input').length){
                $(this).text($(this).find('input').val());
                event.children[0].children[0].setAttribute("class","btn btn-warning");
                event.children[0].children[0].children[0].setAttribute("class","fa fa-pencil");
                event.children[0].children[0].removeEventListener('click',saveEdit);
                event.children[0].children[0].removeEventListener('click',startEdit);
            }else{
                var t = $(this).text();
                $(this).text('').append($('<input />',{'id':'name_edit','value':t,'disabled':true}).val(t));
                event.children[0].children[0].setAttribute("class","btn btn-success");
                event.children[0].children[0].children[0].setAttribute("class","fa fa-floppy-o");
                event.children[0].children[0].removeEventListener('click',startEdit);
                event.children[0].children[0].addEventListener('click',saveEdit);
            }
        }
        if($(this).index()===2){
            if($(this).find('select').length){
                $(this).text($(this).find('select').val());
            }else{
                $(this).text('').append($('<select />',{'id':'drp_disease_type_edit','disabled':true,'onclick':'getEnableNameAndWeight(this)'}));
            }
        }
        if($(this).index()===3){
            if($(this).find('select').length){
                $(this).text($(this).find('select').val());
            }else{
                $(this).text('').append($('<select />',{'id':'drp_species_type_edit','disabled':true,'onclick':'getDiseaseTypeDataEdit(this)'}));
            }
        }
        if($(this).index()===4){
            if($(this).find('input').length){
                $(this).text($(this).find('input').val());
            }else{
                var t = $(this).text();
                $(this).text('').append($('<input/>',{'id':'weight_edit','value':t,'disabled':true}).val(t));
                getAndInjectData(null,'/admin/species_type/retrieve/',[event],injectSpeciesTypeEdit);
            }
        }
    });
}

function injectSpeciesTypeEdit(params,success,responseObj){
    var event = params[0];
    var drp_species_type = document.getElementById("drp_species_type_edit");
    var species_type = responseObj.species_type;
    var selected = drp_species_type.parentElement.dataset['id'];
    if(success){
        for(i=0;i<species_type.length;i++){
            if(species_type[i].id==selected){
                $(drp_species_type).append($('<option>',{
                    text: species_type[i].species_type_name,
                    value: species_type[i].id,
                    selected: true
                }));
            }else{
                $(drp_species_type).append($('<option>',{
                    text: species_type[i].species_type_name,
                    value: species_type[i].id
                }));
            }
        }
        drp_species_type.disabled = false;
    }
}

function getDiseaseTypeDataEdit(event){
    var species_type_id = document.getElementById('drp_species_type_edit').selectedOptions[0].value;
    var drp_disease_type = document.getElementById('drp_disease_type_edit');
    getAndInjectData(null,'/admin/disease_type/retrieve/'+species_type_id,null,injectDiseaseTypeEdit);
}

function injectDiseaseTypeEdit(params,success,responseObj){
    console.log(responseObj.disease_type);
    var drp_disease_type = document.getElementById("drp_disease_type_edit");
    var disease_type = responseObj.disease_type;
    var selected = drp_disease_type.parentElement.dataset['id'];
    drp_disease_type.innerHTML="";
    var name = document.getElementById("name_edit");
    var weight = document.getElementById("weight_edit");
    if(success){
        if(disease_type.length == 0){
            $(drp_disease_type).append($('<option>',{
                text: 'Jenis Penyakit',
                value: ''
            }));
            drp_disease_type.disabled = true;
            name.disabled = true;
            weight.disabled = true;
        }else{
            for(i=0;i<disease_type.length;i++){
                if(disease_type[i].id==selected){
                    $(drp_disease_type).append($('<option>',{
                        text: disease_type[i].name,
                        value: disease_type[i].id,
                        selected: true
                    }));
                }else{
                    $(drp_disease_type).append($('<option>',{
                        text: disease_type[i].name,
                        value: disease_type[i].id
                    }));
                }
            }
            drp_disease_type.disabled = false;
        }
    }
}

function getEnableNameAndWeight(event){
    var name = document.getElementById("name_edit");
    var weight = document.getElementById("weight_edit");
    name.disabled = false;
    weight.disabled = false;
}

function saveEdit(event){
    var id = event.target.parentElement.dataset['id'];
    var name = document.getElementById('name_edit').value;
    var weight = isNaN(parseFloat(document.getElementById('weight_edit').value))?"":parseFloat(document.getElementById('weight_edit').value).toFixed(1);
    var disease_type_id = (document.getElementById('drp_disease_type_edit').selectedOptions[0].value==='Jenis Penyakit'?"":document.getElementById('drp_disease_type_edit').selectedOptions[0].value);
    var datas = {'name':name,'weight':weight,'disease_type_id':disease_type_id,'id':id};
    postData(datas,'/admin/disease/update',[event]);
}

function startDelete(event){
    deleteData(event);
}

function deleteData(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    getData(null,'/admin/disease/'+id+'/delete',[event]);
}