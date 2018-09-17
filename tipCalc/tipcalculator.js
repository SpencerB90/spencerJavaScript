
//hide the total dollar amount until calculated
document.getElementById("totalTip").style.display = "none";

//build the on click event for the calculate button
document.getElementById("calculate").onclick = function(){ calculateTip(); };


//create calculateTip function
function calculateTip(){
  let billAmt = document.getElementById("billamt").value;
  let serviceQual = document.getElementById("serviceQual").value;
  let peopleAmt = document.getElementById("peopleamt").value;

  //check for 0 or null values
  if (peopleAmt <= 0 || isNaN(peopleAmt)){
    alert("You must enter the number or people, must be greater than 0.");
    return;
  }
  if(billAmt < 0 || isNaN(billAmt)){
    alert("You must enter the bill amount, must be greater than 0.");
    return;
  }

//calculate total
let total = (billAmt * serviceQual) / peopleAmt;

//displaying hidden amount
document.getElementById("totalTip").style.display = "block";

//replaces html within the span tags
document.getElementById("tip").innerHTML = total.toFixed(2);

}
