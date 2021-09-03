$(() => {
	// Flag
	$('.lk_info .history .item .flag_btn').click(function (e) {
		e.preventDefault()

		$(this).toggleClass('active')
	})


	// Личная информация
	$('.lk_info .personal .edit_btn').click(function (e) {
		e.preventDefault()

		let parent = $(this).closest('.personal')

		parent.find('.user_data').hide()
		parent.find('.edit_form, .avatar .upload').fadeIn(300)
	})

	$('.lk_info .personal .edit_form .cancel_btn').click(function (e) {
		e.preventDefault()

		let parent = $(this).closest('.personal')

		parent.find('.edit_form, .avatar .upload').hide()
		parent.find('.user_data').fadeIn(300)
	})


	// Моб. меню
	$('header .mob_menu_btn').click((e) => {
		e.preventDefault()

		$('header .mob_menu_btn').toggleClass('active')
		$('body').toggleClass('menu_open')
		$('#mob_menu').toggleClass('show')
	})


	// Чат
	$('.chat form textarea').on('input', function () {
		this.style.height = '1px'
		this.style.height = this.scrollHeight + 'px'
	})


	// Направления на главной
	const scrollContainer = document.querySelector('.directions .row_wrap')
	let isDown = false,
		startX,
		scrollLeft

	if ($(('.directions .row_wrap')).length) {
		scrollContainer.addEventListener('wheel', e => {
			e.preventDefault()

			scrollContainer.scrollLeft += e.deltaY
		})

		scrollContainer.addEventListener('mousedown', (e) => {
			isDown = true
			scrollContainer.classList.add('active')
			startX = e.pageX - scrollContainer.offsetLeft
			scrollLeft = scrollContainer.scrollLeft
		})

		scrollContainer.addEventListener('mouseleave', () => {
			isDown = false;
			scrollContainer.classList.remove('active')
		})

		scrollContainer.addEventListener('mouseup', () => {
			isDown = false;
			scrollContainer.classList.remove('active')
		})

		scrollContainer.addEventListener('mousemove', e => {
			if (!isDown) return

			e.preventDefault()

			const x = e.pageX - scrollContainer.offsetLeft,
				walk = x - startX

			scrollContainer.scrollLeft = scrollLeft - walk
		})
	}

	const scrollContainer2 = document.querySelector('.direction_info .schedule .week_wrap')
	let isDown2 = false,
		startX2,
		scrollLeft2

	if ($(('.direction_info .schedule .week_wrap')).length) {
		scrollContainer2.addEventListener('wheel', e => {
			e.preventDefault()

			scrollContainer2.scrollLeft += e.deltaY
		})

		scrollContainer2.addEventListener('mousedown', (e) => {
			isDown2 = true
			scrollContainer2.classList.add('active')
			startX2 = e.pageX - scrollContainer2.offsetLeft
			scrollLeft2 = scrollContainer2.scrollLeft
		})

		scrollContainer2.addEventListener('mouseleave', () => {
			isDown2 = false;
			scrollContainer.classList.remove('active')
		})

		scrollContainer2.addEventListener('mouseup', () => {
			isDown2 = false;
			scrollContainer2.classList.remove('active')
		})

		scrollContainer2.addEventListener('mousemove', e => {
			if (!isDown2) return

			e.preventDefault()

			const x = e.pageX - scrollContainer2.offsetLeft,
				walk = x - startX2

			scrollContainer2.scrollLeft = scrollLeft2 - walk
		})
	}


	$('.direction_info .schedule .events .item').mouseover(function () {
		let group = $(this).data('group')

		$('.direction_info .schedule .events .item[data-group="' + group + '"]').addClass('hover')
	})

	$('.direction_info .schedule .events .item').mouseleave(function () {
		$('.direction_info .schedule .events .item').removeClass('hover')
	})


	// Квиз
	currentStep = 1,
		min = 0,
		sec = 0

	$('.task_info .performance .start_btn').click(function (e) {
		e.preventDefault()

		let parent = $(this).closest('.performance')

		parent.find('.quiz_start').hide()
		parent.find('.quiz').fadeIn(300)

		// Секундомер
		timerCycle()
	})

	$('.task_info .performance .quiz .next_btn').click(function () {
		let parent = $(this).closest('.quiz')

		$('.task_info .performance .quiz .steps > *').removeClass('active')
		$('.task_info .performance .quiz .steps > *').eq(currentStep).addClass('active')
		$('.task_info .performance .quiz .steps > *').eq(currentStep - 1).addClass('success')

		currentStep++

		parent.find('.step').hide()
		parent.find('.step' + currentStep).fadeIn(300)

		if (currentStep > $('.task_info .performance .quiz .steps > *').length) {
			$('.task_info .performance .quiz').hide()
			$('.task_info .performance .quiz_result').fadeIn(300)
		}
	})
})



$(window).on('load', () => {
	// Меню в личном кабинете
	if ($('.lk_info .lk_aside .links a.active').length) {
		let offsetLeft = $('.lk_info .lk_aside .links a.active').parent().position().left

		if (offsetLeft > 50) $('.lk_info .lk_aside .links').scrollLeft(offsetLeft)
	}
})



function timerCycle() {
	sec = parseInt(sec)
	min = parseInt(min)

	sec = sec + 1

	if (sec == 60) {
		min = min + 1
		sec = 0
	}
	if (min == 60) {
		min = 0
		sec = 0
	}

	if (sec < 10 || sec == 0) sec = '0' + sec
	if (min < 10 || min == 0) min = '0' + min

	$('.task_info .performance .quiz .time .minutes').text(min)
	$('.task_info .performance .quiz .time .seconds').text(sec)


	cycle = setTimeout(timerCycle, 1000)
}
