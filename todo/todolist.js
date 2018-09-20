
//Since the Add button dose not have a class or id, grab all the buttons
let myButtons = document.getElementsByTagName("button");

//Add button is the first of the buttons, so we can grab that one
let AddButton = myButtons[0];

//create an onclick event for the Add button
AddButton.onclick = function(){addToDoItem()};


function addToDoItem()
{
  //grab ul
  let ul = document.getElementById("incomplete-tasks");

  //create child object
  var li = document.createElement("li");
  let newTask = document.getElementById("new-task").value;

  li.innerHTML = newTask;
  //append child <li> to the <ul>
  ul.appendChild(li);

}
