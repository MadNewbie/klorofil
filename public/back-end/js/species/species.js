var docReady = setInterval(function(){
    if(document.readyState!=="complete"){
        return;
    }
    clearInterval(docReady);
    ajax("GET","/species_type/retrieve",null,injectSpeciesTypes,null);
    ajax("GET","/trunk_type/retrieve",null,injectTrunkTypes,null);
    ajax("GET","/leaf_type/retrieve",null,injectLeafTypes,null);
    ajax("GET","/branch_type/retrieve",null,injectBranchTypes,null);
    ajax("GET","/root_type/retrieve",null,injectRootTypes,null);
    ajax("GET","/function_type/retrieve",null,injectFunctionTypes,null);
},100);

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
    var function_type = document.getElementById('drp_function_type').selectedOptions[0].value;
    var datas = {'species_id':species_id,'scientific_name':scientific_name,'density':density,'max_age':max_age,
            'flower_color':flower_color,'flower_crown_shape':flower_crown_shape,'flower_crown_number':flower_crown_number,
            'flower_bloom_periode':flower_bloom_periode,'species_type_id':species_type,'leaf_type_id':leaf_type,'branch_type_id':branch_type,
            'trunk_type_id':trunk_type,'root_type_id':root_type,'function_type_id':function_type};
    ajax("POST","/species/create",datas,newSpeciesCreated,event);
}

function newSpeciesCreated(params,success,responseObj){
      if(success){
        showNotif('Sukses','success',responseObj.message);
    }  
}

function injectSpeciesTypes(params,success,responseObj){
    var drp_species_type = document.getElementById("drp_species_type");
    var species_type = responseObj.species_type;
    $(drp_species_type).append($('<option>',{
        text: 'Jenis Spesies',
        hidden:''
    }));
    if(success){
        for(i=0;i<species_type.length;i++){
            $(drp_species_type).append($('<option>',{
                text: species_type[i].species_type_name,
                value: species_type[i].id
            }));
        }
    }
}

function injectTrunkTypes(params,success,responseObj){
    var drp_trunk_type = document.getElementById('drp_trunk_type');
    var trunk_type = responseObj.trunk_type;
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
    var drp_function_type = document.getElementById('drp_function_type');
    var function_type = responseObj.function_type;
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