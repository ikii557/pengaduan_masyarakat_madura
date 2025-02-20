@extends('layoutsadmin.app')

<title>Kalender Interaktif</title>

<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }
    .calendar {
        width: 300px;
        margin: auto;
    }
    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }
    .day {
        padding: 10px;
        border: 1px solid #ddd;
    }
    .day:hover {
        background-color: #f0f0f0;
        cursor: pointer;
    }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css" rel="stylesheet">

@section('content')

<h2>Kalender Interaktif</h2>
<div class="calendar">
    <div class="calendar-header">
        <button onclick="prevMonth()">&#8592;</button>
        <h3 id="month-year"></h3>
        <button onclick="nextMonth()">&#8594;</button>
    </div>
    <div class="days" id="days-container"></div>
</div>

<script>
    const monthYear = document.getElementById('month-year');
    const daysContainer = document.getElementById('days-container');

    // Gunakan tanggal saat ini
    let currentDate = new Date();

    function renderCalendar(date) {
        daysContainer.innerHTML = '';

        const year = date.getFullYear();
        const month = date.getMonth();
        const today = new Date();

        monthYear.textContent = date.toLocaleString('id-ID', { month: 'long', year: 'numeric' });

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            daysContainer.innerHTML += '<div></div>';
        }

        for (let day = 1; day <= lastDate; day++) {
            const isToday = day === today.getDate() && month === today.getMonth() && year === today.getFullYear();
            daysContainer.innerHTML += `<div class="day" style="background-color: ${isToday ? '#ffeb3b' : 'transparent'}" onclick="alert('Tanggal: ${day}-${month + 1}-${year}')">${day}</div>`;
        }
    }

    function prevMonth() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    }

    function nextMonth() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    }

    renderCalendar(currentDate);
</script>

<h2>FullCalendar</h2>
<div id="calendar"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: new Date().toISOString().split('T')[0], // Atur tanggal hari ini
            dateClick: function(info) {
                alert('Tanggal yang diklik: ' + info.dateStr);
            }
        });

        calendar.render();
    });
</script>

@endsection
