var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    ajax("GET","/admin/species_type/retrieve",null,injectTypeSpecies,null);
    var btnAdd = document.getElementById("btnAdd");
    var btnGroupOperation = document.getElementsByClassName("btnGroupOperation");
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    btnAdd.addEventListener('click',startAdd);
},100);

function injectTypeSpecies(params,success,responseObj){
    var element = document.getElementById("drp_species_type");
    var jenis_species = responseObj.species_type;
    $(element).append($('<option>',{
        text:'Jenis Spesies',
        hidden: ''
    }));
    for(i=0;i<jenis_species.length;i++){
        $(element).append($('<option>',{
            text:jenis_species[i].species_type_name,
            value:jenis_species[i].id
        }));
    }
}

function changeSpeciesTypeOption(event){
    var element = document.getElementById("drp_disease_type");
    element.disabled = false;
    var id = document.getElementById("drp_species_type").selectedOptions[0].value;
    ajax("GET","/admin/disease_type/retrieve/"+id,null,injectTypeDisease,null);
}

function injectTypeDisease(params,success,responseObj){
    var element = document.getElementById("drp_disease_type");
    var element1 = document.getElementById("name");
    var element2 = document.getElementById("weight");
    var jenis_penyakit = responseObj.disease_type;
    if(responseObj.disease_type.length == 0){
        $(element).empty();
        element.disabled = true;
        element1.disabled = true;
        element2.disabled = true;
    }else{
        $(element).empty();
        element1.disabled = false;
        element2.disabled = false;
        $(element).append($('<option>',{
            text:'Jenis Penyakit',
            hidden:''
        }));
        for(i=0;i<jenis_penyakit.length;i++){
            $(element).append($('<option>',{
                text:jenis_penyakit[i].name,
                value:jenis_penyakit[i].id
            }));
        }
    }
}

function startAdd(event){
    var name = document.getElementById("name").value;
    var diseaseType = document.getElementById("drp_disease_type").selectedOptions[0].value;
    var weight = parseFloat(document.getElementById("weight").value);
    var datas = {'name':name,'disease_type_id':diseaseType,'weight':weight}
    ajax("POST","/admin/disease/create",datas,newPenyakitCreated,[event]);
}

function newPenyakitCreated(params,success,responseObj){
   if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message);
            var error = '';
            for(var key in responseObj.message){
                error+=responseObj.message[key]+'\n';
            }
            showNotif('Error','error',error);
        }
    }
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
                event.children[0].children[0].addEventListener('click',startEdit);
            }else{
                var t = $(this).text();
                $(this).text('').append($('<input id="name_edit"/>',{'value':t}).val(t));
                event.children[0].children[0].setAttribute("class","btn btn-success");
                event.children[0].children[0].children[0].setAttribute("class","fa fa-floppy-o");
                event.children[0].children[0].removeEventListener('click',startEdit);
                event.children[0].children[0].addEventListener('click',saveEdit);
            }
        }
        if($(this).index()===2){
            if($(this).find('select').length){
                $(this).text($(this).find('select').context.firstChild.selectedOptions[0].text);
            }else{
                var t = $(this).context.dataset['id'];  
                $(this).text('').append($('<select id="drp_disease_type_edit" data-id="'+t+'">'));
            }
        }
        if($(this).index()===3){
            if($(this).find('select').length){
                $(this).text($(this).find('select').context.firstChild.selectedOptions[0].text);
            }else{
                var t = $(this).context.dataset['id'];  
                $(this).text('').append($('<select id="drp_species_type_edit" onclick="getDiseaseType(this.selectedOptions[0].value);" data-id="'+t+'">'));
            }
        }
        if($(this).index()===4){
            if($(this).find('input').length){
                $(this).text($(this).find('input').val());
            }else{
                var t = $(this).text();
                $(this).text('').append($('<input id="weight_edit"/>',{'value':t}).val(t));
            }
        }
    });
    ajax("GET","/admin/species_type/retrieve",null,injectSpeciesTypeDataEdit,[event]);
}

function injectSpeciesTypeDataEdit(params,success,responseObj){
    var element = document.getElementById("drp_species_type_edit");
    var element1 = document.getElementById("name_edit");
    var element2 = document.getElementById("weight_edit");
    var element3 = document.getElementById("drp_disease_type_edit");
    var selected = parseInt(element.dataset['id']);
    var species_type = responseObj.species_type;
    element1.disabled = true;
    element2.disabled = true;
    element3.disabled = true;
    for(i=0;i<species_type.length;i++){
        if(selected == species_type[i].id){
            $(element).append($('<option>',{
                text:species_type[i].species_type_name,
                value:species_type[i].id,
                selected:true
            }));
        }else{
            $(element).append($('<option>',{
                text:species_type[i].species_type_name,
                value:species_type[i].id,
            }));
        }
    }
}

function getDiseaseType(id){
    ajax("GET","/admin/disease_type/retrieve/"+id,null,injectDiseaseType,null);
}

function injectDiseaseType(params,success,responseObj){
    var element1 = document.getElementById("name_edit");
    var element2 = document.getElementById("weight_edit");
    var element3 = document.getElementById("drp_disease_type_edit");
    element1.disabled = false;
    element2.disabled = false;
    element3.disabled = false;
    var selected = parseInt(element1.dataset['id']);
    var disease_type = responseObj.disease_type;
    $(element3).empty();
    for(i=0;i<disease_type.length;i++){
        if(selected == disease_type[i].id){
            $(element3).append($('<option>',{
                text:disease_type[i].name,
                value:disease_type[i].id,
                selected:true
            }));
        }else{
            $(element3).append($('<option>',{
                text:disease_type[i].name,
                value:disease_type[i].id,
            }));
        }
    }
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;
    var id = event.target.parentElement.dataset['id'];
    var nama_penyakit = column[1].firstChild.value;
    var id_jenis_penyakit = column[2].firstChild.value;
    var bobot = column[4].firstChild.value;
    var datas = {'id':id,'name':nama_penyakit,'disease_type_id':id_jenis_penyakit,'weight':bobot};
    ajax("POST","/admin/disease/update",datas,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message);
            var error = '';
            for(var key in responseObj.message){
                error+=responseObj.message[key]+'\n';
            }
            showNotif('Error','error',error);
        }
    }
}

function startDelete(event){
    deletePenyakit(event);
}

function deletePenyakit(event){
    var id = event.target.parentElement.dataset['id'];
//    console.log(id);
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/disease/"+id+"/delete",null,endDelete,[event.target.parentElement]);
}

function endDelete(params,success,responseObj){
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message);
            var error = '';
            for(var key in responseObj.message){
                error+=responseObj.message[key]+'\n';
            }
            showNotif('Error','error',error);
        }
    }
}



