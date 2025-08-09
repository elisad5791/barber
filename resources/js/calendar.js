import { Calendar } from '@fullcalendar/core';
import ruLocale from '@fullcalendar/core/locales/ru';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const masterId = document.querySelector('[data-master-id]').getAttribute('data-master-id');

    const openEmptyModal = document.getElementById('open_empty_modal');
    const startInput = document.getElementById('interval_start');
    const finishInput = document.getElementById('interval_finish');

    const openFullModal = document.getElementById('open_full_modal');
    const slotDescription = document.getElementById('slot_description');
    const deleteInput = document.getElementById('delete_start');

    const calendar = new Calendar(calendarEl, {
        locale: ruLocale,
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title'
        },
        events: '/timeslots/' + masterId,
        select: function(info) {
            startInput.value = info.startStr;
            finishInput.value = info.endStr;
            openEmptyModal.click();
        },
        eventClick: function(info) {
            deleteInput.value = info.event.startStr;
            slotDescription.textContent = info.event.title;
            openFullModal.click();
        },
        selectable: true,
        allDaySlot: false,
        slotDuration: '01:00:00',
        slotMinTime: '08:00:00',
        slotMaxTime: '21:00:00'
    });
    calendar.render();
});