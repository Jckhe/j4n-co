		var auto = false;
		var showing_rules = false;
		var width = 20;
		var height = 20;
		var lifecycle = 1;
		var gen;
		var city;
		var newcity;
		var changed;

		function window_onload()
		{
			document.getElementById("textfield_width").value = width;
			document.getElementById("textfield_height").value = height;
			resetGame();
		}
		function resetGame()
		{
			auto = false;
			gen = 0;
			createModel();
			createBoard();
			nameStartStopButton();
			printStatus();
		}
		function nameStartStopButton()
		{
			var btn = document.getElementById("button_auto");
			if (auto) {
				btn.innerHTML = "Stop";
				btn.title = "Stop the automatic generation movement";
			} else {
				btn.innerHTML = "Auto";
				btn.title = "Start automatic generation movement";
			}
		}
		function printStatus()
		{
			var generation = document.getElementById("generation");
			generation.innerHTML = gen;
		}
		function toggleGameState()
		{
			auto = !(auto);
			nameStartStopButton();
			document.getElementById("button_dim").disabled = auto;
			document.getElementById("textfield_width").disabled = auto;
			document.getElementById("textfield_height").disabled = auto;
			document.getElementById("button_clear").disabled = auto;
			document.getElementById("button_step").disabled = auto;
			if (auto) {
				step();
			}
		}
		function setDimension()
		{
			width = document.getElementById("textfield_width").value;
			height = document.getElementById("textfield_height").value;
			resetGame();
		}
		function oneStep()
		{
			auto = false;
			step();
		}
		function toggleCell(e)
		{
			var cell;
			try {
				cell = e.target;	//getting the event source in Mozilla Firefox
			} catch (e) {
				cell = window.event.srcElement;	//getting the event source in MSIE
			}
			if (cell.alive == "false") {
				cell.alive = "true";
				cell.style.backgroundColor = "steelblue";
				city[cell.x][cell.y] = true;
			} else {
				cell.alive = "false";
				cell.style.backgroundColor = "lightsteelblue";
				city[cell.x][cell.y] = false;
			}
		}
		function showRules()
		{
			var rules = document.getElementById("container_rules");
			if (showing_rules) {
				rules.style.display = "none";
				showing_rules = false;
			} else {
				rules.style.display = "block";
				showing_rules = true;
			}
		}
		function createModel()
		{
			city = new Array(width);
			newcity = new Array(width);
			changed = new Array(width);
			for (var x = 0; x < width; x++) {
				city[x] = new Array(height);
				newcity[x] = new Array(height);
				changed[x] = new Array(height);
				for (var y = 0; y < height; y++) {
					city[x][y] = false;
					newcity[x][y] = false;
					changed[x][y] = false;
				}
			}
		}
		function createBoard()
		{
			//delete all rows
			var arena = document.getElementById("playarea");
			var number_rows = arena.rows.length;
			for (var y = 0; y < number_rows; y++) {
				arena.deleteRow(-1);
			}

			// add all rows
			for (var y = 0; y < height; y++) {
				var row = arena.insertRow(-1);
				for (var x = 0; x < width; x++) {
					var cell = row.insertCell(-1);
					cell.className = "cell";
					cell.innerHTML = "&nbsp;";
					cell.x = x;
					cell.y = y;
					cell.alive = "false";
					cell.onclick = toggleCell;
				}
			}
			gen = 0;
		}
		function step()
		{
			gen++;
			calculateNewState();
			renderBoard();
			printStatus();
			if (auto) {
				setTimeout("step();", 100 * lifecycle);
			}
		}
		function calculateNewState()
		{
			resetTemps();
			for (var y = 0; y < height; y++) {
				for (var x = 0; x < width; x++) {
					var alive_now = city[x][y];
					var alive_then = false;
					var number_neighbors = numberOfNeighbors(x, y);

					if ((alive_now) && (number_neighbors < 2))
					{
						alive_then = false;
					}
					else if ((alive_now) && (number_neighbors > 3))
					{
						alive_then = false;
					}
					else if ((!alive_now) && (number_neighbors == 3))
					{
						alive_then = true;
					}
					else if ((alive_now) && ((number_neighbors == 2) || (number_neighbors == 3)))
					{
						alive_then = true;
					}
					newcity[x][y] = alive_then;
					changed[x][y] = (alive_now != alive_then);
				}
			}
			updateCity();
		}
		function updateCity()
		{
			for (var x = 0; x < width; x++) {
				for (var y = 0; y < height; y++) {
					city[x][y] = newcity[x][y];
				}
			}
		}
		function resetTemps()
		{
			for (var x = 0; x < width; x++) {
				for (var y = 0; y < height; y++) {
					newcity[x][y] = false;
					changed[x][y] = false;
				}
			}
		}
		function renderBoard()
		{
			var arena = document.getElementById("playarea");
			for (var y = 0; y < height; y++) {
				var cells = arena.rows[y].cells;
				for (var x = 0; x < width; x++) {
					if (changed[x][y]) {
						cells[x].style.backgroundColor = (city[x][y]) ? "steelblue" : "lightsteelblue";
					}
				}
			}
		}
		function numberOfNeighbors(x, y)
		{
			var n = 0;
			if (isCellAlive(x-1, y-1))	n++;
			if (isCellAlive(x-1, y))	n++;
			if (isCellAlive(x-1, y+1))	n++;
			if (isCellAlive(x, y-1))	n++;
			if (isCellAlive(x, y+1))	n++;
			if (isCellAlive(x+1, y-1))	n++;
			if (isCellAlive(x+1, y))	n++;
			if (isCellAlive(x+1, y+1))	n++;
			return n;
		}
		function isCellAlive(x, y)
		{
			var alive = false;
			if ((x >= 0) && (x < width) && (y >= 0) && (y < height)) {
				alive = city[x][y];
			} else {
				alive = false;
			}
			return alive;
		}

