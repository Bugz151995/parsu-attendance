function deleteData(modal, input, sessionName, sessionKey) {
  var myModalEl = document.getElementById(modal)
  myModalEl.addEventListener('hidden.bs.modal', function(event) {
    let inputTag = document.getElementById(input);
    inputTag.setAttribute('value', "");
  })

  myModalEl.addEventListener('shown.bs.modal', function(event) {
    let inputTag = document.getElementById(input);
    let id = JSON.parse(sessionStorage.getItem(sessionName)).sessionKey;

    inputTag.setAttribute('value', id);
  })
}