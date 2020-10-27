document.addEventListener('turbolinks:load', function() {
	// const left = document.querySelector('.left');
	// const right = document.querySelector('.right');
	// const slider = document.querySelector('.slider');
	// let index = 0;
	// left.addEventListener('click', function() {
	// 	index === 0 ? (index = 2) : index--;
	// 	slider.style.transform = 'translateX(' + index * -25 + '%)';
	// });

	// right.addEventListener('click', function() {
	// 	index++;
	// 	index === 3 ? (index = 0) : null;
	// 	slider.style.transform = 'translateX(' + index * -25 + '%)';
	// });
	const carousel = document.querySelector('.carousel');
	const slider = document.querySelector('.slider');
	const next = document.querySelector('.next');
	const prev = document.querySelector('.prev');
	let direction;
	next.addEventListener('click', function() {
		direction = -1;
		carousel.style.justifyContent = 'flex-start';
		slider.style.transform = 'translate(-25%)';
	});
	prev.addEventListener('click', function() {
		if (direction === -1) {
			direction = 1;
			slider.appendChild(slider.firstElementChild);
		}
		carousel.style.justifyContent = 'flex-end';
		slider.style.transform = 'translate(25%)';
	});
	slider.addEventListener(
		'transitionend',
		function() {
			// get the last element and append it to the front
			if (direction === 1) {
				slider.prepend(slider.lastElementChild);
			} else {
				slider.appendChild(slider.firstElementChild);
			}
			slider.style.transition = 'none';
			slider.style.transform = 'translate(0)';
			setTimeout(() => {
				slider.style.transition = 'all 0.5s';
			});
		},
		false
	);
});
