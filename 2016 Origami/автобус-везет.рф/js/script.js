$("#modal").iziModal({
  headerColor: '#FFDE00',
  timeout: 4000,
  timeoutProgressbar: true,
  timeoutProgressbarColor: 'rgba(0, 0, 0, 0.9)'
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
    $.post("sms_sender.php", $.param({
      nameField: self.fields().nameField(),
      phoneField: self.fields().phoneField()
    }));
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
