var elem = document.querySelector('select');
var instance = M.FormSelect.init(elem, 'options');


$(document).ready(function(){
    var count = document.getElementById("processors").rows;

    for (i = 0; i < count.length; i++){
        var isNew = document.getElementById("processors").rows[i].cells[1];
        if(isNew === '1'){
            isNew.innerHTML = 'Yes';
        }
        else {
            isNew.innerHTML = 'No';
        }

        
    }
   
 
 });