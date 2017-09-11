onmessage = function(event) {
	var data = JSON.parse(event.data);
	if (data.index === -1) {
		close(); // close worker
	}
	importScripts('highlight.pack.js');
	self.hljs.configure({tabReplace:4});
	var result = self.hljs.highlightAuto(data.code);
	postMessage(JSON.stringify({result: result.value, index: data.index}));
}