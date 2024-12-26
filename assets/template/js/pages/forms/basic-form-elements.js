$(function () {
    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });


    // $('.tanggalLahirPicker').bootstrapMaterialDatePicker({
    //     time: false,
    //     clearButton: true
    // });

    // $('.tanggalLahirPicker').bootstrapMaterialDatePicker({

    //     format: 'YYYY-MM-DD',
    //     // minDate : todayDate,
    //     maxDate : new Date(),

    //     // minDate: '2024-04-01',
    //     // maxDate: '2024-04-10',

    //     // minDate: setMinDate,
    //     // maxDate: setMaxDate,

    //     clearButton: true,
    //     // weekStart: 1,
    //     triggerEvent: 'click',
    //     time: false
    // });
});