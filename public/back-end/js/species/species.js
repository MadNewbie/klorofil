var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    var btnForm = document.getElementById('btnForm'); 
    var btnGroupOperation = document.getElementsByClassName('btnGroupOperation');
    for(i=0;i<btnGroupOperation.length;i++){
        btnGroupOperation[i].children[0].addEventListener('click',startEdit);
        btnGroupOperation[i].children[1].addEventListener('click',startDelete);
    }
    btnForm.addEventListener('click',startForm);
},100);

function startForm(event){
    ajax("GET","/admin/species_type/retrieve/",null,injectSpeciesTypeData,[event]);
    var btnSave = document.getElementById('btnSave');
    btnSave.addEventListener('click',startAdd);
    var species_id = document.getElementById('species_id');
    var scientific_name = document.getElementById('scientific_name');
    var density = document.getElementById('density');
    var max_age = document.getElementById('max_age');
    var flower_color = document.getElementById('flower_color');
    var flower_crown_shape = document.getElementById('flower_crown_shape');
    var flower_crown_number = document.getElementById('flower_crown_number');
    var flower_bloom_periode = document.getElementById('flower_bloom_periode');
    var leaf_type = document.getElementById('drp_leaf_type');
    var branch_type = document.getElementById('drp_branch_type');
    var trunk_type = document.getElementById('drp_trunk_type');
    var root_type = document.getElementById('drp_root_type');
    var function_type = document.getElementById('drp_function_species_type');
    var species_type = document.getElementById('drp_species_type');
    var btn_save = document.getElementById('btnSave');
    species_type.dataset.value = '';
    species_id.dataset.value = '';
    scientific_name.dataset.value = '';
    density.dataset.value = '';
    max_age.dataset.value = '';
    flower_color.dataset.value = '';
    flower_crown_number.dataset.value = '';
    flower_crown_shape.dataset.value = '';
    flower_bloom_periode.dataset.value = '';
    leaf_type.dataset.value = '';
    branch_type.dataset.value = '';
    trunk_type.dataset.value = '';
    root_type.dataset.value = '';
    function_type.dataset.value = '';
    species_id.value = '';
    scientific_name.value = '';
    density.value = '';
    max_age.value = '';
    flower_color.value = '';
    flower_crown_number.value = '';
    flower_crown_shape.value = '';
    flower_bloom_periode.value = '';
    btn_save.dataset.value  = '';
}

function injectSpeciesTypeData(params,success,responseObj){
    var drp_species_type = document.getElementById('drp_species_type');
    var species_type = responseObj.species_type;
    var selected = drp_species_type.dataset['value'];
    $(drp_species_type).empty();
    $(drp_species_type).append($('<option>',{
        text: 'Jenis Spesies',
        hidden:''
    }));
    if(success){
        for(i=0;i<species_type.length;i++){
            console.log(species_type[i].id==selected);
            if(selected !== null && selected == species_type[i].id){
                $(drp_species_type).append($('<option>',{
                    text: species_type[i].species_type_name,
                    value: species_type[i].id,
                    selected: 'true'
                }));
            }else{
                $(drp_species_type).append($('<option>',{
                    text: species_type[i].species_type_name,
                    value: species_type[i].id
                }));
            }
        }
    }
}

function startAdd(event){
    var species_id = document.getElementById('species_id').value;
    var scientific_name = document.getElementById('scientific_name').value;
    var density = document.getElementById('density').value;
    var max_age = document.getElementById('max_age').value;
    var flower_color = document.getElementById('flower_color').value;
    var flower_crown_shape = document.getElementById('flower_crown_shape').value;
    var flower_crown_number = document.getElementById('flower_crown_number').value;
    var flower_bloom_periode = document.getElementById('flower_bloom_periode').value;
    var species_type = document.getElementById('drp_species_type').selectedOptions[0].value;
    var leaf_type = document.getElementById('drp_leaf_type').selectedOptions[0].value;
    var branch_type = document.getElementById('drp_branch_type').selectedOptions[0].value;
    var trunk_type = document.getElementById('drp_trunk_type').selectedOptions[0].value;
    var root_type = document.getElementById('drp_root_type').selectedOptions[0].value;
    var function_type = document.getElementById('drp_function_species_type').selectedOptions[0].value;
    var datas = {'species_id':species_id,'scientific_name':scientific_name,'density':density,'max_age':max_age,
            'flower_color':flower_color,'flower_crown_shape':flower_crown_shape,'flower_crown_number':flower_crown_number,
            'flower_bloom_periode':flower_bloom_periode,'species_type_id':species_type,'leaf_type_id':leaf_type,'branch_type_id':branch_type,
            'trunk_type_id':trunk_type,'root_type_id':root_type,'function_type_id':function_type};
    ajax("POST","/admin/species/create",datas,newSpeciesCreated,event);
}

function injectTrunkTypes(params,success,responseObj){
    var drp_trunk_type = document.getElementById('drp_trunk_type');
    var trunk_type = responseObj.trunk_type;
    drp_trunk_type.innerHTML = '';
    $(drp_trunk_type).append($('<option>',{
        text:'Jenis Batang',
        hidden:''
    }));
    if(success){
        for(i=0;i<trunk_type.length;i++){
            $(drp_trunk_type).append($('<option>',{
                text: trunk_type[i].trunk_type_name,
                value: trunk_type[i].id
            }));
        }
    }
}

function injectBranchTypes(params,success,responseObj){
    var drp_branch_type = document.getElementById('drp_branch_type');
    var branch_type = responseObj.branch_type;
    drp_branch_type.innerHTML = '';
    $(drp_branch_type).append($('<option>',{
        text:'Jenis Cabang',
        hidden:''
    }));
    if(success){
        for(i=0;i<branch_type.length;i++){
            $(drp_branch_type).append($('<option>',{
                text: branch_type[i].branch_type_name,
                value: branch_type[i].id
            }));
        }
    }
}

function injectLeafTypes(params,success,responseObj){
    var drp_leaf_type = document.getElementById('drp_leaf_type');
    var leaf_type = responseObj.leaf_type;
    drp_leaf_type.innerHTML = '';
    $(drp_leaf_type).append($('<option>',{
        text:'Jenis Daun',
        hidden:''
    }));
    if(success){
        for(i=0;i<leaf_type.length;i++){
            $(drp_leaf_type).append($('<option>',{
                text: leaf_type[i].leaf_type_name,
                value: leaf_type[i].id
            }));
        }
    }
}

function injectRootTypes(params,success,responseObj){
    var drp_root_type = document.getElementById('drp_root_type');
    var root_type = responseObj.root_type;
    drp_root_type.innerHTML = '';
    $(drp_root_type).append($('<option>',{
        text:'Jenis Akar',
        hidden:''
    }));
    if(success){
        for(i=0;i<root_type.length;i++){
            $(drp_root_type).append($('<option>',{
                text: root_type[i].root_type_name,
                value: root_type[i].id
            }));
        }
    }
}

function injectFunctionTypes(params,success,responseObj){
    var drp_function_type = document.getElementById('drp_function_species_type');
    var function_type = responseObj.function_type;
    drp_function_type.innerHTML='';
     $(drp_function_type).append($('<option>',{
        text:'Fungsi Spesies',
        hidden:''
    }));
    if(success){
        for(i=0;i<function_type.length;i++){
            $(drp_function_type).append($('<option>',{
                text: function_type[i].function_type_species,
                value: function_type[i].id
            }));
        }
    }
}

function injectDataMaster(event){
    var species_id = document.getElementById('species_id');
    var scientific_name = document.getElementById('scientific_name');
    var density = document.getElementById('density');
    var max_age = document.getElementById('max_age');
    var flower_color = document.getElementById('flower_color');
    var flower_crown_shape = document.getElementById('flower_crown_shape');
    var flower_crown_number = document.getElementById('flower_crown_number');
    var flower_bloom_periode = document.getElementById('flower_bloom_periode');
    var leaf_type = document.getElementById('drp_leaf_type');
    var branch_type = document.getElementById('drp_branch_type');
    var trunk_type = document.getElementById('drp_trunk_type');
    var root_type = document.getElementById('drp_root_type');
    var function_type = document.getElementById('drp_function_species_type');
    ajax('GET','/admin/leaf_type/retrieve',null,injectLeafTypes,[event]);
    ajax('GET','/admin/branch_type/retrieve',null,injectBranchTypes,[event]);
    ajax('GET','/admin/trunk_type/retrieve',null,injectTrunkTypes,[event]);
    ajax('GET','/admin/root_type/retrieve',null,injectRootTypes,[event]);
    ajax('GET','/admin/function_type/retrieve',null,injectFunctionTypes,[event]);
    species_id.disabled = false;
    scientific_name.disabled = false;
    density.disabled = false;
    max_age.disabled = false;
    flower_color.disabled = false;
    flower_crown_shape.disabled = false;
    flower_crown_number.disabled = false;
    flower_bloom_periode.disabled = false;
    leaf_type.disabled = false;
    branch_type.disabled = false;
    trunk_type.disabled = false;
    root_type.disabled = false;
    function_type.disabled = false;
}

function newSpeciesCreated(params,success,responseObj){
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message);
            var error = '';
            for (errors in responseObj.message){
                for(i=0;i<responseObj.message[errors].length;i++){
                    error += responseObj.message[errors][i]+'\n';
                }
            }
            showNotif('Error','error',error);
        }
    }
}

function startEdit(event){
    var id = event.target.parentElement.dataset['id'];
    var btnSave = document.getElementById('btnSave');
    btnSave.addEventListener('click',saveEdit);
    ajax('GET','/admin/species/retrieve/'+id,null,injectDataEdit,[event]);
    ajax("GET","/admin/species_type/retrieve/",null,injectSpeciesTypeData,[event]);
}

function injectDataEdit(params,success,responseObj){
    var event = params[0];
    var species = responseObj.species;
    var species_id = document.getElementById('species_id');
    var scientific_name = document.getElementById('scientific_name');
    var density = document.getElementById('density');
    var max_age = document.getElementById('max_age');
    var flower_color = document.getElementById('flower_color');
    var flower_crown_shape = document.getElementById('flower_crown_shape');
    var flower_crown_number = document.getElementById('flower_crown_number');
    var flower_bloom_periode = document.getElementById('flower_bloom_periode');
    var leaf_type = document.getElementById('drp_leaf_type');
    var branch_type = document.getElementById('drp_branch_type');
    var trunk_type = document.getElementById('drp_trunk_type');
    var root_type = document.getElementById('drp_root_type');
    var function_type = document.getElementById('drp_function_species_type');
    var species_type = document.getElementById('drp_species_type');
    var btn_save = document.getElementById('btnSave');
    species_type.dataset.value = species[0]['species_type_id'];
    species_id.dataset.value = species[0]['species_id'];
    scientific_name.dataset.value = species[0]['scientific_name'];
    density.dataset.value = species[0]['density'];
    max_age.dataset.value = species[0]['max_age'];
    flower_color.dataset.value = species[0]['flower_color'];
    flower_crown_number.dataset.value = species[0]['flower_crown_number'];
    flower_crown_shape.dataset.value = species[0]['flower_crown_shape'];
    flower_bloom_periode.dataset.value = species[0]['flower_bloom_periode'];
    leaf_type.dataset.value = species[0]['leaf_type_id'];
    branch_type.dataset.value = species[0]['branch_type_id'];
    trunk_type.dataset.value = species[0]['trunk_type_id'];
    root_type.dataset.value = species[0]['root_type_id'];
    function_type.dataset.value = species[0]['function_type_species_id'];
    btn_save.dataset.value = species[0]['id'];
    species_id.value = species_id.dataset.value;
    scientific_name.value = scientific_name.dataset.value;
    density.value = density.dataset.value;
    max_age.value = max_age.dataset.value;
    flower_color.value = flower_color.dataset.value;
    flower_crown_number.value = flower_crown_number.dataset.value;
    flower_crown_shape.value = flower_crown_shape.dataset.value;
    flower_bloom_periode.value = flower_bloom_periode.dataset.value;
}

function saveEdit(event){
    var id = event.target.dataset.value;
    var species_id = document.getElementById('species_id').value;
    var scientific_name = document.getElementById('scientific_name').value;
    var density = document.getElementById('density').value;
    var max_age = document.getElementById('max_age').value;
    var flower_color = document.getElementById('flower_color').value;
    var flower_crown_shape = document.getElementById('flower_crown_shape').value;
    var flower_crown_number = document.getElementById('flower_crown_number').value;
    var flower_bloom_periode = document.getElementById('flower_bloom_periode').value;
    var species_type = document.getElementById('drp_species_type').selectedOptions[0].value;
    var leaf_type = document.getElementById('drp_leaf_type').selectedOptions[0].value;
    var branch_type = document.getElementById('drp_branch_type').selectedOptions[0].value;
    var trunk_type = document.getElementById('drp_trunk_type').selectedOptions[0].value;
    var root_type = document.getElementById('drp_root_type').selectedOptions[0].value;
    var function_type = document.getElementById('drp_function_species_type').selectedOptions[0].value;
    var datas = {'id':id,'species_id':species_id,'scientific_name':scientific_name,'density':density,'max_age':max_age,
            'flower_color':flower_color,'flower_crown_shape':flower_crown_shape,'flower_crown_number':flower_crown_number,
            'flower_bloom_periode':flower_bloom_periode,'species_type_id':species_type,'leaf_type_id':leaf_type,'branch_type_id':branch_type,
            'trunk_type_id':trunk_type,'root_type_id':root_type,'function_type_id':function_type};
    ajax("POST","/admin/species/update",datas,dataUpdated,event);
}

function dataUpdated(params,success,responseObj){
    var event = params[0];
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message);
            var error = '';
            for (errors in responseObj.message){
                for(i=0;i<responseObj.message[errors].length;i++){
                    error += responseObj.message[errors][i]+'\n';
                }
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
    event.target.removeEventListener('click',startDelete);
    ajax('GET','/admin/species/'+id+'/delete',null,endDeleteData,[event]);
}

function endDeleteData(params,success,responseObj){
    var event = params[0];
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            location.reload(); 
        }else{
            console.log(responseObj.message);
            var error = '';
            for (errors in responseObj.message){
                for(i=0;i<responseObj.message[errors].length;i++){
                    error += responseObj.message[errors][i]+'\n';
                }
            }
            showNotif('Error','error',error);
        }
    }
}