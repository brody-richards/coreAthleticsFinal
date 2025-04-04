flatpickr("#date", {
    disable: [
        function(date) {
        return date.getDay() === 0 || date.getDay() === 6;
        }
    ],
    dateFormat: "Y-m-d"
});