
const url = 'http://127.0.0.1:8000/api/labs/';

fetch(url)
    .then(response => response.json())
    	.then(labs => {
			let html = "<option value>--Select Option--</option>";
	
			for(lab of labs){
				html += `<option value='${lab.id}'> ${lab.name} - ${lab.number_of_computers} computers </option>`;
			}
			
			document.querySelector('#labs').innerHTML = html;
		})
        	.catch(err => console.error(err));

// $(document).ready(function(){
//         $('#close-btn').click(function(){
//             $('.timetable-pop-up').hide();
//             $('.overlay').hide();
//         });

//         $('.overlay').click(function(){
//             $('.timetable-pop-up').hide();
//             $('.overlay').hide();
//         });

//         $('.show-timetable').click(function(){
//             $('.overlay').show();
//             $('.timetable-pop-up').show();
//         });
// });
