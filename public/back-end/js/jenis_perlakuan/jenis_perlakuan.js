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
     var nama_jenis_perlakuan = document.getElementById("nama_jenis_perlakuan").value;
    if(nama_jenis_perlakuan.length === 0){
        showNotif("Error","error","Jenis perlakuan harus diisi");
        return;
    }
    ajax("POST","/admin/jenis_perlakuan/create","nama_jenis_perlakuan="+nama_jenis_perlakuan,newJenisPerlakuanCreated,[event]);
}

function newJenisPerlakuanCreated(params,success,responseObj){
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
    var nama_jenis_perlakuan = column[1].firstChild.value;
    ajax("POST","/admin/jenis_perlakuan/update","nama_jenis_perlakuan="+nama_jenis_perlakuan+"&id_jenis_perlakuan="+id,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    var event = params[0];
    if(success){
        if(responseObj.kode == 200){
            changeToInput(event.target.parentElement.parentElement);
            showNotif("Sukses","success",responseObj.message);
        }else{
            showNotif("Error","error",responseObj.message);
        }
    }
}

function startDelete(event){
    var id = event.target.parentElement.dataset['id'];
    deleteJenisPerlakuan(event);
}

function deleteJenisPerlakuan(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/jenis_perlakuan/"+id+"/delete/",null,endDeleteJenisPerlakuan,[event.target.parentElement]);
}

function endDeleteJenisPerlakuan(params,success,responseObj){
    var event = params[0];
    location.reload();
    if(success){
        if(responseObj.kode == 200){
            showNotif("Sukses","success",responseObj.message);
        }else{
            showNotif("Error","error",responseObj.message);
        }
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