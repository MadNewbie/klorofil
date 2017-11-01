      var map;
      var pointBorder = new Array();
      var selectedBorder;
      
      function initMap() {
        var defaultCenter = {lat: -7.9666204, lng: 112.6326321};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: defaultCenter
        });
        var marker = new google.maps.Marker({
          position: defaultCenter,
          map: map
        });
        google.maps.event.addListener(map,"click",function(event){
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            var point = {lat:lat,lng:lng};
            onClick(point);
        });
      }
      
      function onClick(point){
          pointBorder.push(point);
//          console.log(pointBorder);
          if(selectedBorder !== undefined){
//            console.log(selectedBorder.getPath());
            selectedBorder.setMap(null);
          }
          var borderLine = new google.maps.Polygon({
                paths: pointBorder,
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 3,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                editable:true
          });
          selectedBorder = borderLine;
          selectedBorder.setMap(map);
//          borderLine.setMap(map);
      }
      
//      function btnSimpanOnClick(){
//          pointBorder = new Array();
//          for(var i=0;i<selectedBorder.getPath().getLength();i++){
//              pointBorder.push(selectedBorder.getPath().getAt(i).toUrlValue(6));
//          }
//          window.alert(pointBorder);
//      }