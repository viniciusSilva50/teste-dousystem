
let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
let beginDate = document.getElementById('begin-date');
let endDate = document.getElementById('end-date');

beginDate.addEventListener('click', (event) => {
    event.preventDefault();
    $('#begin-date').datepicker().open();
});

endDate.addEventListener('click', (event) => {
   event.preventDefault();
    $('#end-date').datepicker().open();
});

$('#begin-date').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    locale: 'pt-br',
    format: 'dd/mm/yyyy',
    minDate: today,
    maxDate: function () {
        return $('#end-date').val();
    }
});
$('#end-date').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    locale: 'pt-br',
    format: 'dd/mm/yyyy',
    minDate: function () {
        return $('#begin-date').val();
    }
});

