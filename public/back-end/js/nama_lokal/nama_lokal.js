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
    ajax("GET","/admin/nama_ilmiah/get",null,injectNamaLokal,null);
},100);

function startAdd(event){
    event.preventDefault();
    var nama_lokal = document.getElementById("nama_lokal").value;
    var id_nama_ilmiah = document.getElementById("nama_ilmiah").selectedOptions[0].value;
    if(nama_lokal.length === 0){
        showNotif("Error","error","Nama lokal harus diisi");
        return;
    }
    console.log(id_nama_ilmiah);
    console.log(id_nama_ilmiah === null);
    console.log(id_nama_ilmiah === "undefinied");
    if(id_nama_ilmiah === null || id_nama_ilmiah === "Nama Ilmiah" ||id_nama_ilmiah === "undefinied"){
        showNotif("Error","error","Nama ilmiah harus dipilih");
        return;
    }
    ajax("POST","/admin/nama_lokal/create","nama_lokal="+nama_lokal+"&id_nama_ilmiah="+id_nama_ilmiah,newNamaLokalCreated,[event]);
}

function newNamaLokalCreated(params,success,responseObj){
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
    location.reload();
}

function startEdit(event){
    var id = event.target.parentElement.dataset['id'];
//    console.log('Tombol edit '+id+' ditekan');
    changeToInput(event.target.parentElement.parentElement);
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;    
    var id = event.target.parentElement.dataset['id'];
//    console.log('Tombol edit '+id+' ditekan');
//    console.log(event.target.parentElement.parentElement.parentElement.children);
//    console.log(column[1]+" "+column[2]+" "+column[3]);
//    var id = column[3].children[0].dataset['id'];
    var nama_lokal = column[1].firstChild.value;
    var id_nama_ilmiah = column[2].firstChild.value;
//    console.log("id: "+id+";id_nama_ilmiah: "+id_nama_ilmiah+";nama_lokal: "+nama_lokal);
//    changeToInput(event.target.parentElement.parentElement);
    ajax("POST","/admin/nama_lokal/update","nama_lokal="+nama_lokal+"&id_nama_ilmiah="+id_nama_ilmiah+"&id_nama_lokal="+id,endEdit,[event]);
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
    deleteNamaLokal(event);
}

function deleteNamaLokal(event){
    event.preventDefault();
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/nama_lokal/"+id+"/delete/",null,endDeleteNamaLokal,[event.target.parentElement]);
}

function endDeleteNamaLokal(params,success,responseObj){
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
        if($(this).index()===2){
            if($(this).find('select').length){
//                console.log($(this).find('select').context.firstChild.selectedOptions[0]);
                $(this).text($(this).find('select').context.firstChild.selectedOptions[0].text);
            }else{
                var t = $(this).context.dataset['id'];
//                console.log(t);
                $(this).text('').append($('<select id="drp_nama_ilmiah" data-id="'+t+'">'));
                ajax("GET","/admin/nama_ilmiah/get",null,injectNamaLokalEdit,null);
            }
        }
    });
}

function injectNamaLokal(params,success,responseObj){
    var element = document.getElementById("nama_ilmiah");
    var nama_ilmiah = responseObj.nama_ilmiah;
//    console.log(nama_ilmiah);
//    console.log(element);
    $(element).append($('<option>',{
        text:'Nama Ilmiah',
        hidden:''
    }));
    for(i=0;i<nama_ilmiah.length;i++){
        $(element).append($('<option>',{
            style: 'font-style: oblique',
            text: nama_ilmiah[i].nama_ilmiah,
            value: nama_ilmiah[i].id_nama_ilmiah
        }));
    }
}

function injectNamaLokalEdit(params,success,responseObj){
    var element = document.getElementById("drp_nama_ilmiah");
    var nama_ilmiah = responseObj.nama_ilmiah;
    var selected = element.dataset['id'];
//    console.log(nama_ilmiah);
//    console.log(selected);
//    $(element).append($('<option>',{
//        text:'Nama Ilmiah',
//        hidden:''
//    }));
    for(i=0;i<nama_ilmiah.length;i++){
        if(nama_ilmiah[i].id_nama_ilmiah==selected){
            $(element).append($('<option>',{
                style: 'font-style: oblique',
                text: nama_ilmiah[i].nama_ilmiah,
                value: nama_ilmiah[i].id_nama_ilmiah,
                selected: true
            }));
        }else{
            $(element).append($('<option>',{
                style: 'font-style: oblique',
                text: nama_ilmiah[i].nama_ilmiah,
                value: nama_ilmiah[i].id_nama_ilmiah
            }));
        }
    }
}