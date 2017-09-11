/* addEventListener('load', function() {
	var code = document.querySelector('.post pre');
	var worker = new Worker('/assets/js/templates/worker.js');
	worker.onmessage = function(event) { code.innerHTML = event.data; }
	worker.postMessage(code.textContent);
}) */

addEventListener('load', function() {

	if (typeof (Worker) === undefined) return false;
	var worker = new Worker('/assets/js/templates/worker.js');
	var codeBlocks = document.querySelectorAll('.post pre');
	worker.onmessage = function(event) {
		var data = JSON.parse(event.data);
		codeBlocks[data.index].innerHTML = data.result;
	};
	worker.onerror = function() {
		// do nothing
	};
	codeBlocks.forEach(function(code, index) {
		worker.postMessage(JSON.stringify({index: index, code: code.textContent }));
	});
	worker.postMessage(JSON.stringify({index: -1}));

})