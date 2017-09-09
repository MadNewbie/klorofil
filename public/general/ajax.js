function showNotif(title,type,message){
    if( typeof (PNotify) === 'undefined'){ return; }
    new PNotify({
            title: title,
            type: type,
            text: message,
            styling: 'bootstrap3',
            buttons:{sticker:false},
            before_close: function(PNotify) {
                PNotify.queueRemove();
                return false;
            }
        });
}

function ajax(method,url,params,callback,callbackParams){
    var http;
    
    if(window.XMLHttpRequest){
        http = new XMLHttpRequest();
    }else{
        http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    http.onreadystatechange = function(){
        if(http.readyState == XMLHttpRequest.DONE){
            if(http.status == 200){
                var obj = JSON.parse(http.responseText);
                callback(callbackParams,true,obj);
            }else if(http.status == 400){
                showNotif("Error","error","Data could not be saved. Please Try Again");
//                alert("Data could not be saved. Please Try Again");
                callback(callbackParams,false);
            }else{
                var obj = JSON.parse(http.responseText);
                if(obj.message){
                    showNotif("Sukses","success",obj.message);
//                    alert(obj.message);
                }else{
                    showNotif("Error","error",obj.message+", Please check the data");
//                    alert("Please check the data");
                }
            }
        };
    }
    
    http.open(method,baseUrl + url, true);
    http.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    http.setRequestHeader('X-Requested-With','XMLHttpRequest');
    http.send(params + "&_token=" + token);
}
