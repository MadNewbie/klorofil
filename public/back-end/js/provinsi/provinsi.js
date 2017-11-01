var docReady = setInterval(function(){
    if(document.readyState !== "complete"){
        return;
    }
    clearInterval(docReady);
    ajax("GET","/negara/retrieve",null,injectProvinsi,null);
    var drp_negara = document.getElementById('drp_negara');
    drp_negara.addEventListener('');
},100);

function injectProvinsi(params,success,responseObj){
    var drp_negara = document.getElementById('drp_negara');
    var negara = responseObj.negara;
    $(drp_negara).append($('<option>',{
        text: 'Negara',
        hidden:''
    }));
    if(success){
        for(i=0;i<negara.length;i++){
            $(drp_negara).append($('<option>',{
                text: negara[i].negara_name,
                value: negara[i].id
            }));
        }
    }
}