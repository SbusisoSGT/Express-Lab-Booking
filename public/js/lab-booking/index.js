
const url = "http://127.0.0.1:8000/api/buildings/";

fetch(url)
    .then(response => response.json())
    	.then(buildings => {
			let html = "<option value='all'>All Buildings</option>";
	
			for(building of buildings){
				html += `<option value='${building.id}'> ${building.name} </option>`;
			}
			
			document.querySelector('#buildings').innerHTML = html;
		})
        	.catch(err => console.error(err));




// $.getJSON(url, function(data){
// 	
// });


// 	$(document).ready(function(){
// 		$('.pop-up-close, .overlay').click(function(){
// 			$('.filter-pop-up').hide();
// 			$('.overlay').hide();
// 			$('.side-bar-menu').hide();
// 		});

// 		$('.filter-btn').click(function(){
// 			$('.filter-pop-up').show();
// 			$('.overlay').show();
// 		});

// 		$('#menu-icon').click(function(){
// 			$('.side-bar-menu').show();
// 			$('.overlay').show();

// 		});
		
// 		$('.form-control').change(function(){
// 			$('#filter-btn-name').val('Apply');
// 		});
// 	});

