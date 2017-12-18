var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
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
    // clearInterval(docReady);
    // ajax("GET","/admin/species_type/retrieve",null,injectSpeciesTypes,null);
},100);

function startAdd(event){
  var permission_name = document.getElementById('name').value;
  var permission_display_name = document.getElementById('display_name').value;
  var permission_description = document.getElementById('description').value;
  var datas = {'name':permission_name,
    'display_name':permission_display_name,
    'description':permission_description
  };
  ajax("POST","/admin/permissions/create",datas,newDataCreated,[event]);
}

function newDataCreated(params,success,responseObj){
  if(success){
    if(responseObj.kode == 200){
      showNotif('Sukses','success',responseObj.message);
      location.reload();
    }else{
      console.log(responseObj.message.permissions);
      var error = '';
      for(i=0;i<responseObj.message.permissions.length;i++){
        error+=responseObj.message.permissions[i];
      }
      showNotif('Error','error',error);
    }
  }
}

function startEdit(event){
  changeToInput(event.target.parentElement.parentElement);
}

function changeToInput(event){
  $(event).siblings().each(function(){
    if($(this).index()===1){
      if($(this).find('input').length){
        $(this).text($(this).find('input').val());
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
  });
}

function saveEdit(event){
  var column=event.target.parentElement.parentElement.parentElement.children;
  var id=event.target.parentElement.dataset['id'];
  var permission_name=column[1].firstChild.value;
  var permission_display_name=column[2].firstChild.value;
  var permission_description=column[3].firstChild.value;
  var datas={
    'id':id,
    'name':permission_name,
    'display_name':permission_display_name,
    'description':permission_description
  };
  ajax("POST","/admin/permissions/update",datas,dataUpdated,[event]);
}


function dataUpdated(params,success,responseObj){
  var event=params[0];
  if(success){
    if(responseObj.kode==200){
      changeToInput(event.target.parentElement.parentElement);
      showNotif('Sukses','success',responseObj.message);
      location.reload();
    }else{
      console.log(responseObj.message.root_type_name);
      var error = '';
      for(i=0;i<responseObj.message.root_type_name.length;i++){
        error+=responseObj.message.root_type_name[i];
      }
      showNotif('Error','error',error);
    }
  }
}

function startDelete(event){
  deleteData(event);
}

function deleteData(event){
  event.preventDefault();
  var id = event.target.parentElement.dataset['id'];
  console.log(event.target.parentElement);
  event.target.removeEventListener('click',startDelete);
  ajax("GET","/admin/permissions/"+id+"/delete/",null,endDeleteData,[event.target.parentElement]);
}

function endDeleteData(params,success,responseObj){
  var event=params[0];
  if(success){
    if(responseObj.kode==200){
      showNotif('Sukses','success',responseObj.message);
      location.reload();
    }else{
      console.log(responseObj.message.root_type_name);
      var error='';
      for(i=0;i<responseObj.message.root_type_name.length;i++){
        error+=responseObj.message.root_type_name[i];
      }
      showNotif('Error','error',error);
    }
  }
}
