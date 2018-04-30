
let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
let beginDate = document.getElementById('begin_date');
let endDate = document.getElementById('end_date');

beginDate.addEventListener('click', (event) => {
    event.preventDefault();
    $('#begin_date').datepicker().open();
});

endDate.addEventListener('click', (event) => {
   event.preventDefault();
    $('#end_date').datepicker().open();
});

$('#begin_date').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    locale: 'pt-br',
    format: 'dd/mm/yyyy',
    minDate: today,
    maxDate: function () {
        return $('#end_date').val();
    }
});
$('#end_date').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    locale: 'pt-br',
    format: 'dd/mm/yyyy',
    minDate: function () {
        return $('#begin_date').val();
    }
});

