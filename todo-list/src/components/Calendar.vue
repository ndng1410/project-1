<template>
    <div class="p-4 bg-white m-4 rounded-lg">
        <h1 class="font-mono text-4xl font-bold">Demo App</h1>
        <FullCalendar :options="calendarOptions" class="font-mono no-underline"/>
    </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";

export default {
    name: "calendarComponent",
    components: {
        FullCalendar, // make the <FullCalendar> tag available
    },
    data: function () {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin],
                initialView: "dayGridMonth",
                // weekends: false,
                events: [{ title: "Meeting", start: new Date() }],
            },
        };
    },
};
</script>

<style></style>
