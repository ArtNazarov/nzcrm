window.onload = function(){
let elem = document.getElementById('calendar_widget');
let sel = document.getElementById('year').onchange = function(){
    let year = document.getElementById('year').value;
    
    
    
    fetch('/widget_calendar/'+String(year)).then(function (response) {
	return response.text();
}).then(function (data) {
	
         elem.innerHTML = data ;
}).catch(function (err) {
	// There was an error
	console.warn('Something went wrong.', err);
});
    
    
}; 

}
