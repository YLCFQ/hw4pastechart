<?php
namespace stormwind\hw4\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/title.php');
require_once('elements/link.php');
require_once('helpers/shareform.php');
require_once('elements/h5.php');
class DrawView extends View{
	public function render($data){
		//Declare the classes I will be using here

		$type = $data[0];
		$key = $data[1];
		$title = $data[2];
		$content = $data[3];
        $graphs = array("LineGraph", "PointGraph", "Histogram");


		$h1 = new \stormwind\hw4\elements\h1();
        $link = new \stormwind\hw4\elements\Link();
        $h5 = new \stormwind\hw4\elements\h5();

        $content = trim(preg_replace('/\s\s+/', '|', $content));
        $temp = explode("\n", $content);
        $modifiedContent = "";
        for ($i = 0 ; $i<count($temp); $i++) {
            $modifiedContent = $modifiedContent . $temp[$i] . "|";
        }

		echo $h1->render("$key $type - PasteChart");
        for ($i = 0 ; $i < count($graphs) ; $i++) {
            $graphType = $graphs[$i];
        echo $h5->render("As a " . $graphType . ":");
        echo "<p>".$link->render(BASE_URL."?c=chart&a=show&arg1=". $graphType."&arg2=".$key)."</p>";
        }




		?>


		<div id="container">
    	</div>
		<script>
        var chartType = "<?php echo $type ?>";

        var chartTitle = "<?php echo $title ?>";

        var chartData = "<?php echo $content ?>";


document.write(chartData);
        var arr = chartData.split("|");
        var jsonVariable = {};
        for (var i = 0 ; i <arr.length ; i++) {

            var subarr = arr[i].split(",");
            var jsonkey = subarr[0];
            jsonVariable[jsonkey] = subarr.slice(1, arr.length+1);
        }
        

        var graph = new Chart(chartType,"container", jsonVariable, {"title":chartTitle});
    	graph.draw();
		</script>
		<?php
        

	}
}
?>

<script>
function Chart(chartType, chart_id, data)
{
    var self = this;
    var p = Chart.prototype;
    var properties = (typeof arguments[2] !== 'undefined') ?
        arguments[2] : {};
    var container = document.getElementById(chart_id);
    if (!container) {
        return false;
    }
    var property_defaults = {
        'axes_color' : 'rgb(128,128,128)', // color of the x and y axes lines
        'caption' : '', // caption text appears at bottom
        'caption_style' : 'font-size: 14pt; text-align: center;',
            // CSS styles to apply to caption text
        'data_color' : 'rgb(0,0,255)', //color used to draw grah
        'height' : 500, //height of area to draw into in pixels
        'line_width' : 1, // width of line in line graph
        'x_padding' : 30, //x-distance left side of canvas tag to y-axis
        'y_padding' : 30, //y-distance bottom of canvas tag to x-axis
        'point_radius' : 3, //radius of points that are plot in point graph
        'tick_length' : 10, // length of tick marks along axes
        'ticks_y' : 5, // number of tick marks to use for the y axis
        'tick_font_size' : 10, //size of font to use when labeling ticks
        'title' : '', // title text appears at top
        'title_style' : 'font-size:24pt; text-align: center;',
            // CSS styles to apply to title text
        'type' : 'LineGraph', // currently, can be either a LineGraph or
            //PointGraph
        'width' : 500 //width of area to draw into in pixels
    };
    property_defaults['type'] = chartType;
    for (var property_key in property_defaults) {
        if (typeof properties[property_key] !== 'undefined') {
            this[property_key] = properties[property_key];
        } else {
            this[property_key] = property_defaults[property_key];
        }
    }
    title_tag = (this.title) ? '<div style="' + this.title_style
         + 'width:' + this.width + '" >' + this.title + '</div>' : '';
    caption_tag = (this.caption) ? '<figcaption style="' + this.caption_style
         + 'width:' + this.width + '" >' + this.caption + '</figcaption>' : '';
    container.innerHTML = '<figure>'+ title_tag + '<canvas id="' + chart_id +
        '-content" ></canvas>' + caption_tag + '</figure>';
    canvas = document.getElementById(chart_id + '-content');
    if (!canvas || typeof canvas.getContext === 'undefined') {
        return
    }
    var context = canvas.getContext("2d");
    canvas.width = this.width;
    canvas.height = this.height;
    this.data = data;
    /**
     * Main function used to draw the graph type selected
     */
    p.draw = function()
    {
        self['draw' + self.type]();
    }
    /**
     * Used to store in fields the min and max y values as well as the start
     * and end x keys, and the range = max_y - min_y
     */
    p.initMinMaxRange = function()
    {
        self.min_value = null;
        self.max_value = null;
        self.start;
        self.end;
        var key;
        for (key in data) {
        	var subData = data[key];
        	for (subkey in subData) {
             document.write("max:"+subData[subkey]);
             subData[subkey] = parseInt(subData[subkey]);
            if (self.min_value === null) {
                self.min_value = subData[subkey];
                self.max_value = subData[subkey];
                self.start = key;
            }
            if (subData[subkey] < self.min_value) {
                self.min_value = subData[subkey];
            }
            if (subData[subkey] > self.max_value) {
                self.max_value = subData[subkey];

            }
           
        	}
            self.end = key;
            self.range = self.max_value - self.min_value;
            
        }

    }
    /**
     * Used to draw a point at location x,y in the canvas
     */
    p.plotPoint = function(x,y)
    {
        var c = context;
        c.beginPath();
        c.arc(x, y, self.point_radius, 0, 2 * Math.PI, true);
        c.fill();
    }
    /**
     * Draws the x and y axes for the chart as well as ticks marks and values
     */
    p.renderAxes = function()
    {
        var c = context;
        var height = self.height - self.y_padding;
        c.strokeStyle = self.axes_color;
        c.lineWidth = self.line_width;
        c.beginPath();
        c.moveTo(self.x_padding - self.tick_length,
            self.height - self.y_padding);
        c.lineTo(self.width - self.x_padding,  height);  // x axis
        c.stroke();
        c.beginPath();
        c.moveTo(self.x_padding, self.tick_length);
        c.lineTo(self.x_padding, self.height - self.y_padding +
            self.tick_length);  // y axis
        c.stroke();
        var spacing_y = self.range/self.ticks_y;
        height -= self.tick_length;
        var min_y = parseFloat(self.min_value);
        var max_y = parseFloat(self.max_value);
        document.write("what's going on:" + self.max_value + "    ");
        var num_format = new Intl.NumberFormat("en-US",
            {"maximumFractionDigits":2});
        // Draw y ticks and values
        for (var val = min_y; val < max_y + spacing_y; val += spacing_y) {


            y = self.tick_length + height * 
                (1 - (val - self.min_value)/self.range);
            c.font = self.tick_font_size + "px serif";
            c.fillText(num_format.format(val), 0, y + self.tick_font_size/2,
                self.x_padding - self.tick_length);
            c.beginPath();
            c.moveTo(self.x_padding - self.tick_length, y);
            c.lineTo(self.x_padding, y);

            c.stroke();
        }
        // Draw x ticks and values
        var dx = (self.width - 2 * self.x_padding) /
            (Object.keys(data).length - 1);
        var x = self.x_padding;
        for (key in data) {

            c.font = self.tick_font_size + "px serif";
            c.fillText(key, x - self.tick_font_size/2 * (key.length - 0.5), 
                self.height - self.y_padding +  self.tick_length +
                self.tick_font_size, self.tick_font_size * (key.length - 0.5));
            c.beginPath();
            c.moveTo(x, self.height - self.y_padding + self.tick_length);
            c.lineTo(x, self.height - self.y_padding);
            c.stroke();
            x += dx;
        }
    }
    /**
     * Draws a chart consisting of just x-y plots of points in data.
     */
    p.drawPointGraph = function()
    {
        self.initMinMaxRange();
        self.renderAxes();
        var dx = (self.width - 2*self.x_padding) /
            (Object.keys(data).length - 1);
        var c = context;
        c.lineWidth = self.line_width;
        c.strokeStyle = self.data_color;
        c.fillStyle = self.data_color;
        var height = self.height - self.y_padding - self.tick_length;
        var x = self.x_padding;
        for (key in data) {
        	var subData = data[key];
        	for (subkey in subData) {
            y = self.tick_length + height *
                (1 - (subData[subkey] - self.min_value)/self.range);
             document.write("x:" +x);
            self.plotPoint(x, y);
           
        }
         x += dx;
        }
    }
    /**
     * Draws a chart consisting of x-y plots of points in data, each adjacent
     * point pairs connected by a line segment
     */
    p.drawLineGraph = function()
    {
        self.drawPointGraph();
        var c = context;
        c.beginPath();
        var x = self.x_padding;
        var dx =  (self.width - 2*self.x_padding) /
            (Object.keys(data).length - 1);
        var height = self.height - self.y_padding  - self.tick_length;
        c.moveTo(x, self.tick_length + height * (1 -
            (data[self.start] - self.min_value)/self.range));
        for (key in data) {
        	var subData = data[key];
        	for (subkey in subData) {
            y = self.tick_length + height * 
                (1 - (subData[subkey] - self.min_value)/self.range);
            c.lineTo(x, y);
            
        }
        x += dx;
        }
        c.stroke();
    }

    p.drawHistogram = function()
    {
        self.initMinMaxRange();
        self.renderAxes();
        var dx = (self.width - 2*self.x_padding) /
            (Object.keys(data).length - 1);
        var c = context;
        c.lineWidth = self.line_width;
        c.strokeStyle = self.data_color;
        c.fillStyle = self.data_color;
        var height = self.height - self.y_padding - self.tick_length;
        var x = self.x_padding;
        for (key in data) {
            var subData = data[key];
            for (subkey in subData) {
            y = self.tick_length + height *
                (1 - (subData[subkey] - self.min_value)/self.range);
             document.write("y:" +y);
            self.plotRectPoint(x, y);
           
        }
         x += dx;
        }
    }

        p.plotRectPoint = function(x,y)
    {
        var c = context;
        c.beginPath();
        c.rect(x,y,40,470-y);
        c.arc(x, y, self.point_radius, 0, 2 * Math.PI, true);
        c.fill();
    }
}
</script>