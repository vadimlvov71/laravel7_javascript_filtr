var checkboxes = document.querySelectorAll("input[type=checkbox][name=checkbox]");
let enabledSettings = []



// Use Array.forEach to add an event listener to each checkbox.
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
    
    enabledSettings = 
      Array.from(checkboxes) // Convert checkboxes to an array to use filter and map.
      .filter(i => i.checked) // Use Array.filter to remove unchecked checkboxes.
      .map(i => i.value) // Use Array.map to extract only the checkbox values from the array of objects.
     // Simulate an HTTP redirect:
     if(enabledSettings.includes("all") && !enabledSettings.includes("hidden") ){
        var uri = "?";
        window.location.replace("?"); 
        console.log("all");
     }else{
        var uri = "?";
        console.log(enabledSettings);
        remove(enabledSettings, "all");
        remove(enabledSettings, "hidden");
        
          enabledSettings.forEach(function(enabledSetting, i, arr) {
                if(i == 0){
                    uri += "catalog_id[]=" + enabledSetting;
                }else{
                    uri += "&catalog_id[]=" + enabledSetting;
                }
          })
       window.location.replace(uri); 
    }
  })  
});
function remove(array, key_value){
  const value = array.indexOf(key_value);
  if (value > -1) { // only splice array when item is found
    array.splice(value, 1); // 2nd parameter means remove one item only
  }
}
