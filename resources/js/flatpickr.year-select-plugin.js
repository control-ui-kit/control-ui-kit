const YearDropdownPlugin = function (pluginConfig) {
    let defaultConfig = {
        text: '',
        id: 'date',
        date: new Date(),
        yearsBefore: 100,
        yearsAfter: 2,
    };

    let config = {};
    for (let key in defaultConfig) {
        config[key] = pluginConfig && pluginConfig[key] !== undefined ? pluginConfig[key] : defaultConfig[key];
    }

    let getYear = function (value) {
        if (value) {
            return value.getFullYear();
        }
    }

    let currYear = new Date().getFullYear();
    let selectedYear = getYear(config.date);
    let yearDropdown = document.createElement("select");
    yearDropdown.setAttribute("id", config.id + '_year');

    let createSelectElement = function () {
        let start = new Date().getFullYear() - config.yearsBefore;
        let end = currYear + config.yearsAfter;

        for (let i = end; i >= start; i--) {
            let option = document.createElement("option");
            option.value = i;
            option.text = i;
            yearDropdown.appendChild(option);
        }
        yearDropdown.value = selectedYear;
    };

    let addMissingIdsToInputs = function () {

        // Remove year selector
        document.querySelectorAll('.numInputWrapper > .cur-year').forEach(function (el) {
            el.remove()
        })

        // Add id to hour fields
        document.querySelectorAll('.numInputWrapper > .flatpickr-hour').forEach(function (el, id) {
            if (!el.id) {
                el.id = "hour_" + id;
            }
        })

        // Add id to minute fields
        document.querySelectorAll('.numInputWrapper > .flatpickr-minute').forEach(function (el, id) {
            if (!el.id) {
                el.id = "minute_" + id;
            }
        })

        // Add id to seconds fields
        document.querySelectorAll('.numInputWrapper > .flatpickr-second').forEach(function (el, id) {
            if (!el.id) {
                el.id = "seconds_" + id;
            }
        })

        // Add missing IDs to month selector
        document.querySelectorAll('.flatpickr-monthDropdown-months').forEach(function (el, id) {
            if (!el.id) {
                el.id = "month_" + id;
            }
        })

    }

    return function (fp) {

        fp.yearSelectContainer = fp._createElement(
            "div",
            "flatpickr-year-select",
            config.text
        );

        fp.yearSelectContainer.tabIndex = -1;

        createSelectElement();
        yearDropdown.addEventListener('change', function (evt) {
            let year = evt.target.options[evt.target.selectedIndex].value;
            fp.changeYear(year);
        });

        fp.yearSelectContainer.append(yearDropdown);

        addMissingIdsToInputs();

        return {
            onReady: function onReady() {
                if (fp.config.noCalendar) {
                    return;
                }
                let name = fp.monthNav.className;
                const yearInputCollection = fp.calendarContainer.getElementsByClassName(name);
                const el = yearInputCollection[0];
                el.parentNode.insertBefore(fp.yearSelectContainer, el.parentNode.firstChild);
            }
        };
    };
}
