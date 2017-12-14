function injectRoleTypeEdit(params,success,responseObj){
    var event = params[0];
    var drp_role_type = document.getElementById("drp_role_type_edit");
    var role_type = responseObj.species_type;
    var selected = drp_species_type.parentElement.dataset['id'];
    if(success){
        for(i=0;i<species_type.length;i++){
            if(species_type[i].id==selected){
                $(drp_species_type).append($('<option>',{
                    text: species_type[i].species_type_name,
                    value: species_type[i].id,
                    selected: true
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
