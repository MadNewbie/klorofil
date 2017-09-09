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
    var nama_hewan = document.getElementById("nama_hewan").value;
    var keterangan = document.getElementById("keterangan").value;
    if(nama_hewan.length === 0){
        showNotif("Error","error","Nama hewan harus diisi");
        return;
    }
    if(keterangan.length === 0){
        showNotif("Error","error","Keterangan harus diisi");
        return;
    }
    ajax("POST","/admin/habitat/create","nama_hewan="+nama_hewan+"&keterangan="+keterangan,newHabitatCreated,[event]);
}

function newHabitatCreated(params,success,responseObj){
    if(success){
        if( responseObj.kode == 200){
            showNotif("Sukses","success",responseObj.message);
        }else{
            showNotif("Error","error",responseObj.message);
        }
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
    var nama_hewan = column[1].firstChild.value;
    var keterangan = column[2].firstChild.value;
    console.log("id: "+id+"; nama hewan: "+nama_hewan+"; keterangan: "+keterangan);
    ajax("POST","/admin/habitat/update","nama_hewan="+nama_hewan+"&id_habitat="+id+"&keterangan="+keterangan,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    var event = params[0];
    if(success){
        changeToInput(event.target.parentElement.parentElement);
        if( responseObj.kode == 200){
            showNotif("Sukses","success",responseObj.message);
        }else{
            showNotif("Error","error",responseObj.message);
        }
    }
}

function startDelete(event){
    var id = event.target.parentElement.dataset['id'];
    deleteHabitat(event);
}

function deleteHabitat(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/habitat/"+id+"/delete/",null,endDeleteHabitat,[event.target.parentElement]);
}

function endDeleteHabitat(params,success,responseObj){
    var event = params[0];
    location.reload();
    if(success){
        if( responseObj.kode == 200){
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
        if($(this).index()===2){
            if($(this).find('textarea').length){
                $(this).text($(this).find('textarea').val());
//                event.children[0].children[0].setAttribute("class","btn btn-warning");
//                event.children[0].children[0].children[0].setAttribute("class","fa fa-pencil");
//                event.children[0].children[0].removeEventListener('click',saveEdit);
//                event.children[0].children[0].addEventListener('click',startEdit);
            }else {
                var t = $(this).text();
                $(this).text('').append($('<textarea>',{'value' : t}).val(t));
//                event.children[0].children[0].setAttribute("class","btn btn-success");
//                event.children[0].children[0].children[0].setAttribute("class","fa fa-floppy-o");
//                event.children[0].children[0].removeEventListener('click',startEdit);
//                event.children[0].children[0].addEventListener('click',saveEdit);
            }
        }
    });
}