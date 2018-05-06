//utilize a confirmation window to ensure changes are intended.
function saveChanges(){
  blnSave = confirm("Save Changes");
  if (blnSave){
    document.getElementById("frmPart").submit();
  }
}
