function startAdd(event){
    var animal_name = document.getElementById('animal_name').value;
    var description = document.getElementById('description').value;
    var datas = {'animal_name':animal_name,'description':description};
    ajax('POST','/habitat/create',datas,newHabitatCreated,[event]);
}

function newHabitatCreated(params,success,responseObj){
    if(success){
        showNotif('Sukses','success',responseObj.message);
    }
}