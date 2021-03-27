(function(){
    let bout = document.querySelectorAll('.rad-carrousel');
	let carrousel = document.querySelector('.carrouselCours');
	let k = 0;
	bout[0].checked=true;
	for (const bt of bout){
		bt.value = k++;
		bt.addEventListener('mousedown', function(){
			carrousel.style.transform= "translateX(" + (-this.value*100) + "vw)"
		})
	}
}())
            