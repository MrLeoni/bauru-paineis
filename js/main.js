jQuery(document).ready(function() {
  
  // Delete this line
  console.log("Script is ready!");
  
  // Display the current year
  function currentDate() {
    var date = new Date();
    jQuery("#js-date").html(date.getFullYear());
  }
  currentDate();
  
});