function startAdd(event){
    $leaf_type_name = document.getElementById('leaf_type_name').value;
    var datas = {'leaf_type_name':$leaf_type_name};
    ajax("POST",'/leaf_type/create',datas,newLeafType,[event]);
}

function newLeafType(params,success,responseObj){
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
}