var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    var btnAdd = document.getElementById('btnAdd');
    var btnGroupOperation = document.getElementsByClassName('btnGroupOperation');
    btnAdd.addEventListener('click',startAdd);
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    getAndInjectData(null,"/admin/species_type/retrieve",null,injectSpeciesTypes);
},100);

function startAdd(event){
    var name = document.getElementById('name').value;
    var weight = isNaN(parseFloat(document.getElementById('weight').value))?"":parseFloat(document.getElementById('weight').value).toFixed(1);
    var species_type_id = (document.getElementById('drp_species_type').selectedOptions[0].value==='Jenis Spesies'?"":document.getElementById('drp_species_type').selectedOptions[0].value);
    var datas = {'name':name,'species_type_id':species_type_id,'weight':weight};
    postData(datas,"/admin/disease_type/create",[event]);
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
function startEdit(event){
    changeToInput(event.target.parentElement.parentElement);
}

function changeToInput(event){
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
                $(this).text('').append($('<input />',{'id':'name_edit','value':t}).val(t));
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
                $(this).text('').append($('<select />',{'id':'drp_species_type_edit'}));
            }
        }
        if($(this).index()===3){
            if($(this).find('input').length){
                $(this).text($(this).find('input').val());
            }else{
                var t = $(this).text();
                $(this).text('').append($('<input/>',{'id':'weight_edit','value':t}).val(t));
                getAndInjectData(null,'/admin/species_type/retrieve/',event,injectDataEdit);
            }
        }
    });
}

function saveEdit(event){
    var id = event.target.parentElement.dataset['id'];
    var name = document.getElementById('name_edit').value;
    var weight = isNaN(parseFloat(document.getElementById('weight_edit').value))?"":parseFloat(document.getElementById('weight_edit').value).toFixed(1);
    var species_type_id = (document.getElementById('drp_species_type_edit').selectedOptions[0].value==='Jenis Spesies'?"":document.getElementById('drp_species_type_edit').selectedOptions[0].value);
    var datas = {'name':name,'species_type_id':species_type_id,'weight':weight,'id':id};
    postData(datas,"/admin/disease_type/update",[event]);
}

function startDelete(event){
    deleteData(event);
}

function deleteData(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    getData(null,'/admin/disease_type/'+id+'/delete',[event])
}