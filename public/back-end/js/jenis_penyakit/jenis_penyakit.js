var docReady = setInterval(function(){
    if(document.readyState !== "complete"){
        return;
    }
    clearInterval(docReady);
    ajax("GET","/admin/species_type/retrieve",null,injectSpeciesTypes,null);
    var btnAdd = document.getElementById("btnAdd");
    var btnGroupOperation = document.getElementsByClassName('btnGroupOperation');
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    btnAdd.addEventListener('click',startAdd);
},100);

function startAdd(event){
    var name = document.getElementById("name").value;
    var species_type_id = document.getElementById("drp_species_type").selectedOptions[0].value;
    var datas = {'name':name,'species_type_id':species_type_id}
    ajax("POST","/admin/disease_type/create",datas,newJenisPenyakitCreated,[event]);
}

function newJenisPenyakitCreated(params,success,responseObj){
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
                event.children[0].children[0].addEventListener('click',startEdit);
            }else {
                var t = $(this).text();
                $(this).text('').append($('<input />',{'value' : t}).val(t));
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
                $(this).text('').append($('<select id=drp_species_type_edit data-id="'+t+'">'));
                ajax("GET","/admin/species_type/retrieve",null,injectDataEdit,null);
            }
        }
    });
}

function injectDataEdit(params,success,responseObj){
    var element = document.getElementById('drp_species_type_edit');
    var species_type = responseObj.species_type;
    var selected = parseInt(element.dataset['id']);
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

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;    
    var id = event.target.parentElement.dataset['id'];
    var name = column[1].firstChild.value;
    var species_type = column[2].firstChild.selectedOptions[0].value;
    var datas = {'id':id,'name':name,'species_type_id':species_type};
    ajax("POST","/admin/disease_type/update",datas,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    var event = params[0];
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
    deleteJenisPenyakit(event);
}

function deleteJenisPenyakit(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/disease_type/"+id+"/delete/",null,endDeleteJenisPenyakit,[event.target.parentElement]);
}

function endDeleteJenisPenyakit(params,success,responseObj){
    var event = params[0];
    location.reload();
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