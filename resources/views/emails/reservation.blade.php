<h1>Запись в парикмахерскую</h1>
<p>Вы записались в парикмахерскую</p>
<p>Салон: {{ $timeslot->salon_title }}</p>
<p>Мастер: {{ $timeslot->master_name }}</p>
<p>Услуга: {{ $timeslot->service_title }}</p>
<p>
    Время: 
    {{ $timeslot->start->format('d.m.Y') }} 
    {{ $timeslot->start->setTimezone('Europe/Moscow')->format('H:i') }} - {{ $timeslot->finish->setTimezone('Europe/Moscow')->format('H:i') }}
    (время московское)
</p>