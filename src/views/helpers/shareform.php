<?php
namespace stormwind\hw4\helpers;
require_once('helper.php');

class shareForm extends Helper{
	public function render($data) {
		?>
		<form action="index.php?c=landing&m=shareform" method="get" onsubmit="return validateForm()" name="shareform" id="shareform">
		<select name="c" style="display:none;">
		<option value="landing">Go to write</option>
		</select>
		<select name="a" style="display:none;">
		<option value="shareform">Go to write</option>
		</select>
	
		
		<label>Chart Title <input type="text" name ="title" value=""> </label><br><br>

		<textarea name="content" form="shareform" rows="20" cols="50" placeholder="allowed formate: The first coordinate should represent a text label, the remaining coordinates should represent values that correspond to that text label from up to 5 sources. On every row, the first coordinate must be a nonempty string For example: Jan,600,5.4 Aug,,10.1"></textarea><br>
		<input type="submit" value ="Go">
		</form>
		<?php
	}
}
?>
<script>
function validateForm() {
    var x = document.forms["shareform"]["title"].value;
    var y = document.forms["shareform"]["content"].value;
    var arr = y.split("\n");
    if (x == "") {
        alert("Title must be filled out");
        return false;
    }
    
    if (y.length == 0) {
    	alert("Content must be filled out");

    	return false;
    }
    if (arr.length > 50) {
    	alert("Content lines must be lower than 50");

    	return false;
    }
    for (var i = 0 ; i <arr.length ; i++) {
    	var subarr = arr[i].split(",");
        for (var j = 1 ; j <subarr.length ; j++) {
            if (isNaN(subarr[j])) {
                alert("values have to be an legal integer number ");
                return false;
            }
        }
    	if (arr[i].length > 80) {
    		alert("Each rows must be lower than 80 characters");
    		return false;
    	}
    	if (subarr.length > 6 || subarr.length <= 0) {
    		alert("The sources have to less than or equal to 5 and greater 0 each row");
    		return false;
    	}
    	if (subarr[0] == "") {
    		alert("The first coordinate must be a nonempty string");
    		return false
    	}

    }
}
</script>