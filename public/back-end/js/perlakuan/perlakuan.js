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
    ajax("GET","/admin/jenis_perlakuan/get",null,injectJenisPerlakuan,null);
},100);

function startAdd(event) {
    var nama_perlakuan = document.getElementById("nama_perlakuan").value;
    var jenis_perlakuan = document.getElementById("jenis_perlakuan").selectedOptions[0].value;
    if(nama_perlakuan.length === 0){
        showNotif("Error","error","Nama perlakuan harus diisi");
        return;
    }
    if(jenis_perlakuan === null || jenis_perlakuan==="Jenis Perlakuan" || jenis_perlakuan==="undefinied"){
        showNotif("Error","error","Jenis perlakuan harus diisi");
        return;
    }
    ajax("POST","/admin/perlakuan/create","nama_perlakuan="+nama_perlakuan+"&id_jenis_perlakuan="+jenis_perlakuan,newPerlakuanCreated,[event]);
}

function newPerlakuanCreated(params,success,responseObj){
    if(success){
        if(responseObj.kode === 200){
            showNotif("Sukses","success",responseObj.message);
            location.reload();
        }else{
            showNotif("Error","error",responseObj.message);
        }
    }
}

function startEdit(event){
    event.preventDefault();
    changeIntoInput(event.target.parentElement.parentElement);
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;
    var id = event.target.parentElement.dataset['id'];
    var nama_perlakuan = column[1].firstChild.value;
    var id_jenis_perlakuan = column[2].firstChild.value;
    ajax("POST","/admin/perlakuan/update","id_perlakuan="+id+"&nama_perlakuan="+nama_perlakuan+"&id_jenis_perlakuan="+id_jenis_perlakuan,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    if(success){
        if(responseObj.kode === 200){
            showNotif("Sukses","success",responseObj.message);
            location.reload();
        }else{
            showNotif("Error","error",responseObj.message);
        }
    }
}

function startDelete(event){
    deletePerlakuan(event);
}

function deletePerlakuan(event){
    var id = event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/perlakuan/"+id+"/delete",null,endDelete,[event.target.parentElement]);
}

function endDelete(params,success,responseObj){
    if(success){
        if(responseObj.kode === 200){
            showNotif("Sukses","success",responseObj.message);
            location.reload();
        }else{
            showNotif("Error","error",responseObj.message);
        }
    }
}

function injectJenisPerlakuan(params,success,responseObj) {
    var element = document.getElementById("jenis_perlakuan");
    var jenis_perlakuan = responseObj.jenis_perlakuan;
    $(element).append($('<option>',{
        text:'Jenis Perlakuan',
        hidden:''
    }));
    for(i=0;i<jenis_perlakuan.length;i++){
        $(element).append($('<option>',{
            text:jenis_perlakuan[i].nama_jenis_perlakuan,
            value:jenis_perlakuan[i].id_jenis_perlakuan
        }));
    }
}

function injectJenisPerlakuanEdit(params,success,responseObj){
    var element = document.getElementById("drp_jenis_perlakuan");
    var jenis_perlakuan = responseObj.jenis_perlakuan;
    var selected = parseInt(element.dataset['id']);
    console.log(element);
    for(i=0;i<jenis_perlakuan.length;i++){
        if(selected==jenis_perlakuan[i].id_jenis_perlakuan){
            $(element).append($('<option>',{
                text:jenis_perlakuan[i].nama_jenis_perlakuan,
                value:jenis_perlakuan[i].id_jenis_perlakuan,
                selected:true
            }));
        }else{
            $(element).append($('<option>',{
                text:jenis_perlakuan[i].nama_jenis_perlakuan,
                value:jenis_perlakuan[i].id_jenis_perlakuan
            }));
        }
    }
}

function changeIntoInput(event){
    $(event).siblings().each(function(){
        if($(this).index()===1){
            if($(this).find('input').length){
                $(this).text($(this).find('input').val());
                event.children[0].children[0].setAttribute("class","btn btn-warning");
                event.children[0].children[0].children[0].setAttribute("class","fa fa-pencil");
                event.children[0].children[0].removeEventListener('click',saveEdit);
                event.children[0].children[0].addEventListener('click',startEdit);
            }else{
                var t = $(this).text();
                $(this).text('').append($('<input/>',{'value':t}).val(t));
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
                $(this).text('').append($('<select id="drp_jenis_perlakuan" data-id="'+t+'">'));
                ajax("GET","/admin/jenis_perlakuan/get",null,injectJenisPerlakuanEdit,null);
            }
        }
    });
}