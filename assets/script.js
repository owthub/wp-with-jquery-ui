jQuery(document).ready(function () {

    jQuery("#accordion-wp").accordion();


    /*jQuery("#tags").autocomplete({
     source: availablePosts
     });*/

    var dateFormat = "mm/dd/yy",
            from = jQuery("#from")
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3
            })
            .on("change", function () {
                to.datepicker("option", "minDate", getDate(this));
            }),
            to = jQuery("#to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
    })
            .on("change", function () {
                from.datepicker("option", "maxDate", getDate(this));
            });

    function getDate(element) {
        var date;
        try {
            date = jQuery.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }

});

