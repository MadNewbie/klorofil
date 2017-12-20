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
    var animal_name = document.getElementById('animal_name').value;
    var description = document.getElementById('description').value;
    var datas = {'animal_name':animal_name,'description':description};
    postData(datas,"/admin/habitat/create",[event]);
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
            if($(this).find('textarea').length){
                $(this).text($(this).find('textarea').val());
            }else{
                var t = $(this).text();
                $(this).text('').append($('<textarea>',{'value':t}).val(t));
            }
        }
    });
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;
    var id = event.target.parentElement.dataset['id'];
    var animal_name = column[1].firstChild.value;
    var description = column[2].firstChild.value;
    var datas = {'id':id,'animal_name':animal_name,'description':description};
    postData(datas,"/admin/habitat/update",[event]);
}

function startDelete(event){
    deleteData(event);
}

function deleteData(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    console.log(event.target.parentElement);
    event.target.removeEventListener('click',startDelete);
    getData(null,"/admin/habitat/"+id+"/delete/",[event.target.parentElement]);
}