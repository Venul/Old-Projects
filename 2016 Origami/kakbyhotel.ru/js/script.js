ymaps.ready(init);
var myMap, myPlacemark;

function init(){
      myMap = new ymaps.Map("map", {
          center: [44.954482, 34.112086],
          zoom: 17
      });

      myPlacemark = new ymaps.Placemark([44.954482, 34.112086], {hintContent: 'Как бы отель'});
      myMap.geoObjects.add(myPlacemark);
}

//*********************************************Модуль бронирования**************
var myEventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
var myEventListener = window[myEventMethod];
var myEventMessage = myEventMethod == "attachEvent" ? "onmessage" : "message";
myEventListener(myEventMessage, function(e) {
    if (e.data === parseInt(e.data)) {
        document.getElementById('my-iframe-id').height = e.data + "px";
        console.log(e.data);
    }
}, false);
//******************************************************************************


$("#modal").iziModal({
  headerColor: 'rgb(253, 114, 91)',
  timeout: 4000,
  timeoutProgressbar: true,
  timeoutProgressbarColor: 'rgba(0, 0, 0, 0.9)'
});

$("#modal2").iziModal({
  headerColor: 'rgb(253, 114, 91)',
  width: 938
});



function ViewModel() {
  self.fields = ko.observable({
    nameField: ko.observable(),
    phoneField: ko.observable()
  });

  self.fieldStatus = {
    nameField: ko.observable(false),
    phoneField: ko.observable(false)
  };

  self.sentData = function() {
    if(self.checkFields()) return false;
    $('#modal').iziModal('open');
    self.fields().nameField('');
    self.fields().phoneField('');
  };

  self.returnDefaultField = function(item, event) {
    self.fieldStatus[event.target.name](false);
  };

  self.checkFields = function() {
    var isPass = false;
    $.each(self.fields(), function(index, item) {
      if(!item()) {
        self.fieldStatus[index](true);
        isPass = true;
      }
    });
    return isPass;
  };

}

ko.applyBindings(new ViewModel());
