
//Since the Add button dose not have a class or id, grab all the buttons
let myButtons = document.getElementsByTagName("button");

//Add button is the first of the buttons, so we can grab that one
let AddButton = myButtons[0];

//create an onclick event for the Add button
AddButton.onclick = function(){addToDoItem()};

//create a function to add todo list item
function addToDoItem()
{
  //grab ul
  let ul = document.getElementById("incomplete-tasks");

  //create child <li> object
  let li = document.createElement("li");

  //create child label object
  let label = document.createElement("label");

  //grab the textbox value and set it as text of <li>
  let newTask = document.getElementById("new-task").value;

  //.innerHTML - translates everything from innerHTML
  // - innerTEXT can work too, will work with later
  label.innerHTML = newTask;

  //append child <label> to the <li>
  li.appendChild(label);

  //append child <li> to the <ul>
  ul.appendChild(li);

}
