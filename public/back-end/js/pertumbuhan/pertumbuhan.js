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
    var nama_jenis_pertumbuhan = document.getElementById("nama_jenis_pertumbuhan").value;
    if(nama_jenis_pertumbuhan.length === 0){
        showNotif("Error","error","Nama jenis pertumbuhan harus diisi");
        return;
    }
    ajax("POST","/admin/pertumbuhan/create","nama_jenis_pertumbuhan="+nama_jenis_pertumbuhan,newJenisPertumbuhanCreated,[event]);
}

function newJenisPertumbuhanCreated(params,success,responseObj){
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
    location.reload();
}

function startEdit(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
//    console.log('Tombol edit '+id+' ditekan');
    changeIntoInput(event.target.parentElement.parentElement);
}

function saveEdit(event){
//    console.log(event.target.parentElement.parentElement.parentElement.children[2].children[0]);
    var column = event.target.parentElement.parentElement.parentElement.children;    
//    console.log(column[1]+" "+column[2]);
    var id = column[2].children[0].dataset['id'];
    var nama_jenis_pertumbuhan = column[1].firstChild.value;
    console.log('id='+id+';nama jenis_pertumbuhan='+nama_jenis_pertumbuhan);
    ajax("POST","/admin/pertumbuhan/update","nama_jenis_pertumbuhan="+nama_jenis_pertumbuhan+"&id_pertumbuhan="+id,endEdit,[event]);
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
//    console.log('Tombol delete '+id+' ditekan');
    deletePertumbuhan(event);
}

function deletePertumbuhan(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
//    console.log("id: "+id);
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/pertumbuhan/"+id+"/delete/",null,endDeleteNamaIlmiah,[event.target.parentElement]);
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
}
