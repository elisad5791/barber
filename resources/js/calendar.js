import { Calendar } from '@fullcalendar/core';
import ruLocale from '@fullcalendar/core/locales/ru';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const calendar = new Calendar(calendarEl, {
        locale: ruLocale,
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title'
        },
        events: '/api/bookings',
        select: function(info) {
            alert('Выбрано: ' + info.startStr + ' до ' + info.endStr);
        },
        eventClick: function(info) { // клик по событию (например, просмотр записи)
            alert('Запись: ' + info.event.title);
        },
        selectable: true,
        allDaySlot: false,
        slotDuration: '01:00:00',
        slotMinTime: '08:00:00',
        slotMaxTime: '21:00:00'
    });
    calendar.render();
});