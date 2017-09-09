var docReady = setInterval(function(){
    if(document.readyState !== "complete"){
        return;
    }
    clearInterval(docReady);
    var btnAdd = document.getElementById('btnAdd');
    var btnGroupOperation = document.getElementsByClassName('btnGroupOperation');
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    btnAdd.addEventListener('click',startAdd);
},100);

function startAdd(event){
    event.preventDefault();
    var nama_ilmiah = document.getElementById("nama_ilmiah").value;
    var masa_jenis = document.getElementById("masa_jenis").value;
    console.log(nama_ilmiah.length === 0);
    if(nama_ilmiah.length === 0){
        showNotif("Error","error","Nama ilmiah harus diisi");
        return;
    }
    ajax("POST","/admin/nama_ilmiah/create","nama_ilmiah="+nama_ilmiah+"&masa_jenis="+masa_jenis,newNamaIlmiahCreated,[event]);
}

function newNamaIlmiahCreated(params, success, responseObj){
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
    location.reload();
}

function startEdit(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    console.log('Tombol edit '+id+' ditekan');
    changeIntoInput(event.target.parentElement.parentElement);
}

function saveEdit(event){
    console.log(event.target.parentElement.parentElement);
    var column = event.target.parentElement.parentElement.parentElement.children;    
    console.log(column[1]+" "+column[2]+" "+column[3]);
    var id = column[3].children[0].dataset['id'];
    var nama_ilmiah = column[1].firstChild.value;
    var masa_jenis = column[2].firstChild.value;
    console.log('id_nama_ilmiah='+id+';nama ilmiah='+nama_ilmiah+';masa jenis='+masa_jenis);
    ajax("POST","/admin/nama_ilmiah/update","nama_ilmiah="+nama_ilmiah+"&id_nama_ilmiah="+id+"&masa_jenis="+masa_jenis,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    var event = params[0];
    if(success){
        changeIntoInput(event.target.parentElement.parentElement);
        showNotif("Sukses","success",responseObj.message);
    }
}

function startDelete(event){
    var id = event.target.parentElement.dataset['id'];
    console.log('Tombol delete '+id+' ditekan');
    deleteNamaIlmiah(event);
}

function deleteNamaIlmiah(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    console.log("id: "+id);
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/nama_ilmiah/"+id+"/delete/",null,endDeleteNamaIlmiah,[event.target.parentElement]);
}

function endDeleteNamaIlmiah(params,success,responseObj){
    var event = params[0];
    location.reload();
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
}

function changeIntoInput(event){
    $(event).siblings().each(function(){
        if($(this).index()!==0){
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
//    console.log(event.children[0].children[0]);
}