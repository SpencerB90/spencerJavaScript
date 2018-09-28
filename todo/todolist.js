
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
  //create the child <input> for checkbox
  let input = document.createElement("input");
  //create and set type attribute for <input>
  input.setAttribute("type","checkbox");

  //calls function to movechild to completed list li
  input.onclick = function() {addtoCompeleteLi(this)}

  //create child label object
  let label = document.createElement("label");

  //create the child <button> for edit
  let bInputE = document.createElement("button");
  //create class ="edit"
  bInputE.setAttribute("class","editMode");
  //another way to set the onclick than the delete button
  bInputE.onclick = function() {editLi(this)};
  //bInputE.setAttribute("onclick","editLi(this)");
  //creates edit text (innerHTML) for the button
  bInputE.innerHTML = "Edit";

  //create the child <button> for delete
  let bInputD = document.createElement("button");
  //create class ="delete"
  bInputD.setAttribute("class","delete");
  //adding event listener to delete button //using this
  bInputD.setAttribute("onclick", "deleteLi(this)");
  //creates edit text (innerHTML) for the button
  bInputD.innerHTML = "Delete";

  //creating child <input> for text
  let text = document.createElement("input");
  //create and set type attribute for <input>
  text.setAttribute("type","text");

  //grab the textbox value and set it as text of <li>
  let newTask = document.getElementById("new-task").value;

  //.innerHTML - translates everything from innerHTML
  // - innerTEXT can work too, will work with later
  label.innerHTML = newTask;

  //append the child <input> checkbox to <li>
  li.appendChild(input);

  //append child <label> to the <li>
  li.appendChild(label);

  //append the child <input> text to <li>
  li.appendChild(text);

  //append the child <button> edit to <li>
  li.appendChild(bInputE);

  //append the child <button> delete to <li>
  li.appendChild(bInputD);

  //append child <li> to the <ul>
  ul.appendChild(li);





 }

//dosent work atm
  //create li function to delete
  function deleteLi(item){
    //grab parent <ul>
    let ul = document.getElementById("incomplete-tasks");

    //figure out which child <li> li is
    let inChild = item.parentNode;

    //remove the child
    ul.removeChild(inChild);

  }

  function editLi(item){
    //figure out what <li> to change
    let li = item.parentNode;

    //change the <li> class to "edit"
    li.setAttribute("class", "editMode");

    //get the innerHTML of the label
    labelText = li.childNodes[1].innerHTML;

    //put the labels text into the value of the textbox
    let textbox = li.childNodes[2];

  //  textbox.value = labelText;
     textbox.Attribute("value", labelText);

  }

  function addtoCompeleteLi(item){
    //weekend work
    let ulcompT = document.getElementById("completed-tasks");

    let moveChild = item.parentNode;

    ulcompT.appendChild(moveChild);

  }
