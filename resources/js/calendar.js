import { Calendar } from '@fullcalendar/core';
import ruLocale from '@fullcalendar/core/locales/ru';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const clientCalendarEl = document.getElementById('calendar_client');

    if (calendarEl) {
        const masterId = document.querySelector('[data-master-id]').getAttribute('data-master-id');

        const openEmptyModal = document.getElementById('open_empty_modal');
        const startInput = document.getElementById('interval_start');
        const finishInput = document.getElementById('interval_finish');

        const openFullModal = document.getElementById('open_full_modal');
        const slotDescription = document.getElementById('slot_description');
        const slotComment = document.getElementById('slot_comment');
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
            select: function (info) {
                startInput.value = info.startStr;
                finishInput.value = info.endStr;
                openEmptyModal.click();
            },
            eventClick: function (info) {
                deleteInput.value = info.event.startStr;
                slotDescription.textContent = info.event.title;
                slotComment.textContent = info.event.extendedProps.comment;
                openFullModal.click();
            },
            selectable: true,
            allDaySlot: false,
            slotDuration: '01:00:00',
            slotMinTime: '08:00:00',
            slotMaxTime: '21:00:00'
        });
        calendar.render();
    }

    if (clientCalendarEl) {
        const masterId = document.querySelector('[data-master-id]').getAttribute('data-master-id');
        const userId = document.getElementById('user_id').value;

        const openReservationModal = document.getElementById('open_reservation_modal');
        const timeStart = document.getElementById('time_start');
        const timeFinish = document.getElementById('time_finish');
        const reservationDate = document.getElementById('reservation_date');
        const timeslotInput = document.getElementById('timeslot_id');

        const calendar = new Calendar(clientCalendarEl, {
            locale: ruLocale,
            plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title'
            },
            events: '/timeslots/' + masterId,
            eventClick: function (info) {
                if (userId == 0) {
                    window.location.href = '/login';
                }

                const status = info.event.extendedProps.status;
                const timeslotId = info.event.id;
                if (status != 'free') {
                    return;
                }

                const start = new Date(info.event.startStr);
                const finish = new Date(info.event.endStr);
                const formattedDate = start.toLocaleDateString('ru-RU', { day: '2-digit', month: '2-digit', year: 'numeric'});
                const formattedStart = start.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit', hour12: false });
                const formattedFinish = finish.toLocaleTimeString('ru-RU', { hour: '2-digit', minute: '2-digit', hour12: false });
                timeStart.textContent = formattedStart;
                timeFinish.textContent = formattedFinish;
                reservationDate.textContent = formattedDate;

                timeslotInput.value = timeslotId;
                openReservationModal.click();
            },
            allDaySlot: false,
            slotDuration: '01:00:00',
            slotMinTime: '08:00:00',
            slotMaxTime: '21:00:00'
        });
        calendar.render();
    }
});