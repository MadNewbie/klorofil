//var docReady = setInterval(function(){
//    if(document.readyState !== "complete"){
//        return;
//    }
//    clearInterval(docReady);
//    var btnSimpan = document.getElementById('btnSimpan');
//    btnSimpan.addEventListener('click',startAdd());
//},100);

function startAdd(event){
    console.log('kepencet');
    var nama_negara = document.getElementById('nama_negara').value;
    var pointBorder = [];
    if(selectedBorder === ''){
        showNotif('Error','error','Tidak ada wilayah yang dipilih');
    }else{
        for(var i=0;i<selectedBorder.getPath().getLength();i++){
            if(i==selectedBorder.getPath().getLength()-1){
                pointBorder.push(selectedBorder.getPath().getAt(i).lat(6)+' '+selectedBorder.getPath().getAt(i).lng(6));
                pointBorder.push(selectedBorder.getPath().getAt(0).lat(6)+' '+selectedBorder.getPath().getAt(0).lng(6));
            }else{
                pointBorder.push(selectedBorder.getPath().getAt(i).lat(6)+' '+selectedBorder.getPath().getAt(i).lng(6));
            }
        };
//        console.log(selectedBorder);
//        window.alert("Nama: "+nama_negara+" Area: ("+pointBorder+")");
        var datas = {"name":nama_negara,"detail_area":pointBorder};
        window.alert("Nama negaera: "+datas.nname+" Area: "+datas.detail_area);
//        ajax("POST","/admin/negara/create",datas,newNegaraCreated,[event]);
    }
}

function newNegaraCreated(params,success,responseObj){
    if(success){
        if(responseObj.kode == 200){
            showNotif('Sukses','success',responseObj.message);
            console.log(responseObj.message);
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
    }else{
        console.log('gagal');
    }
}