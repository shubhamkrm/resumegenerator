function htmlToElement(html) {
    var template = document.createElement('template');
    html = html.trim();
    template.innerHTML = html;
    return template.content.firstChild;
} 

function get_element(type, name, count, par) {
  var element_str = "";
  switch(type) {
	case "bulleted_list":
	  element_str = '<input class="form-control col-md-4" type="text" name=' + name + '[' + count + ']">';
	  return htmlToElement(element_str);
	  break;
	case "education":	
	  element_str = '<fieldset class="repeatable row"> <legend>Education '+(count+1) +'</legend> <div class="textbox col-md-8"> <label for="degree">Degree</label> <input class="form-control" type="text" name="education['+count+'][degree]"> </div> <div class="textbox col-md-4"> <label for="time">Time</label> <input class="form-control" type="text" name="education['+count+'][time]"> </div> <div class="textbox col-md-8"> <label for="institution">Institution</label> <input class="form-control" type="text" name="education['+count+'][institution]"> </div> <div class="textbox col-md-4"> <label for="percentage">Percentage</label> <input class="form-control" type="text" name="education['+count+'][percent_val]"> </div> </div> </fieldset>';
	  return htmlToElement(element_str);
	case "workex":
	  element_str = '<fieldset class="repeatable row"> <legend>Experience '+(count + 1)+'</legend> <div class="textbox col-md-4"> <label for="time">Time</label> <input class="form-control" type="text" name="workex['+count+'][time]"> </div> <div class="textbox col-md-4"> <label for="designation">Designation</label> <input class="form-control" type="text" name="workex['+count+'][designation]"> </div> <div class="textbox col-md-4"> <label for="organisation">Organisation</label> <input class="form-control" type="text" name="workex['+count+'][organisation]"> </div> <div class="textbox col-md-12"> <label for="description">Description</label> <textarea class="form-control" name="workex['+count+'][desc]" cols="50" rows="3"> </textarea> </div></fieldset>'
	  return htmlToElement(element_str);
	case "yearlist":
	  element_str = '	<tr> <td class="yearlist-year"><input class="form-control" type="text" name="achievements['+count+'][time]"></td> <td class="yearlist-desc"><input class="form-control" type="text" name="achievements['+count+'][desc]"></td> </tr>';
	  return htmlToElement(element_str);
	default:
	  console.log("Wrong type");
	  break;
  }
}

function get_element_attribs(element) {
  var p = element.parentElement;
  var div;
  if (p.classList.contains('repeat-parent')){
	div = p;
  } else {
	div = p.querySelector(".repeat-parent");
  }
  var count = parseInt(div.dataset.count);
  var name = div.dataset.name;
  return {name: name, count: count, parent_div: div};
}

function append(parent_div, element, count) {
  parent_div.appendChild(element);
  parent_div.dataset.count = count +  1;
}

function add(e, type) {
  e.preventDefault();
  var button = e.target;
  var attribs = get_element_attribs(button);
  var element = get_element(type, attribs.name, attribs.count, attribs.parent_div);
  append(attribs.parent_div, element, attribs.count);
}

var list_buttons = document.getElementsByClassName('bulleted-list-add');
for (i = 0; i < list_buttons.length; i++){
  list_buttons[i].addEventListener('click', function(e) { return add(e, 'bulleted_list')});
}

var yearlist_buttons = document.getElementsByClassName('yearlist-add');
for (i = 0; i < yearlist_buttons.length; i++){
  yearlist_buttons[i].addEventListener('click', function(e) { return add(e, 'yearlist')});
}

var edu_button = document.getElementsByClassName('education-add')[0];
edu_button.addEventListener('click', function(e) { return add(e, 'education')});

var work_button = document.getElementsByClassName('workex-add')[0];
work_button.addEventListener('click', function(e) { return add(e, 'workex')});

