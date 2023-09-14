document.addEventListener('DOMContentLoaded', function () {
    const calendar = document.getElementById('calendar');
    const prevMonthBtn = document.getElementById('prevMonth');
    const nextMonthBtn = document.getElementById('nextMonth');
    let currentYear = 2023;
    let currentMonth = 0; // January is 0, December is 11

    // Function to create a calendar for a specific year and month
    function createCalendar(year, month) {
        const monthNames = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];

        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDayOfWeek = new Date(year, month, 1).getDay();
        const monthName = monthNames[month];

        let html = `<h3 class="text-center">${monthName} ${year}</h3>`;
        html += '<table class="table table-bordered">';
        html += '<thead><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>';
        html += '<tbody><tr>';

        let dayCount = 1;
        for (let day = 0; day < firstDayOfWeek; day++) {
            html += '<td></td>';
        }

        for (let day = firstDayOfWeek; day < 7; day++) {
            html += `<td>${dayCount}</td>`;
            dayCount++;
        }

        html += '</tr>';

        while (dayCount <= daysInMonth) {
            html += '<tr>';
            for (let day = 0; day < 7 && dayCount <= daysInMonth; day++) {
                html += `<td>${dayCount}</td>`;
                dayCount++;
            }
            html += '</tr>';
        }

        html += '</tbody></table>';
        calendar.innerHTML = html;
    }

    // Add event listeners for the previous and next month buttons
    prevMonthBtn.addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11; // Loop back to December
            currentYear--;
        }
        createCalendar(currentYear, currentMonth);
    });

    nextMonthBtn.addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0; // Loop back to January
            currentYear++;
        }
        createCalendar(currentYear, currentMonth);
    });

    // Initial calendar display
    createCalendar(currentYear, currentMonth);
});
