var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    ajax("GET","/admin/species_type/retrieve",null,injectData,null);
    var btnAdd = document.getElementById('btnAdd');
    var btnGroupOperation = document.getElementsByClassName('btnGroupOperation');
    btnAdd.addEventListener('click',startAdd);
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
},100);

function injectData(params,success,responseObj){
    console.log(responseObj);
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

function startAdd(event){
    var function_type_species = document.getElementById("function_type_species").value;
    var species_type_id = document.getElementById('drp_species_type').selectedOptions[0].value;
    var datas = {'function_type_species':function_type_species,'species_type_id':species_type_id};
    ajax("POST","/admin/function_type/create",datas,newDataCreated,[event]);
}

function newDataCreated(params,success,responseObj){
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message.function_type_species);
            var error = '';
            for(i=0;i<responseObj.message.function_type_species.length;i++){
                error+=responseObj.message.function_type_species[i];
            }
            showNotif('Error','error',error);
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
                $(this).text('').append($('<input />',{'value':t}).val(t));
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
                ajax("GET","/admin/species_type/retrieve",null,injectDataEdit,null)
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
    var function_type_species = column[1].firstChild.value;
    var species_type_id = column[2].firstChild.value;
    var datas = {'id':id,'function_type_species':function_type_species,'species_type_id':species_type_id};
    ajax("POST","/admin/function_type/update",datas,dataUpdated,[event])
}

function dataUpdated(params,success,responseObj){
    var event = params[0];
     if(success){
        if(responseObj.kode == 200){
            changeToInput(event.target.parentElement.parentElement);
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message.function_type_species);
            var error = '';
            for(i=0;i<responseObj.message.function_type_species.length;i++){
                error+=responseObj.message.function_type_species[i];
            }
            showNotif('Error','error',error);
        }
    }
}

function startDelete(event){
    deleteData(event);
}

function deleteData(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/function_type/"+id+"/delete/",null,endDeleteData,[event.target.parentElement]);
}

function endDeleteData(params,success,responseObj){
    var event = params[0];
    if(success){
         if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message.function_type_species);
            var error = '';
            for(i=0;i<responseObj.message.function_type_species.length;i++){
                error+=responseObj.message.function_type_species[i];
            }
            showNotif('Error','error',error);
        }
    }
}