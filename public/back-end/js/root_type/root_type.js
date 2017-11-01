var docReady = setInterval(function(){
    if(document.readyState !== "complete"){
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
},100);

function startAdd(event){
    var root_type_name = document.getElementById('root_type_name').value;
    var datas = {'root_type_name':root_type_name};
    ajax("POST","/admin/root_type/create",datas,newDataCreated,[event]);
}

function newDataCreated(params,success,responseObj){
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message.root_type_name);
            var error = '';
            for(i=0;i<responseObj.message.root_type_name.length;i++){
                error+=responseObj.message.root_type_name[i];
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
    });
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;
    var id = event.target.parentElement.dataset['id'];
    var root_type_name = column[1].firstChild.value;
    var datas = {'id':id,'root_type_name':root_type_name};
    ajax("POST","/admin/root_type/update",datas,dataUpdated,[event]);
}

function dataUpdated(params,success,responseObj){
    var event = params[0];
     if(success){
        if(responseObj.kode == 200){
            changeToInput(event.target.parentElement.parentElement);
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message.root_type_name);
            var error = '';
            for(i=0;i<responseObj.message.root_type_name.length;i++){
                error+=responseObj.message.root_type_name[i];
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
    console.log(event.target.parentElement);
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/root_type/"+id+"/delete/",null,endDeleteData,[event.target.parentElement]);
}

function endDeleteData(params,success,responseObj){
    var event = params[0];
    if(success){
         if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message.root_type_name);
            var error = '';
            for(i=0;i<responseObj.message.root_type_name.length;i++){
                error+=responseObj.message.root_type_name[i];
            }
            showNotif('Error','error',error);
        }
    }
}