const YearDropdownPlugin = function (pluginConfig) {
    let defaultConfig = {
        text: '',
        id: 'date',
        date: new Date(),
        yearsBefore: 100,
        yearsAfter: 2,
    };

    let yearInput = document.getElementById('inputField');

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
    // yearDropdown.setAttribute("class", "numInput cur-year");

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
