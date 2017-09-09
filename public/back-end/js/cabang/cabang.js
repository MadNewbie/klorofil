var docReady = setInterval(function(){
    if(document.readyState !== "complete"){
        return;
    }
    clearInterval(docReady);
    var btnAdd = document.getElementById("btnAdd");
    var btnGroupOperation = document.getElementsByClassName('btnGroupOperation');
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    btnAdd.addEventListener('click',startAdd);
},100);

function startAdd(event){
    var nama_jenis_cabang = document.getElementById("nama_jenis_cabang").value;
    if(nama_jenis_cabang.length === 0){
        showNotif("Error","error","Jenis cabang harus diisi");
        return;
    }
    ajax("POST","/admin/cabang/create","nama_jenis_cabang="+nama_jenis_cabang,newJenisCabangCreated,[event]);
}

function newJenisCabangCreated(params,success,responseObj){
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
    location.reload();
}

function startEdit(event){
    var id = event.target.parentElement.dataset['id'];
    changeToInput(event.target.parentElement.parentElement);
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;    
    var id = event.target.parentElement.dataset['id'];
    var nama_jenis_cabang = column[1].firstChild.value;
    ajax("POST","/admin/cabang/update","nama_jenis_cabang="+nama_jenis_cabang+"&id_cabang="+id,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    var event = params[0];
    if(success){
        changeToInput(event.target.parentElement.parentElement);
        showNotif("Sukses","success",responseObj.message);
        location.reload();
    }
}

function startDelete(event){
    var id = event.target.parentElement.dataset['id'];
    deleteCabang(event);
}

function deleteCabang(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/cabang/"+id+"/delete/",null,endDeleteCabang,[event.target.parentElement]);
}

function endDeleteCabang(params,success,responseObj){
    var event = params[0];
    location.reload();
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
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
    });
}