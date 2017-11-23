//var docReady = setInterval(function(){
//    if(document.readyState !== "complete"){
//        return;
//    }
//    clearInterval(docReady);
//    var btnSimpan = document.getElementById('btnSimpan');
//    btnSimpan.addEventListener('click',startAdd());
//},100);

function startAdd(event){
    var nama_negara = document.getElementById('nama_negara').value;
    var pointBorder = [];
    for(var i=0;i<selectedBorder.getPath().getLength();i++){
        if(i==selectedBorder.getPath().getLength()-1){
            pointBorder.push(selectedBorder.getPath().getAt(i).lat(6)+' '+selectedBorder.getPath().getAt(i).lng(6));
            pointBorder.push(selectedBorder.getPath().getAt(0).lat(6)+' '+selectedBorder.getPath().getAt(0).lng(6));
        }else{
            pointBorder.push(selectedBorder.getPath().getAt(i).lat(6)+' '+selectedBorder.getPath().getAt(i).lng(6));
        }
    };
    console.log(selectedBorder);
    window.alert("Nama: "+nama_negara+" Area: ("+pointBorder+")");
    var datas = {"name":nama_negara,"detail_area":pointBorder};
    ajax("POST","/admin/negara/create",datas,newNegaraCreated,[event]);
}

function newNegaraCreated(params,success,responseObj){
    if(success){
        showNotif("Sukses","success",responseObj.message);
    }
//    location.reload();
}