(function($) {
    "use strict";

    let selectedDay = null;
    let selectedTimeButton = null;
    const phoneInput = $('#phone');

    // Handle date selection
    $('#calendarDays').on('click', '.calendar-day', function() {
        if ($(this).text()) {
            selectedDay = $(this).text();  // Set the selected day

            // Clear previous selection
            $('.calendar-day').removeClass('selected-day');

            // Highlight the selected day
            $(this).addClass('selected-day');
        }
    });

    // Handle time button selection
    $('.btn-time-event').on('click', function() {
        // Clear previous time selection
        if (selectedTimeButton) {
            $(selectedTimeButton).removeClass('selected-time');
        }

        // Highlight the selected time button
        $(this).addClass('selected-time');
        selectedTimeButton = this; // Store the currently selected time button

        // Get time, date, and phone number values
        const selectedTime = $(this).attr('data-time');
        const selectedDate = `${selectedDay || 'No day selected'}-${currentMonth + 1}-${currentYear}`;
        const phoneNumber = phoneInput.val() ;

        if(!phoneNumber){
            toastify().error('Number is reuquired!');
            return;
        }

        // Set modal content
        $('#selectedTime').text(selectedTime);
        $('#selectedDate').text(selectedDate);
        $('#selectedPhone').text(phoneNumber);

        // Show the modal
        $('#timeModal').modal('show');
    });

    // Handle submit button in modal
    $('#submitButton').on('click', function() {
        const inputValue = $('#inputValue').val();
        alert(`You entered: ${inputValue}`);
    });

    // Initialize phone input with intl-tel-input
    const iti = window.intlTelInput(phoneInput[0], {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io/json?token=<YOUR_TOKEN>', function(resp) {
                callback(resp.country);
            }).fail(function() {
                callback('us');
            });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    const $monthNameElem = $("#monthName");
    const $calendarDaysElem = $("#calendarDays");

    // Function to generate days of the month
    function generateCalendar(month, year) {
        $monthNameElem.text(`${monthNames[month]} ${year}`);
        $calendarDaysElem.empty();

        const firstDay = new Date(year, month, 1).getDay();
        const totalDays = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            $calendarDaysElem.append('<div class="calendar-day empty-day"></div>');
        }

        for (let day = 1; day <= totalDays; day++) {
            $calendarDaysElem.append(`<div class="calendar-day">${day}</div>`);
        }
    }

    // Handle month navigation
    $('#prevMonth').on('click', function() {
        currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
        currentYear = currentMonth === 11 ? currentYear - 1 : currentYear;
        generateCalendar(currentMonth, currentYear);
    });

    $('#nextMonth').on('click', function() {
        currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
        currentYear = currentMonth === 0 ? currentYear + 1 : currentYear;
        generateCalendar(currentMonth, currentYear);
    });

    // Generate the initial calendar
    generateCalendar(currentMonth, currentYear);

})(jQuery);
