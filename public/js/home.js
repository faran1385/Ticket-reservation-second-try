$(() => {
    class helpersFuncs {
        borderRemoverAsScreen(elements, screenSize, biggerSize, smallerSize) {
            if (smallerSize && biggerSize && window.innerWidth > screenSize[0] && window.innerWidth < screenSize[1]) {
                borderRemover()
            } else if (biggerSize && window.innerWidth < screenSize) {
                borderRemover()
            } else if (smallerSize && window.innerWidth > screenSize) {
                borderRemover()
            }

            function borderRemover() {
                $(elements).each((index, element) => {
                    $(element).removeClass('border-start')
                })
            }

        }
    }

    const borderXSNone = $('.border-xs-none')

    const borderMDNone = $('.border-md-none')

    const borderLGNone = $('.border-lg-none')

    let helperClass = new helpersFuncs()

    helperClass.borderRemoverAsScreen(borderXSNone, 576, true, false)

    helperClass.borderRemoverAsScreen(borderMDNone, [576, 768], true, true)

    helperClass.borderRemoverAsScreen(borderLGNone, [768, 992], true, true)

    $(window).resize(() => {
        if (window.innerWidth < 567) {
            borderAdder(borderMDNone)
            borderAdder(borderLGNone)
            helperClass.borderRemoverAsScreen(borderXSNone, 576, true, false)
        } else if (window.innerWidth > 567 && window.innerWidth < 768) {
            borderAdder(borderXSNone)
            borderAdder(borderLGNone)
            helperClass.borderRemoverAsScreen(borderMDNone, [576, 768], true, true)
        } else if (window.innerWidth > 768 && window.innerWidth < 992) {
            borderAdder(borderXSNone)
            borderAdder(borderMDNone)
            helperClass.borderRemoverAsScreen(borderLGNone, [768, 992], true, true)
        } else {
            borderAdder(borderXSNone)
            borderAdder(borderMDNone)
            borderAdder(borderLGNone)
        }

        function borderAdder(elements) {
            $(elements).each((index, element) => {
                $(element).addClass('border-start')
            })
        }
    })
})

document.addEventListener('alpine:init', () => {
    Alpine.data('orgAndDes', () => ({
        cityIndex: null,
        firsTimeSelectValue: [true, true],
        invalidSameCity: '',
        isInvalid: [false, false],
        settedCities: [],
        cities: ['tehran', 'ahvaz', 'shiraz', 'mashhad', 'bandarabbas', 'isfehan', 'tabriz', 'kish', 'birjand'],
        open: false,
        dropdownPos: '',
        ValueSelected: ['', ''],
        value: {destinationValue: '', originValue: ''},
        dropdownStyle: {},
        dropdownOpenFirst: true,
        init() {
            window.addEventListener('keyup', () => {
                if (event.key === 'Tab') {
                    if (event.target === this.$refs.Origin) {
                        this.dropdownPos = 'origin'
                        this.open = true
                    } else if (event.target === this.$refs.Destination) {
                        this.open = true
                        this.cityDropdownMover()
                    }
                }
            })
        },
        cityDropdownMover() {
            if (this.$refs.dropdownMenu.classList.contains('dropdown-menu-move')) {
                this.$refs.dropdownMenu.classList.add('dropdown-menu-moveback')
                this.$refs.dropdownMenu.classList.remove('dropdown-menu-move')
                this.open && this.$refs.Origin.focus()
            } else {
                this.$refs.dropdownMenu.classList.remove('dropdown-menu-moveback')
                this.$refs.dropdownMenu.classList.add('dropdown-menu-move')
                this.open && this.$refs.Destination.focus()
            }
        },
        valueFixer(valueIndex, selectedInputIndex) {
            this.value[valueIndex] = this.ValueSelected[selectedInputIndex]
        }, dropdownMenuSwitch(val, dropPos, setEmpty, valueIndex, valueIndexText) {
            this.dropdownPos = dropPos
            this.settedCities = this.cities
            if (this.ValueSelected[0] || this.ValueSelected[1]) {
                this.valueFixer(valueIndexText, valueIndex)
            }
            if (this.dropdownOpenFirst) {
                this.dropdownStyle.transform = `translateX(${val}px)`
            } else {
                this.dropdownStyle.transform = ``
                this.$refs.dropdownMenu.classList.add(val[0])
                this.$refs.dropdownMenu.classList.remove(val[1])
                if (setEmpty) {
                    if (this.ValueSelected[valueIndex] === '') {
                        this.setInvalid(valueIndex, valueIndexText)
                    }
                }
            }
            this.dropdownOpenFirst = false;
            if (!this.open) {
                this.open = true
            }
        },
        valueSetter(city) {
            this.cityIndex = null
            if (this.dropdownPos === 'destination') {
                this.value.destinationValue = city
                this.ValueSelected[1] = city
                this.dropdownMenuSwitch(['dropdown-menu-move', 'dropdown-menu-moveback'], '', false, 1, 'destinationValue')
                this.dropdownPos = 'origin'
                this.isInvalid[1] = false
                this.firsTimeSelectValue[1] = false
            } else {
                this.value.originValue = city
                this.ValueSelected[0] = city
                this.dropdownMenuSwitch(['dropdown-menu-moveback', 'dropdown-menu-move'], '', false, 0, 'originValue')
                this.dropdownPos = 'destination'
                this.isInvalid[0] = false
                this.firsTimeSelectValue[0] = false
            }
            if ((this.value['destinationValue'] === this.value['originValue']) === false) {
                if (this.value['destinationValue'] !== '' && this.value['originValue'] !== '') {
                    this.open = false
                    this.$refs.Origin.blur()
                    this.$refs.Destination.blur()
                }
            } else if ((this.value['destinationValue'] === this.value['originValue']) === true) {
                if (this.dropdownPos === 'origin') {
                    this.value['originValue'] = ''
                    this.invalidSameCity = 0
                    this.ValueSelected[0] = ''
                } else {
                    this.value['destinationValue'] = ''
                    this.invalidSameCity = 1
                    this.ValueSelected[1] = ''
                }
            }
        }, citySetter() {

            if (this.value['destinationValue'] === '' && this.value['originValue'] === '') {
                this.settedCities = this.cities
            } else {
                this.settedCities = [];
                this.cities.forEach(city => {
                    if (city.startsWith(event.target.value)) {
                        this.settedCities.push(city)
                    }
                })
            }
        },
        inputClickOutside(selectedInputIndex, Class, valueIndex) {

            if (event.target.classList.contains('city') === false) {
                if ((this.ValueSelected[selectedInputIndex] === this.value[valueIndex]) === false && this.ValueSelected[selectedInputIndex] !== '') {
                    this.valueFixer(valueIndex, selectedInputIndex)
                    this.isInvalid[selectedInputIndex] = false
                } else if (this.value[valueIndex] !== '' && this.ValueSelected[selectedInputIndex] === '') {
                    this.value[valueIndex] = ''
                    this.isInvalid[selectedInputIndex] = true
                }
            }
        },
        inputTab(input, inputIndex) {
            if (input === 'destination') {
                this.open = false
                this.dropdownPos = ''
                if (this.ValueSelected[1] !== '') {
                    this.valueFixer('destinationValue', 1)
                } else {
                    this.setInvalid(1, 'destinationValue')
                }
            } else {
                this.dropdownPos = 'destination'
            }
        }, setInvalid(inputIndex, InputTextIndex) {
            if (this.firsTimeSelectValue[inputIndex] === false) {
                this.isInvalid[inputIndex] = true
                this.value[InputTextIndex] = ''
            }
        }, inputKeyUp(inputIndex) {
            this.citySetter()
            this.isInvalid[inputIndex] = false
            if ((event.key === 'ArrowDown' || event.key === 'ArrowUp' || event.key === 'Enter') === false) {
                this.cityIndex = null
            }
            if (event.key !== 'Tab') {
                this.firsTimeSelectValue[inputIndex] = false
            }
        }, dropdownMenuClickOutside() {
            if (event.target.classList.contains('origin') === false && event.target.classList.contains('destination') === false) {
                this.open = false
                this.dropdownOpenFirst = true
                if (this.invalidSameCity !== '' && this.ValueSelected[this.invalidSameCity] === '') {
                    this.isInvalid[this.invalidSameCity] = true
                }
            }
        }, valueMover: {
            ['@click']() {
                if (this.ValueSelected[1] && this.ValueSelected[0]) {
                    this.value['destinationValue'] = this.ValueSelected[0]
                    this.value['origin'] = this.ValueSelected[1]
                    this.ValueSelected[1] = this.ValueSelected[0]
                    this.ValueSelected[0] = this.value['origin']
                    this.$el.style.cursor = 'pointer'
                }
            },
            ['@mouseover']() {
                `                if (this.ValueSelected[1] && this.ValueSelected[0]) {
                    this.$el.style.cursor = 'pointer'
                } else {
                    this.$el.style.cursor = 'not-allowed'
                }`
            }
        }, selectNextCity() {
            if (this.cityIndex === null) {
                this.cityIndex = 0
            } else {
                if (this.cityIndex === this.settedCities.length - 1) {
                    this.cityIndex = 0
                } else {
                    this.cityIndex++
                }
            }
            this.scrollToSelectedCity()
        }, selectPrevCity() {
            if (this.cityIndex === null) {
                this.cityIndex = this.settedCities.length - 1
            } else {
                if (this.cityIndex === 0) {
                    this.cityIndex = this.settedCities.length - 1
                } else {
                    this.cityIndex--
                }
            }
            this.scrollToSelectedCity()
        }, scrollToSelectedCity() {
            if (this.$refs.dropdownMenu.children.length !== 3) {
                this.$refs.dropdownMenu.children[this.cityIndex + 1].scrollIntoView({block: 'center'})
            }
        },
        chooseCity() {
            if (this.cityIndex !== null) {
                this.valueSetter(this.$refs.dropdownMenu.children[this.cityIndex + 1].textContent.trim())
                this.cityDropdownMover()
            }
        }
    }))
})
document.addEventListener('alpine:init', () => {
    Alpine.data('pageChanger', () => ({
        page: 'innerfly',
        innerflyPageDropsVal: {howToFly: 'one sided'},
        date: new Date(),
        isBackAndForth: false,
        changeActiveTitle() {

            let titles = document.querySelectorAll('.services')

            titles.forEach(title => {
                if (title.classList.contains(this.page)) {
                    title.classList.remove('card-header-items-hover')
                    title.classList.add('text-primary')
                } else {
                    title.classList.add('card-header-items-hover')
                    title.classList.remove('text-primary')
                }
            })

        }, pageChanger(pageName) {
            this.page = pageName
        }, pageDetector() {
            let defaultActive = document.querySelector(`.${this.page}`)
            defaultActive.classList.remove('card-header-items-hover')
            defaultActive.classList.add('text-primary')
        },
    }))
})
document.addEventListener('alpine:init', () => {
    Alpine.data('calendar', () => ({
            date: new Date(),
            currYear: null,
            currMonth: null,
            months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            calendarTitle: null,
            daysOfLastMonth: [[], []],
            daysOfNextMonth: [[], []],
            daysOfThisMonth: [[], []],
            monthMoverSpans: null,
            isSliding: false,
            indexOfSlide: null,
            calendarOpen: false,
            firstTimeCompiling: [true, true],
            selectedDayInputVal: ['', ''],
            selectedDays: [null],
            firstTimeSelecting: true,
            datesAlt: 'Date departure',
            counter: 0,
            monthsAbbreviation: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            isSameValue(array) {
                let isSame = array.every((element) => {
                    return element !== null
                })
                return isSame
            },
            init() {
                this.monthMoverSpans = [this.$refs.prevMonth, this.$refs.nextMonth]
                this.currYear = this.date.getFullYear()
                this.currMonth = this.date.getMonth()
                this.setDays(0)
            },
            isSlidingToggle(time) {
                setTimeout(() => {
                    this.isSliding = false
                    if (!this.firstTimeCompiling[1] && !this.firstTimeCompiling[0]) {
                        this.changeTooltip(31)
                    }
                }, time)
            },
            setDays(monthChanger) {
                let slides = document.querySelectorAll('.carousel-item')
                for (let element of slides) {
                    if (element.classList.contains('active') && !element.classList.contains('not-first-time')) {
                        slides[0].classList.add('not-first-time')
                        slides[1].classList.add('not-first-time')
                        this.indexOfSlide = Array.from(slides).indexOf(element)
                        break;
                    } else if (!element.classList.contains('active') && element.classList.contains('not-first-time')) {
                        this.indexOfSlide = Array.from(slides).indexOf(element)
                        break;
                    }
                }

                this.yearLimit(monthChanger)
                this.calendarTitle = this.months[this.currMonth] + ' ' + this.currYear
                let firstDayofMonth = new Date(this.currYear, this.currMonth, 1).getDay(),
                    lastDateofMonth = new Date(this.currYear, this.currMonth + 1, 0).getDate(),
                    lastDayofMonth = new Date(this.currYear, this.currMonth, lastDateofMonth).getDay(),
                    lastDateofLastMonth = new Date(this.currYear, this.currMonth, 0).getDate(),
                    nextMonthLastDay = new Date(this.currYear, this.currMonth + 2, 0).getDate();
                let setThisMonth = () => {
                    this.daysOfThisMonth[this.indexOfSlide] = []
                    for (let i = 1; i <= 31; i++) {
                        let show = i > lastDateofMonth ? false : true
                        if ((this.date.getDate() > i) && this.currMonth === this.date.getMonth() && this.currYear === this.date.getFullYear()) {
                            this.daysOfThisMonth[this.indexOfSlide].push({isPass: true, isShow: show})
                        } else {
                            this.daysOfThisMonth[this.indexOfSlide].push({isPass: false, isShow: show})
                        }
                    }
                    setNextMonth()
                }
                let setNextMonth = () => {
                    this.daysOfNextMonth[this.indexOfSlide] = []
                    for (let i = lastDayofMonth; i < 6; i++) {
                        this.daysOfNextMonth[this.indexOfSlide].push(i - lastDayofMonth + 1)
                    }
                }
                let setPrevMonth = () => {
                    this.daysOfLastMonth[this.indexOfSlide] = []
                    for (let i = firstDayofMonth; i > 0; i--) {
                        this.daysOfLastMonth[this.indexOfSlide].push(lastDateofLastMonth - i + 1)
                    }
                    setThisMonth()
                }
                setPrevMonth()
            },
            yearLimit(monthChanger) {
                let yearValidation = () => {
                    if (this.currMonth === this.date.getMonth() + 1 && this.currYear === this.date.getFullYear()) {
                        setRequires(this.monthMoverSpans, 0)
                    } else if (this.currMonth === this.date.getMonth() - 1 && this.currYear === this.date.getFullYear() + 2) {
                        setRequires(this.monthMoverSpans, 1)
                    }

                    function setRequires(array, index) {
                        array[index].classList.add('disabled')
                        array[index].classList.remove('month-mover-hover', 'pointer-cursor')
                        array[index].removeAttribute('data-bs-slide', 'data-bs-target')
                    }
                }
                yearValidation()
                let prevYear = () => {
                    if (this.currMonth == 0 && this.currYear > new Date().getFullYear() && monthChanger === -1) {
                        this.currMonth = 11
                        this.currYear += -1
                    } else {
                        this.currMonth += monthChanger
                    }
                }
                let nextYear = () => {
                    if (this.currMonth == 11 && this.currYear < new Date().getFullYear() + 3 && monthChanger === 1) {
                        this.currMonth = 0
                        this.currYear += 1
                    } else {
                        this.currMonth += monthChanger
                    }
                }
                if (monthChanger === 1) {
                    nextYear()
                } else {
                    prevYear()
                }
            },
            setActive() {
                if (this.selectedDays.length === 2 && this.$el.children[0].classList.contains('past-day') === false) {
                    if (this.selectedDays[0] === null || this.selectedDays[1] === null) {
                        if (this.$el.children[0].classList.contains('past-day') === false) {
                            if (this.selectedDays[0] === null) {
                                setActive(0, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                                this.changeTooltip(31)
                            } else {
                                if (this.selectedDays[0].year <= this.currYear) {
                                    if (this.selectedDays[0].month < this.currMonth) {
                                        setActive(1, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                                        this.betweenSelectedDays()
                                        this.changeTooltip(31)
                                    } else if (this.selectedDays[0].month == this.currMonth && +(this.selectedDays[0].day) < +(this.$el.textContent.trim())) {
                                        setActive(1, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                                        this.betweenSelectedDays()
                                        this.changeTooltip(31)
                                    } else {
                                        setEmpty(this.selectedDays, 0, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                                        setEmpty(this.selectedDays, 1, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                                        setActive(0, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                                        this.changeTooltip(31)
                                    }
                                } else {
                                    setEmpty(this.selectedDays, 0, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                                    setEmpty(this.selectedDays, 1, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                                    setActive(0, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                                    this.changeTooltip(31)
                                }
                            }
                        }
                    } else {
                        let setedBetween = document.querySelectorAll('.days-between-selects')
                        setedBetween.forEach(element => {
                            element.classList.remove('days-between-selects')
                        })
                        setEmpty(this.selectedDays, 0, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                        setEmpty(this.selectedDays, 1, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                        setActive(0, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                        this.changeTooltip(31)
                    }
                } else {
                    if (this.selectedDays[0] === null && !this.$el.children[0].classList.contains('past-day')) {
                        setEmpty(this.selectedDays, 0, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                        setActive(0, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                        this.changeTooltip(31)

                    } else if (this.selectedDays[0] !== null && !this.$el.children[0].classList.contains('past-day')) {
                        setEmpty(this.selectedDays, 0, this.selectedDayInputVal, this.$refs.submitCalendarBtn)
                        setActive(0, this.$el, this.selectedDays, this.currYear, this.currMonth, this.selectedDayInputVal, this.monthsAbbreviation, this.$refs.submitCalendarBtn, this.indexOfSlide)
                        this.changeTooltip(31)
                    }
                }

                function setActive(index, target, array, year, month, inputValue, monthsAbbreviation, calendarSubBtn, slide) {
                    target.classList.add('active', 'active-calendar-days', 'text-white')
                    array[index] = {element: target, year: year, month: month, day: target.textContent.trim(), slide: slide}
                    inputValue[index] = `${monthsAbbreviation[month]} ${target.textContent.trim()}.${year}`
                    if (array.length === 1 || (array[0] && array[1])) {
                        calendarSubBtn.classList.remove('opacity-50', 'cursor-not-allowed')
                    }
                }

                function setEmpty(array, index, inputVal, calendarSubBtn) {
                    if ((array[index] === null) === false) {
                        array[index].element.classList.remove('active', 'active-calendar-days', 'text-white')
                        inputVal[index] = ''
                        array[index] = null
                        if (array.length === 2) {
                            calendarSubBtn.classList.remove('opacity-50', 'cursor-not-allowed')
                        }
                    }
                }
            },
            checkSelectedDaysPos() {
                if (this.isBackAndForth === true) {
                    this.selectedDays.length === 1 && this.selectedDays.push(null)
                    this.$refs.submitCalendarBtn.classList.add('opacity-50', 'cursor-not-allowed')
                    this.$refs.returnInput.nextElementSibling.classList.remove('rotate-none')
                    this.$refs.returnInput.nextElementSibling.classList.add('rotate-45')
                    this.innerflyPageDropsVal.howToFly = 'back and forth'
                    return false
                } else {
                    let setedBetween = document.querySelectorAll('.days-between-selects')
                    setedBetween.forEach(element => {
                        element.classList.remove('days-between-selects')
                    })
                    this.innerflyPageDropsVal.howToFly = 'one sided'
                    this.$refs.returnInput.nextElementSibling.classList.remove('rotate-45')
                    this.$refs.returnInput.nextElementSibling.classList.add('rotate-none')
                    this.selectedDayInputVal[1] = ''
                    this.selectedDays[1] && this.selectedDays[1].element.classList.remove('active', 'active-calendar-days', 'text-white')
                    this.selectedDays.length === 2 && this.selectedDays.pop()
                    return true
                }
            },
            activatedDaysShow() {
                this.selectedDays.forEach((object) => {
                    if (object !== null) {
                        if (object.year !== this.currYear || object.month !== this.currMonth) {
                            object.element.classList.remove('active', 'active-calendar-days', 'text-white')
                        } else {
                            object.element.classList.add('active', 'active-calendar-days', 'text-white')
                        }
                    }
                })
            },
            betweenSelectedDays() {
                let days = document.querySelectorAll('.calendar-day')

                if (this.selectedDays.length === 2 && this.isSameValue(this.selectedDays)) {
                    if (this.selectedDays[0].year === this.selectedDays[1].year && this.selectedDays[0].month === this.selectedDays[1].month) {
                        let setBetweens = () => {
                            for (let i = +(this.selectedDays[0].day); i < +(this.selectedDays[1].day); i++) {
                                if (typeof i == "number") {

                                    days[i - 1].classList.add('days-between-selects')
                                }
                            }
                        }
                        if (this.currYear === this.selectedDays[0].year && this.currMonth === this.selectedDays[0].month) {
                            if (!this.firstTimeSelecting) {
                                let realDays = []
                                for (let i = 0; i < days.length / 2; i++) {
                                    if (this.indexOfSlide === 1) {
                                        realDays.push(days[i + days.length / 2])
                                    } else {
                                        realDays.push(days[i])
                                    }
                                }
                                days = realDays
                            }
                            setBetweens()
                        } else {
                            let setedBetween = document.querySelectorAll('.days-between-selects')
                            setedBetween.forEach(element => {
                                element.classList.remove('days-between-selects')
                            })
                        }
                    } else {
                        this.betweenDaysMultiMonths()
                    }
                }
            },
            betweenDaysMultiMonths() {
                let thisMonthLastDay = new Date(this.currYear, this.currMonth + 1, 0).getDate(),
                    lastDateOfLastMonth = new Date(this.currYear, this.currMonth, 0).getDate();
                let setedBetween = document.querySelectorAll('.days-between-selects')
                setedBetween.forEach(element => {
                    element.classList.remove('days-between-selects')
                })
                let days = document.querySelectorAll('.calendar-day')
                let realDays = []
                for (let i = 0; i < days.length / 2; i++) {
                    if (this.indexOfSlide === 1) {
                        realDays.push(days[i + days.length / 2])
                    } else {
                        realDays.push(days[i])
                    }
                }
                days = realDays
                if (this.currYear === this.selectedDays[0].year && this.currMonth === this.selectedDays[0].month) {
                    for (let i = this.selectedDays[0].day; i <= thisMonthLastDay; i++) {
                        days[i - 1].classList.add('days-between-selects')
                    }
                } else if (this.currYear === this.selectedDays[1].year && this.currMonth === this.selectedDays[1].month) {
                    for (let i = 1; i < this.selectedDays[1].day; i++) {
                        days[i - 1].classList.add('days-between-selects')
                    }
                } else if (this.currMonth < this.selectedDays[1].month && this.currMonth > this.selectedDays[0].month) {
                    for (let i = 1; i <= thisMonthLastDay; i++) {
                        days[i - 1].classList.add('days-between-selects')
                    }
                } else if (this.selectedDays[1].year > this.selectedDays[0].year) {
                    function set() {
                        for (let i = 1; i <= thisMonthLastDay; i++) {
                            days[i - 1].classList.add('days-between-selects')
                        }
                    }

                    if (this.currYear === this.selectedDays[1].year && this.currMonth < this.selectedDays[1].month) {
                        set()
                    } else if (this.currYear > this.selectedDays[0].year && this.currYear < this.selectedDays[1].year) {
                        set()
                    } else if (this.currYear === this.selectedDays[0].year && this.currMonth > this.selectedDays[0].month) {
                        set()
                    }
                }
            },
            setRequiresInput(index, sliderMoverValue) {
                this.monthMoverSpans[index].classList.remove('disabled')
                this.monthMoverSpans[index].classList.add('month-mover-hover', 'pointer-cursor')
                this.monthMoverSpans[index].setAttribute('data-bs-slide', sliderMoverValue)
                this.monthMoverSpans[index].setAttribute('data-bs-target', '#calendar')

            },
            goToday() {
                if (this.currYear === this.date.getFullYear() && this.currMonth === this.date.getMonth()) {
                    let Target = null

                    let calendarDays = document.querySelectorAll('.calendar-day')

                    for (element of calendarDays) {
                        if (calendarDays.length === 31 && !element.firstElementChild.classList.contains('past-day')) {
                            Target = element
                            break;
                        } else {
                            if (Array.from(calendarDays).indexOf(element) > 31) {
                                if (!element.firstElementChild.classList.contains('past-day')) {
                                    Target = element
                                    break;
                                }
                            }
                        }
                    }
                    Target.classList.add('pulse-primary')
                    setTimeout(() => {
                        Target.classList.remove('pulse-primary')
                    }, 1000)

                } else {
                    const carousel = new bootstrap.Carousel('#calendar')
                    const carouselItemsParent = document.querySelector('.carousel-items-parent')
                    Array.from(carouselItemsParent.children).forEach(element => {
                        element.style.transition = 'transform 0.1s ease-in-out'
                    })
                    let set = () => {
                        setTimeout(async () => {
                            await this.setDays(-1)
                            await this.activatedDaysShow()
                            await this.betweenSelectedDays()
                            await carousel.prev()
                            if (this.currYear !== this.date.getFullYear() || this.currMonth !== this.date.getMonth()) {
                                set()
                            } else {
                                this.isSliding = false
                                Array.from(carouselItemsParent.children).forEach(element => {
                                    element.style.transition = 'transform 0.4s ease-in-out'
                                })
                                this.changeTooltip(31)
                            }
                        }, 100)
                    }
                    this.isSliding = true
                    if (this.currYear === this.date.getFullYear() && this.currMonth === this.date.getMonth()) {
                        clearInterval(this)
                        this.isSlidingToggle(0)
                    } else {
                        set()
                        this.isSliding = true
                    }

                }
            },
            closeCalendar() {
                if (event.target.classList.contains('returnInput') === false && event.target.classList.contains('departureInput') === false && event.target.classList.contains('backAndForthToggler') === false) {
                    this.calendarOpen = false
                }
            },
            submitCalendar() {
                if (this.$el.classList.contains('opacity-50') === false) {
                    this.calendarOpen = false
                }
            },
            setTooltip(day) {
                if (day === 31) {
                    let calendarDays = document.querySelectorAll('.calendar-day')
                    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                    tooltipTriggerList.forEach(element => {
                        if (element.firstElementChild.classList.contains('past-day')) {
                            element.setAttribute('data-bs-title', 'past day')
                        }
                        new bootstrap.Tooltip(element)
                    })
                    this.firstTimeCompiling[1] = false
                }
            },
            changeTooltip(day) {
                if (day === 31) {
                    let lastDayOfMonth = new Date(this.currYear, this.currMonth + 1, 0).getDate() - 1
                    let calendarDays = document.querySelectorAll('.calendar-day')
                    let setAndValidate = (element, i) => {
                        let set = (value, i) => {
                            element.setAttribute('data-bs-title', value)
                            if (!this.firstTimeCompiling[0] && this.indexOfSlide === 0) {
                                const tooltip = bootstrap.Tooltip.getInstance(element)
                                tooltip.setContent({'.tooltip-inner': value})
                            } else if (this.indexOfSlide === 0) {
                                new bootstrap.Tooltip(element)
                                if (i == lastDayOfMonth) {
                                    this.firstTimeCompiling[0] = false
                                }
                            } else {
                                const tooltip = bootstrap.Tooltip.getInstance(element)
                                tooltip.setContent({'.tooltip-inner': value})
                            }
                        }
                        if (element.style.display !== 'none') {
                            if (element.firstElementChild.className.includes('past-day') && this.currYear === this.date.getFullYear() && this.currMonth === this.date.getMonth()) {
                                set('past day', i)
                            } else if (!this.isBackAndForth) {
                                set('Departure date', i)
                            } else {
                                if (this.selectedDays[0] === null) {
                                    set('Departure date', i)
                                } else if (this.selectedDays[1] === null) {
                                    if (this.currYear >= this.selectedDays[0].year) {
                                        if (this.currMonth > this.selectedDays[0].month) {
                                            set('Return date', i)
                                        } else if (this.currMonth === this.selectedDays[0].month) {
                                            if (+(this.selectedDays[0].day) < +(element.textContent.trim())) {
                                                set('Return date', i)
                                            } else {
                                                set('Departure date', i)
                                            }
                                        } else {
                                            set('Departure date', i)
                                        }
                                    }
                                } else if (this.selectedDays[1] && this.selectedDays[0]) {
                                    set('Departure date')
                                }
                            }
                        } else {
                            new bootstrap.Tooltip(element)
                        }
                    }
                    for (let i = 0; i < 31; i++) {
                        if (this.indexOfSlide === 1) {
                            if (this.firstTimeCompiling[0]) {
                                setAndValidate(calendarDays[i], i)
                            } else {
                                setAndValidate(calendarDays[i + 31], i)
                            }
                        } else {
                            setAndValidate(calendarDays[i], i)

                        }
                    }
                }
            },
            async sender() {
                if (event.target.classList.contains('backAndForthToggler')) {
                    this.isBackAndForth = !this.isBackAndForth
                    await this.checkSelectedDaysPos();
                    this.changeTooltip(31)
                } else if (this.isBackAndForth === false) {
                    this.isBackAndForth = !this.isBackAndForth
                    await this.checkSelectedDaysPos();
                    this.changeTooltip(31)
                }
            },
            async checkTooltip() {
                this.calendarOpen = true
                if (!this.firstTimeCompiling[1]) {
                    this.changeTooltip(31)
                }
            }
        })
    )
})


