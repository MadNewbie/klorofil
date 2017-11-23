var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    var btnAdd = document.getElementById("btnAdd");
    var btnGroupOperation = document.getElementsByClassName("btnGroupOperation");
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    btnAdd.addEventListener('click',startAdd);
    ajax("GET","/admin/jenis_penyakit/get",null,injectJenisPenyakit,null);
},100);

function startAdd(event){
    var nama_penyakit = document.getElementById("nama_penyakit").value;
    var id_jenis_penyakit = document.getElementById("jenis_penyakit").selectedOptions[0].value;
    var bobot = parseInt(document.getElementById("bobot").value);
    if(nama_penyakit.length===0){
        showNotif("Error","error","Nama penyakit harus diisi");
        return;
    }
    if(bobot.length===0){
        showNotif("Error","error","Bobot penyakit harus diisi");
        return;
    }
    if(isNaN(bobot)){
        showNotif("Error","error","Bobot penyakit harus diisi dengan angka");
        return;
    }
    if(id_jenis_penyakit === null || id_jenis_penyakit==="Jenis Perlakuan" || id_jenis_penyakit==="undefinied"){
        showNotif("Error","error","Jenis penyakit harus dipilih");
        return;
    }
    ajax("POST","/admin/penyakit/create","nama_penyakit="+nama_penyakit+"&id_jenis_penyakit="+id_jenis_penyakit+"&bobot="+bobot,newPenyakitCreated,[event]);
}

function newPenyakitCreated(params,success,responseObj){
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
    changeIntoInput(event.target.parentElement.parentElement);
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;
    var id = event.target.parentElement.dataset['id'];
    var nama_penyakit = column[1].firstChild.value;
    var id_jenis_penyakit = column[2].firstChild.value;
    var bobot = column[3].firstChild.value;
    ajax("POST","/admin/penyakit/update","id_penyakit="+id+"&nama_penyakit="+nama_penyakit+"&id_jenis_penyakit="+id_jenis_penyakit+"&bobot="+bobot,endEdit,[event]);
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
    deletePenyakit(event);
}

function deletePenyakit(event){
    var id = event.target.parentElement.dataset['id'];
//    console.log(id);
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/penyakit/"+id+"/delete",null,endDelete,[event.target.parentElement]);
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

function injectJenisPenyakit(params,success,responseObj){
    var element = document.getElementById("jenis_penyakit");
    var jenis_penyakit = responseObj.jenis_penyakit;
    $(element).append($('<option>',{
        text:'Jenis Penyakit',
        hidden: ''
    }));
    for(i=0;i<jenis_penyakit.length;i++){
        $(element).append($('<option>',{
            text:jenis_penyakit[i].nama_jenis_penyakit,
            value:jenis_penyakit[i].id_jenis_penyakit
        }));
    }
}

function injectJenisPenyakitEdit(params,success,responseObj){
    var element = document.getElementById("drp_jenis_penyakit");
    var jenis_penyakit = responseObj.jenis_penyakit;
    var selected = parseInt(element.dataset['id']);
    console.log(element);
    for(i=0;i<jenis_penyakit.length;i++){
        if(selected==jenis_penyakit[i].id_jenis_penyakit){
            $(element).append($('<option>',{
                text:jenis_penyakit[i].nama_jenis_penyakit,
                value:jenis_penyakit[i].id_jenis_penyakit,
                selected:true
            }));
        }else{
            $(element).append($('<option>',{
                text:jenis_penyakit[i].nama_jenis_penyakit,
                value:jenis_penyakit[i].id_jenis_penyakit
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
                $(this).text('').append($('<select id="drp_jenis_penyakit" data-id="'+t+'">'));
                ajax("GET","/admin/jenis_penyakit/get",null,injectJenisPenyakitEdit,null);
            }
        }
        if($(this).index()===3){
            if($(this).find('input').length){
                $(this).text($(this).find('input').val());
            }else{
                var t = $(this).text();
                $(this).text('').append($('<input/>',{'value':t}).val(t));
            }
        }
    });
}