document.addEventListener('DOMContentLoaded', function () {
    const dateFields = document.querySelectorAll('[data-cabinet-date]');
    const timeFields = document.querySelectorAll('[data-cabinet-time]');
    const datetimeFields = document.querySelectorAll('[data-reviews-datetime]');

    if (dateFields.length > 0) {
        dateFields.forEach(function (item) {
            const data = item.getAttribute('data-cabinet-date');
            const date = new Date(data);
            const formattedDate = date.toLocaleDateString('ru-RU', { day: '2-digit', month: '2-digit', year: 'numeric' });
            item.textContent = formattedDate;
        });
    }

    if (timeFields.length > 0) {
        timeFields.forEach(function (item) {
            const data = item.getAttribute('data-cabinet-time');
            const time = new Date(data);
            const formattedTime = time.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit', hour12: false });
            item.textContent = formattedTime;
        });
    }

    if (datetimeFields.length > 0) {
        datetimeFields.forEach(function (item) {
            const data = item.getAttribute('data-reviews-datetime');
            const time = new Date(data);
            const formattedTime = time.toLocaleString('ru-RU', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            });
            item.textContent = formattedTime;
        });
    }
});




