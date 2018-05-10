var elem = document.querySelector('select');
var instance = M.FormSelect.init(elem, 'options');

$(document).ready(function() {
  $('select').material_select();
});

// //utilize a confirmation window to ensure changes are intended.
// function saveChanges(){
    // blnSave = confirm("Save Changes");
    // if (blnSave){
      // document.getElementById("frmPart").submit();
    // }
  // }
  