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
    ajax("GET","/admin/jenis_wilayah_akun/get",null,injectJenisWilayahUser,null);
},100);

function startAdd(event) {
    event.preventDefault();
    var nama_jenis_user = document.getElementById("nama_jenis_akun").value;
    var nilai_jenis_wilayah_user = document.getElementById("drp_nilai_jenis_wilayah_akun").selectedOptions[0];
    var nilai_jenis_wilayah_user_baru;
    if(nama_jenis_user.length===0){
        showNotif("Error","error","Nama jenis akun harus diisi");
        return;
    }
    if(nilai_jenis_wilayah_user.value==="null"||nilai_jenis_wilayah_user.text==="Jenis Wilayah"){
        showNotif("Error","error","Jenis wilayah harus diisi");
        return;
    }
    ajax("POST","/admin/jenis_akun/create","nama_jenis_akun="+nama_jenis_user+"&id_jenis_wilayah_user="+nilai_jenis_wilayah_user.value,jenisUserCreated,[event]);
}

function jenisUserCreated(params,success,responseObj){
    if(success){
        if(responseObj.kode == 200){
            showNotif("Sukses","success",responseObj.message);
        }else{
            showNotif("Error","error",responseObj.message);
        }
    }
    location.reload();
}

function startEdit(event){
    changeIntoInput(event.target.parentElement.parentElement);
}

function saveEdit(event){
    var column = event.target.parentElement.parentElement.parentElement.children;
    var id = event.target.parentElement.dataset['id'];
    var nama_jenis_akun = column[1].firstChild.value;
    var id_jenis_wilayah_user = parseInt(column[2].firstChild.value);
//    console.log(column[2].firstChild.value);
//    console.log("id:"+id+" nama:"+nama_jenis_wiayah_user+" nilai:"+nilai);
    ajax("POST","/admin/jenis_akun/update","id_jenis_user="+id+"&nama_jenis_akun="+nama_jenis_akun+"&id_jenis_wilayah_user="+id_jenis_wilayah_user,endEdit,[event]);
}

function endEdit(params,success,responseObj){
    var event = params[0];
    if(success){
        if(responseObj.kode===200){
          changeIntoInput(event.target.parentElement.parentElement);
          showNotif("Sukses","success",responseObj.message);
          location.reload();
        }else{
          showNotif("Error","error",responseObj.message);
        }
    }
}

function startDelete(event){
    deleteJenisUser(event);
}

function deleteJenisUser(event){
    event.preventDefault();
    var id=event.target.parentElement.dataset['id'];
    event.target.removeEventListener('click',startDelete);
    ajax("GET","/admin/jenis_akun/"+id+"/delete",null,endDelete,[event.target.parentElement]);
}

function endDelete(params,success,responseObj){
     var event = params[0];
    if(success){
        if(responseObj.kode==200){
          showNotif("Sukses","success",responseObj.message);
          location.reload();
        }else{
          showNotif("Error","error",responseObj.message);
        }
    }
}

function injectJenisWilayahUser(params,success,responseObj) {
    var element = document.getElementById("drp_nilai_jenis_wilayah_akun");
    var response = responseObj.jenis_wilayah_user;
    $(element).append($('<option>',{
        text:'Jenis Wilayah',
        hidden:''
    }));
    if(response.length!=0){
        for(i=0;i<response.length;i++){
            $(element).append($('<option>',{
                text:response[i].nama_jenis_wilayah_user,
                value:response[i].id_jenis_wilayah_user
            }));
        }
    }
}

function injectJenisWilayahUserEdit(params,success,responseObj){
    var element = document.getElementById("drp_jenis_wilayah_user");
    var jenis_wilayah_user = responseObj.jenis_wilayah_user;
    var selected = parseInt(element.dataset['id']);
    console.log(selected);
    console.log(element);
    for(i=0;i<jenis_wilayah_user.length;i++){
        if(jenis_wilayah_user[i].id_jenis_wilayah_user===selected){
            $(element).append($('<option>',{
                text: jenis_wilayah_user[i].nama_jenis_wilayah_user,
                value: jenis_wilayah_user[i].id_jenis_wilayah_user,
                selected: true
            }));
        }else{
            $(element).append($('<option>',{
                text: jenis_wilayah_user[i].nama_jenis_wilayah_user,
                value: jenis_wilayah_user[i].id_jenis_wilayah_user,
            }));
        }
    }
}

function changeIntoInput(event){
//    console.log("test");
    console.log(event);
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
               $(this).text($(this).find('select').context.firstChild.selectedOptions[0].text);
            }else{
                var t = $(this).context.dataset['id'];
                $(this).text('').append($('<select id="drp_jenis_wilayah_user" data-id="'+t+'">'));
                ajax("GET","/admin/jenis_wilayah_akun/get",null,injectJenisWilayahUserEdit,null);
            }
        }
    });
}